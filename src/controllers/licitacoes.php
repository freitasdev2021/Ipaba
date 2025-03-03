<?php

require_once("controller.php");

class Licitacoes{
    public function index(){
        Controller::viewSite('licitacoes/licitacoes.html',[
            "Nome" => "Max",
            "Gostos" => ['Carros','Jogos','WWE']
        ]);
    }
}