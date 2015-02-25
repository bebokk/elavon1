<?php

session_start();
include_once('../../config/mysql.php');

//adres_miniatury - sprawdź czy jest miniatur jeśli nie to utwórz ją:
//paramerty: katalog, nazwa dużego zdjęcia, maksymalna szerokość, maksymalna wysokość
function adres_miniatury($katalog, $image_adres, $max_image_width, $max_image_height) {

	//pobierz rozszerzenie pliku
	$roz=pathinfo($image_adres,PATHINFO_EXTENSION);	
	$nazwa_zdjecia=str_replace('.'.$roz, '', $image_adres);
	
	$adres_miniatury=$nazwa_zdjecia.'_'.$max_image_width.'_'.$max_image_height.".".$roz;
	
	
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
			
		} elseif ($roz == 'GIF' OR $roz == 'gif') {
			$new_img = imagecreatetruecolor($nx, $ny);		
			imagecopyresized( $new_img, $img, 0, 0, 0, 0, $nx, $$ny, $x1, $y1 );			
			imagegif($new_img,$katalog.'min/'.$adres_miniatury, 100);
		}			
	}
	
	$adres=$katalog.'min/'.$adres_miniatury;
	return $adres;
}

//$invoiceid=1;
$invoiceid1=$_GET['id'];

//get info about sales order
$query = "SELECT * FROM users ORDER BY name ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {	
	$users_tab[$row['userid']]=$row['name'];
}

//get info about invoices
$query = "SELECT * FROM invoices WHERE invoiceid='".$invoiceid1."'";
$result = @mysql_query ($query);
$salesorders_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {	
	foreach ($row as $key => $value) {
		$invoices_tab[$key]=$value;	
	}
}

//get selsorder products
$query = "SELECT * FROM invoices_products WHERE invoiceid='".$invoiceid1."'";
$result = @mysql_query ($query);
$invoices_products_tab='';
$subtotal='';
$vat=0;
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {	
	foreach ($row as $key => $value) {
		$invoices_products_tab[$row['sales_orders_productid']][$key]=$value;	
	}
	$subtotal+=$row['price']*$row['quantity'];
	$vat=$row['vat'];
}

//get selsorder products
$query = "SELECT * FROM customers WHERE customerid='".$invoices_tab['customerid']."'";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {	
	foreach ($row as $key => $value) {
		$customers_tab[$key]=$value;	
	}
}

//get invoice logo
$query1 = "SELECT * FROM structure_basic_pictures WHERE tableid='5' AND table_name='settings_invoices'
ORDER BY position ASC, createtime DESC LIMIT 0,1";
$result1 = @mysql_query ($query1);
while ($row1 = mysql_fetch_array ($result1, MYSQL_ASSOC)) {	
	$admin_logo=adres_miniatury('../../images/basic/',$row1['structure_basic_pictureid'].'.'.$row1['extension'],301,120);
}

//get invoice settings
$query = "SELECT * FROM settings_invoices";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {	

	$row['description']=str_replace('<!DOCTYPE html>','',$row['description']);
	$row['description']=str_replace('<html>','',$row['description']);
	$row['description']=str_replace('<head>','',$row['description']);
	$row['description']=str_replace('</head>','',$row['description']);
	$row['description']=str_replace('<body>','',$row['description']);
	$row['description']=str_replace('</body>','',$row['description']);
	$row['description']=str_replace('</html>','',$row['description']);

	foreach ($row as $key => $value) {
		$settings_invoices[$row['settings_invoiceid']][$key]=$value;
	}
}

$settings3_tab['value']=str_replace('<!DOCTYPE html>','',$settings3_tab['value']);
$settings3_tab['value']=str_replace('<html>','',$settings3_tab['value']);
$settings3_tab['value']=str_replace('<head>','',$settings3_tab['value']);
$settings3_tab['value']=str_replace('</head>','',$settings3_tab['value']);
$settings3_tab['value']=str_replace('<body>','',$settings3_tab['value']);
$settings3_tab['value']=str_replace('</body>','',$settings3_tab['value']);
$settings3_tab['value']=str_replace('</html>','',$settings3_tab['value']);

$html = "
<style type='text/css'>
	* {
		font-family: DejaVuSansCondensed, sans-serif; font-size: 11pt;
	}
	.invoice0 {
		float:left;
		width:100%;
	}
	.invoice0_1 {
		margin-right:50px;
		text-align:right;
		float:right;
		height:230px;
	}
	.invoice1 {
		float:left;
		width:100%;
	}
	.invoice10 {
		margin-right:50px;
		margin-left:50px;
	}
	.invoice1_1 {
		float:left;
		width:50%;
	}
	.invoice1_1_1 {
		float:left;
		width:90%;
	}
	.invoice1_2 {
		float:right;
		text-align:right;
	}
	.invoice1_2 table {
		width:100%;
	}
	.invoice1_2 table tr td {
		text-align:right;	
	}
	.invoice2 {
		float:left;
		width:100%;
		font-size:25px;
	}
	.space {
		float:left;
		width:100%;
		height:10px;
	}
	.invoice3 {
		float:left;
		width:100%;
	}
	.invoice30 {
		margin-right:50px;
		margin-left:50px;
	}
	.invoice3_1 {
		float:left;
		width:100%;
		font-size:22px;
	}
	.invoice3_2 {
		float:left;
		width:100%;
	}
	.invoice3_2 table {
		width:100%;
		padding:0px;
		margin:0px;
		border:0px;
	}
	.invoice3_2_td {
		background-color:rgb(8,64,124);
		color:#ffffff;
		padding: 5px 9px;
		height: 30px;
	}
	.invoice3_2 table tr td {
		margin: 0;
		padding: 0;
	}
	.invoice4 {
		float:left;
		width:100%;
	}
	.invoice4_1 {
		float:left;
		width:65%;	
		color:red;
	}
	.invoice4_2 {
		float:left;
		width:35%;	
	}
	.invoice3_2_td1 {		
		/*border-bottom: 1px solid #A39E9E;*/
	}
	.invoice3_2_td2 {		
		font-size:1px;
	}
	.invoice3_2_td21 {
		background-color: #A39E9E;
		height: 1px;
	}
	.invoice5 {
		float:left;
		width:100%;	
	}
	.invoice5_1 {
		float:left;
		width:100%;	
	}
	.invoice5_2 {
		float:left;
		width:100%;	
	}
	.invoice5_3 {
		margin-top:10px;
		float:left;
		width:100%;	
	}
	.invoice5_30 {
		float:left;
		width:100%;	
		font-size:11px;
	}
	.invoice5_31 {
		margin-top:10px;
		float:left;
		width:100%;	
		font-size:13px;
	}	
	.invoice5_32 {
		float:left;
		width:100%;	
		font-size:13px;
		font-weight:bold;
	}	
	.invoice5_3_1 {
		float:left;
		width:47%;	
		height:70px;
		border-bottom:1px solid black;
	}
	.invoice5_3_2 {
		float:right;
		width:47%;	
		height:70px;
		border-bottom:1px solid black;
	}
</style>
";

$html .= "
<div class='invoice1'>
	<div class='invoice10'>
		<div class='invoice1_1'>
			<div class='invoice1_1_1'>
				".$customers_tab['company']." <br />
				".$customers_tab['address']." <br />
				".$customers_tab['city']." <br />
				".$customers_tab['postcode']." <br />
			</div>
		</div>
		<div class='invoice1_2'>
			<table>
				<tr>
					<td>Invoice Number:</td>
					<td>IN".$invoices_tab['number']."</td>
				</tr>
				<tr>
					<td>Invoice Date:</td>
					<td>".$invoices_tab['date']."</td>
				</tr>
				<tr>
					<td>Due Date:</td>
					<td>".$invoices_tab['duedate']."</td>
				</tr>
				<tr>
					<td>Issued by:</td>
					<td>Lukasz Sojka</td>
				</tr>
				<tr>
					<td>Account Manager:</td>
					<td>Lukasz Sojka</td>
				</tr>
			</table>	
		</div>
	</div>
</div>
<div class='space'></div>
<div class='invoice2'>
	<div class='invoice10'>
		INVOICE
	</div>
</div>
<div class='space'></div>
<div class='invoice3'>
	<div class='invoice10'>
		<div class='invoice3_1'>Products</div>
		<div class='invoice3_2'>
			<table cellpadding='0' cellspacing='0'>
				<tr>
					<td class='invoice3_2_td'>&nbsp;Pos&nbsp;</td>
					<td class='invoice3_2_td'>&nbsp;Item&nbsp;</td>
					<td class='invoice3_2_td'>&nbsp;&nbsp;Qty.&nbsp;</td>
					<td class='invoice3_2_td'>&nbsp;Unit Price&nbsp;</td>
					<td class='invoice3_2_td'>&nbsp;Total&nbsp;</td>
				</tr>			
				<tr>
					<td colspan='5' class='invoice3_2_td2'>&nbsp;</tr>
				</tr>
				";			
				$i=0;
				if ($invoices_products_tab != '') foreach ($invoices_products_tab as $key => $value) {			
					$i++;
					$html .= "
					<tr>
						<td class='invoice3_2_td1'>".$i.".</td>
						<td class='invoice3_2_td1'>
							".$invoices_products_tab[$key]['selected_product']."
							".$invoices_products_tab[$key]['selected_service_type']."
							".$invoices_products_tab[$key]['selected_service_sub_type']."
							".$invoices_products_tab[$key]['duration_type']."
							".$invoices_products_tab[$key]['target_type']."
						</td>
						<td class='invoice3_2_td1' style='text-align:center;'>".$invoices_products_tab[$key]['quantity']."</td>";
						$unit_price1=$invoices_products_tab[$key]['unit_price']-($invoices_products_tab[$key]['unit_price']*($invoices_products_tab[$key]['discount']/100));
						$html .= "<td class='invoice3_2_td1' style='text-align:right;'>".number_format($unit_price1,2,'.',',')."</td>
						<td class='invoice3_2_td1' style='text-align:right;'>".number_format($unit_price1*$invoices_products_tab[$key]['quantity'],2,'.',',')."</td>
					</tr>
					<tr>
						<td colspan='5' class='invoice3_2_td2'>&nbsp;<hr class='invoice3_2_td21' /></tr>
					</tr>
					";
					$subtotal+=$unit_price1;
				}
			$html .= "</table>
		</div>
	</div>
</div>
<div class='space'></div>
<div class='invoice4'>
	<div class='invoice10'>
		<div class='invoice4_1'>		
			<br /><br /><br /><br />
		</div>			
		<div class='invoice4_2'>
			<div class='invoice3_1 invoice3_2_td'>Sumary</div>
			<div class='invoice3_2'>
				<table>		
					<tr>
						<td colspan='5' class='invoice3_2_td2'>&nbsp;</tr>
					</tr>
					";
					$html .= "
					<tr>
						<td>Subtotal:</td>
						<td style='text-align:right;'>".number_format($subtotal,2,'.',',')."</td>
					</tr>";
					/*
					<tr>
						<td>Discount (10.00 %):</td>
						<td>287.50</td>
					</tr>
					*/
					$html .= "
					<tr>
						<td colspan='5' class='invoice3_2_td2'>&nbsp;<hr class='invoice3_2_td21' /></tr>
					</tr>
					<tr>
						<td>VAT (".$invoices_tab['tax']." %):</td>
						<td style='text-align:right;'>".number_format($subtotal*($invoices_tab['tax']/100),2,'.',',')."</td>
					</tr>
					<tr>
						<td colspan='5' class='invoice3_2_td2'>&nbsp;<hr class='invoice3_2_td21' /></tr>
					</tr>
					<tr>
						<td>Total (in £):</td>
						<td style='text-align:right;'>".number_format($subtotal*(1+($invoices_tab['tax']/100)),2,'.',',')."</td>
					</tr>
					<tr>
						<td colspan='5' class='invoice3_2_td2'>&nbsp;<hr class='invoice3_2_td21' /></tr>
					</tr>
					";
				$html .= "</table>
			</div>
		</div>		
	</div>			
</div>
<div class='space'></div>
<div class='space'></div>
<div class='space'></div>
<div class='space'></div>
<div class='invoice5'>
	<div class='invoice10'>
		<div class='invoice5_2'>
			Please send payment to: <br />
			<br />".$settings_invoices[4]['description']."
			<br /> <br />
		</div>
	</div>
</div>
";

//Pos Item Qty. Unit Price Total
//echo $html;

include("../../programs/mpdf/mpdf.php");
$mpdf=new mPDF('','', 0, '', 0, 0, 50, 56, 0, 0, 'L'); 
$mpdf->SetHTMLHeader("<div class='invoice0'>
	<div class='invoice0_1'><br><br><img src='".$admin_logo."' /></div>
</div>");
$mpdf->SetHTMLFooter("
<table cellpadding='0' cellspacing='0' style='width:100%;font-size:10px;background-color:rgb(8,64,124);padding:30px 30px 20px 30px;color:#ffffff;margin-top:-1px;'>
	<tr>
		<td valign='top' style='padding-right:10px;'>
			INNOVATIVE TECHNOLOGIES DEVELOPMENT LTD<br />
			12a Delamare Road <br />
			Wimbledon  <br />
			London SW20 8PS <br />
			United Kingdom <br />			
		</td>
		<td valign='top' style='padding-right:10px;padding-left:10px;'>
			Phone: 074 600 300 600 <br />
			www.innovative-technologies.co.uk<br />
			info@innovative-technologies.co.uk<br />
		</td>
		<td valign='top' style='padding-right:10px;padding-left:10px;'>
			Natwest<br />
			Account Number: 70773840<br />
			Sort Code: 20-79-29<br />
		</td>
		<td valign='top' style='padding-left:10px;'>
		</td>
	</tr>
	<tr>
		<td colspan='7' align='center' style='font-size:10px;'>
			<br>
			Page {PAGENO} of {nbpg}<br>
		</td>
	</tr>
</table>");

$mpdf->WriteHTML($html);
$mpdf->Output();
exit;





























?>