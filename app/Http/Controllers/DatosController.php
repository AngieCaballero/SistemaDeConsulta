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
            CURLOPT_URL => 'http://3401-165-98-36-14.ngrok.io/estudiantes/obtener_estudiantes_anio',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhcGlhY2FkZW1pY2EudW5hbmxlb24uZWR1Lm5pIiwiZXhwIjoxNjUxMTY1OTE2LCJhdWQiOiJ1bmFubGVvbi5lZHUubmkiLCJpYXQiOjEzNTY5OTk1MjQsIm5iZiI6MTM1NzAwMDAwMCwiZGF0YSI6W119.MXQuLeyTz7crzCWb9qHzTj6-zykTXim8ua7MX61NUm4'
            ),
        ));

        

        

        $response = curl_exec($curl);
        //dd(json_decode($response)->error);
        var_dump($response);
        die();
        $respuesta=json_decode($response);


        curl_close($curl);

        return $respuesta;
    }

    public function getPostgrados ()
    {
        
    }

    public function getTrabajadores ()
    {
        
    }
}
