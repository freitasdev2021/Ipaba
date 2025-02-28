<?php

require_once("controller.php");

class Home extends Controller{
    public function index() {
        include VIEW.'home.php';
    }
}
