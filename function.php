<?php

function search($number)
{
    $data = [
        'step'  => $number . ', ',
        'count' => 1
    ];
    while ($number != 1){
        //verificar si es par
        if ($number % 2 == 0)
        {
            // Dividir el numero en 2
            $number = $number / 2 ;
        }else{
            //Multiplicar por 3
            $number = $number * 3;
            //Sumar 1
            $number++;
        }
        //Guardar los datos
        $data['step'] = $data['step'] . $number . ', ';
        $data['count']++;
    }

    //quitar la ultima ,
    $data['step'] = trim($data['step'], ',');

    //retornar resultado
    return $data;
}