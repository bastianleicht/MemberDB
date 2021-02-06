<?php
/*
 *   Copyright (c) 2021 Bastian Leicht
 *   All rights reserved.
 *   https://github.com/routerabfrage/License
 */

include_once 'app/controller/Controller.php';

foreach (glob('app/functions/*.php') as $filename)
{
    if($filename != 'autoload.php'){
        include_once $filename;
    }
}
