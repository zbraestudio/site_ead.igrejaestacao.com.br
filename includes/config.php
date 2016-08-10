<?

/* Caminhos */
if( $_SERVER['HTTP_HOST'] == 'localhost'){

  define('SITE_URL'         , 'http://localhost/github/site_ead.livresweb.com/');
  define('SITE_PATH'        , 'D:/githubgithub/site_ead.livresweb.com/');

  define('UPLOADS_URL'      , 'http://localhost/github/site_sistema.livresweb.com/uploads');
  define('UPLOADS_PATH'     , 'D:/githubgithub/site_sistema.livresweb.com/uploads');

} else {
  define('SITE_URL'         , '');
  define('SITE_PATH'        , '');

  define('UPLOADS_URL'      , '');
  define('UPLOADS_PATH'     , '');

}



/* Banco de Dados */
if( $_SERVER['HTTP_HOST'] == 'localhost')
  define('DB_HOST'          , 'nbz.net.br');
else
  define('DB_HOST'          , 'localhost');

define('DB_USER'          , 'root');
define('DB_PASS'          , 'nwtiago');
define('DB_DB'            , 'ielbc_com_br_sistema');