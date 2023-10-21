<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv='cache-control' content='no-cache'>
  <meta http-equiv='expires' content='0'>
  <meta http-equiv='pragma' content='no-cache'>
  <title>Ventana auxiliar código qr</title>
  <link rel="stylesheet" href="../css/logincopy.css">
</head>

<body>
  <div class="container" id="circulo">
    <div class="forms-container">
      <form action="">
        <div class="signin-signup">
            <h2>Toma tu QR</h2>
            <h4>Captura una screenshot de tu código</h4>

            <?php
                require 'phpqrcode/qrlib.php';

                $dir='temp/';
                $identificador=$_GET['identificador'];
                
                if(!file_exists($dir))
                        mkdir($dir);

                    $filename= $dir.'test.png';
                    
                    $tamanio=10;
                    $level='M';
                    $frameSize=3;
                    $contenido=$identificador;
                
                QRcode::png($contenido,$filename,$level,$tamanio,$frameSize);
                echo "POR FAVOR DESCARGA TU CODIGO QR";
                echo '<img src="'.$filename.'" />';
              ?>
        </div>
      </form>

      <form action=""></form>
    </div>

    <div class="panels-container">
      <div class="panel left-panel" id="panel1">

        <img src="../img/cross-platform-software-animate.svg" class="image" alt="" />
      </div>

      <div class="panel right-panel" id="panel2">
        <img src="./img/virtual-reality-animate.svg" class="image" alt="" />
      </div>

    </div>

  </div>

  <script src="js/app.js"></script>
  <script src="js/campos.js"></script>
  <script src="js/registro.js"></script>
  <!-- <script src="js/java.js"></script> -->
  <script src="../js/toast_alert.js"></script>

</body>

</html>