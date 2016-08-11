<?
function html_header(){
  include('html.header.php');
}

function html_footer(){
  include('html.footer.php');
}

function GetPage(){
  $page =  $_SERVER['PHP_SELF'];
  $page = explode("/",$page);
  $page = end($page);
  return $page;
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

?>