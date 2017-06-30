<?
function mail_cliente_msg_getHtml($nome, $texto){

  $html = '<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  </head>
  <body style="background-color:#F5F5F5;padding: 25px;font-family: Tahoma, Geneva, sans-serif;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td style="background-color: #FD2F48; border: 1px solid #EEEEEE; background-image: url(cid:logo); background-repeat:no-repeat; background-position: center; height:150px;">
      </td>
    </tr>
    <tr>
      <td style="border:1px solid #EEEEEE; border-top: 0; background-color: #FFF; padding: 35px; color:#666666;font-family: Tahoma, Geneva, sans-serif;font-size: 17px;">
      ' . $texto  . '
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

function mail_cliente_msg_send($nome, $email, $texto, $assunto, $cco){
  global $mailer;

  $mailer->addAddress($email);

  if(!empty($cco))
    $mailer->addCC($cco);

  $mailer->Subject = $assunto;
  $mailer->Body    = mail_cliente_msg_getHtml($nome, $texto);

  if($mailer->send())
    return true;
  else
    return $mailer->ErrorInfo;
}

?>