<?
session_start();

function is_localhost(){
  return ( $_SERVER['HTTP_HOST'] == 'localhost');
}

date_default_timezone_set('America/Sao_Paulo');

include('config.php');

include(get_config('SITE_PATH') . 'includes/functions.php');
include(get_config('SITE_PATH') . 'includes/functions.files.php');
include(get_config('SITE_PATH') . 'includes/girafa.db.php');
include(get_config('SITE_PATH') . 'includes/girafa.tablepost.php');
include(get_config('SITE_PATH') . 'includes/girafa.date.php');
include(get_config('SITE_PATH') . 'includes/girafa.sites.php');
include(get_config('SITE_PATH') . 'includes/girafa.page.php');

/** Objetos Girafa */
$page =   new girafaPage();
$db =     new girafaDB(get_config('DB_HOST'), get_config('DB_DB'), get_config('DB_USER'), get_config('DB_PASS'));
//$sites =   new girafaSites();

include(get_config('SITE_PATH') . 'includes/autoload.phpmailer.php');

/* E-mails */
/*
include(SITE_PATH . '/mails/templates/template_aula_assistindo.php');
include(SITE_PATH . '/mails/templates/template_aula_respostas.php');
*/

?>