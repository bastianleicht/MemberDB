<?php
/*
 *   Copyright (c) 2021 Bastian Leicht
 *   All rights reserved.
 *   https://github.com/routerabfrage/License
 */

function sendError($message, $title = 'Fehler'){
    return '<script> Swal.fire( "'.$title.'", "'.$message.'", "error" ); </script>';
}

function sendInfo($message, $title = 'Info'){
    return '<script> Swal.fire( "'.$title.'", "'.$message.'", "info"); </script>';
}

function sendSuccess($message, $title = 'Erfolgreich'){
    return '<script> Swal.fire( "'.$title.'", "'.$message.'", "success"); </script>';
}