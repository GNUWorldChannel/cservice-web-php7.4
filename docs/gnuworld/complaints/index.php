<?
require("../../../php_includes/cmaster.inc");
if (ENABLE_COMPLAINTS_MODULE != 1) { die("This option is disabled. Please contact the server administrator."); }
?>
<!-- $Id: index.php,v 1.1 2003/08/31 19:52:17 nighty Exp $ //-->
<HTML>
<HEAD>

        <TITLE><? echo NETWORK_NAME ?>&nbsp;&nbsp;&nbsp;C h a n n e l&nbsp;&nbsp;&nbsp;S e r v i c e&nbsp;&nbsp;C o m p l a i n t s&nbsp;&nbsp;D e p a r t m e n t</TITLE>
		<link rel="stylesheet" type="text/css" href="/css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="/css/font-awesome.min.css">
</HEAD>
<FRAMESET ROWS="80,*,80" frameborder=no framespacing=0 border=0>
        <FRAME SRC="../head.php" NAME="head" SCROLLING=NO NORESIZE=YES>
        <FRAME SRC="complaints_inframe.php" NAME="body" SCROLLING=AUTO NORESIZE=YES>
        <FRAME SRC="../footer.php" NAME="footer" SCROLLING=NO NORESIZE=YES>
        <NOFRAMES>
        <? std_theme_body(); ?>
                Viewing this page requires a browser capable of displaying frames.
        </BODY>
        </NOFRAMES>
</FRAMESET>
</HTML>

