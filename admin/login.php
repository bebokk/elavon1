<?php

//session_destroy();
session_start();

include_once('sec.php');
require_once('config/mysql.php');
include_once('functions.php');

//logout
if ($_GET['page'] == 'logout') {
	unset($_SESSION['user']);
	unset($_SESSION['admin']);
	$_GET['page']='';
}	

/*
echo "_SESSION -- <pre>";
print_r($_SESSION);
echo "</pre>";
*/

$check_login=0;
if (isset($_POST['login_submit1'])) {

	//select user from database
	$query = "SELECT * FROM users WHERE login='".$_POST['login']."' AND pass='".md5($_POST['pass'])."'";
	$result = @mysql_query ($query);		
	$resulti = mysql_num_rows($result);
	if ($resulti > 0) {
	
		while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
			foreach ($row as $key => $value) {
				$_SESSION['user'][$key]=$value;
			}
			$check_login=1;
		}
		
		//get user picture
		$query1 = "SELECT * FROM structure_basic_pictures WHERE tableid='".$_SESSION['user']['userid']."' AND table_name='users'";
		$result1 = @mysql_query ($query1);	
		while ($row1 = mysql_fetch_array ($result1, MYSQL_ASSOC)) {			
			$_SESSION['user']['picture']=$row1['structure_basic_pictureid'].'.'.$row1['extension'];
		}
		
	} else {	
	
		$fault='Wrong login or pass!';		
	}
	
} else {

	if ($check_login == '') {
		$query = "SELECT * FROM users WHERE login='".$_SESSION['user']['login']."' AND pass='".$_SESSION['user']['pass']."'";
		$result = @mysql_query ($query);	
		while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
			foreach ($row as $key => $value) {
				$_SESSION['user'][$key]=$value;
			}
			$check_login=1;
		}
	}
	
	//get logo from admin
	$query1 = "SELECT * FROM structure_basic_pictures WHERE tableid='2' AND table_name='images'
	ORDER BY position ASC, createtime DESC LIMIT 0,1";
	$result1 = @mysql_query ($query1);
	while ($row1 = mysql_fetch_array ($result1, MYSQL_ASSOC)) {	
		$admin_logo=adres_miniatury('images/basic/',$row1['structure_basic_pictureid'].'.'.$row1['extension'],260,84);
	}
	
	$query = "SELECT * FROM settings";
	$result = @mysql_query ($query);
	while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
		$settings_tab[$row['settingid']]=$row['value'];
	}
	$tpl->assign("settings_tab",$settings_tab);
}

//send password on my email 
if (isset($_POST['send_login_details1'])) {

	//check if email is in database
	$query = "SELECT * FROM users WHERE email='".$_POST['email']."'";
	$result = @mysql_query ($query);	
	$resulti = mysql_num_rows($result);
	if ($resulti > 0) {	
	
		$new_pass=get_md5_pass();
		//generate and change user password md5		
		$query2 = "UPDATE users SET pass='".md5($new_pass)."' WHERE email='".$_POST['email']."'";
		$result2 = @mysql_query ($query2);	
	
		while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
			foreach ($row as $key => $value) {
				$login_details_tab['user'][$key]=$value;
			}
		}			
		//get email template 
		$query = "SELECT * FROM  emails_templates WHERE  emails_templateid='2'";
		$result = @mysql_query ($query);
		while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
			$emails_templates_description=$row['description'];
			$emails_templates_subject=$row['subject'];
		}
		
		//get settings
		$query = "SELECT * FROM settings WHERE settingid IN (1,9)";
		$result = @mysql_query ($query);
		while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
			$settings_tab[$row['settingid']]=$row['value'];
		}
		
		//replace template varchars
		$emails_templates_description=str_replace('#site_name#',$settings_tab[9],$emails_templates_description);
		$emails_templates_description=str_replace('#name#',$login_details_tab['user']['name'],$emails_templates_description);
		$emails_templates_description=str_replace('#login#',$login_details_tab['user']['login'],$emails_templates_description);
		$emails_templates_description=str_replace('#password#',$new_pass,$emails_templates_description);
		
		//send email
		send_email($settings_tab[9], $settings_tab[1], $login_details_tab['user']['email'], $emails_templates_subject, $emails_templates_description);		
		$confirm='Detail has been sent on your email!';
		
	} else {
		$fault='Email not found!';
	}
}

if ($check_login == 0) {

	?> 
	<!DOCTYPE html>
	<html>
	<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="robots" content="index, follow"/>
	<meta http-equiv="Content-Language" content="en" />
	<style type="text/css" media="screen">
		@import url("css/basic.css");
	</style>			
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/login.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	</head>
	<body>
	<div class="body_login0">
		<div class="body_login">
			<div class="body_login01">
				<div class="logo_login" style="background:transparent url('<? echo $admin_logo; ?>') no-repeat center center;"></div>
				<div class="footer_font">© Copyright by <? echo $settings_tab['46']; ?></div>
				<table class="login_to_admin_tab" cellspacing="0" cellpadding="0" height="100%" width="100%" style="position:absolute;top:-51px;">
					<tr>
						<td align="center" valign="center">
							<table class="login_to_admin_tab" cellspacing="0" cellpadding="0">
								<tr>
									<td align="center" valign="center">				
										<? if ($_GET['forgot_login_details'] == 1 OR (isset($_POST['send_login_details']) AND $fault != '')) { ?>  
											<form action="index.php?forgot_login_details=<? echo $_GET['forgot_login_details']; ?>" method="POST" name="login_page1">
												<? if ($fault != '') { ?>
													<div class="simple_fault1">
														<span><? echo $fault; ?></span>
													</div>		
												<? } ?>					
												<? if (isset($_POST['send_login_details1'])) { ?>
													<div class="simple_confirm1">
														<span><? echo $confirm; ?></span>
													</div>		
												<? } ?>														
												<div class="boxlog1">
													<div class="boxlog1_1">
														<div class="boxlog1_2">
															<div class="boxlog1_3"><span>Send login details on my e-mail</span></div>
														</div>
													</div>
													<div class="boxlog1_4">
														<div class="boxlog1_5">
															<div class="boxlog1_6">	
																<div class="login0">	
																	<div class="login0_1">	
																		<div class="login0_1_1">	
																			<span>E-mail:</span>
																		</div>
																		<div class="login0_1_2">	
																			<div class="login0_1_2_1">	
																				<div class="login0_1_2_1_ico1"></div>		
																				<input class="login0_1_2_1_1" type="text" name="email" value="<? echo $email; ?>" />															
																			</div>													
																		</div>
																	</div>
																</div>
																<div class="login01">	
																	<a class="login01_login" onclick="login_page1.submit();">	
																		<div class="button1">
																			<div class="button1_1">
																				<div class="button1_2">
																					<div class="button1_3">
																						<div class="button1_3_fog"></div>
																						<span>Send login details</span>
																					</div>
																				</div>
																			</div>
																		</div>
																	</a>
																	<input class="login01_sbumit" type="submit" name="send_login_details" value="send login details" />
																	<input type="hidden" name="send_login_details1" value="1" />
																	<a href="index.php" class="login01_11">	
																		<div class="login01_1">	
																			<span>Go to login page</span>
																		</div>
																	</a>
																</div>
																<div class="clear"></div>
															</div>
														</div>
													</div>	
													<div class="boxlog1_7">
														<div class="boxlog1_8">
															<div class="boxlog1_9"><span></span></div>
														</div>
													</div>					
												</div>		
											</form>											
										<? } else { ?> 		
											<form action="index.php?forgot_login_details=<? echo $_GET['forgot_login_details']; ?>&page=users&subpage=users" method="POST" name="login_page2">
												<? if ($fault != '') { ?>
													<div class="simple_fault1">
														<span><? echo $fault; ?></span>
													</div>		
												<? } ?>								
												<div class="boxlog1">
													<div class="boxlog1_1">
														<div class="boxlog1_2">
															<div class="boxlog1_3"><span>Welcome to <a href="#"><? echo $settings_tab['46']; ?></a> admin panel</span></div>
														</div>
													</div>
													<div class="boxlog1_4">
														<div class="boxlog1_5">
															<div class="boxlog1_6">	
																<div class="login0">	
																	<div class="login0_1">	
																		<div class="login0_1_1">	
																			<span>Login:</span>
																		</div>
																		<div class="login0_1_2">	
																			<div class="login0_1_2_1">	
																				<div class="login0_1_2_1_ico1"></div>		
																				<input class="login0_1_2_1_1" type="text" name="login" value="<? echo $login; ?>" />															
																			</div>													
																		</div>
																	</div>
																	<div class="login0_1">	
																		<div class="login0_1_1">	
																			<span>Password:</span>
																		</div>
																		<div class="login0_1_2">	
																			<div class="login0_1_2_1">	
																				<div class="login0_1_2_1_ico2"></div>		
																				<input class="login0_1_2_1_1" type="password" name="pass" value="<? echo $pass; ?>" />															
																			</div>													
																		</div>
																	</div>
																</div>
																<div class="login01">	
																	<a class="login01_login" onclick="login_page2.submit();">	
																		<div class="button1">
																			<div class="button1_1">
																				<div class="button1_2">
																					<div class="button1_3">
																						<div class="button1_3_fog"></div>
																						<span>Login in</span>
																					</div>
																				</div>
																			</div>
																		</div>
																	</a>
																	<input class="login01_sbumit" type="submit" name="login_submit" value="Log in" />
																	<input type="hidden" name="login_submit1" value="1" />
																	<a href="index.php?forgot_login_details=1" class="login01_10">	
																		<div class="login01_1">	
																			<span>Forgotten your password?</span>
																		</div>
																		<div class="login01_2"></div>
																	</a>
																</div>
																<div class="clear"></div>
															</div>
														</div>
													</div>	
													<div class="boxlog1_7">
														<div class="boxlog1_8">
															<div class="boxlog1_9"><span></span></div>
														</div>
													</div>					
												</div>		
											</form>
										<? } ?> 
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	</body>
	</html>
	<? 
	die();
}
?>