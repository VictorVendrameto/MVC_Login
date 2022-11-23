<?php

namespace Controller;

abstract class Controller
{
    protected static function render($view, $model = null)
    {
        $arquivo_views = VIEWS . $view . ".php";

        if(file_exists($arquivo_views))
            include $arquivo_views;
        else
            exit("Arquivo da view não encontrado. Arquivo: " . $view);
    }

    protected static function isAuthenticated()
    {
        if(!isset($_SESSION["user_log"]))
            header("location: /login");   
    }
}