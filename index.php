<?php 
require("configuracion/inicio.php");

// Clases
require("clases/clase_producto.php");
require("clases/clase_banner.php");

// Objetos
$producto = new Producto($conexion);
$banner = new Banner($conexion);
$contenido = new Contenido($conexion);


if($contenido->datos(3)) { //Bienvenidos
  $tit03 = $contenido->titulo;
  $des03 = $contenido->descripcion;
}


if($contenido->datos(4)) { //
  $tit04 = $contenido->titulo;
  $des04 = $contenido->descripcion;
}

if($contenido->datos(5)) { //
  $tit05 = $contenido->titulo;
  $des05 = $contenido->descripcion;
}

if($contenido->datos(6)) { //
  $tit06 = $contenido->titulo;
  $des06 = $contenido->descripcion;
}

if($contenido->datos(7)) { // Contacto
  $tit07 = $contenido->titulo;
  $des07 = $contenido->descripcion;
}


if($contenido->datos(7)) { // Contacto
  $tit07 = $contenido->titulo;
  $des07 = $contenido->descripcion;
}

// Listar Banners
$listado_banner = $banner->listado('', 1);
$total_banner = $banner->total_listado('', 1);

// Listar Productos
$listado = $producto->listado_paginado('', 0,  1, 0, 6);
$total = $producto->total_listado('', 0, 1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Grafiartist | Impresos y algo mas...</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.theme.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.transitions.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/grafiartist.css" rel="stylesheet">
  <link rel="shortcut icon" href="img/favicon.ico" />

  <!--Your custom colour override - predefined colours are: colour-blue.css, colour-green.css, colour-lavander.css, orange is default-->
  <link href="css/colour-green.css" id="colour-scheme" rel="stylesheet">
</head>

<body class="page-index has-hero">
  <!--Change the background class to alter background image, options are: benches, boots, buildings, city, metro -->
  <div id="background-wrapper" class="city" data-stellar-background-ratio="0.1">

    <?php include("plantillas/encabezado.php"); ?>
    <div class="hero" id="highlighted">
      <div class="inner">
        <!--Slideshow-->
        <div id="highlighted-slider" class="container">
          <div class="item-slider" data-toggle="owlcarousel" data-owlcarousel-settings='{"singleItem":true, "navigation":true, "transitionStyle":"fadeUp"}'>
            <!--Slideshow content-->
            <!--Slide 1-->

             <?php if($total_banner > 0) {
                   foreach($listado_banner as $reg_banner) { 
                    if ($i%2 == 0) { $md1 = 'text-right-md'; $md2 = ''; }  else { $md1 = 'col-md-push-6'; $md2 = 'col-md-pull-6'; } ?>


            <div class="item">
              <div class="row">
                <div class="col-md-6 <?=$md1?> item-caption">
                  <h2 class="h1 text-weight-light">Bienvenidos <span class="text-primary">Grafiartist</span></h2>
                  <h4><?=$reg_banner->titulo?></h4>
                  <?=$reg_banner->descripcion?>
                  <a href="productos.php" class="btn btn-more btn-lg i-right">Compar Ahora <i class="fa fa-plus"></i></a>
                </div>
                <div class="col-md-6 <?=$md2?> hidden-xs">
                  <img src="archivos_banners/<?=$reg_banner->imagen?>" alt="<?=$reg_banner->titulo?>" class="center-block img-responsive">
                </div>
              </div>
            </div>
            <?php } 
              } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ======== @Region: #content ======== -->
  <div id="content">
    <!-- Mission Statement -->
    <div class="mission text-center block block-pd-sm block-bg-noise">
      <div class="container">
        <h2 class="text-shadow-white">
            <?=$des03?>
            <a href="quienes.php" class="btn btn-more"><i class="fa fa-plus"></i>Leer Más</a>
          </h2>
      </div>
    </div>
    <!--Showcase-->
    <div class="showcase block block-border-bottom-grey">
      <div class="container">
        <h2 class="block-title">Productos</h2>
        <?php if($total > 0) { ?>
          <div class="item-carousel" data-toggle="owlcarousel" data-owlcarousel-settings='{"items":4, "pagination":false, "navigation":true, "itemsScaleUp":true}'>
          <?php foreach($listado as $registro) {  ?>
            <div class="item">
            <a href="producto.php?id=<?=$registro->obtener_id()?>" class="overlay-wrapper">
              <?php if($registro->imagen != '') { ?>
                <img src="archivos_productos/<?=$registro->imagen?>" alt="<?=$registro->nombre?>" title="<?=$registro->nombre?>" class="img-responsive underlay">
                  <?php } else { ?> 
                <img src="archivos_productos/img_no.png" alt="<?=$registro->nombre?>" title="<?=$registro->nombre?>" class="img-responsive underlay">
                  <?php } ?>
                <span class="overlay">
                  <span class="overlay-content"> <span class="h4"><i class="fa fa-search-plus"></i></span> </span>
                </span>
            </a>
            <div class="item-details bg-noise">
              <h4 class="item-title">
                  <a href="producto.php?id=<?=$registro->obtener_id()?>"><?=$registro->nombre?></a>
                </h4>
              <a href="producto.php?id=<?=$registro->obtener_id()?>" class="btn btn-more"><i class="fa fa-plus"></i>Ver Más</a>
            </div>
          </div>
            <?php } ?>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
    <!-- Services -->
    <div class="services block block-bg-gradient block-border-bottom">
      <div class="container">
        <h2 class="block-title">Ofrecemos para Usted</h2>
        <div class="row">
          <div class="col-md-4 text-center">
            <span class="fa-stack fa-5x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-pencil-square-o fa-stack-1x fa-inverse"></i> </span>
              <h4 class="text-weight-strong"><?=$tit04?></h4>
              <?=$des04?>
              <p>
                <a href="quienes.php" class="btn btn-more i-right">Ver Más <i class="fa fa-angle-right"></i></a>
              </p>
          </div>
          <div class="col-md-4 text-center">
            <span class="fa-stack fa-5x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-window-restore fa-stack-1x fa-inverse"></i> </span>
              <h4 class="text-weight-strong"><?=$tit05?></h4>
              <?=$des05?>
              <p>
                <a href="orden.php" class="btn btn-more i-right">Ver Más <i class="fa fa-angle-right"></i></a>
              </p>
          </div>
          <div class="col-md-4 text-center">
            <span class="fa-stack fa-5x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i> </span>
              <h4 class="text-weight-strong"><?=$tit06?></h4>
              <?=$des06?>
             <p>
              <a href="login.php" class="btn btn-more i-right">Ver Más <i class="fa fa-angle-right"></i></a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /content -->
 <?php include("plantillas/pie.php"); ?>

  <!-- Required JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/stellar/stellar.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>

  <!-- Template Specisifc Custom Javascript File -->
  <script src="js/custom.js"></script>

  <!--Custom scripts demo background & colour switcher - OPTIONAL -->
  <script src="js/color-switcher.js"></script>

  <script src="js/grafiartist.js"></script>

</body>

</html>
