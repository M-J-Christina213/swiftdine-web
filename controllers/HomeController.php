<?php
// controllers/HomeController.php

class HomeController {
    public function index() {
        require_once __DIR__ . '../views/user/home.php';
    }
}