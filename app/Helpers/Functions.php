<?php

if (!function_exists('levels')) {
    function levels($id)
    {
        $levels = [0 => 'Administrador', 'Redator'];

        return $levels[$id];
    }
}

if (!function_exists('datetime')) {
    function datetime($value, $from = 'Y-m-d H:i:s', $to = 'd/m/Y H:i:s')
    {
        if (null === $value) {
            return null;
        }

        if ($from == null) {
            $from = 'Y-m-d H:i:s';
        }
        
        $datetime = DateTime::createFromFormat($from, $value);

        if (false === $datetime) {
            return null;
        }

        return $datetime->format($to);
    }
}
