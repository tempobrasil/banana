<?
include('../includes/autoload.php');



if(!isset($_GET['id'])) {
    die('Erro. Falta o ?id=XXX');
}

$pedido = LoadRecord('RoboVisitas', $_GET['id']);


$html = ' <p>Olá ' . $pedido->Nome . ', tudo bem com você?</p>
        <p>A gente não quer parecer grudento, sabe... mas vimos que você entrou no nosso site, conheceu nosso trabalho e não voltou mais.</p>

         <p>Está tudo bem? Aconteceu alguma coisa? Esperamos de coração que não.. que tenha sido somente a correria da vida mesmo, hehe.</p>

         <p>Bom... estamos enviando essa mensagem, na verdade, pra te convidar pra nos visitar novamente em breve. Estamos com saudades!</p>

        <p>Vem tomar uma vitamina com a gente, <a href="#">clicando aqui</a>.</p>
         <p>Grande abraço!
        <br><i>Equipe Vitamina</i></p>
      </td>';

//testar e-mail...
$res = mail_cliente_msg_send($pedido->Nome, $pedido->Email, $html, 'Sentimos sua falta :(', 'tihhgoncalves@gmail.com');

if($res === true)
    die('Enviado com sucesso!');
else
    die('Erro:' . $res);
?>