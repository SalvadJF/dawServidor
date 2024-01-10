<?php

function dinero($s)
{
    return number_format($s, 2, ',', ' ') . ' €';
}

function truncar($s, $long = 20)
{
    return mb_substr($s, 0, $long);
}

function flechas($order, $direccion)
{
    return $order == false ? '' : ($direccion == 'desc' ? '↑' : '↓');
}

function order_direccion($order, $direccion)
{
    return $order == false ? 'asc' : ($direccion == 'asc' ? 'desc' : 'asc');
}

function carrito()
{
    if (session()->missing('carrito')) {
        session()->put('carrito', new \App\Generico\Carrito());
    }

    return session('carrito');
}

if (!function_exists('fecha')) {
    function fecha(&$fecha): string
    {
        return $fecha->setTimeZone('Europe/Madrid')
            ->isoFormat('LLL');
    }
}
