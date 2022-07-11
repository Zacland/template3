<?php
// deuxième page

include('includes/TemplatePHPBB.php');
include('includes/functions.php');
include('includes/config.php');

// on precise le repertoire où se trouve les fichiers templates et le répertoire où on met les fichiers compilés (cache)
$template = new Template('template', 'cache');

// on precise la variable langage
$template->set_language_var($lang);

page_header('Ma deuxième page', 'Page 2', 'PAGE2');
page_footer();

$template->assign_var('U_DOC', "http://area51.phpbb.com/docs/coding-guidelines.html#templating");
				
$template->set_filenames(array(
	'body' => 'page2.html'));

$template->display('body');
?>