<?
session_start();

include('config.php');
include('functions.php');
include('girafa.db.php');
include('girafa.tablepost.php');

$db = new nbrDB(DB_HOST, DB_DB, DB_USER, DB_PASS);

/* Envia E-mail */
require_once(SITE_PATH . 'bower_components/PHPMailer/PHPMailerAutoload.php');

$mailer = new PHPMailer;

$mailer->isSMTP();
$mailer->Host =             'smtp.ielbc.com.br';
$mailer->SMTPAuth =         true;
$mailer->Username =         'tiago@ielbc.com.br';
$mailer->Password =         'nw041203';
//$mailer->SMTPSecure =       'tls';
$mailer->Port =             587;

$mailer->CharSet = "UTF-8";
$mailer->addEmbeddedImage(SITE_PATH . 'mails/templates/images/logo.png', 'logo');
$mailer->setFrom('tiago@ielbc.com.br', 'LIVRES EaD');
$mailer->isHTML(true);
?>