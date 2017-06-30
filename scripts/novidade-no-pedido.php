<?
include('../includes/autoload.php');



if(!isset($_GET['code'])) {
    die('Erro. Falta o ?code=XXX');
}

$pedido = LoadRecord('RoboVisitas', $_GET['code'], 'Chave');


/* Enviar e-mail (Alteração no Pedido) */
$link = GetLink('pedido/' . $pedido->Chave);
$codigo = NumeroComZero($pedido->ID);

$html = ' <p>Olá ' . $pedido->Nome . ', tudo bem com você?</p>
        <p>Temos um recado importante pra você.</p>

         <p>Seu pedido <strong>#' . $codigo . '</strong> foi verificado por nossa equipe e houve uma alteração da situação do pedido.
         Dê uma espiada lá <a href="' . $link . '">através desse link</a>.

        <p>Bom, é isso! Estamos muito feliz de dar essa vitaminada na sua marca.<br>
        Conte sempre com a gente! :)</p>

        <p>Grande abraço!
        <br><i>Equipe Vitamina</i></p>
      </td>';

//testar e-mail...
$res = mail_cliente_msg_send($pedido->Nome, $pedido->Email, $html, 'Opa, temos novidades no seu pedido #' . $codigo, 'tihhgoncalves@gmail.com');

if($res === true)
    die('Enviado com sucesso!');
else
    die('Erro:' . $res);
?>