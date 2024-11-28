<?php
include_once("../../utils/functions.php");


$datos = dataSubmitted();
$userAbm = new userAbm();


switch ($datos["tipoVerificacion"]) {
        //crear cuenta nueva
    case 1:
        //codigo correcto
        if ($datos["codigo"] == $datos["codigoSV"]) {
            //primero verifico que el mail NO existe
            if ($userAbm->createUser($datos["name"], $datos["password"], $datos["email"])) {
?>
                <title>Redireccionando...</title>
                <script>
                    alert("Registrado correctamente. por favor inicie sesión!")
                    window.location.href = "http://localhost/PWD-LIBRERIAS-UTILES/app/views/paginas/login.php";
                </script>
            <?php
            };
        } else {
            ?>
            <script>
                alert("Error: codigo incorrecto")
                window.location.href = "http://localhost/PWD-LIBRERIAS-UTILES/app/views/paginas/register.php";
            </script>
            <?php
        }



        break;
        //validar usuario
    case 2:
        //primero verifico que el mail existe
        if ($userAbm->usuarioExiste($datos["email"])) {
            //busco el nombre 
            $user = $userAbm->obtenerDatosUserPorMail($datos["email"]);
            //contraseña correcta
            if ($user["contraseña"] == $datos["password"]) {
            ?>
                <script>
                    function desloguear() {
                        sessionStorage.removeItem('email');
                        sessionStorage.removeItem('name');
                        sessionStorage.removeItem('password');
                    }

                    function loguear(email, name, password) {
                        sessionStorage.setItem('email', email);
                        sessionStorage.setItem('name', name);
                        sessionStorage.setItem('password', password);
                    }

                    const email = <?php echo json_encode($user["mail"]); ?>;
                    const name = <?php echo json_encode($user["nombre"]); ?>;
                    const password = <?php echo json_encode($user["contraseña"]); ?>;
                    if (sessionStorage.getItem('email') != null) {
                        desloguear();
                        loguear(email, name, password);
                    } else {
                        loguear(email, name, password);
                    }
                    window.location.href = "http://localhost/PWD-LIBRERIAS-UTILES/app/views/actions/homeAction.php";
                </script>
            <?php
            //contraseña incorrecta
            }else{
                ?>
                <script>
                    alert("Error: Mail o contraseña incorrecta (contraseña)")
                    window.location.href = "http://localhost/PWD-LIBRERIAS-UTILES/app/views/paginas/login.php";
                </script>
                <?php
            }
        }else{
            ?>
            <script>
                alert("Error: Mail no existente")
                window.location.href = "http://localhost/PWD-LIBRERIAS-UTILES/app/views/paginas/register.php";
            </script>
            <?php
        }
        break;
        case 3:
            //primero verifico que el codigo se ingreso bien
        if ($datos["codigo"] == $datos["codigoSV"]) {
            $msg = $userAbm->mandarCodigo($datos["email"],"contraseña");
            echo $msg;

            ?>
            <script>
                alert("Cuenta verificada, por favor revise su mail.")
                window.location.href = "http://localhost/PWD-LIBRERIAS-UTILES/app/views/paginas/login.php";
            </script>
            <?php
            

            
            
        }else{
            ?>
            <script>
                alert("Error: Codigo incorrecto")
                window.location.href = "http://localhost/PWD-LIBRERIAS-UTILES/app/views/paginas/lostPassword.php";
            </script>
            <?php
        }
            break;
}
