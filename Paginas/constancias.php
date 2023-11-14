<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Constancias</title>
  <link rel="stylesheet" href="../css/administrativo.css">
  <link rel="stylesheet" href="../css/toast_alert.css">

</head>

<body>

  <section class="container-general">
    <article class="navigation">
      <nav>
        <ul>

          <li>
            <a href="https://fabricaitszas.com/RegistroExposistemas/">
              <span class="icon">
                <ion-icon name="home-outline" id="LogoReturn"></ion-icon>
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

      <form action="" enctype="multipart/form-data" id="formulario">
        <h2>Constancias </h2>
        <div id="informacion" class="informacion"></div>

        <div class="campos">
          <h3>Seleccionar plantilla</h3>
          <input class="" type="file" accept=".docx" name="file" id="plantilla">
        </div>

        <div>
          <input class="btn" type="submit" value="Subir Archivo">
        </div>

      </form>

      <form action="" id="formulario_generar"><br>

        <div class="conte1">
          <a id="alumnos" href="../GeneradorConstancias/constancias/ConstanciasAlumnos.docx" download="ConstanciaAlumnos" hidden> Descargar constancia alumnos</a>

          <a id="docentes" href="../GeneradorConstancias/constancias/ConstanciasDocentes.docx" download="ConstanciaDocentes" hidden> Descargar constancia docentes</a>

          <a id="externos" href="../GeneradorConstancias/constancias/ConstanciasExternos.docx" download="ConstanciaExternos" hidden> Descargar constancia externos</a>

        </div>

        <input class="btn" type="submit" value="Generar constancia">

      </form>

      <form action="../php/excelConstancias.php" id="formulario_excel">
        <label>Seleccione la fecha del evento</label>
        <?php
        $fecha = date("Y") . '-' . date("m") . '-' . date("d");
        //echo $fecha;
        ?>
        <input type="date" id="fecha" name="fecha" value="<?php echo $fecha; ?>" min="<?php $fecha; ?>" max="<?php date("Y") . "-12-31" ?>">

        <input class="btn" type="submit" value="Generar excel">
      </form>

    </div>

  </section>
  <script src="../js/constancias.js"></script>
  <script src="../js/toast_alert.js"></script>
  <script src="../SesionesUsuario/session_expiracion.js"></script>
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
</body>

</html>