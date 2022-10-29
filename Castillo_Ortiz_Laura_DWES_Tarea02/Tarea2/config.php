<?php

$config_params = array(
    'db' => array(
        'host' => 'localhost',
        'user' => 'root',
        'passwd' => '',
        'db_name' => 'my_employees',
        'load' => array(
            'windows' => 'cd ./my_db && C:\xampp\mysql\bin\.\mysql -u root < create.sql',
            'ubuntu' => 'cd ./my_db && /opt/lampp/bin/mysql -u root < create.sql'
        )
    ),
    'img' => array(
        'path' => './images/icon.jpg'
    ),
    'sql' => array(
        'insert' => './my_db/inserts.sql'
    )
);