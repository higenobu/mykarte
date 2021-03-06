<?php // -*- mode: php; coding: euc-japan -*-
include_once $_SERVER['DOCUMENT_ROOT'].'/lib/common.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/lib/mykarte/confirm.php';

function confirmation_header() {
	mx_html_head('MyKarte Registration');
	mx_titlespan('MyKarte Registration');
	print "<br /><br /><br />";
}

function main($data) {

	$soe = new mykarte_confirm_edit('reg-');

	confirmation_header();
	if ($soe->commit_ran) {
		$top = $_SERVER['PHP_SELF'];
		$top = preg_replace('/mykarte\/confirm.php\/.*$/', '', $top);
		print "登録完了しました。<br />";
		print "登録したスクリーン名をユーザ名として、";
		print "登録したパスワードで MyKARTE をお楽しみ下さい。<br />";
//print "<a href=\"login.php\">ログイン</a>";
//		print "<a href=\"$top\">ログイン</a>";
	}
	else {
		print "<form method=\"POST\">";
		$soe->draw();
		if ($soe->errmsg == '')
			mx_formi_submit("reg-commit", "Store", "Store", "Store");
		print "</form>";
	}
	if ($soe->logmsg != '') {
		print "<!--\n";
		print $soe->logmsg;
		print "-->\n";
	}
}

main($_REQUEST);
?>
