<?php

class Core
{
    ////////////////////////////////////////////////////////////////////////////
    //////////////////////////////// VARIABLES /////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    protected $controller = 'pokemon';
    protected $method = 'list';
    protected $server = 'db';
    protected $parameters = [];

    ////////////////////////////////////////////////////////////////////////////
    /////////////////////////////// CONSTRUCTOR ////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    public function __construct()
    {
        // Sobreescribimos el controlador actual, el método y el
        // servidor por defecto.
        if(isset($_GET['controller']) && !empty($_GET['controller'])) {
            $this->controller = filter_var($_GET['controller'], FILTER_SANITIZE_URL);
        }
        if(isset($_GET['method']) && !empty($_GET['method'])) {
            $this->method = filter_var($_GET['method'], FILTER_SANITIZE_URL);
        }
        if(isset($_GET['server']) && !empty($_GET['server'])) {
            $this->server = filter_var($_GET['server'], FILTER_SANITIZE_URL);
        }

        // Guardamos el resto de parámetros en un array (clave => valor).
        $parameters = array_filter(
            $_GET,
            fn($elem)=>!in_array($elem, ['controller','method','server']),
            ARRAY_FILTER_USE_KEY
        );
        // Sobrescribimos los parámetros por defecto.
        $this->parameters = filter_var_array($parameters, FILTER_SANITIZE_URL);

        // Guardamos en los parámetros el servidor que vamos a usar.
        $this->parameters['server'] = strtolower($this->server);


        ////////////////////////////////////////////////////////////////////////
        //                        MANAGING CONTROLLERS                        //
        ////////////////////////////////////////////////////////////////////////
        // Comprobamos si existe el controlador.
        if(is_file('./app/controllers/'.ucfirst($this->controller).'Controller.php')) {
            // Instanciamos el controlador.
            $className = ucfirst($this->controller).'Controller';
            $this->controller = new $className();
        } else {
            throw new Exception('No existe el controlador solicitado.');
        }

        ////////////////////////////////////////////////////////////////////////
        //                          MANAGING METHODS                          //
        ////////////////////////////////////////////////////////////////////////
        if(method_exists($this->controller, $this->method)) {
            // Instanciamos el método seleccionado y le pasamos los parámetros.
            $actMethod = $this->method;
            $this->controller->$actMethod($this->parameters);
        } else {
            throw new Exception('No existe el método solicitado.');
        }
    }
} 