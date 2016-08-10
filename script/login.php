<?

include('../includes/autoload.php');


$email = $_POST['email'];
$senha = $_POST['senha'];

$senha = md5($senha);

if(login($email, $senha)){

  header('LOCATION:' . SITE_URL . 'perfil');

} else {
  $_SESSION['ead_login_erro'] = 'Ops! Ocorreu um erro ao tentar fazer seu login';
  header('LOCATION:' . SITE_URL . 'login');
}
?>