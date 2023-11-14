<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ventana adminstrativo</title>
  <link rel="stylesheet" href="css/administrativo.css">
  <link rel="stylesheet" href="css/toast_alert.css">
</head>

<body>
  <section class="container-all">
    <header>
      <h2>Menú administrativo</h2>
    </header>

    <article class="navigation">
      <nav>
        <ul>

          <li>
            <a href="">
              <span class="icon">
                <ion-icon name="home-outline"></ion-icon>
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
            <a href="Paginas/constancias.php">
              <span class="icon">
                <ion-icon name="newspaper-outline"></ion-icon>
              </span>
              <span class="title">Emisión de constancias</span>
            </a>
          </li>

          <li>
            <a href="Paginas/reportes_alumnos.php">
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
            <a href="SesionesUsuario/logout.php">
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

    <article class="container-general" id="RegistroPrograma">

      <!-- Seccion del registro del programa de exposistemas #######################################3-->
      <div class="card">
        <h1>Registro del programa de exposistemas</h1>

        <form action="" method="post" id="form1">

          <div class="campos">

            <div class="input-group">
              <input type="text" name="NombreActividad" autocomplete="off" id="NombreActividad" required class="input">
              <label for="NombreActividad" class="input-label">Nombre del proyecto</label>
            </div>

            <div class="input-group">
              <input type="text" name="NumeroActividad" autocomplete="off" id="NumeroActividad" required class="input">
              <label for="NumeroActividad" class="input-label">Posición de actividad</label>
            </div>

            <div class="input-group">
              <input type="text" name="temaActividad" autocomplete="off" id="temaActividad" required class="input">
              <label for="temaActividad" class="input-label">Tema del proyecto</label>
            </div>

            <div class="input-group">
              <input type="text" name="Materia" autocomplete="off" id="Materia" required class="input">
              <label for="Materia" class="input-label">Nombre de la asignatura</label>
            </div>

            <div class="input-group">
              <input type="time" name="HoraInicio" autocomplete="off" id="HoraInicio" required class="input">
              <label for="HoraInicio" class="input-label">Hora de inicio</label>
            </div>

            <div class="input-group">
              <input type="time" name="HoraFinal" autocomplete="off" id="HoraFinal" required class="input">
              <label for="HoraFinal" class="input-label">Hora de final</label>
            </div>

          </div>

          <div class="expositores">
            <!-- Codigo de el select menu -->
            <div class="opcionesExpositores">
              <div class="container">
                <h2>Expositores</h2>

                <div class="select-box" style="margin-top: -25px">

                  <div class="options-container">
                  </div>

                  <div class="selected">
                    Seleccione los integrantes del equipo
                  </div>

                  <div class="search-box">
                    <input type="text" placeholder="Ingresa un nombre..." />
                  </div>

                </div>

              </div>

            </div>
            <!-- Código del contenedor de nombres -->
            <div class="contanerPersonas">
                <h2 style="margin-bottom: -5px;">Integrantes del equipo</h2>
              <div class="containerP">
                

              </div>
            </div>

          </div>

          <div class="asesores">
            <!-- Codigo de el select menu -->
            <div class="opcionesAsesores">

              <div class="container2">
                <h2>Asesores de proyecto</h2>

                <div class="select-box2" style="margin-top: -25px;">
                  <div class="options-container2">

                  </div>

                  <div class="selected2">
                    Selecciona los asesores del proyecto
                  </div>

                  <div class="search-box2">
                    <input type="text" placeholder="Ingresa un nombre..." />
                  </div>
                </div>
              </div>

            </div>
            <!-- Código del contenedor de nombres -->
            <div class="containerAsistentes">
              <h2 style="margin-bottom: -5px;">Lista de asistentes del proyecto</h2>
              <div class="container2P">
                
              </div>
            </div>

          </div>

          <div class="botones">
            <input type="button" class="btn" name="btn-buscar" id="btn-buscar" value="Buscar registro">
            <input type="button" class="btn" name="btn-actualizar" id="btn-actualizar" value="Actualizar Registro">
            <input type="submit" class="btn" name="btn-enviar" id="btn-enviar" value="Ingresar registro">
            <input type="button" class="btn" name="btn-eliminar" id="btn-eliminar" value="Eliminar registro">
          </div>

        </form>
      </div>

      <!-- Sección para la consulta del programa de exposistemas -->
      <div class="card">

        <h2>Consulta del programa exposistemas</h2>
        <article class="contenedor-tabla">

          <table class="table-cebra">

            <thead>
              <tr>
                <th class="sticky"> Numero de actividad </th>

                <th> Nombre de actividad </th>

                <th> Descripción </th>

                <th> Hora de Inicio </th>

                <th> Expositores </th>

                <th>Asesores</th>

                <th>Materia</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <?php
                    include_once("CRUD/CRUD_bd_general.php");
                    $con=new CRUD_general();
                    $con->conexionBD();
                
                    $consulta_evento  = "SELECT DISTINCT  evento.no_evento, evento.evento, evento.descripcion, 
                    evento.hora_inicio, asesores_evento.materia 
                    FROM evento, asesores_evento 
                    WHERE evento.no_evento = asesores_evento.no_evento ORDER BY evento.no_evento ASC";
                    $resultadoE = $con->MOSTRAR($consulta_evento);

                    $consulta_asesores = "SELECT DISTINCT docentes.nombre, docentes.paterno 
                    FROM asesores_evento, docentes, evento WHERE evento.no_evento = :numero 
                    AND evento.no_evento = asesores_evento.no_evento 
                    AND docentes.rfc = asesores_evento.rfc";

                    $consulta_alumnos = "SELECT DISTINCT alumnos.nombre, alumnos.paterno
                    FROM evento, evento_alumnos, alumnos 
                    WHERE evento.no_evento = :numero
                    AND evento.no_evento = evento_alumnos.no_evento 
                    AND evento_alumnos.no_control = alumnos.no_control";

                    $consulta_externos = "SELECT DISTINCT ponentes_externos.nombre, ponentes_externos.paterno
                    FROM evento, ponentes_externos, evento_externos 
                    WHERE evento.no_evento = :numero AND evento.no_evento = evento_externos.no_evento 
                    AND evento_externos.correo = ponentes_externos.correo";


                    for($i=0;$i<count($resultadoE);$i++){?>
                      <td><?php echo $resultadoE[$i]['no_evento'];?></td>
                      <td><?php echo $resultadoE[$i]['evento'];?></td>
                      <td ><?php echo $resultadoE[$i]['descripcion'];?></td>
                      <td><?php echo $resultadoE[$i]['hora_inicio'];?></td>

                      <td><?php
                          $resultado_alumnos = $con->MOSTRAR($consulta_alumnos,[":numero"=>$resultadoE[$i]['no_evento']]);
                          for ($j=0; $j < count($resultado_alumnos); $j++) { 
                              echo $resultado_alumnos[$j]["nombre"]." " . $resultado_alumnos[$j]["paterno"]."<br>";
                          }
                          $resultado_externos = $con->MOSTRAR($consulta_externos,[":numero"=>$resultadoE[$i]['no_evento']]);
                          for ($j=0; $j < count($resultado_externos); $j++) { 
                              echo $resultado_externos[$j]["nombre"]." ". $resultado_externos[$j]["paterno"]."<br>";
                          }
                      ?></td>
                      <td><?php
                          $resultado_asesores = $con->MOSTRAR($consulta_asesores,[":numero"=>$resultadoE[$i]['no_evento']]);
                          for ($j=0; $j < count($resultado_asesores); $j++) { 
                              echo $resultado_asesores[$j]["nombre"]." ".$resultado_asesores[$j]["paterno"]."<br>";
                          }
                      ?></td>

                      <td><?php echo $resultadoE[$i]['materia'];?></td>
                  </tr>
              </tr>
          <?php
                }
          ?>
          </tr>
          </tbody>

          </table>
        </article>
        <div class="botones">
            <button class="btn" id="pdf" >Exportar PDF</button>
        </div>
      </div>

      <!-- Sección para el cambio de contraseña #######################################################-->
      <div class="card">
        <h2>Cambiar la contraseña</h2>
        
        <form action="" method="post" id="form2">

          <div class="campos">
            <div class="input-group">
              <input type="password" name="contraseña_anterior" autocomplete="off" id="contraseña_anterior" required class="input">
              <label for="contraseña_anterior" class="input-label">Contraseña</label>
            </div>

            <div class="input-group">
              <input type="password" name="nueva_contraseña" autocomplete="off" id="nueva_contraseña" required class="input">
              <label for="nueva_contraseña" class="input-label">Nueva contraseña</label>
            </div>

            <div class="input-group">
              <input type="password" name="confirma_contraseña" autocomplete="off" id="confirma_contraseña" required class="input">
              <label for="confirma_contraseña" class="input-label">Confirmar contraseña</label>
            </div>
            
          </div>

          <div class="botones">
              <input type="submit" class="btn" name="btn-guardarC" id="btn-guardarC" value="Guardar">
          </div>

        </form>
      </div>

      <!-- Seccion para escanear los códigos QR -->
      <div class="card">
        <h2>Escanear código QR</h2>
        <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
        <label id="titulo">Escanea el codigo QR</label>
        <!-- visualizacion de la camara -->
        <div id="video">
          <video id="previsualizacion" width="50%"></video>
        </div>
        <form action="funcion.php" method="post" id="formulario" name="formulario">
          <label id="resultado">Resultado</label>
          <!-- caja de texto -->
          <div id="caja">
            <input type="text" id="text" v-model="content" onChange=actualizar>
          </div>
        </form>
        <!-- etiqueta script -->
        <script type="text/javascript">
          let scanner = new Instascan.Scanner({
            video: document.getElementById('previsualizacion')
          });

          Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
              scanner.start(cameras[0]);
            } else {
              console.error("No se encontraron cámaras");
              alert("no se han encontrado camaras");
            }
          }).catch(function(e) {
            console.error(e);
            alert("ERROR:" + e);
          });
          /* mandar el resultado de qr a caja de texto */
          scanner.addListener('scan', function(c) {
            let recurso = document.getElementById('text').value = c;
            var formulario = document.getElementById('formulario');
            var datos = new FormData(formulario);
            console.log(datos);
            console.log(datos.get('text'));
            datos.append("text",c);
            fetch('Paginas/funcion.php', {
              method: 'POST',
              body: datos
            })
          });
        </script>
      </div>
      
      <!-- Seccion para escanear los códigos QR -->
      <div class="card">
        <h2>Limpiar base de datos</h2>
        <button class="btn delete" id="botonEliminarBd" >ELMINAR BASE DE DATOS</button>
      </div>
    </article>

  </section>
  <!-- Importacion de los íconos de Ionic -->
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

  <script src="SesionesUsuario/session_expiracion.js"></script>
  <script src="js/MiJavaScript.js"></script>
  <script src="js/passwords.js"></script>
  <script src="js/toast_alert.js"></script>
  <script src="js/generarPdf.js"></script>
  <script src="js/eliminarBD.js"></script>
</body>

</html>