<?
	require("../../../php_includes/cmaster.inc");
	std_init();
	$cTheme = get_theme_info();
	std_theme_styles(1);
	std_theme_body("../");

	if ($admin<1 && !acl(XWEBSESS)) {
		echo("Oi! What are you doing here eh?");
		exit;
	}
?>
<!-- $Id: index.php,v 1.24 2005/11/26 12:52:30 nighty Exp $ //-->
<h1>Admin Reports</h1>
<br>
Site Status : <?
if (site_off()) {
	echo "<font color=#" . $cTheme->main_no . "><b>CS STAFF ONLY</b></font>";
} else {
	echo "<font color=#" . $cTheme->main_yes . "><b>OPEN</b></font>";
}
?> - New Users : <?
if (newusers_off()) {
	echo "<font color=#" . $cTheme->main_no . "><b>LOCKED</b></font>";
} else {
	echo "<font color=#" . $cTheme->main_yes . "><b>OPEN</b></font>";
}
?> - New Registrations : <?
if (newregs_off()) {
	echo "<font color=#" . $cTheme->main_no . "><b>CS STAFF ONLY</b></font>";
} else {
	echo "<font color=#" . $cTheme->main_yes . "><b>OPEN</b></font>";
	if (REQUIRED_SUPPORTERS>0) {
		echo "&nbsp;(requires <b>" . REQUIRED_SUPPORTERS . "</b> supporter";
		if (REQUIRED_SUPPORTERS>1) { echo "s"; }
		echo ")";
	} else {
		echo "&nbsp;(<b>Instant Registration</b>)";
	}
}
?> - Complaints : <?
if (complaints_off()) {
	echo "<font color=#" . $cTheme->main_no . "><b>LOCKED</b></font>";
} else {
	echo "<font color=#" . $cTheme->main_yes . "><b>OPEN</b></font>";
}
echo "<br>";
$blabla = pg_safe_exec("SELECT count_count FROM counts WHERE count_type='1'");
if (pg_numrows($blabla)==0) { $c_nu = 0; } else {
	$bloblo=pg_fetch_object($blabla,0);
	$c_nu = $bloblo->count_count;
}
echo "Newusers Current Count : <b>" . $c_nu . "</b> out of " . $MAX_ALLOWED_USERS;
?>
<hr>
<h4>
<? if ($admin>=800) { ?>
<a href="view_adminlog.php">Admin Log</a> (800+)<br>
<? } ?>
<? if ($admin>=600) { ?>
<a href="bmnew/bmnew.php">Missing Managers</a> (600+)<br>
<? } ?>
<? if ($admin>=750) { ?>
<a href="verifdatacheck.php">Verification Answer Check</a> (750+)<br>
<? } ?>
<? if ($admin>=600) { ?>
<a href="weirdos.php">Interesting Events</a> (600+)<br>
<? } ?>
<? if ($admin>=800) { ?>
<a href="view_suspends.php">View Suspends/Unsuspends</a> (800+)<br>
<? } ?>
<? if ($admin>900 && NEWUSERS_IPCHECK==1) { ?>
<a href="view_newu_ips.php">View New Users locked IPs</a> (901+)<br>
<? } ?>
<? if (($user_id==323 || $admin>900) && HOSTING_CLICK_CHECK==1) { ?>
<a href="sponsor_clicks.php">View statistics on Sponsor footer logo clicks</a> (901+)<br>
<? } ?>
<? if (acl(XWEBSESS)) { ?>
<a href="view_admins.php">View current Admins web sessions</a> (ACL-XWEBSESS)<br>
<? } ?>
<? if ($admin>=750) { ?>
<a href="view_pendingusers.php">View current pending users</a> (750+)<br>
<? } ?>
<? if ($admin>0) { ?>
<a href="../viewlogs.php?show=purged">View Purged Channels</a><br>
<a href="../xat/mgrchg/mgr_change.php">View Manager Changes</a><br>
<? } ?>
<? if ($admin>=750) { ?>
<a href="view_judgereg.php">View channels registered by The Judge</a> (750+)<br>
<a href="idledchannels.php">Idled Channels</a> (750+)<br>
<a href="susp_users.php">Globally Suspended Users</a> (750+)<br>
<a href="susp_channels.php">Suspended Channels</a> (750+)<br>
<? } ?>
<? if ($admin>0) { ?>
<a href="../regproc/stats.php">View Newregs Status</a><br>
<? } ?>
<? if (acl(XWEBAXS_3)) { ?>
<a href="../regproc/review_toplist.php">View <? echo BOT_NAME ?>@ Review Top List</a> (<? echo BOT_NAME ?>@admin)<br>
<? } ?>
<? if ($admin>=800 || $user_id==292083 || $user_id==3303 || $user_id==308) { ?>
<a href="check_reviews.php">Search in channel application reviews</a> (800+)<br>
<? } ?>
<? if ($admin>=800) { ?>
<a href="stats_lang.php">View Languages Stats</a> (800+)<br>
<? } ?>
</h4>
<br>
</body></html>
