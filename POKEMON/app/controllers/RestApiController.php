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
        header("Content-type: application/json; charset=utf-8");
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
                            echo json_encode($data);
                        } else {
                            $data = $pokemonModel->getAllPokemons();
                            $res = $this->create_array_convert($data);
                            echo json_encode($res);   
                        }

                        break;

                    case 'DELETE':
                        if(isset($path[1]) && ctype_digit($path[1]) &&
                        $pokemonModel->getPokemon($path[1])) {
                            $pokemonModel->deletePokemon($path[1]);
                            echo 'Pokemon eliminado con éxito.';
                            http_response_code(200);
                        } else {
                            echo 'No existe el pokemon que se quiere borrar.';
                            http_response_code(409);
                        }

                        break;

                    case 'POST':
                        if(isset($_POST['no']) && !empty($_POST['no']) &&
                        $_POST['no']>0 && $_POST['no']<152) {
                            $pokemonModel->addPokemonFromAPI($_POST['no']);
                            echo 'Pokemon añadido con éxito.';
                            http_response_code(200);
                        } else {
                            echo 'No existe el pokemon que se quiere añadir.';
                            http_response_code(409);
                        }

                        break;
                    
                    case 'UPDATE':
                        if(isset($_POST['id']) && !empty($_POST['id']) &&
                        isset($_POST['name']) && !empty($_POST['name']) &&
                        $_POST['id']>0 && $_POST['id']<152 &&
                        $pokemonModel->getPokemon($_POST['id'])) {
                            $pokemonModel->updatePokemon($_POST['id'], $_POST['name']);
                            echo 'Pokemon actualizado con éxito.';
                            http_response_code(200);
                        } else {
                            echo 'No existe el pokemon que se quiere actualizar.';
                            http_response_code(409);
                        }

                        break;
                }
            } else {
                throw new Exception('No se encuentra el modelo.');
            }
        }
    }

    private function create_array_convert($data) {
        $res = array();

        foreach($data as $key => $p) {
            $url = 'http://localhost/DEWS_LCO/POKEMON/?controller=RestApi&method=process&path=pokemon/' . $key;
            $res[$key] = array(
                'name' => $p['name'],
                'url' => $url
            );
        }

        $res = [
            'total' => count($res),
            'results' => $res
        ];

        return $res;
    }
}