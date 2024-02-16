<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Token; // Asegúrate de ajustar esto según la ubicación de tu modelo Token

class SwapController extends Controller
{
    public function showSwapView()
    {
        $tokens = Token::pluck('name'); // Obtén los nombres de la tabla "tokens"

        return view('/swap', compact('tokens'));
    }
}
