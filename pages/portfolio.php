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

                <h3>Web</h3>

                <div id="gallery" style="display:none;">

                    <?
                    $webs = array();

                    $web = array(
                        'mini'  => '',
                        'image' => '',
                        'title' => ''
                    );
                    $webs[] = $web;
                    ?>
                    <a href="http://unitegallery.net">
                        <img alt="Blog Pessoal de Tihh Gonçalves"
                             src="http://work.tiago.art.br/wp-content/uploads/2015/12/tiago_fotoprincipal.jpg"
                             data-image="http://work.tiago.art.br/wp-content/uploads/2015/12/tiago_fotoprincipal.jpg"
                             data-description="This is a Lemon Slice"
                             >
                    </a>



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

    $(document).ready(function(){

        $("#gallery").unitegallery({
            gallery_theme: "tiles",
            tiles_type: "nested"
        });
    });



</script>