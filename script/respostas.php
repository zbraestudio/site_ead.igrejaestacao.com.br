<?
include('../includes/autoload.php');

//print_r($_POST);exit;

$moduloID   = $_POST['modulo'];
$questoesID = $_POST['questoesID'];
$moduloTB = LoadRecord('CursoModulos', $moduloID);

$ids = explode('|', $questoesID);

$questoes_email = array();

foreach($ids as $id){

  $perguntaTB = LoadRecord('CursoModuloQuestoes', $id);

  $campo = 'questao_' . $id;
  $campo_valor = $_POST[$campo];

  $post = new TablePost();
  $post->table = 'CursoModuloQuestoesRespostas';
  $post->AddFieldInteger('Questao', $id);
  $post->AddFieldInteger('Membro', perfil_id());
  $post->AddFieldString('Resposta', $campo_valor);

  $sql = $post->GetSql();

  $db->Execute($sql);

  $questoes_email[] = array(
    'pergunta' => $perguntaTB->Questao,
    'resposta' => $campo_valor
  );

}

mail_aula_respostas_send($moduloTB, $questoes_email);
goPageMessage('Sua resposta foi registrada e enviada a(o) professor(a). Aproveite para reler o módulo que acabou de estudar e aguarde novas liberações pelo(a) professor(a) em breve.');

?>