<?
include('../includes/autoload.php');


$email = $_POST['email'];
$senha = $_POST['senha'];

$senha = md5($senha);

if(login($email, $senha)){

  header('LOCATION:' . SITE_URL . 'perfil');

} else {
  goPageMessage('Ops! Não conseguimos validar suas credenciais Livres EaD.', 'login');
}
?>