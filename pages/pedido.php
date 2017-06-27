<?

$codigo = GetParam(0);
if(empty($codigo))
    die('Ocorreu um erro.');

//carrega pedido no DB
$pedido = LoadRecord('RoboVisitas', $codigo, 'Codigo');
if($pedido === false)
    die('Ocorreu um erro.');

$data = new girafaDate($pedido->DataHora, ENUM_DATE_FORMAT::YYYY_MM_DD_HH_II_SS);



SetPageTitle('Pedido');
includeHead();
includeHeader();
?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Pedido <strong>#<?= $codigo; ?></strong></h1>
                <div class="page">
                    <h3>Informações do Cliente</h3>
                    <p><strong>Nome:</strong>  <?= $pedido->Nome; ?><br>
                    <strong>E-mail:</strong>  <a href="mailto:<?= $pedido->Nome; ?>"><?= $pedido->Email; ?></a><br>
                    <strong>Data:</strong>  <?= $data->GetFullDateForLong() . ' às ' . $data->GetDate('H:i'); ?></p>

                    <h3>Movimentações no Robô</h3>
                    <p><?= nl2br($pedido->Passos); ?></p>

                    <h3>Descrição</h3>
                    <p><?= nl2br($pedido->Descricao); ?></p>

                    <!-- Adicionar informações (inicial) -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdicionaInfo">Adicionar informação</button>
                    <div class="modal fade" id="modalAdicionaInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <input type="hidden" name="codigo" value="<?= $codigo; ?>">
                                    <div class="modal-body">
                                            <div class="form-group">
                                                <label for="message-text" class="form-control-label">Texto:</label>
                                                <textarea class="form-control" id="msg" name="msg" required placeholder="Digite sua observação"></textarea>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Adicionar informações (fim) -->

                    <h3>Arquivos</h3>
                    <?

                    if(empty($pedido->Arquivos)) {
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
                        <li><a target="_blank" href="<?= get_config('SITE_URL')?>/arquivos_pedidos/<?= $codigo . '/' . $arquivo; ?>"><?= $arquivo; ?></a></li>
                        <?
                        }
                        ?>
                        </ul>
                    <?
                    }
                    ?>

                    <!-- Adicionar informações (inicial) -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdicionarArquivo">Adicionar arquivo</button>
                    <div class="modal fade" id="modalAdicionarArquivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Adicionar Arquivo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= GetLink('scripts/pedido.post.actions.php'); ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="action" value="addFiles">
                                    <input type="hidden" name="codigo" value="<?= $codigo; ?>">
                                    <div class="modal-body">

                                            <div class="form-group">
                                                <label for="message-text" class="form-control-label">Arquivo:</label>
                                                <input type="file" name="arquivo" id="arquivo" required="">
                                            </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Adicionar informações (fim) -->

                    <hr>

                    <h3>Resolução da Agência</h3>

                    <div class="alert alert-warning alert-dismissible" role="alert">

                        <strong>Aguardando informações!</strong> Para receber ajuda, entre no horário comercial nessa mesma página e fale com um atendente ao vivo ou envie um e-mail para <a href="mailto:suporte@zbraestudio.com.br">suporte@zbraestudio.com.br</a>.
                    </div>
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
    iniciarChat('Quero atendimento pro meu pedido: <?= $codigo; ?>');
</script>