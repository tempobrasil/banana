<!doctype html>
<html>
<head>
<meta charset="utf-8"/>
<title>Agência Vitamina</title>
<link rel="stylesheet" href="css/reset.css">


<!-- BOWER - jQuery -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/jquery.easing/js/jquery.easing.min.js"></script>

<!-- BOWER - Bootstrap -->
<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap-theme.min.css">
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- BOWER - rhinoJS -->
<script src="bower_components/rhinoJS/dist/rhinoJS.js"></script>

<!-- BOWER - Font Awesome -->
<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">

<!-- BOWER - animate.css -->
<link rel="stylesheet" href="bower_components/animate.css/animate.min.css">

<!--BOWER - Bootstrap Device Debug -->
<!-- Quando terminar o site comentar as chamas abaixo -->
<script src="bower_components/bootstrap-device-debug/bootstrap-device-debug.js"></script>
<link rel="stylesheet" href="bower_components/bootstrap-device-debug/bootstrap-device-debug.css">

<!-- BOWER - typed.js -->
<script src="bower_components/typed.js/dist/typed.min.js"></script>

<!-- Controle de acesso pelo Mobile -->
<meta name="viewport" content="width=device-width, initial-scale=1"/>

<!-- Carrega CSS -->
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/conversas.css">

<!-- Carrega JS -->
<script src="js/functions.js"></script>
<script src="js/base.js"></script>
<script src="js/bgs.js"></script>
<script src="js/header.js"></script>
<script src="js/conversas.js"></script>
</head>

<body>

<!-- Loading -->
<div id="loading"></div>

<!-- Controla imagens do fundo (início) -->
<div id="bgs">
  <?
  $bgs = array(
    'images/bgs/bg1.jpg',
    'images/bgs/bg2.jpg',
    'images/bgs/bg3.jpg'
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

        <img src="images/logo.svg" id="logo">

      </div>
    </div>
  </div>
</header>

<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">

      <div id="conversas">

        <span class="digitar"></span>

        <div class="resposta">

        </div>


      </div>

    </div>
  </div>
</div>


</body>
</html>


<script type="text/javascript">

</script>