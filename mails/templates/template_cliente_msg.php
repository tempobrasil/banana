<?
function mail_cliente_msg_getHtml($nome){

  $html = '<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  </head>
  <body style="background-color:#FD2F48;padding: 25px;font-family: Tahoma, Geneva, sans-serif;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td style="background-color: #F8F8F8; border: 1px solid #EEEEEE; background-image: url(cid:logo); background-repeat:no-repeat; background-position: center; line-height:72px;font-size:20px;">
      </td>
    </tr>
    <tr>
      <td style="border:1px solid #EEEEEE; border-top: 0; background-color: #FFF; padding: 35px; color:#666666;font-family: Tahoma, Geneva, sans-serif;font-size: 13px;">
      <p>Olá ' . $nome . ', tudo bem com você? <strong>#1234566</strong></p>
        <p>Estamos enviando esse e-mail para avisar você que nossa equipe já foi avisada a respeito da sua solicitação de convite já está trabalhando nela.
        Em breve já estaremo retornando você!</p>

        <p>Bom, é isso! Estou muito feliz em tê-lo com a gente.<br>
        Qualquer dúvida, entre em contato com nosso suporte.</p>

        <p>Grande abraço!
        <br><i>Tiago Gonçalves</i><br>(Diretor)<br></p>
      </td>
    </tr>
  </table>
  <br/><br/>
  <center>
<span style="font-style:italic; font-size: 11px; margin-top:5px;">
Esta é uma mensagem automática, mas caso precise de ajuda, responda esse e-mail com sua dúvida.
Copyright 2017 Agência Vitamina.
</span>
  </center>
  </body>
  </html>';

  return $html;

}

function mail_cliente_msg_send($nome, $email){
  global $mailer;

  $mailer->addAddress($email);

  $mailer->addCC('vitamina@zbraestudio.com.br');

  $mailer->Subject = 'Já recebemos seu cadastro!  :)';
  $mailer->Body    = mail_cliente_msg_getHtml($nome);

  if($mailer->send())
    return true;
  else
    return $mailer->ErrorInfo;
}

?>