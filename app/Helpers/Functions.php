<?php

if (!function_exists('levels')) {
    function levels($id = null)
    {
        $levels = [0 => 'Administrador', 1 => 'Redator'];

        if (is_null($id)) {
            return $levels;
        }

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

if (!function_exists('notfound')) {
    function notfound($msg = null)
    {
        if (null === $msg) {
            $msg = 'A informação requerida não foi encontrada.';
        }

        abort(400, $msg);
    }
}