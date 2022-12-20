<?php

class Core
{
    ////////////////////////////////////////////////////////////////////////////
    //////////////////////////////// VARIABLES /////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    protected $controller = 'pokemon';
    protected $method = 'list';
    protected $parameters = [];

    ////////////////////////////////////////////////////////////////////////////
    /////////////////////////////// CONSTRUCTOR ////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    public function __construct()
    {
        // Sobreescribimos el controlador actual y el método
        // que hay por defecto.
        if(isset($_GET['controller']) && !empty($_GET['controller'])) {
            $this->controller = filter_var($_GET['controller'], FILTER_SANITIZE_URL);
        }
        if(isset($_GET['method']) && !empty($_GET['method'])) {
            $this->method = filter_var($_GET['method'], FILTER_SANITIZE_URL);
        }
        // Guardamos el resto de parámetros en un array (clave => valor).
        $parameters = array_filter(
            $_GET,
            fn($elem)=>!in_array($elem, ['controller','method']),
            ARRAY_FILTER_USE_KEY
        );
        // Sobrescribimos los parámetros por defecto.
        $this->parameters = filter_var_array($parameters, FILTER_SANITIZE_URL);


        ////////////////////////////////////////////////////////////////////////
        //                        MANAGING CONTROLLERS                        //
        ////////////////////////////////////////////////////////////////////////
        // Comprobamos si existe el controlador.
        if(is_file('./app/controllers/'.ucfirst($this->controller).'Controller.php')) {
            require_once('./app/controllers/'.ucfirst($this->controller).'Controller.php');

            // Instanciamos el controlador.
            $className = ucfirst($this->controller).'Controller';
            $this->controller = new $className();
        } else {
            // Controlamos los errores en caso de que el controlador no exista.
            header('HTTP/1.0 404 Not Found', true, 404);
        }

        ////////////////////////////////////////////////////////////////////////
        //                          MANAGING METHODS                          //
        ////////////////////////////////////////////////////////////////////////
        if(method_exists($this->controller, $this->method)) {
            $actMethod = $this->method;
            $this->controller->$actMethod($this->parameters);
        }
    }
} 