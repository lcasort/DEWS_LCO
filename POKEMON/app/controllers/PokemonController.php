<?php

class PokemonController
{
    ///////////////////////////////////////////////////////////////////////////
    //////////////////////////////// VARIABLES ////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    private $system_messages;
    private $offset;

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

        if(isset($_SESSION['offset'])) {
            $this->offset = intval($_SESSION['offset']);
        } else {
            $this->offset = 0;
        }
    }

    ////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////// METHODS //////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    public function list($params)
    {
        $system_messages = $this->system_messages;
        $data = [];
        $server = '';

        // Comprobamos si existe el modelo.
        if(is_file('./app/models/PokemonModel.php')) {
            // Instanciamos el modelo.
            $pokemonModel = new PokemonModel();

            if($params['server'] === 'api') {
                $server = $params['server'];
                $_SESSION['offset'] = 0;
                $offset = 0;
                // Llamamos a la función getAllPokemonsFromAPI.
                $data = $pokemonModel->getAllPokemonsFromAPI($offset);
            } else if($params['server'] === 'db') {
                $server = $params['server'];
                // Llamamos a la función getAllPokemons.
                $data = $pokemonModel->getAllPokemons();
            } else {
                $this->system_messages = 'El servidor seleccionado no existe. Mostrando datos desde la base de datos local...';
                $_SESSION['system_messages'] = $this->system_messages;
                header('Location: ./');
            }
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

    public function listPaginated($params)
    {
        $system_messages = $this->system_messages;
        $data = [];
        $server = '';

        // Comprobamos si existe el modelo.
        if(is_file('./app/models/PokemonModel.php')) {
            // Instanciamos el modelo.
            $pokemonModel = new PokemonModel();

            if($params['server'] === 'api') {
                $server = $params['server'];

                $offset = $_SESSION['offset'] + 15;
                $this->offset = $offset;
                // Llamamos a la función getAllPokemonsFromAPI.
                $data = $pokemonModel->getAllPokemonsFromAPI($offset);
            } else if($params['server'] === 'db') {
                $server = $params['server'];
                // Llamamos a la función getAllPokemons.
                $data = $pokemonModel->getAllPokemons();
            } else {
                $this->system_messages = 'El servidor seleccionado no existe. Mostrando datos desde la base de datos local...';
                $_SESSION['system_messages'] = $this->system_messages;
                header('Location: ./');
            }
        } else {
            throw new Exception('No se encuentra el modelo.');
        }

        $_SESSION['system_messages'] = '';
        $_SESSION['offset'] = $this->offset;

        echo json_encode($data, JSON_FORCE_OBJECT);
    }

    public function listType($params)
    {
        $system_messages = $this->system_messages;
        $data = [];
        $server = $params['server'];

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
        $server = '';

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

            if($params['server'] === 'api') {
                $server = $params['server'];
                // Llamamos a la función getAllPokemonsFromAPI.
                $data = $pokemonModel->getPokemonAPI($params['id']);
            } else if($params['server'] === 'db') {
                $server = $params['server'];
                // Llamamos a la función getAllPokemons.
                $data = $pokemonModel->getPokemon($params['id']);
            } else {
                $this->system_messages = 'El servidor seleccionado no existe. Mostrando datos desde la base de datos local...';
                $_SESSION['system_messages'] = $this->system_messages;
                header('Location: ./');
            }
            
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

    public function addFromAPI($params) {
        $system_messages = $this->system_messages;
        $server = $params['server'];

        if(isset($_POST['add']) && !empty($_POST['add'])) {
            // Obtenemos el id del pokemon a borrar.
            $id = array_keys($_POST['add'])[0];

            // Comprobamos que el id pasado por el post es un número entero.
            if(!ctype_digit($id)) {
                $this->system_messages = 'El id no es válido.';
            }

            // Comprobamos si existe el modelo.
            if(is_file('./app/models/PokemonModel.php')) {
                // Instanciamos el modelo.
                $pokemonModel = new PokemonModel();
                // Llamamos a la función getAllPokemons.
                if($data = $pokemonModel->addPokemonFromAPI($id)) {
                    $this->system_messages = 'Pokemon añadido.';
                    $_SESSION['system_messages'] = $this->system_messages;
                } else {
                    $this->system_messages = 'El pokemon a añadir no existe.';
                    $_SESSION['system_messages'] = $this->system_messages;
                }
            } else {
                throw new Exception('No se encuentra el modelo.');
            }
        }

        header('Location: ./?controller=Pokemon&method=list&server=api');
    }

    /**
     * Método del controlador que sirve para añadir nuevos pokemons a nuestra
     * base de datos.
     * @param mixed $params
     * @throws Exception
     * @return void
     */
    public function add($params) {
        $system_messages = $this->system_messages;
        $server = $params['server'];

        if(isset($_POST['add']) && !empty($_POST['add'])) {

            // Comprobamos si existe el modelo.
            if(is_file('./app/models/PokemonModel.php')) {
                // Instanciamos el modelo.
                $pokemonModel = new PokemonModel();
                
                //*********************** DESDE LA API ***********************//
                // Recogemos el id desde el $_POST['add'].                    //
                ////////////////////////////////////////////////////////////////
                if($params['server'] === 'api') {
                    $server = $params['server'];
                    // Obtenemos el id del pokemon a borrar.
                    $id = array_keys($_POST['add'])[0];
                //*********************** DESDE LA BD ************************//
                // Recogemos el id desde el input 'no' del $_POST.            //
                ////////////////////////////////////////////////////////////////
                } else if($params['server'] === 'db') {
                    $server = $params['server'];
                    // Obtenemos el id del pokemon a borrar.
                    $id = $_POST['no'];
                //********************** EN OTROS CASOS **********************//
                // Utilizaremos por defecto la base de datos como servidor.   //
                ////////////////////////////////////////////////////////////////
                } else {
                    $this->system_messages = 'El servidor seleccionado no existe. Mostrando datos desde la base de datos local...';
                    $_SESSION['system_messages'] = $this->system_messages;
                    header('Location: ./?controller=Pokemon&method=showForm');
                }

                // Comprobamos que el id pasado por el post es un número entero.
                if(!ctype_digit($id)) {
                    $this->system_messages = 'El id no es válido.';
                }
                // Llamamos a la función addPokemonFromAPI.
                if($data = $pokemonModel->addPokemonFromAPI($id)) {
                    $this->system_messages = 'Pokemon añadido.';
                    $_SESSION['system_messages'] = $this->system_messages;
                } else {
                    $this->system_messages = 'El pokemon a añadir no existe.';
                    $_SESSION['system_messages'] = $this->system_messages;
                }
            } else {
                throw new Exception('No se encuentra el modelo.');
            }

            // Redirigimos a la paǵina de listado de los pokemons correspondiente.
            header('Location: ./?controller=Pokemon&method=list&server='.$server);
        }
    }

    /**
     * Método del controlador que sirve para mostrar el formulario para añadir
     * pokemons nuevos.
     * @throws Exception
     * @return void
     */
    public function showForm() {
        $system_messages = $this->system_messages;
        // Comprobamos si existe la vista.
        if(is_file('./app/views/addPokemonForm.tpl.php')) {
            require_once('./app/views/addPokemonForm.tpl.php');
        } else {
            throw new Exception('No existe la vista solicitada.');
        }
    }
}