<?
include('includes/autoload.php');

//se for em branco, redireciona pro /home
if(empty($_GET['url'])){
        header('LOCATION: ' . get_config('SITE_URL') . 'robo');
}

//divide parâmetros da URL
$params = explode('/', $_GET['url']);

$page_path = get_config('SITE_PATH') . 'pages/' . GetPage(true);

if(file_exists($page_path))
    include($page_path);
else
    die('Ops! Página não encontrada.');
?>