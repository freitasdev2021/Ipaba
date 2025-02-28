<?php
require"controllers/controller.php";
require"controllers/home.php";
$rotas = [
    "/" => "Home@index"
];

$uri = $_SERVER['REQUEST_URI'];
if (isset($rotas[$uri])) {
    [$classe, $metodo] = explode('@', $rotas[$uri]);
    // Adiciona o namespace correto antes da classe
    
    
    if (class_exists($classe) && method_exists($classe, $metodo)) {
        $controller = new $classe();
        return $controller->$metodo();
    } else {
        echo "Erro: Classe ou método não encontrados.";
    }
}else{
    echo "Rota Inexistente";
}
