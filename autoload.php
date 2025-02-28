<?php

spl_autoload_register(function ($classe) {
    $caminho = __DIR__ . "/src/" . str_replace("\\", "/", $classe) . ".php";

    if (file_exists($caminho)) {
        require_once $caminho;
    } else {
        echo "Erro: Arquivo da classe '$classe' não encontrado!";
    }
});
