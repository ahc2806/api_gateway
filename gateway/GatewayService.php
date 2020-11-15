<?php
    require_once './GatewayBL.php';

    $gatewayBL = new GatewayBL();
    $gatewayDTO = new GatewayDTO();

    if(isset($_GET['id']) && !empty($_GET['id']))
        $gatewayDTO->id = $_GET['id'];
    else
        $gatewayDTO->id = '';
    
    $gatewayDTO->data = file_get_contents('php://input');

    $headers = apache_request_headers();
    if(isset($headers['Authorization'])) 
        $gatewayDTO->token = $headers['Authorization'];
    else 
        $gatewayDTO->token = '';

    $gatewayBL->gatewayDTO = $gatewayDTO;

    switch ($_GET['param']) {
        case 'actor': {
            if($gatewayBL->usuario('GET')>0)
                $gatewayBL->actor($_SERVER['REQUEST_METHOD']);
            else {
                $gatewayDTO->response = array('CODE' => 'Request', 'TEXT' => 'Token no valido');
                echo json_encode($gatewayDTO->response, JSON_PRETTY_PRINT);
            }
            break;
        }
        case 'categoria': {
            if($gatewayBL->usuario('GET')>0)
                $gatewayBL->categoria($_SERVER['REQUEST_METHOD']);
            else {
                $gatewayDTO->response = array('CODE' => 'Request', 'TEXT' => 'Token no valido');
                echo json_encode($gatewayDTO->response, JSON_PRETTY_PRINT);
            }
            break;
        }
        case 'pelicula': {
            if($gatewayBL->usuario('GET')>0)
                $gatewayBL->pelicula($_SERVER['REQUEST_METHOD']);
            else {
                $gatewayDTO->response = array('CODE' => 'Request', 'TEXT' => 'Token no valido');
                echo json_encode($gatewayDTO->response, JSON_PRETTY_PRINT);
            }
            break;
        }
        case 'usuario': {
            $gatewayBL->usuario($_SERVER['REQUEST_METHOD']);
            break;
        }
        default: {
            $gatewayDTO->response = array('CODE' => 'Error', 'TEXT' => 'La ruta no existe');
            echo json_encode($gatewayDTO->response, JSON_PRETTY_PRINT);
            break;
        }
    }
?>