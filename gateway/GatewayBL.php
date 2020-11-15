<?php
    require_once './GatewayLayout.php';
    require_once '../dto/GatewayDTO.php';

    class GatewayBL {
        public $gatewayDTO;
        private $url;

        public function __construct() {
            $this->gatewayDTO = new GatewayDTO();
            $this->url = 'http://localhost/Workspace/';
        }

        public function actor($peticion) {
            $sakila = 'sakila/actores/actor/';

            switch ($peticion) {
                case 'GET': {
                    GatewayLayout::Request('GET', $this->gatewayDTO, $this->url.$sakila.$this->gatewayDTO->id);
                    break;
                }
                case 'POST': {
                    GatewayLayout::Request('POST', $this->gatewayDTO, $this->url.$sakila);
                    break;
                }
                case 'PUT': {
                    GatewayLayout::Request('PUT', $this->gatewayDTO, $this->url.$sakila);
                    break;
                }
                case 'DELETE': {
                    GatewayLayout::Request('DELETE', $this->gatewayDTO, $this->url.$sakila);
                    break;
                }
                default: {
                    $this->gatewayDTO->response = array('REQUEST' => 'Error', 'TEXT' => 'Peticion Incorrecta');
                    echo json_encode($this->gatewayDTO->response, JSON_PRETTY_PRINT);
                    break;
                }
            }
        }

        public function categoria($peticion) {
            $sakila = 'sakila/categorias/categoria/';

            switch ($peticion) {
                case 'GET': {
                    GatewayLayout::Request('GET', $this->gatewayDTO, $this->url.$sakila.$this->gatewayDTO->id);
                    break;
                }
                case 'POST': {
                    GatewayLayout::Request('POST', $this->gatewayDTO, $this->url.$sakila);
                    break;
                }
                case 'PUT': {
                    GatewayLayout::Request('PUT', $this->gatewayDTO, $this->url.$sakila);
                    break;
                }
                case 'DELETE': {
                    GatewayLayout::Request('DELETE', $this->gatewayDTO, $this->url.$sakila);
                    break;
                }
                default: {
                    $this->gatewayDTO->response = array('REQUEST' => 'Error', 'TEXT' => 'Peticion Incorrecta');
                    echo json_encode($this->gatewayDTO->response, JSON_PRETTY_PRINT);
                    break;
                }
            }
        }

        public function pelicula($peticion) {
            $sakila = 'sakila/peliculas/pelicula/';

            if($peticion == 'GET')
                GatewayLayout::Request('GET', $this->gatewayDTO, $this->url.$sakila.$this->gatewayDTO->id);
            else {
                $this->gatewayDTO->response = array('REQUEST' => 'Error', 'TEXT' => 'Peticion Incorrecta');
                echo json_encode($this->gatewayDTO->response, JSON_PRETTY_PRINT);
            }
        }
    
        public function usuario($peticion) {
            $usuario = 'usuarios/usuario/';

            switch ($peticion) {
                case 'GET': {
                    return GatewayLayout::RequestToken('GET', $this->gatewayDTO, $this->url.$usuario);
                    break;
                }
                case 'POST': {
                    GatewayLayout::Request('POST', $this->gatewayDTO, $this->url.$usuario);
                    break;
                }
                default: {
                    $this->gatewayDTO->response = array('REQUEST' => 'Error', 'TEXT' => 'Peticion incorrecta');
                    echo json_encode($this->gatewayDTO->response, JSON_PRETTY_PRINT);
                    break;
                }
            }
        }
    }
?>