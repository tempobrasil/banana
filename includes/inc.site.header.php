<!-- Loading -->
<div id="loading"></div>

<!-- Controla imagens do fundo (início) -->
<div id="bgs">
    <?
    $bgs = array(
        get_config('SITE_URL') . 'images/bgs/bg1.jpg',
        get_config('SITE_URL') . 'images/bgs/bg2.jpg',
        get_config('SITE_URL') . 'images/bgs/bg3.jpg'
    );

    shuffle($bgs);

    foreach($bgs as $bg) {
        ?>
        <div style="background-image: url(<?= $bg; ?>);"></div>
    <?
    }
    ?>
</div>
<div id="bgs_dots"></div>
<!-- Controla imagens do fundo (fim) -->


<header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <img src="<?= get_config('SITE_URL'); ?>images/logo.svg" id="logo">

            </div>
        </div>
    </div>
</header>