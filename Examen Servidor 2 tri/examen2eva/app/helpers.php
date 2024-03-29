<?php



function truncar($s, $long = 20)
{
    if (mb_strlen($s) > $long) {
        return mb_substr($s, 0, $long) . '...';
    }

    return $s;
}

function order_dir_arrow($order, $order_dir)
{
    return $order == false ? '' : ($order_dir == 'desc' ? '↑' : '↓');
}

function order_dir($order, $order_dir)
{
    return $order == false ? 'asc' : ($order_dir == 'asc' ? 'desc' : 'asc');
}

