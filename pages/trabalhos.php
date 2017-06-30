<?
SetPageTitle('Portfólio');
includeHead();
includeHeader();
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Portfólio</h1>
            <div class="page">

                <p>Conheça abaixo um pouco do nosso trabalho. Aproveite e entre em contato com  nossa equipe clicando no botão do chat. Estamos prontos pra atender você!</p>

                <h3>Web</h3>

                <div id="galeria_web" style="display:none;">

                    <?

                    $json_file = file_get_contents(get_config('SITE_PATH') . 'arquivos_portfolio/portfolio.json');
                    $json_str = json_decode($json_file, true);

                    $pecas_web = $json_str['web'];
                    shuffle($pecas_web);

                    foreach($pecas_web as $peca) {

                        ?>
                        <a href="http://unitegallery.net">
                            <img alt="<?= $peca['title']; ?>"
                                 src="<?= get_config('SITE_URL') . 'arquivos_portfolio/' . $peca['thumb']; ?>"
                                 data-image="<?= get_config('SITE_URL') . 'arquivos_portfolio/' . $peca['image']; ?>"
                                 data-description="<?= $peca['title']; ?>"
                                >
                        </a>
                    <?
                    }
                    ?>



                </div>

                <h3>Design</h3>

                <div id="galeria_design" style="display:none;">

                    <?

                    $pecas_design = $json_str['design'];
                    shuffle($pecas_design);

                    foreach($pecas_design as $peca) {

                        ?>
                        <a href="http://unitegallery.net">
                            <img alt="<?= $peca['title']; ?>"
                                 src="<?= get_config('SITE_URL') . 'arquivos_portfolio/' . $peca['thumb']; ?>"
                                 data-image="<?= get_config('SITE_URL') . 'arquivos_portfolio/' . $peca['image']; ?>"
                                 data-description="<?= $peca['title']; ?>"
                                >
                        </a>
                    <?
                    }
                    ?>



                </div>


            </div>


        </div>
    </div>
</div>
<?
includeFooter();
includeFoot();


$html = ' <p>Olá ' . $nome . ', tudo bem com você? <strong>#1234566</strong></p>
        <p>Estamos enviando esse e-mail para avisar você que nossa equipe já foi avisada a respeito da sua solicitação de convite já está trabalhando nela.
        Em breve já estaremo retornando você!</p>

        <p>Bom, é isso! Estou muito feliz em tê-lo com a gente.<br>
        Qualquer dúvida, entre em contato com nosso suporte.</p>

        <p>Grande abraço!
        <br><i>Tiago Gonçalves</i><br>(Diretor)<br></p>
      </td>';

//testar e-mail...
$res = mail_cliente_msg_send('Tiaguinho', 'tihhgoncalves@gmail.com', $texto);
if($res === true)
  echo('[E-mail enviado com sucesso!' . $res);
else
  echo('E-mail ERRO:' . $res . ']');
?>

<script>

    $(document).ready(function(){

        $("#galeria_web").unitegallery({
            gallery_theme: "tiles",
            tiles_type: "nested"
        });

        $("#galeria_design").unitegallery({
            gallery_theme: "tiles",
            tiles_type: "nested"
        });
    });

    /* Abre Chat */
    iniciarChat('Estava olhando o portfólio da Vitamina e queria conversar com vocês.');
</script>