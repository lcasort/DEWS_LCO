<?php

$config_params = array(
    'db' => array(
        'host' => 'localhost',
        'user' => 'root',
        'passwd' => '',
        'db_name' => 'world',
        'load' => array(
            'windows' => 'cd ./world-db && C:\xampp\mysql\bin\.\mysql -u root < world.sql',
            'ubuntu' => 'cd ./world-db && /opt/lampp/bin/mysql -u root < world.sql'
        )
    )
);