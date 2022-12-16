<?php

class Core
{
    ///////////////////////////////////////////////////////////////////////////
    //////////////////////////////// VARIABLES ////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    protected $controller = 'pokemon';
    protected $method = 'index';
    protected $parameters = [];

    ///////////////////////////////////////////////////////////////////////////
    /////////////////////////////// CONSTRUCTOR ///////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    public function __construct()
    {
        // Sobreescribimos el controlador actual, el método y los parámetros
        // que hay por defecto.
        if(isset($_GET['controller']) && !empty($_GET['controller'])) {
            $this->controller = filter_var($_GET['controller'], FILTER_SANITIZE_URL);
        }
        if(isset($_GET['method']) && !empty($_GET['method'])) {
            $this->method = filter_var($_GET['method'], FILTER_SANITIZE_URL);
        }
        if(isset($_GET['parameters']) && !empty($_GET['parameters'])) {
            foreach ($_GET['parameters'] as $key => $value) {
                $this->parameters += [$key => filter_var($value, FILTER_SANITIZE_URL)];
            }
        }
    }
} 