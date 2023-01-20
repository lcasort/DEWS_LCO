<?php

class PokemonController
{
    ///////////////////////////////////////////////////////////////////////////
    //////////////////////////////// VARIABLES ////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    private $system_messages;

    ///////////////////////////////////////////////////////////////////////////
    /////////////////////////////// CONSTRUCTOR ///////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    public function __construct()
    {
        if(isset($_SESSION['system_messages'])) {
            $this->system_messages = $_SESSION['system_messages'];
        } else {
            $this->system_messages = '';
        }
    }

    ////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////// METHODS //////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    public function list($params)
    {
        $system_messages = $this->system_messages;
        $data = [];

        // Comprobamos si existe el modelo.
        if(is_file('./app/models/PokemonModel.php')) {
            // Instanciamos el modelo.
            $pokemonModel = new PokemonModel();
            // Llamamos a la función getAllPokemons.
            $data = $pokemonModel->getAllPokemons();
        } else {
            throw new Exception('No se encuentra el modelo.');
        }

        // Comprobamos si existe la vista.
        if(is_file('./app/views/listPokemons.tpl.php')) {
            // CON RUTA RELATIVA
            require_once('./app/views/listPokemons.tpl.php');
            
            // CON RUTA ABSOLUTA
            /*
            // Obtenemos la ruta absoluta del archivo que queremos cargar.
            $rute = RUTE_APP . '/views/listPokemons.tpl.php';
            // Instanciamos desde la ruta absoluta.
            require_once($rute);
            */
        } else {
            throw new Exception('No existe la vista solicitada.');
        }

        $_SESSION['system_messages'] = '';
        
    }

    public function listType($params)
    {
        $system_messages = $this->system_messages;
        $data = [];

        // Comprobamos si existe el modelo.
        if(is_file('./app/models/PokemonModel.php')) {
            // Instanciamos el modelo.
            $pokemonModel = new PokemonModel();
            // Llamamos a la función getAllPokemons.
            $data = $pokemonModel->getAllTypePokemons($params['type']);

            if(!$data) {
                $this->system_messages = 'No se encuentra el tipo especificado.';
                $system_messages = $this->system_messages;
                $_SESSION['system_messages'] = $this->system_messages;
                header('Location: ./?controller=Pokemon&method=list');
            }
        } else {
            throw new Exception('No se encuentra el modelo.');
        }

        // Comprobamos si existe la vista.
        if(is_file('./app/views/listTypePokemons.tpl.php')) {
            // CON RUTA RELATIVA
            require_once('./app/views/listTypePokemons.tpl.php');

            // CON RUTA ABSOLUTA
            /*
            // Obtenemos la ruta absoluta del archivo que queremos cargar.
            $rute = RUTE_APP . '/views/listPokemons.tpl.php';
            // Instanciamos desde la ruta absoluta.
            require_once($rute);
            */
        } else {
            throw new Exception('No existe la vista solicitada.');
        }
        
        $_SESSION['system_messages'] = '';
    }

    public function view($params) {
        $system_messages = $this->system_messages;
        $data = [];

        // Si no existe el parámetro id, lanzamos una nueva excepción.
        if(!isset($params['id'])) {
            $this->system_messages = 'Se necesita el parámetro id para acceder a la vista del pokémon.';
            $_SESSION['system_messages'] = $this->system_messages;
            header('Location: ./?controller=Pokemon$method=list');
        // Si el parámetro id no es un número entero, lanzamos un nueva excepción.
        } else if(!ctype_digit($params['id'])) {
            $this->system_messages = 'El parámetro id introducido no es válido.';
            $_SESSION['system_messages'] = $this->system_messages;
            header('Location: ./?controller=Pokemon&method=list');
        }

        // Comprobamos si existe el modelo.
        if(is_file('./app/models/PokemonModel.php')) {
            // Instanciamos el modelo.
            $pokemonModel = new PokemonModel();
            // Llamamos a la función getAllPokemons.
            $data = $pokemonModel->getPokemon($params['id']);
        } else {
            throw new Exception('No se encuentra el modelo.');
        }

        // Comprobamos si existe la vista.
        if(is_file('./app/views/pokemon.tpl.php')) {
            require_once('./app/views/pokemon.tpl.php');
        } else {
            throw new Exception('No existe la vista solicitada.');
        }

        $_SESSION['system_messages'] = '';
    }

    public function delete($params) {
        $system_messages = $this->system_messages;
        if(isset($_POST['delete']) && !empty($_POST['delete'])) {
            // Obtenemos el id del pokemon a borrar.
            $id = array_keys($_POST['delete'])[0];

            // Comprobamos que el id pasado por el post es un número entero.
            if(!ctype_digit($id)) {
                $this->system_messages = 'El id no es válido.';
            }

            // Comprobamos si existe el modelo.
            if(is_file('./app/models/PokemonModel.php')) {
                // Instanciamos el modelo.
                $pokemonModel = new PokemonModel();
                // Llamamos a la función getAllPokemons.
                if($data = $pokemonModel->deletePokemon($id)) {
                    $this->system_messages = 'Pokemon eliminado.';
                    $_SESSION['system_messages'] = $this->system_messages;
                } else {
                    $this->system_messages = 'El pokemon a eliminar no existe.';
                    $_SESSION['system_messages'] = $this->system_messages;
                }
            } else {
                throw new Exception('No se encuentra el modelo.');
            }
        }

        header('Location: ./?controller=Pokemon&method=list');
    }

    public function add($params) {
        
    }

    public function form() {
        // Comprobamos si existe la vista.
        if(is_file('./app/views/addPokemonForm.tpl.php')) {
            require_once('./app/views/addPokemonForm.tpl.php');
        } else {
            throw new Exception('No existe la vista solicitada.');
        }
    }
}