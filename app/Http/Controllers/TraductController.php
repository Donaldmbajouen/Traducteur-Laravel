<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class TraductController extends Controller
{
    public function index()
    {
        return view('traduction');
    }
    public function traduire(Request $request)
    {
        // Validation des données
        // $request->validate([
        //     'sourceText' => 'required|string',
        //     'sourceLanguage' => 'required|string',
        //     'targetLanguage' => 'required|string'
        // ]);

        // Configuration de l'API Memory Translation
        $url = "https://api.mymemory.translated.net/get";
        $params = [
            'q' => $request->sourceText,
            'langpair' => $request->sourceLanguage . '|' . $request->targetLanguage
        ];
        // Appel à l'API
        $response = file_get_contents($url . '?' . http_build_query($params));
        $response2=Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'])->get($url . '?' . http_build_query($params));
        if($response2->successful()){
            $result = $response2->json();
            $result = json_decode($response, true);
            return view('traduction', compact('result'));
        }
        // $result = json_decode($response, true);
        // dd($result);


        // Vérification et renvoi de la traduction
        // if(isset($result['responseData']['translatedText'])) {
        //     $resultat = $result ->json();
        //     dd($resultat);
            // return view('traductionPost', compact('resultat'));
        }

    }

// response()->json([
//     'success' => true,
//     'translation' => $result['responseData']['translatedText']