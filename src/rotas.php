<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

require"controllers/controller.php";
require"controllers/home.php";
require"controllers/licitacoes.php";
require"controllers/legislacao.php";
require"controllers/diario.php";
require"controllers/contas.php";

$rotas = [
    "/" => "Home@index",
    "/Licitacoes"=> "Licitacoes@index",
    "/Legislacao"=> "Legislacao@index",
    "/Diario"=> "Diario@index",
    "/Contas" => "Contas@index",
    "/Extratos" => "Contas@extratos",
    "/OSCS" => "Contas@oscs"
];

$uri = $_SERVER['REQUEST_URI'];
if (isset($rotas[$uri])) {
    [$classe, $metodo] = explode('@', $rotas[$uri]); 
    $controller = new $classe();
    return $controller->$metodo();
}else{
    echo "Erro 404";
}
