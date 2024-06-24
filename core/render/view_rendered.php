<?php

function view($feature, $view, $data = []) {
    // mengimport data array
    extract($data);
    
    include "./features/$feature/views/$view.php";
}