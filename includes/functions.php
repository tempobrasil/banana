<?
function GetPage($extension = false)
{
  global $params;
  $page = $params[0];

  if($extension)
    $page .= '.php';

  return $page;
}

function GetURL(){
    $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    return $url;
}

function GetLink($link){
  return get_config('SITE_URL') . $link;
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

function GetParam($key){
  $p = GetParamsArray();
  return @$p[$key];
}

function GetParamsCount(){
  $p = GetParamsArray();
  return intval(count($p));
}

function redirectPage($link, $message = null){

  if(!empty($message))
    $_SESSION['login_msg'] = $message;

  header('LOCATION:' . GetLink($link));
}

function GetMessageRedirect(){

  if(isset($_SESSION['login_msg'])){
    $msg = $_SESSION['login_msg'];
    unset($_SESSION['login_msg']);
    return $msg;

  } else
    return null;

}

function nl2p($string)
{
  $string = str_replace(array('<p>', '</p>', '<br>', '<br />'), '', $string);

    return '<p>'.preg_replace("/([\n]{1,})/i", "</p>\n<p>", trim($string)).'</p>';
}

function GeraLinkAmigavel($texto)
{

  $texto = trim($texto);

  //Tira acentos
  $comAcento = array('O','à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ü','ú','ÿ','À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','O','Ù','Ü','Ú','Ÿ','&');
  $semAcento = array('o','a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','0','U','U','U','Y','e');
  $texto = str_replace($comAcento, $semAcento, $texto);

  //Anula alguns acaracters
  $texto = str_replace(array('?', '!', ':', ';', '~', '`', '�', '{', '}', '[', ']', '/', '\\', ',', '(', ')', '"'), '', $texto);

  //Substitui espaços
  $texto = str_replace(' ', '-', $texto);

  //Eleminia Ífens duplicados
  $texto = str_replace('--', '-', $texto);

  //Passa pra minúsculo
  $texto = strtolower($texto);

  return $texto;
}

function LoadRecord($table, $value, $fieldName = 'ID'){
  global $db, $login;

  $sql = 'SELECT * FROM ' . $table;
  $sql .= " WHERE " . $fieldName . " = '" . $value . "'";
  //die($sql);
  $res = $db->LoadObjects($sql);

  if(count($res) <= 0)
    return false;
  else
    return $res[0];
}

function upload_max_filesize()
{
  $val  = trim(ini_get('upload_max_filesize'));

  $last = strtolower($val[strlen($val)-1]);
  $val  = substr($val, 0, -1);

  switch($last) {
    // The 'G' modifier is available since PHP 5.1.0
    case 'g':
      $val *= 1024;
    case 'm':
      $val *= 1024;
    case 'k':
      $val *= 1024;
  }

  return $val;
}

function getFileSize($bytes, $precision = 2) {
  $base = log($bytes, 1024);
  $suffixes = array('by', 'kb', 'mb', 'gb', 'tb');

  return round(pow(1024, $base - floor($base)), $precision) .''. $suffixes[floor($base)];
}

function simplificaURL($url){
  global $sites;
  return str_replace($sites->index->Url, null, $url);
}

function getNumber($num, $decimal = false){

  $num = floatval($num);
  return number_format($num, ($decimal?2:0), ',', '.');
}

function includeHeader(){
  include(get_config('SITE_PATH') . 'includes/inc.site.header.php');
}
function includeFooter(){
  include(get_config('SITE_PATH') . 'includes/inc.site.footer.php');
}
function includeHead(){
  include(get_config('SITE_PATH') . 'includes/inc.site.head.php');
}
function includeFoot(){
  include(get_config('SITE_PATH') . 'includes/inc.site.foot.php');
}

?>