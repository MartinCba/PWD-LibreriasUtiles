<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="../img/favicon.jpg" />
    <title>Inicio</title>
</head>

<body>
    <?php
    include_once('../structure/header.php');
    include_once("../../../config.php");
    ?>

    <div class="container card-container d-flex justify-content-center align-items-center" style="height: 80vh">
        <div class="card text-center bg-dark text-light" style="width: 68rem;">
            <div class="card-header">
                <img src="../img/PHPMailer.jpg" alt="logo">
            </div>
            <div class="card-body">

                <div class="mb-3">
                    <h4>¿Qué es PHPMailer?</h4>
                </div>
                <div class="card-body">
                    <p>Es una clase llena de funcionalidades para la creación y transferencia de correo electrónico en PHP.</p>
                    <p>Aunque PHP cuenta con la función básica <b>mail()</b>, PHPMailer es más fácil de usar y nos brinda una sintaxis orientada a objetos más limpia. Como también nos provee asistencia para hacer uso de funciones necesarias en la actualidad como encriptación, autenticación, mensajes HTML y archivos adjuntos.</p>
                    <p>Los usos más habituales para esta libreria son la de crear formularios de contactos donde los usuarios cargan la información y la podemos recibir a través de un correo. Y también para el envío de corros másivos configurados mediante programación.</p>
                </div>
                <div class="row justify-content-center">
                        <div class="col-md-6 col-lg-4 text-center">
                            <a href="https://docs.google.com/document/d/1Rer4aSoRU_moQe4WneEperxC3GV27gPCcsjZcoXYT3w/edit?tab=t.0" class="text-warning">Trabajo de investigación</a><br>
                            <a href="https://phpmailer.github.io/PHPMailer/" class="text-warning">Documentación PHPMailer</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <?php
    include_once('../structure/footer.php');
    ?>
</body>

</html>