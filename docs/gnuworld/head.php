<?php
include("../../php_includes/cmaster.inc");
$cTheme = get_theme_info();
?>
<!-- $Id: head.php,v 1.5 2002/05/20 23:58:03 nighty Exp $ //-->
<HTML>
<HEAD>
        <TITLE><? echo NETWORK_NAME ?>&nbsp;&nbsp;&nbsp;C h a n n e l&nbsp;&nbsp;&nbsp;S e r v i c e</TITLE>

<link rel="stylesheet" type="text/css" href="/css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="/css/font-awesome.min.css">
</HEAD>
<BODY id="header-web-body" TEXT=#<?=$cTheme->main_textcolor?> alink=#004400 link=#004400 vlink=#004400 marginwidth=0 marginheight=0 topmargin=0 bottommargin=0 leftmargin=0 rightmargin=0<?php
if ($cTheme->top_bgimage!="") {
	echo " BACKGROUND=\"themes/data/" . $cTheme->sub_dir . "/" . $cTheme->top_bgimage . "\"";
}
?>>
<TABLE WIDTH=100% CELLSPACING="0" CELLPADDING="0">
        <tr>
                <td VALIGN=middle>
                        <a href="/" target="_parent"> <img class="logo-web" SRC="themes/data/<?=$cTheme->sub_dir?>/<?=$cTheme->top_logo?>"></a>
						<span class="testnet">OUR SEXY TESTNET!</span>
                </td>
		<td align=right>&nbsp;<?
		if (file_exists("testnet")) {
			echo "Selected Theme:&nbsp;<b>" . $cTheme->name . "</b>&nbsp;&nbsp;\n";
		}
		?></td>
		</tr>
		<tr id="time-date">
			<td><p><strong> You join:</strong> <?php $time = time(); 	echo date("d-m-Y (H:i:s)", $time); ?><br/>
			 <?php 
			 echo "<strong>Your IP:</strong> {$_SERVER['REMOTE_ADDR']}<br/>";
			$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']); if($hostname === $_SERVER['REMOTE_ADDR']) { 
			echo "The host name could not be resolved.<br/>\n";
			} else { echo "<strong>Host Name is:</strong> $hostname<br/>\n";
					}
					echo "<strong>Windows:</strong> {$_SERVER['HTTP_USER_AGENT']}"; ?>
				</p>
			</td>
		</tr>

</table>
</body>
</html>