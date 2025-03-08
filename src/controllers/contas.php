<?php

require_once("controller.php");

class Contas{
    public function index(){
        Controller::viewSite('contas/contas.html',[
            "Nome" => "Max",
            "Gostos" => ['Carros','Jogos','WWE']
        ]);
    }

    public function extratos(){
        Controller::viewSite('contas/extratos.html',[
            "Nome" => "Max",
            "Gostos" => ['Carros','Jogos','WWE']
        ]);
    }

    public function oscs(){
        Controller::viewSite('contas/oscs.html',[
            "Nome" => "Max",
            "Gostos" => ['Carros','Jogos','WWE']
        ]);
    }
}