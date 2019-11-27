<?php
	require_once("lib/gettext/gettext.php");
	require_once("lib/gettext/streams.php");
	$locale_lang = $_GET['lang'];
	$locale_file = new FileReader("locale/$locale_lang/LC_MESSAGES/lang.mo");
	$locale_fetch = new gettext_reader($locale_file);
	
	function tr($text){
		global $locale_fetch;
		return $locale_fetch->translate($text);
	}
?>