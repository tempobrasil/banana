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

    /* Enviar e-mail */
    $link = GetLink('pedido/' . $pedido->Chave);
    $codigo = NumeroComZero($pedido->ID);
    $html = ' <p>Olá ' . $nome . ', tudo bem com você?</p>
        <p>Já recebemos seu pedido. Ele é o pedido de número <strong>#' . $codigo . '</strong>.</p>

        <p>Guarde esse número. É através dele que nós vamos nos entender, ok?</p>

        <p>Aproveite e veja agora como está o andamento do seu pedido, <a href="' . $link . '">através desse link</a>.
        </p>

        <p>Bom, é isso! Estamos muito feliz de dar essa vitaminada na sua marca.<br>
        Conte sempre com a gente! :)</p>

        <p>Grande abraço!
        <br><i>Equipe Vitamina</i></p>
      </td>';

    //testar e-mail...
    $res = mail_cliente_msg_send($pedido->Nome, $pedido->Email, $html, 'Já recebemos seu pedido #' . $codigo, 'tihhgoncalves@gmail.com');

    header('LOCATION:' . GetLink('pedido/' . $_POST['chave']));
}

?>