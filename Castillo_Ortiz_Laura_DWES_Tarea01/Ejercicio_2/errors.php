<?php

function customError($errstr) {
    echo "<b>Error:</b> $errstr<br>";
    echo "Ending Script";
    die();
}