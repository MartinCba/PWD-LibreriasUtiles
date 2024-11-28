<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="../img/favicon.jpg" />
    <title>Registrar</title>
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
                    <h4>Formulario de registro</h4>
                </div>
                <div class="card-body">
                    <form action="../actions/registerAction.php" class="needs-validation" method="POST">
                        <!-- envio por oculto el tipo de verificacion que quiero usar -->
                        <input type="hidden" name="tipoVerificacion" value='1'>
                        <!-- -------------------------------------------------------- -->
                        <div class="mb-3 row justify-content-center">
                            <div class="col-md-6 col-lg-4">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control form-control-sm" name="email" id="email" required>
                                <div class="invalid-feedback">
                                    Por favor, ingresá tu Email.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row justify-content-center">
                            <div class="col-md-6 col-lg-4">
                                <label for="name">Nombre:</label>
                                <input type="text" class="form-control form-control-sm" name="name" id="name" required>
                                <div class="invalid-feedback">
                                    Por favor, ingresá tu nombre.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row justify-content-center">
                            <div class="col-md-6 col-lg-4">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control form-control-sm" name="password" id="password" required>
                                <div class="invalid-feedback">
                                    Por favor, ingresá tu contraseña.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row justify-content-center">
                            <div class="col-md-6 col-lg-4">
                                <label for="password2">Repetir Password:</label>
                                <input type="password" class="form-control form-control-sm" name="password2" id="password2" required>
                                <div class="invalid-feedback">
                                    Por favor, ingresá tu contraseña.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row justify-content-center">
                            <div class="col-md-6 col-lg-4">
                                <input type="submit" class="btn btn-warning btn-sm w-100" value="Registrar">
                            </div>
                        </div>
                    </form>
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-lg-4 text-center">
                            <a href="logIn.php" class="text-warning">Ya tenes cuenta?</a><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    include_once('../structure/footer.php');
    ?>

</body>

</html>