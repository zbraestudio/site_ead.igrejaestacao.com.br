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


function login_verify(){
  return false;
}

?>