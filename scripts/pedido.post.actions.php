<?
include('../includes/autoload.php');

//print_r($_FILES);exit;

if(!isset($_POST['chave'])) {
    die('Ocorreu um erro.');
}

$pedido = LoadRecord('RoboVisitas', $_POST['chave'], 'Chave');

if ($_POST['action'] == 'addObs') {

    $descricao = $pedido->Descricao;
    $descricao .= "\n\r \r\n --- ";
    $descricao .= date('d/m/Y H\hi');
    $descricao .= " --- \n\r \r\n";
    $descricao .= $_POST['msg'];

    $post = new girafaTablePost();
    $post->table = 'RoboVisitas';
    $post->id = $pedido->ID;

    $post->AddFieldString('Descricao', $descricao);
    $post->AddFieldString('Situacao', 'PED');

    $sql = $post->GetSql();
    $db->Execute($sql);

    header('LOCATION:' . GetLink('pedido/' . $_POST['chave']));

} elseif ($_POST['action'] == 'addFiles') {

    $arquivos_array = GetArquivosArray($pedido->Arquivos);

    $arquivo = $_FILES['arquivo'];

    $arquivos_path = get_config('SITE_PATH') . 'arquivos_pedidos/' . $_POST['chave'] . '/';
    mkdir($arquivos_path);

    move_uploaded_file($arquivo['tmp_name'], $arquivos_path . $arquivo['name']);

    $arquivos_array[] = $arquivo['name'];


    $post = new girafaTablePost();
    $post->table = 'RoboVisitas';
    $post->id = $pedido->ID;

    $post->AddFieldString('Arquivos', GetArquivosString($arquivos_array));
    $post->AddFieldString('Situacao', 'PED');

    $sql = $post->GetSql();
    $db->Execute($sql);

    header('LOCATION:' . GetLink('pedido/' . $_POST['chave']));
}

?>