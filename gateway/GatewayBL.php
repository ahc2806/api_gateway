<?php
    require_once './GatewayLayout.php';
    require_once '../dto/GatewayDTO.php';

    class GatewayBL {
        public $gatewayDTO;
        private $sakila;
        private $auth;

        public function __construct() {
            $this->gatewayDTO = new GatewayDTO();
            $this->sakila = 'https://api-sakila.herokuapp.com/';
            $this->auth = 'https://api-authorization.herokuapp.com/';
        }

        public function actor($peticion) {
            $actor = 'actores/actor/';

            switch ($peticion) {
                case 'GET': {
                    GatewayLayout::Request('GET', $this->gatewayDTO, $this->sakila.$actor.$this->gatewayDTO->id);
                    break;
                }
                case 'POST': {
                    GatewayLayout::Request('POST', $this->gatewayDTO, $this->sakila.$actor);
                    break;
                }
                case 'PUT': {
                    GatewayLayout::Request('PUT', $this->gatewayDTO, $this->sakila.$actor);
                    break;
                }
                case 'DELETE': {
                    GatewayLayout::Request('DELETE', $this->gatewayDTO, $this->sakila.$actor);
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
            $cat = 'categorias/categoria/';

            switch ($peticion) {
                case 'GET': {
                    GatewayLayout::Request('GET', $this->gatewayDTO, $this->sakila.$cat.$this->gatewayDTO->id);
                    break;
                }
                case 'POST': {
                    GatewayLayout::Request('POST', $this->gatewayDTO, $this->sakila.$cat);
                    break;
                }
                case 'PUT': {
                    GatewayLayout::Request('PUT', $this->gatewayDTO, $this->sakila.$cat);
                    break;
                }
                case 'DELETE': {
                    GatewayLayout::Request('DELETE', $this->gatewayDTO, $this->sakila.$cat);
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
            $film = 'peliculas/pelicula/';

            if($peticion == 'GET')
                GatewayLayout::Request('GET', $this->gatewayDTO, $this->sakila.$film.$this->gatewayDTO->id);
            else {
                $this->gatewayDTO->response = array('REQUEST' => 'Error', 'TEXT' => 'Peticion Incorrecta');
                echo json_encode($this->gatewayDTO->response, JSON_PRETTY_PRINT);
            }
        }
    
        public function usuario($peticion) {
            $users = 'usuario/';

            switch ($peticion) {
                case 'GET': {
                    return GatewayLayout::RequestToken('GET', $this->gatewayDTO, $this->auth.$users);
                    break;
                }
                case 'POST': {
                    GatewayLayout::Request('POST', $this->gatewayDTO, $this->auth.$users);
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