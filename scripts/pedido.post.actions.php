<?
include('../includes/autoload.php');

//print_r($_FILES);exit;

if(!isset($_POST['codigo'])) {
    die('Ocorreu um erro.');
}

$pedido = LoadRecord('RoboVisitas', $_POST['codigo'], 'Codigo');

if ($_POST['action'] == 'addObs') {

    $descricao = $pedido->Descricao;
    $descricao .= "\n\r \r\n ---";
    $descricao .= "\n\r";
    $descricao .= '(' . date('d/m/Y H\hi') . ')';
    $descricao .= "\n\r \r\n";
    $descricao .= $_POST['msg'];

    $post = new girafaTablePost();
    $post->table = 'RoboVisitas';
    $post->id = $pedido->ID;

    $post->AddFieldString('Descricao', $descricao);

    $sql = $post->GetSql();
    $db->Execute($sql);

    header('LOCATION:' . GetLink('pedido/' . $_POST['codigo']));

} elseif ($_POST['action'] == 'addFiles') {

    $arquivos_array = GetArquivosArray($pedido->Arquivos);

    $arquivo = $_FILES['arquivo'];

    $arquivos_path = get_config('SITE_PATH') . 'arquivos_pedidos/' . $_POST['codigo'] . '/';
    mkdir($arquivos_path);

    move_uploaded_file($arquivo['tmp_name'], $arquivos_path . $arquivo['name']);

    $arquivos_array[] = $arquivo['name'];


    $post = new girafaTablePost();
    $post->table = 'RoboVisitas';
    $post->id = $pedido->ID;

    $post->AddFieldString('Arquivos', GetArquivosString($arquivos_array));

    $sql = $post->GetSql();
    $db->Execute($sql);

    header('LOCATION:' . GetLink('pedido/' . $_POST['codigo']));
}

?>