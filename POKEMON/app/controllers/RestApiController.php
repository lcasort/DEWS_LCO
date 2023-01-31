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
                    
                    default:
                        # code...
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
            $url = 'http://localhost/DEWS_LCO/POKEMON/?controller=RestApi&method=process&path=pokemon/' . $p['no'];
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