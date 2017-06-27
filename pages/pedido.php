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

                    <h3>Histórico</h3>
                    <p><?= nl2br($pedido->Passos); ?></p>

                    <h3>Descrição</h3>
                    <p><?= $pedido->Descricao; ?></p>
                    <button class="btn btn-primary">Adicionar informação</button>

                    <h3>Arquivo(s) Anexado(s)</h3>
                    <p>Nenhum arquivo.</p>
                    <button class="btn btn-primary">Adicionar arquivo</button>

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
    usuario_email = '<?= $pedido->Email; ?>';
    usuario_nome = '<?= $pedido->Nome; ?>';
    iniciarChat('Quero atendimento pro meu pedido: <?= $codigo; ?>')
</script>