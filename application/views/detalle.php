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
		<a class="nav-link text-uppercase" href="login/salir">Cerrar Sesión</a>
	<?php } ?>
	</div>

	<div class="main">
    <div class="container">
    <?php
                $url = "";
                for($i = 0; $i<count($lista); $i++)
                {
                    $url = $url.$lista[$i]->Latitude.",".$lista[$i]->Longitude."/";
                }
                echo "<form action='https://www.google.com/maps/dir/".$url."'>
                        <input type='submit' class='btn btn-default' value='Ver recorrido'/>
                        </form>";
            ?>
    </div>
    <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <br>
                    <br>
                    <table class="table">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th scope="col">Hora</th>
                                <th scope="col">Ver Mapa</th>
                                <th scope="col">Latitud</th>
                                <th scope="col">Longitud</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                                $url = "";
                                for($i = 0; $i<count($lista); $i++)
                                {
                                    echo "<tr>";
                                    echo "<th scope='row'>".$lista[$i]->DateTime_GPS."</th>";
                                    echo "<td><a class='btn btn-danger' style='color:white;' href='https://www.google.com/maps/search/?api=1&query=".$lista[$i]->Latitude.",".$lista[$i]->Longitude."'> Ver Mapa </a> </td>";
                                    echo "<td>".$lista[$i]->Latitude."</td>";
                                    echo "<td>".$lista[$i]->Longitude."</td>";
                                    echo "</tr>";
                                    $url = $url.$lista[$i]->Latitude.",".$lista[$i]->Longitude."/";
                                }
                            ?>
                        </tbody>
                    </table>
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