<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Token;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TokenController extends Controller
{
    public function createToken(Request $request, $userId)
    {
        try {
            // Validar los datos del request
            $validatedData = $request->validate([
                'name' => 'required|string|max:50',
                //ejemplo btc bitcoin
                'symbol' => 'required|string|max:10',
                // cantidad total de tokens creados
                'totalSupply' => 'required|numeric|gt:0',
            ]);

            // Iniciar una transacción de base de datos
            DB::beginTransaction();
            // Crear y guardar el token
            $token = new Token();

            $token->name = $request->name;
            $token->symbol = $request->symbol;
            $token->total_supply = $request->totalSupply;
            $token->owner_user_id = $userId;
            $token->save();

            // Confirmar la transacción si todo salió bien
            DB::commit();

            return redirect()->route('showMy.tokens')->with('success', 'Token creado exitosamente');
        } catch (\Exception $e) {
            // Si algo falla, revertir la transacción
            DB::rollBack();

            //Redireccionar a la vista de error con los errores de validación
            return redirect()->back()->withErrors(['general' => 'Error al crear el token' . $e->getMessage()]);
        }
    }
    public function showCreateToken()
    {
        // Obtén el ID del usuario de la sesión o de otra fuente
        $userId = auth()->id();
        // Pasa el ID del usuario a la vista
        return view('project_views.createToken', compact('userId'));
    }
    public function showMyTokens()
    {
        // Obtén el ID del usuario de la sesión
        $userId = auth()->id();
        // Recupera todos los tokens del usuario
        $tokens = Token::where('owner_user_id', $userId)->get();
        // Pasa los tokens a la vista
        return view('project_views.showMyTokens', compact('tokens'));
    }
    public function showAllTokens()
    {
        // Recupera todos los tokens de la base de datos
        $tokens = Token::all();

        // Pasa los tokens a la vista
        return view('project_views.showAllTokens', compact('tokens'));
    }

    public function getTokens()
    {
        $tokens = Token::all();
        return response()->json($tokens);
    }
}
