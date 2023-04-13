<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DatosController extends Controller
{
    public function getEstudiantes ()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://apiacademica.loc/estudiantes/obtener_estudiantes_anio',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhcGlhY2FkZW1pY2EudW5hbmxlb24uZWR1Lm5pIiwiZXhwIjoxNjUxMjcwNzE3LCJhdWQiOiJ1bmFubGVvbi5lZHUubmkiLCJpYXQiOjEzNTY5OTk1MjQsIm5iZiI6MTM1NzAwMDAwMCwiZGF0YSI6W119.4xxFRSTz-RqTZiHK1RI7YOackC1qnk_yASP8mXbcOi4'
            ),
        ));

        

        

        $response = curl_exec($curl);
        //dd(json_decode($response)->error);
        //var_dump($response);
        //die();
        //$respuesta=json_decode($response);


        curl_close($curl);

        return $response;
    }

    public function getPostgrados ()
    {
        
    }

    public function getTrabajadores ()
    {
        
    }
}
