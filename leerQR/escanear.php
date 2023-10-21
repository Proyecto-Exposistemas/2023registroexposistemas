<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <!-- <script scr="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script scr="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script> -->
</head>
<body>
    <!-- estilo de los elemntos -->
    <style>
        #previsualizacion {
            margin-left: 25%;
        }
        #text{
            margin-left: 40%;
            border-radius: 50px;
            border: 2px solid black;
            border-color: blue;
        }
        #titulo{
            margin-left: 40%;
           
        }
        #resultado{
            margin-left: 45%;
            
        }
    </style>

    <label id="titulo">Escanea el codigo QR</label>
<!-- visualizacion de la camara -->
    <div id="video">
    <video id="previsualizacion" width="50%"></video>
    </div>

    <label id="resultado">Resultado</label>
<!-- caja de texto -->
    <div id="caja">
        <input type="text" id="text" v-model="content">
    </div>
<!-- etiqueta script -->
    <script type="text/javascript">
        let scanner = new Instascan.Scanner({
        video: document.getElementById('previsualizacion')
    }); 
     Instascan.Camera.getCameras().then(function(cameras){
        if(cameras.length > 0){
            scanner.start(cameras[0]);
        }else{
            console.error("No se encontraron cámaras");
            alert("no se han encontrado camaras");
        } 
    }).catch(function(e){
        console.error(e);
        alert("ERROR:"+ e);
    });
    /* mandar el resultado de qr a caja de texto */
    scanner.addListener('scan', function(c){
        document.getElementById('text').value = c;
    });
    </script>
</body>
</html>