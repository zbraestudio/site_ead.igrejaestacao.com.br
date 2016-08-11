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

?>