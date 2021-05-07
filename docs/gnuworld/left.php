<?php
	$noregwrite_lvl=1;

        require("../../php_includes/cmaster.inc");
        header("Pragma: no-cache");
        std_connect();
		$min_lvl=800; // for WEBACCESS TEAM admin.
        $current_page="left.php";
        $user_id = std_security_chk($auth);
        $admin = std_admin();

	$cTheme = get_theme_info();

	if (isset($authtok)) { unset($authtok); }
	if (isset($authcsc)) { unset($authcsc); }
	$authtok = explode(":",$auth);
	$authcsc = $authtok[3];
?>
<!-- $Id: left.php,v 1.23 2004/08/10 11:57:52 nighty Exp $ //-->
<?
        echo "<html><head><title>LEFT MENU</title>";
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity "sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="/css/style.css">
<link rel="stylesheet" href="/css/font-awesome.min.css">

<?
        echo "</head>\n";
        echo "<BODY id='left-menu' vlink=#" . $cTheme->left_linkcolor;
	if ($cTheme->left_bgimage!="") {
		echo " background=\"themes/data/" . $cTheme->sub_dir . "/" . $cTheme->left_bgimage . "\"";
	}
	echo "><FONT FACE=\"Arial,Helvetica,sans-serif\" size=\"-1\">";

	if ($mode!="empty") {
		echo "<p><a HREF=\"main.php\" TARGET=\"body\"><i class='fa fa-home' aria-hidden='true'></i> Home</a></p>\n";
	}

        if ($user_id > 0) {
        	if ($mode!="empty") {
			echo("<p><a HREF=\"users.php?id=$user_id\" TARGET=\"right\"><i class='fa fa-info-circle' aria-hidden='true'></i> My Information</a></p>\n");
?>
<p><a href="channels.php" target="right"><i class="fa fa-hashtag" aria-hidden="true"></i> Channel Information</a></p>
<? if (!has_a_noreg()) { ?>
<p><a href="regproc/index.php" target=right><i class="fa fa-registered" aria-hidden="true"></i> Register A Channel</a></p>
<? } ?>

<p><a href="check_app.php" target="right"><i class="fa fa-check" aria-hidden="true"></i> Check App</a></p>
<p><a href="forms/index.php" target="right"><i class="fa fa-list" aria-hidden="true"></i>  Forms</a></p>
<p><a href="docs/xcmds.txt" target="right"><i class="fa fa-times" aria-hidden="true"></i>
 All X Commands</a></p>
<? if (ENABLE_COMPLAINTS_MODULE == 1) { ?>
<!--<a href="complaints/complaints.php" target="right">Complaints</a><br><br>//-->
<? } ?>
<? } ?>
<?
unset($sec_id);
$sec_id = md5( $user_id . CRC_SALT_0019 . $authcsc );
?>
<p><a href="passwd.php?SECURE_ID=<?=$sec_id?>" TARGET="right"><i class="fa fa-key" aria-hidden="true"></i>
 New Password</a></p>
<p><a HREF="hotnews.html" TARGET="right"><i class="fa fa-newspaper-o" aria-hidden="true"></i>
 What's new</a></p>
<p><a HREF="logout.php" TARGET="body"><i class="fa fa-sign-out" aria-hidden="true"></i> Log out</a></p>


<?
        } else {
?>


<!--<p>  <a HREF="login.php" TARGET="right"><i class="fa fa-lock" aria-hidden="true"></i> Log In</a></p>-->
<p> <a HREF="newuser.php" TARGET="right"><i class="fa fa-id-card-o" aria-hidden="true"></i> Register!</a></p>
<p> <a HREF="forgotten_pass.php" target="right"><i class="fa fa-key" aria-hidden="true"></i>  Forgotten password</a></p>
<p> <a href="hotnews.html" target="right"><i class="fa fa-newspaper-o" aria-hidden="true"></i> What's new</a></p>



<? if (ENABLE_COMPLAINTS_MODULE == 1) { ?>
<p> <a href="complaints/complaints.php" target="right"><i class="fa fa-ticket" aria-hidden="true"></i> <a href="complaints/complaints.php" target="right">Complaints</a></p>
<? } ?>
<? if (CSERVICE_SITE_URL!="") { ?>
<!--<A HREF="<//?=CSERVICE_SITE_URL?>" target=_top>CService Site</a><br><br>-->
<? } ?>

<?

        }
        if (($admin>0 || has_acl($user_id)) && $mode!="empty") {

?>
	<? if ($admin>0) { ?>
		<b style="text-align:center;">Admin Tools:<br/>

	<? } else { ?>
		ACL Tools:<br>
		<? if (acl(XAT_CAN_VIEW) || acl(XAT_CAN_EDIT)) { ?>
		<p><a href="users.php" target=right>User Lookup</a></p>
		<? } ?>
	<? } ?>
        <? if ($admin>=600) { ?>
                <!--<p><a href="/collector/" target="_blank"> <i class="fa fa-search" aria-hidden="true"></i> Collector</a></p>-->
        <? } ?>
	<? if ($admin>0) { ?>
		<p><a HREF="list_app.php" target="right"><i class="fa fa-list" aria-hidden="true"></i> List Applications</a></p>
		<p><a href="users.php" target=right><i class="fa fa-user-circle-o" aria-hidden="true"></i> User Lookup</a></p>
		<p><a href="lookup_email.php" target=right><i class="fa fa-envelope" aria-hidden="true"></i> Mail Lookup</a></p>
	<? } ?>
	<? if ($admin>=800) { ?>
		<p><a href="cr_newuser.php" target=right><i class="fa fa-user-plus" aria-hidden="true"></i> New User</a></p>
	<? } else { echo "<br>"; } ?>
	<? if (acl(XWEBAXS_2) || acl(XWEBAXS_3)) { //minimum required admin level
	?>
		<p><a href="noreg/index.php" target=right><i class="fa fa-lock" aria-hidden="true"></i> Noreg Admin</a></p>
	<? } ?>
	<? if ($admin>0 && !acl(XWEBAXS_3) && !acl(XWEBAXS_2)) { //minimum required admin level
	?>
		<p><a href="noreg/index.php" target=right>Noreg List</a></p>
	<? } ?>
	<? if ($admin>=800 || acl(XWEBACL)) { ?>
		<p><a href="acl/index.php" target=right><i class="fa fa-database" aria-hidden="true"></i> ACL Manager</a></p>
	<? } else { ?>
		<? if (acl(XWEBCTL)) { ?>
		<p>	<a href="acl/index.php" target=right>Site Control</a></p>
		<? }
	} ?>
	<? if ($admin>0 || acl(XDOMAIN_LOCK)) { ?>
		<p><a href="domainlock/index.php" target=right><i class="fa fa-ban" aria-hidden="true"></i> DomainLock</a></p>
	<? } ?>
	<? if ($admin>=800) { //minimum required admin level ?>
		<p><a href="motd.php" target=right><i class="fa fa-info-circle" aria-hidden="true"></i> <? echo BOT_NAME ?>'s Motd</a></p>
	<? } ?>
	<? if (ENABLE_COMPLAINTS_MODULE && acl(XCOMPLAINTS_ADM_REPLY) || acl(XCOMPLAINTS_ADM_READ)) { ?>
		<!--<a href="complaints/admin.php" target=right>Complaints Manager</a><br>//-->
	<? } ?>
	<? if (acl(XHELP)) { ?>
		<p><a href="help_mgr/index.php" target=right><i class="fa fa-info-circle" aria-hidden="true"></i> <? echo BOT_NAME ?>'s HELP</a></p>
	<? } ?>
	<? if (acl(XCHGMGR_ADMIN) || acl(XMAILCH_ADMIN)) { ?>
		<p><a href="xat/index.php" target=right><i class="fa fa-tasks" aria-hidden="true"></i> <? echo BOT_NAME ?>@ Admin</a></p>
	<? } else { ?>
		<? if (acl(XCHGMGR_REVIEW) || acl(XMAILCH_REVIEW) || $admin>=600) { ?>
			<p><a href="xat/index.php" target=right><? echo BOT_NAME ?>@ Review</a></p>
		<? } else { echo "<br>\n"; } ?>
	<? } ?>
	<? if (acl(XWEBAXS_3) || acl(XWEBUSR_TOASTER) || acl(XWEBUSR_TOASTER_RDONLY)) { ?>
		<p><a href="userbrowser/index.php" target=right><i class="fa fa-eraser" aria-hidden="true"></i> User Toaster</a></p>
	<? } ?>
	<? if ($admin>0 || acl(XWEBSESS) || acl(XWEBAXS_3)) { //minimum required admin level ?>
		<p><a href="admin/index.php" target=right><i class="fa fa-flag" aria-hidden="true"></i> Reports</a></p>
	<? } ?>
	<? if ($admin>0 || acl(XLOGGING_VIEW)) { //minimum required admin level ?>
		<p><a href="viewlogs.php" target=right><i class="fa fa-file-text" aria-hidden="true"></i> View Logs</a></p>
		<p><a href="viewlogs_archive.php" target=right><i class="fa fa-files-o" aria-hidden="true"></i> View Old Logs</a></p>
	<? } else { echo "<br>"; } ?>
<?
		if ($is_alumni) {
			echo "uid:$user_id<br>admlvl:(none)<br>";
		}
		if ($admin>0) {
	        	echo("uid:$user_id<br>admlvl:$admin<br>"); // Admin only!
	        	if ($admin>900) { // must stay strict (coders only)
		        	if ($loadavg5 < CRIT_LOADAVG) { $zecolor = "#" . $cTheme->left_loadavg0; }
	        		if ($loadavg5 >= CRIT_LOADAVG && $loadavg5 < CRIT_MAX_LOADAVG) { $zecolor = "#" . $cTheme->left_loadavg1; }
	        		if ($loadavg5 >= CRIT_MAX_LOADAVG) { $zecolor = "#" . $cTheme->left_loadavg2; }
	        		echo "<font size=-2 color=$zecolor>loadavg:<br>" . $loadavg1 . ", " . $loadavg5 . ", " . $loadavg15 . ".</font>";
	        	}
	        }
        }
?>
</body>
</html>
