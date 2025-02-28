<?php

require_once("controller.php");

class Home extends Controller{
    public function index() {
        Controller::viewSite('home.html',[
            "Nome" => "Max",
            "Gostos" => ['Carros','Jogos','WWE']
        ]);
    }
}
