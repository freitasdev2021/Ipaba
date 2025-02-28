<?php
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
