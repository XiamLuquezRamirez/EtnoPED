<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;


class ConvertirImagen extends Controller
{
    public function ConvertirImagen(Request $request)
    {
        $resultados = DB::connection('mysql')->table('cont_documento')
        ->select("cont_documento.*")
        ->get();

        foreach ($resultados as $resultado) {
            $valor_nuevo = self::reducirImagenesBase64($resultado->cont_documento);
            DB::connection('mysql')->table('cont_documento')
            ->where('cont_documento.id', '=', $resultado->id)
            ->update(['cont_documento' => $valor_nuevo]);
        }

        return response()->json("guardado", 200);
    }

    function reducirImagenesBase64($html) {
        if(strlen($html) > 0){
            $dom = new \DOMDocument();
            libxml_use_internal_errors(true);
            $dom->loadHTML($html);
    
            $images = $dom->getElementsByTagName('img');

            foreach ($images as $image) {
                $data = $image->getAttribute('src');
                $base64 = explode(',', $data);

                if(count($base64) > 1){
                $encodedImage = $base64[1];
                    $decodedImage = base64_decode($encodedImage);
                    $resizedImage = Image::make($decodedImage)->resize(200, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });

                    $newBase64 = 'data:image/' . $resizedImage->mime . ';base64,' . base64_encode($resizedImage->encode());

                    $image->setAttribute('src', $newBase64);  
                }
            
            }

            $cleanHTML = $dom->saveHTML();

            return $cleanHTML;
        }else {
            return $html;
        }
    }
}
