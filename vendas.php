<?php
require "headers.php";
require_once "./controllers/VendaController.php";
require_once "./models/VendaModel.php";

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $model = new VendaModel();
        $controller = new VendaController($model);
        $controller->getAllVendas();
        break;
    case 'POST':
        // código a ser executado para requisições POST
        break;
    case 'PUT':
        // código a ser executado para requisições PUT
        break;
    case 'DELETE':
        // código a ser executado para requisições DELETE
        break;
    default:
        // código a ser executado para qualquer outro tipo de requisição
        break;
}