<?php
function load (string $className) {
    include_once "class/$className.php";
}
spl_autoload_register('load');