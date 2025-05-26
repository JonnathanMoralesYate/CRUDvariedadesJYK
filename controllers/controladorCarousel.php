<?php

require_once('./models/modeloCarousel.php');
require_once('./models/modeloProducto.php');
require_once('./config/conexionBDJYK.php');

class ControladorCarousel
{
    private $db;
    private $modeloCarousel;
    private $modeloProducto;

    public function __construct()
    {
        $database = new DataBase();
        $this->db = $database->getConnectionJYK();
        $this->modeloCarousel = new ModeloCarousel($this->db);
        $this->modeloProducto = new ModeloProducto($this->db);
    }

    //Registro de Promociones
    public function registroPromociones($idProducto, $descrpcion)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $idProducto = $_POST['nomClase'];
            $descrpcion = $_POST['nomClase'];

            $this->modeloCarousel->registroCarousel($idProducto, $descrpcion);

            echo "
                        <script>
                            alert('Registro Exitoso!');
                            window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=registroClase';
                        </script>
                        ";
            exit;
        }
        $this->modeloCarousel->registroCarousel($idProducto, $descrpcion);
    }

    //Consulta general carousel
    public function consultarCarousel()
    {
        return $this->modeloCarousel->consultGenCarousel();
    }
}
