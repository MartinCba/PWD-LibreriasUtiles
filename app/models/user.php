<?php

include_once("../../models/connector/BaseDatos.php");

class user {

    private $mail;
    private $nombre;
    private $contraseña;
    private $msjOperacion;


    public function __construct() {
        $this->mail = "";
        $this->nombre = "";
        $this->contraseña = "";
        $this->msjOperacion = "";
    }

    public function setear($mail,$nombre,$contraseña)
    {

        $this->setMail($mail);
        $this->setNombre($nombre);
        $this->setContraseña($contraseña);
    }


    public function getNombre() {
        return $this->nombre;
    }

    public function getMail() {
        return $this->mail;
    }

    public function getContraseña() {
        return $this->contraseña;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setMail($mail) {
        $this->mail = $mail;
    }

    public function setContraseña($contraseña) {
        $this->contraseña = $contraseña;
    }
    public function getMsjOperacion()
    {
        return $this->msjOperacion;
    }
    public function setMsjOperacion($valor)
    {
        $this->msjOperacion = $valor;
    }

        // Funciones

    /**
     * Toma el atributo donde está cargado el mail del objeto y lo utiliza para realizar
     * una consulta a la base de datos con el objetivo de actualizar el resto de los atributos del objeto.
     * Retora un booleano que indica el éxito o falla de la operación
     * 
     * @return boolean
     */
    public function cargar()
    {
        $exito = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM user WHERE mail = " . $this->getMail();

        //Verifica si esta activa la base de datos
        if ($base->Iniciar()) {

            //Ejercuta la consulta (en este caso es un select, debe devolver un arreglo de registros)
            $res = $base->Ejecutar($sql);

            //Si $res es mayor a -1 quiere decir que la consulta se ejecuto con éxito
            if ($res > -1) {

                //Si $res es mayor a 0 quiere decir que la consulta genero al menos 1 registro
                if ($res > 0) {

                    /*Guardo en el arreglo $row el resultado del primer registro obtenido y seteo
                    esos valores al objeto user actual*/
                    $row = $base->Registro();

                    $this->setear($row['mail'], $row['nombre'], $row['contraseña']);
                    $exito = true;
                }
            }
        } else {
            $this->setMsjOperacion("User->listar: " . $base->getError());
        }
        return $exito;
    }

    /**
     * Esta función lee los valores actuales de los atributos del objeto e inserta un nuevo
     * registro en la base de datos a partir de ellos.
     * Retorna un booleano que indica si le operación tuvo éxito
     * 
     * @return boolean
     */
    public function insertar()
    {

        $resp = false;
        $base = new BaseDatos();


        $sql = "INSERT INTO user(mail, nombre, contraseña) VALUES(
            '" . $this->getMail() . "', 
            '" . $this->getNombre() . "', 
            '" . $this->getContraseña() . "'
            );";
            

        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMsjOperacion("User->insertar: " . $base->getError());
            }
        } else {
            $this->setMsjOperacion("User->insertar: " . $base->getError());
        }
        return $resp;
    }

    /**
     * Esta función lee los valores actuales de los atributos del objeto y los actualiza en la
     * base de datos.
     * Retorna un booleano que indica si le operación tuvo éxito
     * 
     * @return boolean
     */
    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();

        $sql = "UPDATE user SET 
        nombre = '" . $this->getNombre() . "', 
        contraseña = " . $this->getContraseña() . ", 
        WHERE mail = '" . $this->getMail() . "'";

        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMsjOperacion("User->modificar: " . $base->getError());
            }
        } else {
            $this->setMsjOperacion("User->modificar: " . $base->getError());
        }
        return $resp;
    }

    /**
     * Esta función lee el id actual del objeto y si puede lo borra de la base de datos
     * Retorna un booleano que indica si le operación tuvo éxito
     * 
     * @return boolean
     */
    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();

        $sql = "DELETE FROM user WHERE Mail = '" . $this->getMail() . "'";

        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setMsjOperacion("User->eliminar: " . $base->getError());
            }
        } else {
            $this->setMsjOperacion("User->eliminar: " . $base->getError());
        }
        return $resp;
    }


        /**
     * Esta función recibe condiciones de busqueda en forma de consulta sql para obtener
     * los registros requeridos.
     * Si por parámetro se envía el valor "" se devolveran todos los registros de la tabla
     * 
     * La función devuelve un arreglo compuesto por todos los objetos que cumplen la condición indicada
     * por parámetro
     * 
     * @return array
     */
    public function listar($parametro)
    {
        $arreglo = array();
        $base = new BaseDatos();

        $sql = "SELECT * FROM user ";

        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }

        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {

                while ($row = $base->Registro()) {

                    $obj = new user();
                    $obj->setear(
                        $row['mail'],
                        $row['nombre'],
                        $row['contraseña']
                    );
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setMsjOperacion("User->listar: " . $base->getError());
        }
        return $arreglo;
    }




}

?>
