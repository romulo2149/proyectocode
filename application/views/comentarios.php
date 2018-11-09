<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Simple Sidebar - Start Bootstrap Template</title>
    <link href="http://localhost/Proyecto/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="http://localhost/Proyecto/css/sidenav.css" rel="stylesheet">
    <link href="http://localhost/Proyecto/css/header.css" rel="stylesheet">
    <link href="http://localhost/Proyecto/css/comentarios.css" rel="stylesheet">


</head>

<body>
	<header>
       <nav class="navbar navbar-expand-lg navbar-light text-light py-3 main-nav">
          <div class="container" style="position: left;">
            <a class="navbar-brand" href="http://localhost/Proyecto/index.php/welcome"><img src="http://localhost/Proyecto/img/logo.png" class="invert" height="80" width="80" alt="Logo"></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
				<?php if(isset($_SESSION['usuario'])){ ?>
				  <li class="nav-item">
                    <a class="nav-link text-uppercase" href="">Hola <?php echo $_SESSION['usuario'] ?></a>
				  </li>
				<?php } else{ ?>
                  <li class="nav-item">
                    <a class="nav-link text-uppercase" href="registro">Registrarse</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link  text-uppercase" href="login">Iniciar Sesión</a>
				  </li>
				  <?php } ?>
                </ul>
              </div>
          </div>
        </nav>
    </header>
    <div class="sidenav">
	<?php if(isset($_SESSION['usuario'])){ ?>
    <a class="nav-link text-uppercase" href="http://localhost/Proyecto/index.php/cambiar">Cambiar Password</a>
    <a class="nav-link text-uppercase" href="http://localhost/Proyecto/index.php/chofer">ver recorridos</a>
        <a class="nav-link text-uppercase" href="http://localhost/Proyecto/index.php/login/salir">Cerrar Sesión</a>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <a href="javascript:history.go(-1)" title="Return to the previous page">&laquo; Volver</a>
	<?php } ?>
	</div>

	<div class="main">
    <div class="container">
    </div>
    <div class="text-center"><h2>Añadir un comentario:</h2></div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-sm-8">
                <form action="http://localhost/Proyecto/index.php/comentarios/publicar" method="post">
                    <div class="form-group">
                        <textarea class="form-control" name="texto" rows="3"></textarea>
                        <input type="hidden" name="comentario" value="
                            <?php
                            if(isset($fecha))
                            {
                                echo $fecha;
                            }
                            else
                            {
                                $año = $this->uri->segment(3);
                                $mes = $this->uri->segment(4);
                                $dia = $this->uri->segment(5);
                                $fecha = "".$año."-".$dia."-".$mes."";
                                echo $fecha;
                            }
                            ?>
                        "/>
                        <input type="hidden" name="chofer" value="
                            <?php
                            if(isset($chofer))
                            {
                                echo $chofer;
                            }
                            else
                            {
                                $chofer = $this->uri->segment(6);
                                echo str_replace("%20"," ",$chofer);
                            }
                            ?>
                        "/>
                    </div>
                    <input type="submit" class="btn btn-default" value="Enviar Comentario"/>
                
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
        <br>
        <br>
        <div class="text-center"><h2>Comentario:</h2></div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-sm-8">
                <?php
                    for($i = 0; $i<count($comentarios);$i++) 
                    {
                        echo '<div class="panel panel-white post panel-shadow"><div class="post-heading"><div class="pull-left meta"><div class="title h5">';
                        echo '<a href="#"><b>'.$comentarios[$i]->usuario.'</b></a> hizo un comentario. </div>';
                        echo '<div><small>'.$comentarios[$i]->fecha_envio.'</small></div></div></div>';
                        echo '<div class="post-description"><p>'.$comentarios[$i]->texto.'</p></div></div><br>';
                    }
                ?>
            </div> 
            <div class="col-md-2"></div>
        </div>
	</div>


    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="http://localhost/Proyecto/vendor/jquery/jquery.min.js"></script>
    <script src="http://localhost/Proyecto/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
