<?php

function random_chars(){ 
	//removed number 0, capital o, number 1 and small L
	//Total: keys = 32, elements = 33
	$characters = array(
	"A","B","C","D","E","F","G","H","J","K","L","M",
	"N","P","Q","R","S","T","U","V","W","X","Y","Z",
	"1","2","3","4","5","6","7","8","9");

	//make an "empty container" or array for our keys
	$keys = array();

	//first count of $keys is empty so "1", remaining count is 1-6 = total 7 times
	while(count($keys) < 4) {
		//"0" because we use this to FIND ARRAY KEYS which has a 0 value
		//"-1" because were only concerned of number of keys which is 32 not 33
		//count($characters) = 33
		$x = mt_rand(0, count($characters)-1);
		if(!in_array($x, $keys)) {
		   $keys[] = $x;
		}
	}

	foreach($keys as $key){
	   $random_chars .= $characters[$key];
	}
	//echo $random_chars;
	return $random_chars;
}	

function generate_friendly_urls() {	
	
	$content ='
RewriteEngine On
RewriteRule ^(.*)-nb(.*)\.html$ index.php?page=76&news_details=$2 [L]
RewriteRule ^(.*)-p(.*)-sp(.*)\.html$ index.php?&page=$2&subpage=$3 [L]
RewriteRule ^(.*)-p(.*)\.html$ index.php?&page=$2 [L]
RewriteRule ^(.*)\.html$ index.php?&$1=1 [L] 
';

	$query = "SELECT news_categoryid,name,parentid FROM news_categories";
	$result = mysql_query ($query);	
	while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) { 	

		if ($row['parentid'] == 0) {
			$content .="
RewriteRule ^".wyrzuc_polskie_i_duze_litery($row['name'])."/$ index.php?page=76&cat=".$row['news_categoryid']." [L]";		
		} else {		
			$query1 = "SELECT news_categoryid,name FROM news_categories WHERE news_categoryid='".$row['parentid']."'";
			$result1 = mysql_query ($query1);	
			//echo "query1 -- $query1 -- $result1 <br>";
			while ($row1 = mysql_fetch_array ($result1, MYSQL_ASSOC)) { 				
				$content .="
RewriteRule ^".wyrzuc_polskie_i_duze_litery($row['name'])."/$ index.php?page=76&cat=".$row1['news_categoryid']."&subcat=".$row['news_categoryid']." [L]";		
			}	
		}
	}	
	$fp = fopen('../.htaccess', 'w');
	fwrite($fp, $content);
	fclose($fp);
}	



function get_cat_name_link($news_categoryid) {	

	$news_categoryid1=explode(',',$news_categoryid);

	$query = "SELECT name,news_categoryid,parentid FROM news_categories WHERE news_categoryid='".$news_categoryid1[1]."'";
	$result = mysql_query ($query);	
	while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) { 			
		foreach ($row as $key => $value) {
			$news_categories_tab[$key]=$value;
		}	
		if ($row['parentid'] == 0) {			
			$news_categories_tab['link']=wyrzuc_polskie_i_duze_litery($row['name']).'/';
		} else {			
			$news_categories_tab['link']=wyrzuc_polskie_i_duze_litery($row['name']).'/';
			//$news_categories_tab['link']=strtolower($row['name']).'/';
		}
	}
	return($news_categories_tab);
}

function count_comments($id) {	
	$query = "SELECT COUNT(commentid) as total FROM comments WHERE newsid='".$id."'";
	$result = mysql_query ($query);	
	$data=mysql_fetch_assoc($result);
	return($data['total']);
}

function get_cat_list($pageid,$mainid) {
	
	global $cat_tab;
	global $scierzka_kat;
	
	$query = "SELECT parentid, pages.pageid, name, type, link FROM pages, pages_texts WHERE
	pages.pageid=pages_texts.pageid AND langid='1' AND parentid='".$pageid."' ORDER BY position ASC, createtime ASC";
	$result = mysql_query ($query);	
	while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) { 		
		
		//check if categorie contauins substategories
		$query1="SELECT parentid, pages.pageid, name, type, link FROM pages, pages_texts WHERE
		pages.pageid=pages_texts.pageid AND langid='".$_SESSION['lang']."' AND parentid='".$row['pageid']."' ORDER BY position ASC, createtime ASC";
		$result1=mysql_query($query1);			
		$count1=mysql_num_rows($result1);		
		if ($count1 > 0) {
			get_cat_list($row['pageid'],$mainid);		
		} else {	
			//$cat_tab[$row['pageid']]=$row['name'];		
			$scierzka_kat='';
			pobierz_scierzke_kat1($row['pageid'],$mainid);		
			$cat_tab[$row['pageid']]=substr($scierzka_kat,1);		
		}
	}
}


//generate md5 pass
function get_md5_pass() {
	
	$pass='';
	for ($i=1;$i<=6;$i++) {
		$pass.=rand(0,20);
	}	
	return($pass);
}

//send email
function send_email($from_name, $from_email, $to, $subject, $body) {

	//get SMTP settings from database
	$query = "SELECT * FROM settings WHERE settingid IN (47,3,4,5,6)";
	$result = @mysql_query ($query);
	while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
		$settings_tab[$row['settingid']]=$row['value'];
	}

	require('class/phpmailer/class.phpmailer.php');	
	
	$email_admina=$settings_tab[47];
	$email_port_admina=$settings_tab[6];
	$email_host=$settings_tab[3];
	$email_uzytkownik_admina=$settings_tab[4];
	$email_haslo_admina=$settings_tab[5];	
	
	$user_email=$settings_tab[47];
	$email_admina=$settings_tab[47];

	//wyślij e-mail do użytkownika
	try {
		$mail = new PHPMailer(true); //New instance, with exceptions enabled

		//$body             = file_get_contents('contents.html');
		//$body             = preg_replace('/\\\\/','', $body); //Strip backslashes

		$mail->IsSMTP();                           // tell the class to use SMTP
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->Port       = $email_port_admina;                    // set the SMTP server port
		$mail->Host       = $email_host; // SMTP server
		$mail->Username   = $email_uzytkownik_admina;     // SMTP server username
		$mail->Password   = $email_haslo_admina;            // SMTP server password

		$mail->IsSendmail();  // tell the class to use Sendmail

		//$mail->AddReplyTo("dom@fineshop.pl","First Last");

		$mail->From       = $from_email;
		$mail->FromName   = $from_name;
		
		//$to = $user_email;

		$mail->AddAddress($to);

		$mail->Subject  = $subject;

		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
		$mail->WordWrap   = 80; // set word wrap

		$mail->MsgHTML($body);

		$mail->IsHTML(true); // send as HTML

		$mail->Send();
		//echo 'Message has been sent.';
	} catch (phpmailerException $e) {
		echo $e->errorMessage();
	}			
} 

//send email
function send_email1($from_name, $from_email, $to, $subject, $body) {

	//get SMTP settings from database
	$query = "SELECT * FROM settings WHERE settingid IN (1,3,4,5,6)";
	$result = @mysql_query ($query);
	while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
		$settings_tab[$row['settingid']]=$row['value'];
	}
	
	$email_admina=$settings_tab[1];
	$email_port_admina=$settings_tab[6];
	$email_host=$settings_tab[3];
	$email_uzytkownik_admina=$settings_tab[4];
	$email_haslo_admina=$settings_tab[5];	
	
	$user_email=$settings_tab[1];
	$email_admina=$settings_tab[1];

	//wyślij e-mail do użytkownika
	try {
		$mail = new PHPMailer(true); //New instance, with exceptions enabled

		//$body             = file_get_contents('contents.html');
		//$body             = preg_replace('/\\\\/','', $body); //Strip backslashes

		$mail->IsSMTP();                           // tell the class to use SMTP
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->Port       = $email_port_admina;                    // set the SMTP server port
		$mail->Host       = $email_host; // SMTP server
		$mail->Username   = $email_uzytkownik_admina;     // SMTP server username
		$mail->Password   = $email_haslo_admina;            // SMTP server password

		$mail->IsSendmail();  // tell the class to use Sendmail

		//$mail->AddReplyTo("dom@fineshop.pl","First Last");

		$mail->From       = $from_email;
		$mail->FromName   = $from_name;
		
		//$to = $user_email;

		$mail->AddAddress($to);

		$mail->Subject  = $subject;

		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
		$mail->WordWrap   = 80; // set word wrap

		$mail->MsgHTML($body);

		$mail->IsHTML(true); // send as HTML

		$mail->Send();
		//echo 'Message has been sent.';
	} catch (phpmailerException $e) {
		echo $e->errorMessage();
	}			
} 

//adres_miniatury - sprawdź czy jest miniatur jeśli nie to utwórz ją:
//paramerty: katalog, nazwa dużego zdjęcia, maksymalna szerokość, maksymalna wysokość
function adres_miniatury($katalog, $image_adres, $max_image_width, $max_image_height) {

	//pobierz rozszerzenie pliku
	$roz=pathinfo($image_adres,PATHINFO_EXTENSION);	
	$nazwa_zdjecia=str_replace('.'.$roz, '', $image_adres);
	
	$adres_miniatury=$nazwa_zdjecia.'_'.$max_image_width.'_'.$max_image_height.".".$roz;
	
	
	if (file_exists($katalog.'/'.$image_adres)) {
		if (!file_exists($katalog.'min/'.$adres_miniatury)) {
		
			//tworzenie miniturki
			//sprawdź jaki typ
			if ($roz == 'jpg' OR $roz == 'jpeg' OR $roz == 'JPEG' OR $roz == 'JPG') {
				$img = imagecreatefromjpeg($katalog.$image_adres);
			} elseif ($roz == 'GIF' OR $roz == 'gif') {
				$img = imagecreatefromgif($katalog.$image_adres);	
			} elseif ($roz == 'PNG' OR $roz == 'png') {
				$img = imagecreatefrompng($katalog.$image_adres);	
			}
			
			// Wymiarowanie rysunku
			
			$x1 = @imagesx($img);
			$y1 = @imagesy($img);
			   
			$test_x = $x1/$max_image_width;
			$test_y = $y1/$max_image_height;

			if ($test_x > $test_y) {
				if ($x1 > $max_image_width) {
					$ny = $max_image_height;				
					$nx = ($x1*$ny)/$y1;
				} else {
					$nx = $x1;				
					$ny = $y1;
				}
			} else {

				if ($y1 > $max_image_height) {
					$nx = $max_image_width;				
					$ny = ($y1*$nx)/$x1;
				} else {
					$nx = $x1;				
					$ny = $y1;
				}
			}		
			
			//tworzenie nowego zdjęcia
			if ($roz == 'jpg' OR $roz == 'jpeg' OR $roz == 'JPEG' OR $roz == 'JPG') {
				$new_img = imagecreatetruecolor($nx, $ny);		
				imagecopyresampled($new_img, $img, 0, 0, 0, 0, $nx, $ny, $x1, $y1);		
				imagejpeg($new_img,$katalog.'min/'.$adres_miniatury, 100);
				
			} elseif ($roz == 'PNG' OR $roz == 'png') {
			
				$new_img = imagecreatetruecolor( $nx, $ny );
				imagealphablending( $new_img, false );
				imagesavealpha( $new_img, true );
				imagecopyresampled($new_img, $img, 0, 0, 0, 0, $nx, $ny, $x1, $y1);		
				imagepng($new_img,$katalog.'min/'.$adres_miniatury);
			/*
				$new_img = imagecreatetruecolor($nx, $ny);		
				imagealphablending( $new_img, false );
				imagesavealpha( $new_img, true );		
				imagecopyresampled($new_img, $img, 0, 0, 0, 0, $nx, $ny, $x1, $y1);		
				imagepng($new_img,$katalog.'min/'.$adres_miniatury);
				*/
			
			// Set the image
			/*
	$img = imagecreatetruecolor(100,100);
	imagesavealpha($img, true);

	// Fill the image with transparent color
	$color = imagecolorallocatealpha($img,0x00,0x00,0x00,127);
	imagefill($img, 0, 0, $color);
	*/

			/*
				$new_img = imagecreatetruecolor($nx, $ny);		
				imagesavealpha($img, true);
				$color = imagecolorallocatealpha($img,0x00,0x00,0x00,127);
				imagefill($img, 0, 0, $color);
				//imagecopyresampled($new_img, $img, 0, 0, 0, 0, $nx, $ny, $x1, $y1);					
				imagepng($new_img,$katalog.'min/'.$adres_miniatury);
				*/
				
				/*
				$tmp = imagecreatetruecolor($targ_w, $targ_h);
				imagecopyresampled($tmp, $src, 0,0,$_POST['x'],$_POST['y'],$targ_w,$targ_h,$_POST['w'],$_POST['h']);
				imagepng($tmp, $rootfolder.$folder.'thumb_'.$filename,100);
				*/
				
			} elseif ($roz == 'GIF' OR $roz == 'gif') {
				$new_img = imagecreatetruecolor($nx, $ny);		
				@imagecopyresized( $new_img, $img, 0, 0, 0, 0, $nx, $$ny, $x1, $y1 );			
				@imagegif($new_img,$katalog.'min/'.$adres_miniatury, 100);
			}			
		}
		
		$adres=$katalog.'min/'.$adres_miniatury;
		return $adres;
	}
}

//adres_miniatury - sprawdź czy jest miniatur jeśli nie to utwórz ją:
//paramerty: katalog, nazwa dużego zdjęcia, maksymalna szerokość, maksymalna wysokość
function adres_miniatury1($katalog, $image_adres, $max_image_width, $max_image_height) {

	//pobierz rozszerzenie pliku
	$roz=pathinfo($image_adres,PATHINFO_EXTENSION);	
	$nazwa_zdjecia=str_replace('.'.$roz, '', $image_adres);
	
	$adres_miniatury=$nazwa_zdjecia.'_'.$max_image_width.'_'.$max_image_height.".".$roz;
	
	
	if (file_exists($katalog.'/'.$image_adres)) {
		if (!file_exists($katalog.'min/'.$adres_miniatury)) {
		
			//tworzenie miniturki
			//sprawdź jaki typ
			if ($roz == 'jpg' OR $roz == 'jpeg' OR $roz == 'JPEG' OR $roz == 'JPG') {
				$img = imagecreatefromjpeg($katalog.$image_adres);
			} elseif ($roz == 'GIF' OR $roz == 'gif') {
				$img = imagecreatefromgif($katalog.$image_adres);	
			} elseif ($roz == 'PNG' OR $roz == 'png') {
				$img = imagecreatefrompng($katalog.$image_adres);	
			}
			
			// Wymiarowanie rysunku
			
			$x1 = imagesx($img);
			$y1 = imagesy($img);
			   
			$test_x = $x1/$max_image_width;
			$test_y = $y1/$max_image_height;

			if ($test_x > $test_y) {
				if ($x1 > $max_image_width) {
					$nx = $max_image_width;				
					$ny = ($y1*$nx)/$x1;
				} else {
					$nx = $x1;				
					$ny = $y1;
				}
			} else {

				if ($y1 > $max_image_height) {
					$ny = $max_image_height;				
					$nx = ($x1*$ny)/$y1;
				} else {
					$nx = $x1;				
					$ny = $y1;
				}
			}		
			
			//tworzenie nowego zdjęcia
			if ($roz == 'jpg' OR $roz == 'jpeg' OR $roz == 'JPEG' OR $roz == 'JPG') {
				$new_img = imagecreatetruecolor($nx, $ny);		
				imagecopyresampled($new_img, $img, 0, 0, 0, 0, $nx, $ny, $x1, $y1);		
				imagejpeg($new_img,$katalog.'min/'.$adres_miniatury, 100);
				
			} elseif ($roz == 'PNG' OR $roz == 'png') {
			
				$new_img = imagecreatetruecolor( $nx, $ny );
				imagealphablending( $new_img, false );
				imagesavealpha( $new_img, true );
				imagecopyresampled($new_img, $img, 0, 0, 0, 0, $nx, $ny, $x1, $y1);		
				imagepng($new_img,$katalog.'min/'.$adres_miniatury);
			/*
				$new_img = imagecreatetruecolor($nx, $ny);		
				imagealphablending( $new_img, false );
				imagesavealpha( $new_img, true );		
				imagecopyresampled($new_img, $img, 0, 0, 0, 0, $nx, $ny, $x1, $y1);		
				imagepng($new_img,$katalog.'min/'.$adres_miniatury);
				*/
			
			// Set the image
			/*
	$img = imagecreatetruecolor(100,100);
	imagesavealpha($img, true);

	// Fill the image with transparent color
	$color = imagecolorallocatealpha($img,0x00,0x00,0x00,127);
	imagefill($img, 0, 0, $color);
	*/

			/*
				$new_img = imagecreatetruecolor($nx, $ny);		
				imagesavealpha($img, true);
				$color = imagecolorallocatealpha($img,0x00,0x00,0x00,127);
				imagefill($img, 0, 0, $color);
				//imagecopyresampled($new_img, $img, 0, 0, 0, 0, $nx, $ny, $x1, $y1);					
				imagepng($new_img,$katalog.'min/'.$adres_miniatury);
				*/
				
				/*
				$tmp = imagecreatetruecolor($targ_w, $targ_h);
				imagecopyresampled($tmp, $src, 0,0,$_POST['x'],$_POST['y'],$targ_w,$targ_h,$_POST['w'],$_POST['h']);
				imagepng($tmp, $rootfolder.$folder.'thumb_'.$filename,100);
				*/
				
			} elseif ($roz == 'GIF' OR $roz == 'gif') {
				$new_img = imagecreatetruecolor($nx, $ny);		
				imagecopyresized( $new_img, $img, 0, 0, 0, 0, $nx, $$ny, $x1, $y1 );			
				imagegif($new_img,$katalog.'min/'.$adres_miniatury, 100);
			}			
		}
		
		$adres=$katalog.'min/'.$adres_miniatury;
		return $adres;
	}
}

//wyrzuć polsskie i duże litery
function wyrzuc_polskie_i_duze_litery($nazwa) {

	$nazwa=trim($nazwa);
	$cenzura = array('ą','Ą', 'ć', 'Ć', 'ł', 'Ł', 'ó', 'Ó', 'ś', 'Ś', ' ', 'ę', 'Ę', 'ń', 'Ń', 'ż', 'Ż', 'ź', 'Ź', '"', '\'', '?', '-', '"', "'", ':', '/');
	$zamiana = array('a', 'A', 'c', 'C', 'l', 'L', 'o', 'O', 's', 'S', '_', 'e', 'E', 'n', 'N', 'z', 'Z', 'z', 'Z', '', '', '', '', '', '', '', ''); 	
	$nazwa = str_replace($cenzura, $zamiana, $nazwa);
	//$nazwa=strtolower($nazwa);
	return($nazwa);
	
	return $nazwa;
}

function print_pre($tab) {
	print "<pre>";
	print_r($tab);
	print "</pre>";
}

function drzewo_kategorii1($pageid, $pageid_wybrane, $poziom, $jakie_drzewko) {

	global $drzewo_kategorii;
	global $drzewo_kategorii_link;	
	global $menu_boczne_typ_tab1;	
	global $menu_boczne_linki_zew_tab1;	
	global $poprzedni_poziom;
	//zamienne dla warunek umżliwijący cofniećie o wiecej niż jden ul		
	global $test_powrot;
	global $test_powrot_id;
	// koniec zamienne dla warunek umżliwijący cofniećie o wiecej niż jden ul		
		
	$query = "SELECT parentid, pages.pageid, name, type, link FROM pages, pages_texts WHERE
	pages.pageid=pages_texts.pageid AND langid='".$_SESSION['lang']."' AND parentid='".$pageid."' ORDER BY position ASC, createtime ASC";
	$result = mysql_query ($query);		
	
	$test_id = mysql_num_rows($result);		
	if ($test_id > 0) {  $poprzedni_poziom=$poziom; $poziom++;	}
	while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) { 	
	
		$drzewo_kategorii[$row['pageid']][$poziom][$poprzedni_poziom]=$row['name'];	
		$drzewo_kategorii_link[$row['pageid']]=wyrzuc_polskie_i_duze_litery($row['name']);		

		$menu_boczne_typ_tab1[$row['pageid']]=$row['type'];		
		$menu_boczne_linki_zew_tab1[$row['pageid']]=$row['link'];		
				
		$poprzedni_poziom=$poziom;

		//zamienne dla warunek umżliwijący cofniećie o wiecej niż jden ul
		$test_powrot=0;
		$test_powrot_id=$row['pageid'];
		// koniec zamienne dla warunek umżliwijący cofniećie o wiecej niż jden ul		
		
		//jesli drzewko wybrane uwzględniwarunke ograniczający wyświetlanie całego drzewka
		if ($jakie_drzewko == 'wybrane') {
			//wyłączenie tego warunku spowoduje uwolninie całego drzewka wczytanego rekurencyjnie
			if(stristr($pageid_wybrane, ','.$row['pageid'].',') AND ($row['type'] == 1)) {
				drzewo_kategorii1($row['pageid'], $pageid_wybrane, $poziom, $jakie_drzewko);				
			} 			
		} else {
			drzewo_kategorii1($row['pageid'], $pageid_wybrane, $poziom, $jakie_drzewko);		
		}
		
		//warunek umżliwijący cofniećie o wiecej niż jden ul
		if ($poprzedni_poziom > $poziom) {
			if ($test_powrot == 1) {
				$drzewo_kategorii[$test_powrot_id][$poziom][$poprzedni_poziom]='powrot';				
			}
			$test_powrot=1;			
		}
		//koniec warunek umżliwijący cofniećie o wiecej niż jden ul		
	}
	if ($test_id > 0) {  $poprzedni_poziom=$poziom; $poziom--;	}	
}


//wykryyj do jakich kategorii ma wchodzić funkcja rekurencyjna drzewka
function pobierz_id_kat($parentid, $parentid_ciag) {

	global $id_parent_ciag_wynik;
	
	$query = "SELECT parentid FROM pages WHERE pageid=".$parentid;
	$result = @mysql_query ($query);	
	while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) { 	
		$parentid_ciag.=$row['parentid'].",";
		$id_parent_ciag_wynik=$parentid_ciag;			
		pobierz_id_kat($row['parentid'], $parentid_ciag);
	}
}

//pobierz scierzke kat
function pobierz_scierzke_kat1($id_kat,$mainid) {

	global $scierzka_kat;
	
	if ($id_kat != $mainid) {
		$query = "SELECT * FROM pages, pages_texts WHERE pages.pageid=pages_texts.pageid AND langid='".$_SESSION['lang']."' AND pages.pageid=".$id_kat;
		$result = @mysql_query ($query);
		while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) { 	
			if ($row['parentid'] != 0) {
				$scierzka_kat1="/".$row['name'];
				$scierzka_kat=$scierzka_kat1.$scierzka_kat;
			}
			pobierz_scierzke_kat1($row['parentid'],$mainid);
		}	
	}
}

//pobierz ścierzkę kategorii
function pobierz_scierzke_kat($id_kat) {

	global $scierzka_kat;
	
	if ($id_kat != 0) {
		$query = "SELECT * FROM pages, pages_texts WHERE pages.pageid=pages_texts.pageid AND pageid=".$id_kat;
		$result = @mysql_query ($query);
		while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) { 	
			$parentid=$row['parentid'];
			if ($parentid != $mainid) {
				$name=$row['name'];
				$scierzka_kat1="/  <a href='index.php?strona=".$strona."&id_kat=".$id_kat."'><span>".$name."<span></a> ";
				$scierzka_kat=$scierzka_kat1.$scierzka_kat;
			}
			pobierz_scierzke_kat($parentid);
		}	
	}
}

//pobierz id, wszystkich podkategorii
function pobierz_id_podaktegorii($id_kat) {

	global $podkatgorie_tab;
	
	$query = "SELECT pageid FROM pages WHERE parentid='".$id_kat."'";
	$result = @mysql_query ($query);
	while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) { 	
	
		$podkatgorie_tab[]=$row['pageid'];
		pobierz_id_podaktegorii($row['pageid']);
	}		
}































?>