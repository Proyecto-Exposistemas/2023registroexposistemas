

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="" method="post">
        <p>Coloca el codigo mandado a tu correo</p>
        <input type="text" name="codigo" >
        <input type="submit" value="Enviar">
    </form>

</body>
</html>

<?php

if(isset($_POST['codigo'])){
    $codigo_escrito = $_POST['codigo'];

    if($codigo_escrito === $email->getCode()){

        echo "puedes establecer tu contraseña";
    }else{
        echo "puedes establecer tu contraseña";
    }
}
 
?>
