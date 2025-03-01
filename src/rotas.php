<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

require"controllers/controller.php";
require"controllers/home.php";
$rotas = [
    "/" => "Home@index"
];

$uri = $_SERVER['REQUEST_URI'];
if (isset($rotas[$uri])) {
    [$classe, $metodo] = explode('@', $rotas[$uri]); 
    $controller = new $classe();
    return $controller->$metodo();
}else{
    echo "Erro 404";
}
