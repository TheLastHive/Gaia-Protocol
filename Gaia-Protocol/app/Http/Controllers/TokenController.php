<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Token;
use Illuminate\Support\Facades\DB;

class TokenController extends Controller
{
    public function createToken(Request $request,$userId)
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

            // Redireccionar a la vista de éxito con un mensaje flash
            return redirect()->route('showAllTokens')->with('success', 'Token creado exitosamente');
        } catch (\Exception $e) {
            // Si algo falla, revertir la transacción
            DB::rollBack();

            // Redireccionar a la vista de error con los errores de validación
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
}
