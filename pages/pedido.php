<?

$chave = GetParam(0);
if(empty($chave))
    die('Ocorreu um erro.');

//carrega pedido no DB
$pedido = LoadRecord('RoboVisitas',$chave, 'Chave');
if($pedido === false)
    die('Ocorreu um erro.');

$pedidoNr = NumeroComZero($pedido->ID);
$data = new girafaDate($pedido->DataHora, ENUM_DATE_FORMAT::YYYY_MM_DD_HH_II_SS);



SetPageTitle('Pedido');
includeHead();
includeHeader();
?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Pedido <strong>#<?= $pedidoNr; ?></strong></h1>
                <div class="page">
                    <h3>Informações do Cliente</h3>
                    <p><strong>Nome:</strong>  <?= $pedido->Nome; ?><br>
                    <strong>E-mail:</strong>  <a href="mailto:<?= $pedido->Nome; ?>"><?= $pedido->Email; ?></a><br>
                    <strong>Data:</strong>  <?= $data->GetFullDateForLong() . ' às ' . $data->GetDate('H:i'); ?></p>

                    <?
                    if($pedido->Situacao == 'CAN'){

                        ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">

                            <strong>Pedido cancelado!</strong><br><br>
                            Por algum motivo esse pedido foi cancelado por nossa equipe. Caso você não saiba o motivo, entre em contato com nossa equipe através do chat ou através do e-mail
                            <a href="mailto:vitamina@zbraestudio.com.br">vitamina@zbraestudio.com.br</a>.

                        </div>
                    <?

                    } else {
                        ?>
                        <h3>Movimentações no Robô</h3>
                        <p><?= nl2br($pedido->Passos); ?></p>

                        <h3>Descrição</h3>
                        <p><?= nl2br($pedido->Descricao); ?></p>

                        <!-- Adicionar informações (inicial) -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modalAdicionaInfo">Adicionar informação
                        </button>
                        <div class="modal fade" id="modalAdicionaInfo" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Adicionar Novas Informações</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?= GetLink('scripts/pedido.post.actions.php'); ?>" method="post">
                                        <input name="action" type="hidden" value="addObs">
                                        <input type="hidden" name="chave" value="<?= $chave; ?>">

                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="message-text" class="form-control-label">Texto:</label>
                                                <textarea class="form-control" id="msg" name="msg" required
                                                          placeholder="Digite sua observação"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Fechar
                                            </button>
                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Adicionar informações (fim) -->

                        <h3>Arquivos</h3>
                        <?

                        if (empty($pedido->Arquivos)) {
                            ?>
                            <p>Nenhum arquivo anexado no momento.</p>
                        <?
                        } else {

                            $arquivos = GetArquivosArray($pedido->Arquivos);

                            ?>
                            <ul>
                                <?
                                foreach ($arquivos as $arquivo) {
                                    ?>
                                    <li><a target="_blank"
                                           href="<?= get_config('SITE_URL') ?>/arquivos_pedidos/<?= $chave . '/' . $arquivo; ?>"><?= $arquivo; ?></a>
                                    </li>
                                <?
                                }
                                ?>
                            </ul>
                        <?
                        }
                        ?>

                        <!-- Adicionar informações (inicial) -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modalAdicionarArquivo">Adicionar arquivo
                        </button>
                        <div class="modal fade" id="modalAdicionarArquivo" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Adicionar Arquivo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?= GetLink('scripts/pedido.post.actions.php'); ?>" method="post"
                                          enctype="multipart/form-data">
                                        <input type="hidden" name="action" value="addFiles">
                                        <input type="hidden" name="chave" value="<?= $chave; ?>">

                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label for="message-text" class="form-control-label">Arquivo:</label>
                                                <input type="file" name="arquivo" id="arquivo" required="">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Fechar
                                            </button>
                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Adicionar informações (fim) -->

                        <hr>

                        <h3>Resolução da Agência</h3>

                        <?
                        $agenciaData = new girafaDate($pedido->AgenciaDataHora, ENUM_DATE_FORMAT::YYYY_MM_DD_HH_II_SS);

                        if ($pedido->Situacao == 'PED') {
                            ?>

                            <div class="alert alert-warning alert-dismissible" role="alert">

                                <strong>Já iremos verificar...</strong><br><br> Bacana! Já recebemos suas informações e
                                em breve alguém da nossa equipe estará verificando
                                e confirmando que está tudo certo. Caso falte alguma informação ou tivermos agulma
                                dúvida, avisaremos vocês aqui nesse mesmo espaço.

                                <br><br>
                                <small>Última
                                    movimentação: <?= $agenciaData->GetDayOfWeekLong() . ', ' . $agenciaData->GetFullDateForLong() . ' às ' . $agenciaData->GetDate('H:i'); ?></small>
                            </div>

                        <?
                        } else if ($pedido->Situacao == 'PIN') {
                            ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">

                                <strong>Faltam informações!</strong><br><br>
                                Ops! Nossa equipe avaliou seu pedido e achou que faltou alguns detalhes. Confirma abaixo
                                a mensagem escrita por nossa equipe:
                                <br><br>
                                <i><strong><?= nl2br($pedido->AgenciaMensagem); ?></strong></i>

                                <br><br>
                                <small>Última
                                    movimentação: <?= $agenciaData->GetDayOfWeekLong() . ', ' . $agenciaData->GetFullDateForLong() . ' às ' . $agenciaData->GetDate('H:i'); ?></small>
                            </div>
                        <?
                        } else if ($pedido->Situacao == 'PPG') {
                            ?>
                            <div class="alert alert-info alert-dismissible" role="alert">

                                <strong>Nossa proposta!</strong><br><br>
                                Confira abaixo o arquivo com nossa proposta. Esperamos de coração que esteja dentro do
                                que você estava esperando.
                                <br><br>
                                Trabalhamos sempre nossos preços dentro do mínimo que conseguimos, pra que a gente
                                consiga firmar a parceria e ser um negócio bom pra nós, mas acima de tudo, pra você! :)
                                <br><br>
                                Queremos surpreender você com o prazo, então se estiver de acordo já efetue seu
                                pagamento para gente já agilizar nossa parte.

                                <br><br>
                                <i><strong><?= nl2br($pedido->AgenciaMensagem); ?></strong></i>

                                <br><br>
                                <small>Última
                                    movimentação: <?= $agenciaData->GetDayOfWeekLong() . ', ' . $agenciaData->GetFullDateForLong() . ' às ' . $agenciaData->GetDate('H:i'); ?></small>


                            </div>
                            <a href="#" target="_blank" title="Clique aqui para visualizar sua proposta"
                               class="btn btn-primary"><span class="glyphicon glyphicon-search"
                                                             aria-hidden="true"></span> Ver Proposta</a>

                            <?
                            if (!empty($pedido->PagSeguroBtnCode)) {
                                ?>
                                <h3>Pagamento:</h3>
                                <!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
                                <form action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post"
                                      onsubmit="PagSeguroLightbox(this); return false;">
                                    <!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
                                    <input type="hidden" name="code" value="<?= $pedido->PagSeguroBtnCode; ?>"/>
                                    <input type="hidden" name="iot" value="button"/>
                                    <input type="image"
                                           src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-pagar-azul-assina.gif"
                                           name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!"/>
                                </form>
                                <script type="text/javascript"
                                        src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
                                <!-- FINAL FORMULARIO BOTAO PAGSEGURO -->

                            <?
                            }
                        } else if ($pedido->Situacao == 'PCN') {
                            ?>
                            <div class="alert alert-success alert-dismissible" role="alert">

                                <strong>Concluído!</strong><br><br>
                                Estamos imensamente felizes por ter trabalhado pra você. Esperamos que sua experiência
                                tenha sido tão bacana como foi pra gente.
                                Desejamos muito sucesso e no que precisar, conte sempre com a gente! ;D

                                <br><br>
                                Um imenso abraço de toda a equipe Vitamina.

                                <br><br>
                                <small>Última
                                    movimentação: <?= $agenciaData->GetDayOfWeekLong() . ', ' . $agenciaData->GetFullDateForLong() . ' às ' . $agenciaData->GetDate('H:i'); ?></small>
                            </div>
                        <?
                        }
                        ?>

                        <p style="margin-top: 25px;">
                            Utilize nosso chat para falar com um atendente e resolver qualquer assunto que achar
                            necessário. Nossos atendentes estão sempre disponíveis no horário comercial.
                            Caso prefira, escreva para <a href="mailto:suporte@zbraestudio.com.br">suporte@zbraestudio.com.br</a>.
                        </p>

                    <?
                    }
                    ?>
                </div>


            </div>
        </div>
    </div>
<?
includeFooter();
includeFoot();
?>

<script>
    /* Abre Chat */
    usuario_email = '<?= $pedido->Email; ?>';
    usuario_nome = '<?= $pedido->Nome; ?>';
    iniciarChat('Quero atendimento para o pedido #<?= $pedidoNr; ?>');
</script>