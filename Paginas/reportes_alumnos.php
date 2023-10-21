<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ventna adminstrativo</title>
  <link rel="stylesheet" href="../css/administrativo.css" />
</head>

<body>
  <header>
    <h2>Reportes de asistencia alumnos y externos</h2>
  </header>

  <section class="container-general">
    
    <article class="navigation">
      <nav>
        <ul>
          
          <li>
            <a href="https://fabricaitszas.com/RegistroExposistemas/">
              <span class="icon">
                <ion-icon name="home-outline" id="LogoRetorno"></ion-icon>
                </ion-icon>
              </span>
              <span class="title">Exposistemas ISC</span>
            </a>
          </li>

          <li>
            <a href="https://fabricaitszas.com/RegistroExposistemas/">
              <span class="icon">
                <ion-icon name="document-text-outline"></ion-icon>
              </span>
              <span class="title">Registro del Programa</span>
            </a>
          </li>

          <li>
            <a href="../Paginas/constancias.php">
              <span class="icon">
                <ion-icon name="newspaper-outline"></ion-icon>
              </span>
              <span class="title">Emisión de constancias</span>
            </a>
          </li>

          <li>
            <a href="../Paginas/reportes_alumnos.php">
              <span class="icon">
                <ion-icon name="receipt-outline"></ion-icon>
              </span>
              <span class="title">Reportes de asistencia</span>
            </a>
          </li>

          <li>
            <a href="https://fabricaitszas.com/RegistroExposistemas/">
              <span class="icon">
                <ion-icon name="book-outline"></ion-icon>
              </span>
              <span class="title">Consulta del Programa</span>
            </a>
          </li>

          <li>
            <a href="https://fabricaitszas.com/RegistroExposistemas/">
              <span class="icon">
                <ion-icon name="finger-print-outline"></ion-icon>
              </span>
              <span class="title">Cambio de contraseña</span>
            </a>
          </li>

          <li>
            <a href="https://fabricaitszas.com/RegistroExposistemas/">
              <span class="icon">
                <ion-icon name="qr-code-outline"></ion-icon>
              </span>
              <span class="title">Escanear QR</span>
            </a>
          </li>

          <li>
            <a href="../SesionesUsuario/logout.php">
              <span class="icon">
                <ion-icon name="log-out-outline"></ion-icon>
              </span>
              <span class="title">Cerrar sesión</span>
            </a>
          </li>

        </ul>

        <div class="toggle"></div>
      </nav>
    </article>

    <div class="card">
      <h2>Reportes de asistencia alumnos</h2>
      <article class="contenedor-tabla">

        <table class="table-cebra">
          <thead>
            <tr>
              <th class="sticky">Nombre(s)</th>

              <th>Apellido paterno</th>

              <th>Apellido materno</th>

              <th>Número de control</th>

              <th>Semeste</th>


              <th>Registro 1</th>

              <th>Registro 2</th>
            </tr>
          </thead>

          <?php
        include_once("../CRUD/CRUD_bd_general.php");
        $obj = new CRUD_general();
        $obj->conexionBD();

        $consulta = "SELECT * FROM total_alumnos";
        $parametro = [":selecion" => "10"];
        $resultado = $obj->Mostrar($consulta);


        //var_dump($resultado);

        for ($i = 0; $i < count($resultado); $i++) {
          $nc = $resultado[$i]['no_control'];
          $querry_verificacion = "SELECT * FROM registros_alumnos
          WHERE no_control = '$nc'";

          $resp  = $obj->MOSTRAR($querry_verificacion);
          $no_registros = count($resp);
          $registros = ["", ""];
          $hora_ant = "";
          $counter = 0;

          for ($j = 0; $j < count($resp); $j++) {

            $hora = qutarSec($resp[$j]["hora"]);
            $hora_ant = qutarSec($hora_ant);

            if ($hora == $hora_ant) {
              $no_registros = $no_registros - 1;
            } else {
              //echo 'Si entra aquí con el alumno '. $resp[$j]["no_control"]. ' a las '. $resp[$j]["hora"]. '<br>';
              $registros[$counter] = $resp[$j]["hora"];
              $counter++;
            }
            $hora_ant = $resp[$j]["hora"];
            //echo $hora_ant. '<br>';
          }

          if ($no_registros <= 2) {

        ?>

          <td class="sticky">
            <?php echo $resultado[$i]['nombre']; ?>
          </td>
          <td>
            <?php echo $resultado[$i]['paterno']; ?>
          </td>
          <td>
            <?php echo $resultado[$i]['materno']; ?>
          </td>
          <td>
            <?php echo $resultado[$i]['no_control']; ?>
          </td>
          <td>
            <?php echo $resultado[$i]['semestre']; ?>
          </td>
          <td>
            <?php echo $registros[0] ?>
          </td>
          <td>
            <?php echo $registros[1] ?>
          </td>


          <?php
          }
          ?>

          </tr>
          </tbody>
          <?php
        }

        ?>
        </table>
      </article>
    </div>
    
    <div class="card">
        <h2>Reportes de asistencia externos</h2>
        <article class="contenedor-tabla">

            <table class="table-cebra">
                <thead>
                    <tr>
                        <th class="sticky">Nombre(s)</th>

                        <th>Apellido paterno</th>

                        <th>Apellido materno</th>

                        <th>Procedencia</th>


                        <th>Registro 1</th>

                        <th>Registro 2</th>
                    </tr>
                </thead>

                <?php
                include_once("../CRUD/CRUD_bd_general.php");
                $obj = new CRUD_general();
                $obj->conexionBD();

                $consulta = "SELECT * FROM espectadores_externos";
                $parametro = [":selecion" => "10"];
                $resultado = $obj->Mostrar($consulta);


                //var_dump($resultado);

                for ($i = 0; $i < count($resultado); $i++) {
                    $nc = $resultado[$i]['correo'];
                    $querry_verificacion = "SELECT * FROM registros_externos
                        WHERE correo = '$nc'";

                    $resp  = $obj->MOSTRAR($querry_verificacion);
                    $no_registros = count($resp);
                    $registros = ["", ""];
                    $hora_ant = "";
                    $counter = 0;

                    for ($j = 0; $j < count($resp); $j++) {

                        $hora = qutarSec($resp[$j]["hora"]);
                        $hora_ant = qutarSec($hora_ant);

                        if ($hora == $hora_ant) {
                            $no_registros = $no_registros - 1;
                        } else {
                            //echo 'Si entra aquí con el alumno '. $resp[$j]["no_control"]. ' a las '. $resp[$j]["hora"]. '<br>';
                            $registros[$counter] = $resp[$j]["hora"];
                            $counter++;
                        }
                        $hora_ant = $resp[$j]["hora"];
                        //echo $hora_ant. '<br>';
                    }

                    if ($no_registros <= 2) {

                ?>

                        <td class="sticky"><?php echo $resultado[$i]['nombre']; ?></td>
                        <td><?php echo $resultado[$i]['paterno']; ?></td>
                        <td><?php echo $resultado[$i]['materno']; ?></td>
                        <td><?php echo $resultado[$i]['procedencia']; ?></td>
                        <td><?php echo $registros[0] ?></td>
                        <td><?php echo $registros[1] ?></td>


                    <?php
                    }
                    ?>

                    </tr>
                    
                    </tbody>
                <?php
                }

                ?>
            
                <?php
                $consulta = "SELECT * FROM ponentes_externos";
                $parametro = [":selecion" => "10"];
                $resultado = $obj->Mostrar($consulta);


                //var_dump($resultado);

                for ($i = 0; $i < count($resultado); $i++) {
                    $nc = $resultado[$i]['correo'];
                    $querry_verificacion = "SELECT * FROM registros_ponentes_ext
                        WHERE correo = '$nc'";

                    $resp  = $obj->MOSTRAR($querry_verificacion);
                    $no_registros = count($resp);
                    $registros = ["", ""];
                    $hora_ant = "";
                    $counter = 0;

                    for ($j = 0; $j < count($resp); $j++) {

                        $hora = qutarSec($resp[$j]["hora"]);
                        $hora_ant = qutarSec($hora_ant);

                        if ($hora == $hora_ant) {
                            $no_registros = $no_registros - 1;
                        } else {
                            //echo 'Si entra aquí con el alumno '. $resp[$j]["no_control"]. ' a las '. $resp[$j]["hora"]. '<br>';
                            $registros[$counter] = $resp[$j]["hora"];
                            $counter++;
                        }
                        $hora_ant = $resp[$j]["hora"];
                        //echo $hora_ant. '<br>';
                    }

                    if ($no_registros <= 2) {

                ?>

                        <td class="sticky"><?php echo $resultado[$i]['nombre']; ?></td>
                        <td><?php echo $resultado[$i]['paterno']; ?></td>
                        <td><?php echo $resultado[$i]['materno']; ?></td>
                        <td></td>
                        <td><?php echo $registros[0] ?></td>
                        <td><?php echo $registros[1] ?></td>


                    <?php
                    }
                    ?>

                    </tr>
                    
                    </tbody>
                <?php
                }

                ?>
            </table>
        </article>
    </div>

  </section>
  <!-- Importacion de los íconos de Ionic -->
  <script src="../js/linkHome.js"></script>
  <script src="../SesionesUsuario/session_expiracion.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <!-- Creacion del script general -->
  <script>
    let navigation = document.querySelector('.navigation')
    let toggle = document.querySelector('.toggle')

    toggle.onclick = function() {
      navigation.classList.toggle('active')
    }
  </script>
</body>
</html>

<?php
function qutarSec($cadena)
{
  $cad = substr($cadena, 0, -3);

  return $cad;
}
?>