<?php

class Route{
    public static function get(string $path, callable $callback){
        $URI = $_SERVER["REQUEST_URI"];
        if($URI === $path){
            echo $callback();
        }
    }
}