<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <title><?= GetPageTitle(); ?></title>
    <link rel="stylesheet" href="<?= get_config('SITE_URL'); ?>css/reset.css">

    <!-- BOWER - jQuery -->
    <script src="<?= get_config('SITE_URL'); ?>bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?= get_config('SITE_URL'); ?>bower_components/jquery.easing/js/jquery.easing.min.js"></script>

    <!-- BOWER - Bootstrap -->
    <link rel="stylesheet" href="<?= get_config('SITE_URL'); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= get_config('SITE_URL'); ?>bower_components/bootstrap/dist/css/bootstrap-theme.min.css">
    <script src="<?= get_config('SITE_URL'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- BOWER - rhinoJS -->
    <script src="<?= get_config('SITE_URL'); ?>bower_components/rhino/js/dist/rhinoJS.js"></script>

    <!-- BOWER - Font Awesome -->
    <link rel="stylesheet" href="<?= get_config('SITE_URL'); ?>bower_components/font-awesome/css/font-awesome.min.css">

    <!-- BOWER - animate.css -->
    <link rel="stylesheet" href="<?= get_config('SITE_URL'); ?>bower_components/animate.css/animate.min.css">

    <?
    if(is_localhost()) {
        ?>
        <!--BOWER - Bootstrap Device Debug -->
        <!-- Quando terminar o site comentar as chamas abaixo -->
        <script
            src="<?= get_config('SITE_URL'); ?>bower_components/bootstrap-device-debug/bootstrap-device-debug.js"></script>
        <link rel="stylesheet"
              href="<?= get_config('SITE_URL'); ?>bower_components/bootstrap-device-debug/bootstrap-device-debug.css">
    <?
    }
    ?>
    <!-- BOWER - typed.js -->
    <script src="<?= get_config('SITE_URL'); ?>bower_components/typed.js/dist/typed.min.js"></script>

    <!-- Controle de acesso pelo Mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- Carrega CSS -->
    <link rel="stylesheet" href="<?= get_config('SITE_URL'); ?>css/reset.css">
    <link rel="stylesheet" href="<?= get_config('SITE_URL'); ?>css/base.css">
    <link rel="stylesheet" href="<?= get_config('SITE_URL'); ?>css/conversas.css">

    <!-- Carrega JS -->
    <script src="<?= get_config('SITE_URL'); ?>js/functions.js"></script>
    <script src="<?= get_config('SITE_URL'); ?>js/base.js"></script>
    <script src="<?= get_config('SITE_URL'); ?>js/bgs.js"></script>
    <script src="<?= get_config('SITE_URL'); ?>js/header.js"></script>
    <script src="<?= get_config('SITE_URL'); ?>js/conversas.js"></script>

    <script>

        var site_root = '<?= get_config('SITE_URL'); ?>';

    </script>
</head>

<body>
