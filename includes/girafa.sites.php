<?
class girafaSites{

  public $list;
  public $index;

  function girafaSites(){
    global $login, $db;

    if($login->verify(false)) {

      $sql = 'SELECT * FROM Sites';
      $sql .= ' WHERE Usuario = ' . $login->user_id;
      $sql .= ' ORDER BY Padrao DESC';
      $sites = $db->LoadObjects($sql);

      $this->index = array_shift($sites);
      $this->list = $sites;

    };
  }


}
?>