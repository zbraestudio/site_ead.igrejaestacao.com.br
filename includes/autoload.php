<?
session_start();

include('config.php');
include('functions.php');
include('girafa.db.php');
include('girafa.tablepost.php');

$db = new nbrDB(DB_HOST, DB_DB, DB_USER, DB_PASS);

/* Envia E-mail */
require_once(SITE_PATH . 'bower_components/PHPMailer/PHPMailerAutoload.php');

/* E-mails */
include(SITE_PATH . '/mails/templates/template_aula_assistindo.php');
include(SITE_PATH . '/mails/templates/template_aula_respostas.php');


/* Configura��es de E-mail */
$mailer = new PHPMailer;

$mailer->isSMTP();
$mailer->Host =             'smtp.igrejaestacao.com.br';
$mailer->SMTPAuth =         true;
$mailer->Username =         'tiago@igrejaestacao.com.br';
$mailer->Password =         'nw041203';
//$mailer->SMTPSecure =       'tls';
$mailer->Port =             587;

$mailer->AddBCC('tiago@igrejaestacao.com.br');

$mailer->CharSet = "UTF-8";
$mailer->addEmbeddedImage(SITE_PATH . 'mails/templates/images/logo.png', 'logo');
$mailer->setFrom('tiago@igrejaestacao.com.br', 'ESTAÇÃO EaD');
$mailer->isHTML(true);
?>