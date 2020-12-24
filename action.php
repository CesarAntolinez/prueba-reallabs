<?php
require_once 'function.php';

if (isset($_GET['action']) and $_GET['action'] == 'number')
{
    if (isset($_POST['number']) and is_numeric($_POST['number']))
    {
        $result = search($_POST['number']);
        echo json_encode(['status' => 'success', 'data' => $result]);
    }else{
        echo json_encode(['status' => 'error']);
    }
}

if (isset($_GET['action']) and $_GET['action'] == 'complete')
{
    $data = [
        ['number' => 0, 'count'=> 0, 'step' => ''],
        ['number' => 0, 'count'=> 0, 'step' => ''],
        ['number' => 0, 'count'=> 0, 'step' => '']
    ];
    for ($i=2; $i <= 10000; $i++){
        $result = search($i);

        //Validar si es mayor
        if ($result['count'] >= $data[0]['count'])
        {
            //Correr pociciones
            $data[2] = ['number' => $data[1]['count'], 'count'=> $data[1]['count'], 'step' => $data[1]['step']];
            $data[1] = ['number' => $data[0]['count'], 'count'=> $data[0]['count'], 'step' => $data[0]['step']];

            //Agregar el mas grande
            $data[0] = ['number' => $i, 'count'=> $result['count'], 'step' => $result['step']];
        }
    }

    echo json_encode(['status' => 'success', 'data' => $data]);
}
