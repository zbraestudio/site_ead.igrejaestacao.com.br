<?
include('./incs/variables.php');
include($path_site . '/mails/template_quiz.php');

$nome =     $_POST['nome'];
$email =    $_POST['email'];
$celular =  $_POST['celular'];
$pergunta = $_POST['pergunta'];
$anonimo =  ($_POST['anonimo'] == 'Sim');

mail_quiz_send($nome, $email, $anonimo, $celular, $pergunta);

?>