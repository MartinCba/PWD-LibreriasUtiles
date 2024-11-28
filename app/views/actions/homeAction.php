<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="../img/favicon.jpg" />
    <title>Usuario registrado</title>
</head>

<body>
    <?php
    include_once('../structure/header.php');
    include_once("../../../config.php");
    ?>

    <main>
        <div class="container card-container d-flex justify-content-center align-items-center" style="height: 80vh">
            <div class="card text-center bg-dark text-light" style="width: 68rem;">
                <div class="card-header">
                    <img src="../img/PHPMailer.jpg" alt="logo" style="height: 50px;">
                    <h4>Usuario registrado</h4>
                </div>
                <div class="card-body">
                    <form action="../actions/verificacionAction.php" class="needs-validation">
                        <!-- envio por oculto el tipo de verificacion que quiero usar -->
                        <input type="hidden" name="tipoVerificacion" value='2'>
                        <!-- -------------------------------------------------------- -->
                        <div class="mb-3 row justify-content-center">
                            <div class="col-md-6 col-lg-4">
                                <h5>Nombre: <span id="name" class="text-warning"></span></h5>
                            </div>
                        </div>

                        <div class="mb-3 row justify-content-center">
                            <div class="col-md-6 col-lg-6">
                                <h5>Email: <span id="email" class="text-warning"></span></h5>
                            </div>
                        </div>

                        <div class="mb-3 row justify-content-center">
                            <div class="col-md-6 col-lg-4">
                                <h5>Contraseña: <span id="password" class="text-warning"></span></h5>
                            </div>
                        </div>

                        <div class="mb-3 row justify-content-center">
                            <div class="col-md-6 col-lg-4">
                            <a href="../../../index.php" class="btn btn-warning" onclick="desloguear()">Cerrar sesión</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            var name = sessionStorage.getItem('name');
            var email = sessionStorage.getItem('email');
            var password = sessionStorage.getItem('password');

            // Muestra los valores en el HTML
            document.getElementById('name').textContent = name;
            document.getElementById('email').textContent = email;
            document.getElementById('password').textContent = password;
        </script>

    </main>

    <script>
        function desloguear() {
            sessionStorage.removeItem('email');
            sessionStorage.removeItem('name');
            sessionStorage.removeItem('password');
        }
    </script>
    <?php
    include_once('../structure/footer.php');
    ?>
</body>

</html>