<?
function html_header(){
  include('html.header.php');
}

function html_footer(){
  include('html.footer.php');
}

function GetPage()
{
  global $params;
  $page = $params[0] . '.php';
  return $page;
}

function GetParamsArray(){
  global $params;

  if(count($params) >= 1) {
    $p = $params;
    array_shift($p);
    return $p;
  } else {
    return null;
  }

}

function nl2p($string)
{
  $string = str_replace(array('<p>', '</p>', '<br>', '<br />'), '', $string);

    return '<p>'.preg_replace("/([\n]{1,})/i", "</p>\n<p>", trim($string)).'</p>';
}


/* Login */
function log_verify(){
  if(isset($_SESSION['ead_log_id']))
    if(!empty($_SESSION['ead_log_id']))
      return true;

  return false;
}

function login($mail, $pass){
  global $db;
  $sql  = "SELECT * FROM Membros WHERE Email = '$mail' AND Senha = '$pass'";
  $res = $db->LoadObjects($sql);

  if(count($res) > 0){

    $reg = $res[0];
    $_SESSION['ead_log_id']         = $reg->ID;
    $_SESSION['ead_log_email']      = $reg->Email;
    $_SESSION['ead_log_nome']       = $reg->Nome;
    $_SESSION['ead_log_apelido']    = $reg->Apelido;

    return true;
  } else {
    return false;
  }

}

function logout(){
  $_SESSION['ead_log_id']         = null;
  $_SESSION['ead_log_email']      = null;
  $_SESSION['ead_log_nome']       = null;
  $_SESSION['ead_log_apelido']    = null;

  header('LOCATION: ' . SITE_URL . 'home');
}

function log_verifyPage(){

  //se for uma página de acesso anonimo..
  $anonimo = array('home.php', 'login.php');
  if(in_array(GetPage(), $anonimo))
    return true;

  //verifica se está logado..
  return (log_verify());
}

/* Funções do Perfil */
function perfil_id(){
  return @$_SESSION['ead_log_id'];
}
function perfil_email(){
  return @$_SESSION['ead_log_email'];
}
function perfil_nome(){
  return @$_SESSION['ead_log_nome'];
}
function perfil_apelido(){
  return @$_SESSION['ead_log_apelido'];
}

function goPageMessage($msg, $dest = 'msg'){
  $_SESSION['ead_msg'] = $msg;
  header('LOCATION: ' . SITE_URL . $dest);
  exit;
}



/* Funções de Cursos */


function curso_getTotalAulas($curso){
  global $db;

  $sql  = 'SELECT COUNT(ID) TOTAL FROM CursoModuloAulas WHERE Modulo IN(SELECT ID FROM CursoModulos WHERE Curso = ' . $curso . ')';
  $total = $db->LoadObjects($sql);
  $total = $total[0];
  $total = intval($total->TOTAL);
  return $total;
}

function curso_getDuracaoPrevista($aulas){
  /* Médias de 1 aula por semana */

  /* mês = 4 semanas */
  /* ano = 12 meses */

  $semanas = $aulas;

  if($semanas < 4)
    return $semanas . ' semana(s)';
  else {
    $meses = 0;
    $anos = 0;

    $divisao = ($semanas / 4);
    $meses = floor($divisao);
    $semanas = ($semanas - ($meses * 4));

    if($meses >= 12){
      $divisao = ($meses / 12);
      $anos = floor($divisao);
      $meses = ($meses - ($anos * 12));

    }

    $return = array();

    if($anos > 0)
      $return[] = $anos . ' anos(s)';

    if($meses > 0)
      $return[] = $meses . ' mes(es)';

    if($semanas > 0)
      $return[] = $semanas . ' semana(s)';


    return implode(', ', $return);
  }



}

function curso_ModulosAberto($membroID, $moduloID){
  global $db;

  $sql  = 'SELECT * FROM CursoInscricaoModulos';
  $sql .= " WHERE Inscricao IN(SELECT ID FROM CursoInscricoes WHERE Membro = " . $membroID . " AND Situacao = 'ATV') AND Modulo = " . $moduloID;
  $res = $db->LoadObjects($sql);

  return (count($res) > 0);
}

function curso_viewAula($aula){
  global $db;

  $membro = perfil_id();
  $sql = "INSERT INTO CursoInscricaoAula (`Aula`, `Membro`, `DataHora`) VALUES ('$aula', '$membro', NOW())";
  $db->Execute($sql);
}

function curso_verifyViewAula($aula){
  global $db;

  $sql  = 'SELECT * FROM CursoInscricaoAula';
  $sql .= ' WHERE Aula = ' . $aula . ' AND Membro = ' . perfil_id();
  $res = $db->LoadObjects($sql);

  return (count($res) > 0);
}

function LoadRecord($table, $value, $fieldName = 'ID', $single = true){
  global $db;

  $sql = 'SELECT * FROM ' . $table . ' WHERE ' . $fieldName . " = '$value'";
  $res = $db->LoadObjects($sql);

  if($single){
    $reg = $res[0];
    return $reg;
  } else {
    return $res;
  }
}
?>