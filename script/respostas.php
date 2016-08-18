<?
include('../includes/autoload.php');

//print_r($_POST);exit;

$moduloID   = $_POST['modulo'];
$questoesID = $_POST['questoesID'];

$ids = explode('|', $questoesID);

foreach($ids as $id){
  $campo = 'questao_' . $id;
  $campo_valor = $_POST[$campo];

  $post = new TablePost();
  $post->table = 'CursoModuloQuestoesRespostas';
  $post->AddFieldInteger('Questao', $id);
  $post->AddFieldInteger('Membro', perfil_id());
  $post->AddFieldString('Resposta', $campo_valor);

  $sql = $post->GetSql();

  $db->Execute($sql);

}
goPageMessage('Sua resposta foi registrada e enviada a(o) professor(a). Aproveite para reler o módulo que acabou de estudar e aguarde novas liberações pelo(a) professor(a) em breve.');

?>