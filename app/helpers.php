<?php


use Illuminate\Support\Facades\Route as FacadesRoute;

if(!function_exists('active_link')){
    function active_link(string $name, string $class = 'active') : string
    {
        return FacadesRoute::is($name) ? $class : '';
    }
}
if(!function_exists('validate')){
    function validate(array $attributes, array $rules) : array
    {
        return validator($attributes, $rules)->validate();
    }
}