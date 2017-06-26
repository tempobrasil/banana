<?
$version = '1.0.beta';

function set_config($key, $val){
  $GLOBALS[$key] = $val;
}

function get_config($key){
  if(isset($GLOBALS[$key]))
    return $GLOBALS[$key];
  else
    return null;
}


/* Caminhos */
if(is_localhost()){

  set_config('SITE_URL'         , 'http://localhost/github/vitamina/');
  set_config('SITE_PATH'        , 'D:/GitHub/vitamina/');

} else {

  set_config('SITE_URL'         , 'http://www.zbraestudio.com.br/vitamina/');
  set_config('SITE_PATH'        , '/dados/http/zbraestudio.com.br/www/vitamina/');

}

set_config('SITE_NAME',              'olá');
set_config('SITE_TITLE',              'VITAMINA (Agência 100% online');
set_config('SITE_DESCRIPTION',        'xxx');
set_config('SITE_TAGS',               'xxx, yyy');

set_config('SITE_SHARED',       get_config('SITE_URL') . 'site/images/shared.jpg');
set_config('SITE_SHARED_W',     '851px');
set_config('SITE_SHARED_H',     '315px');



/* Banco de Dados */
if(is_localhost())
  set_config('DB_HOST'          , 'nbz.net.br');
else
  set_config('DB_HOST'          , 'localhost');

set_config('DB_USER'          , 'root');
set_config('DB_PASS'          , 'polly');
set_config('DB_DB'            , 'zbraestudio.com.br_vitamina');