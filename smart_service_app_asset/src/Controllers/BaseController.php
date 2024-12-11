<?php
namespace Controllers;

class BaseController
{
    protected function loadView($view, $data = [])
    {
        extract($data);
        include __DIR__ . '/../Views/' . $view . '.php';
    }
}