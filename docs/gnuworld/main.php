<?php

include("../../php_includes/cmaster.inc");

if (isset($securize_mode)) { unset($securize_mode); }
$securize_mode = 0;

if ($SECURE_ID!="") {
	std_connect();
	$user_id = std_security_chk($auth);
	if (isset($authtok)) { unset($authtok); }
	if (isset($authcsc)) { unset($authcsc); }
	$authtok = explode(":",$auth);
	$authcsc = $authtok[3];

	if ($user_id>0) {
		$check_crc = md5( $user_id . CRC_SALT_0013 . $authcsc );
		if ($SECURE_ID == $check_crc) {
			$securize_mode = 1;
		}
	}
}

$cTheme = get_theme_info();

?>
<!-- $Id: main.php,v 1.7 2002/05/20 23:58:03 nighty Exp $ //-->
<HTML>
<HEAD>

        <TITLE><? echo NETWORK_NAME ?>&nbsp;&nbsp;&nbsp;C h a n n e l&nbsp;&nbsp;&nbsp;S e r v i c e</TITLE>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="/css/style.css">
		<link rel="stylesheet" href="/css/font-awesome.min.css">
</HEAD>
<FRAMESET COLS="200,*" frameborder=no framespacing=0 border=0>
<?
if ($securize_mode) {
	echo "<FRAME id='left-web-menu' SRC=\"left.php?mode=empty\" NAME=left SCROLLING=AUTO>\n";
	echo "<FRAME SRC=\"securize_pw.php?sba=1";
	if ($da_error>-1 && $da_error<6) {
		echo "&da_error=" . $da_error;
	}
	echo "&SECURE_ID=" . $SECURE_ID . "\" NAME=right SCROLLING=AUTO>\n";
} else {
	echo "<FRAME  id='left-web-menu' SRC=\"left.php\" NAME=left SCROLLING=AUTO>\n";
	if ($sba) {
	        echo "<FRAME id='right-web2' SRC=\"right.php?sba=1\" NAME=right SCROLLING=AUTO>\n";
    } elseif (isset($entotp) && isset($ID)) {
            echo "<FRAME SRC=\"totp/confirm.php?ID=$ID\" NAME=\"right\" SCROLLING=\"AUTO\"\n";
	} else {
	        echo "<head></head><FRAME bgcolor='#ffffff' id='right-web3' SRC=\"right.php\" NAME=right SCROLLING=AUTO>\n";
	}
}
?>
</FRAMESET>
<? std_theme_body(); ?>
Viewing this page requires a browser capable of displaying frames.
</BODY>
</HTML>
