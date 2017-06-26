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

  set_config('SITE_URL'         , 'http://ola.zbraestudio.com.br/');
  set_config('SITE_PATH'        , '/dados/http/zbraestudio.com.br/ola/');

}

set_config('SITE_NAME',              'olá');
set_config('SITE_TITLE',              '[olá] Atendimento Online');
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


$options_ufs = array(
  'AC'=>'Acre',
  'AL'=>'Alagoas',
  'AP'=>'Amapá',
  'AM'=>'Amazonas',
  'BA'=>'Bahia',
  'CE'=>'Ceará',
  'DF'=>'Distrito Federal',
  'ES'=>'Espírito Santo',
  'GO'=>'Goiás',
  'MA'=>'Maranhão',
  'MT'=>'Mato Grosso',
  'MS'=>'Mato Grosso do Sul',
  'MG'=>'Minas Gerais',
  'PA'=>'Pará',
  'PB'=>'Paraíba',
  'PR'=>'Paraná',
  'PE'=>'Pernambuco',
  'PI'=>'Piauí',
  'RJ'=>'Rio de Janeiro',
  'RN'=>'Rio Grande do Norte',
  'RS'=>'Rio Grande do Sul',
  'RO'=>'Rondônia',
  'RR'=>'Roraima',
  'SC'=>'Santa Catarina',
  'SP'=>'São Paulo',
  'SE'=>'Sergipe',
  'TO'=>'Tocantins'
);