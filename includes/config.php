<?

/* Caminhos */
if( $_SERVER['HTTP_HOST'] == 'localhost'){

  define('SITE_URL'         , 'http://localhost/github/site_ead.livresweb.com/');
  define('SITE_PATH'        , 'D:/github/site_ead.livresweb.com/');

  define('UPLOADS_URL'      , 'http://sistema.igrejaestacao.com.br/uploads/');
  define('UPLOADS_PATH'     , 'D:/github/site_sistema.igrejaestacao.com.br/uploads/');

} else {
  define('SITE_URL'         , 'http://ead.igrejaestacao.com.br/');
  define('SITE_PATH'        , '/dados/http/igrejaestacao.com.br/ead/');

  define('UPLOADS_URL'      , 'http://sistema.igrejaestacao.com.br/uploads/');
  define('UPLOADS_PATH'     , '/dados/http/igrejaestacao.com.br/sistema/uploads/');

}


/* Banco de Dados */
if( $_SERVER['HTTP_HOST'] == 'localhost')
  define('DB_HOST'          , 'nbz.net.br');
else
  define('DB_HOST'          , 'localhost');

define('DB_USER'          , 'root');
define('DB_PASS'          , 'nwtiago');
define('DB_DB'            , 'igrejaestacao.com.br_sistema');
