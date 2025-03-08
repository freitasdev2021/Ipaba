<?php

require_once("controller.php");

class Diario{
    public function index(){
        Controller::viewSite('diario/diario.html',[
            "Nome" => "Max",
            "Gostos" => ['Carros','Jogos','WWE']
        ]);
    }
}