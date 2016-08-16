<?
include('includes/autoload.php');

//se for em branco, redireciona pro /home
if(empty($_GET['url']))
  header('LOCATION: ' . SITE_URL . 'home');

//divide parâmetros da URL
$params = explode('/', $_GET['url']);
include(SITE_PATH . 'pages/' . GetPage());
?>