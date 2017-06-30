<?
include('../includes/autoload.php');
//die('session:' . $_SESSION['robo_id']);

$fase = $_POST['fase'];
$data = $_POST['data'];

if($fase == 'session_reset') {

    unset($_SESSION['robo_id']);

} else if($fase == 'nome'){

    $post = new girafaTablePost();
    $post->table = 'RoboVisitas';

    if(isset($_SESSION['robo_id'])) {
        $post->id = $_SESSION['robo_id'];
    } else {
        $post->AddFieldDateTimeNow('DataHora');
        $post->AddFieldString('Situacao', 'VIS');
        $post->AddFieldString('Passos', date('d/m/Y H:i') . " - Entrou no site\n");
    }

    $post->AddFieldString('Nome', $data);
    $sql = $post->GetSql();
    $db->Execute($sql);

    if(!isset($_SESSION['robo_id'])) {
        $id = $db->GetLastIdInsert();
        $_SESSION['robo_id'] = "" . $id . "";
    }

    die('session:' . $_SESSION['robo_id']);

} else if($fase == 'email'){

    $post = new girafaTablePost();
    $post->table = 'RoboVisitas';
    $post->id = $_SESSION['robo_id'];
    $post->AddFieldString('Email', $data);
    $sql = $post->GetSql();
    $db->Execute($sql);

} else if($fase == 'passos'){

    $reg = date('d/m/Y H:i') . ' - ' . $data . "\n";
    $sql = "UPDATE RoboVisitas SET Passos = CONCAT(Passos, '" . $reg  . "'), Situacao='" . $_POST['status'] . "' WHERE ID = " . $_SESSION['robo_id'];
    $db->Execute($sql);

    die($sql);

} else if($fase == 'descricao'){

    $post = new girafaTablePost();
    $post->table = 'RoboVisitas';
    $post->id = $_SESSION['robo_id'];
    $post->AddFieldString('Descricao', $data);
    $sql = $post->GetSql();
    $db->Execute($sql);

} else if($fase == 'pedido'){

    $reg = LoadRecord('RoboVisitas', "".$_SESSION['robo_id']."");

    $chave = md5($reg->Nome . $reg->Email . date('YmdHis'));

    $post = new girafaTablePost();
    $post->table = 'RoboVisitas';
    $post->id = $_SESSION['robo_id'];
    $post->AddFieldString('Chave', $chave);
    $post->AddFieldString('Situacao', 'PED');
    $post->AddFieldDateTimeNow('AgenciaDataHora');
    $sql = $post->GetSql();

    $db->Execute($sql);

    /* Enviar e-mail */
    $link = GetLink('pedido/' . $chave);
    $codigo = NumeroComZero($reg->ID);
    $html = ' <p>Olá ' . $reg->Nome . ', tudo bem com você?</p>
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
    $res = mail_cliente_msg_send($reg->Nome, $reg->Email, $html, 'Já recebemos seu pedido #' . $codigo, 'tihhgoncalves@gmail.com');


    die($_SESSION['robo_id'] . '|' . $chave);

}
?>