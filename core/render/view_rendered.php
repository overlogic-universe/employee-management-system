<?php

function view($feature, $view, $data = []) {
    extract($data);
    include "./features/$feature/views/$view.php";
}