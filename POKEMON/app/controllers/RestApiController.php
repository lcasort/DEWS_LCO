<?php

class RestApiController
{
    ///////////////////////////////////////////////////////////////////////////
    //////////////////////////////// VARIABLES ////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    

    ///////////////////////////////////////////////////////////////////////////
    /////////////////////////////// CONSTRUCTOR ///////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    public function __construct()
    {
        // TODO
    }

    ////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////// METHODS //////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    public function process($params)
    {
        if($params['path']) {
            $path = explode('/', $params['path']);
            if(isset($path[0]) && !ctype_digit($path[0])) {
                $model = ucfirst($path[0]);
            }
            
            // Comprobamos si existe el modelo.
            if(is_file('./app/models/'.$model.'Model.php')) {
                // Instanciamos el modelo.
                $pokemonModel = new PokemonModel();

                switch ($_SERVER['REQUEST_METHOD']) {
                    case 'GET':
                        if(isset($path[1]) && ctype_digit($path[1])) {
                            $method = 'view';
                        } else {
                            $method = 'list';
                        }

                        if($method === 'view') {
                            $data = $pokemonModel->getPokemon($path[1]);
                        } else {
                            $data = $pokemonModel->getAllPokemons();
                        }

                        print_r($data);
                        echo json_encode($data);
                        header('Content-type: application/json');
                        break;
                    
                    default:
                        # code...
                        break;
                }
            } else {
                throw new Exception('No se encuentra el modelo.');
            }
        }
    }
}