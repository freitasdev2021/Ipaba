<?php

require_once("controller.php");

class Legislacao{
    public function index(){
        Controller::viewSite('legislacao/leis.html',[
            "Nome" => "Max",
            "Gostos" => ['Carros','Jogos','WWE']
        ]);
    }
}