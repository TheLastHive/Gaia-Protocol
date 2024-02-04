<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Pool;
use App\Models\Liquidity;
use App\Models\Token;

class PoolController extends Controller
{
        //Añadir Liquidez
    public function addLiquidity(Request $request, $userId, $poolId, $tokenId, $amount)
    {
        $request->validate([
            'amount' => 'required|numeric|gt:0',
        ]);

        $user = User::findOrFail($userId);
        $token = Token::findOrFail($tokenId);
        $pool = Pool::findOrFail($poolId);

        // Agregar la transacción de liquidez
        $transaction = new Transaction();
        $transaction->type = 'AgregarLiquidez';
        $transaction->user_id = $userId;
        $transaction->amount = $amount;
        $transaction->save();

        // Actualizar la tabla de liquidez
        $liquidity = new Liquidity();
        $liquidity->user_id = $userId;
        $liquidity->pool_id = $poolId;
        $liquidity->token_id = $tokenId;
        $liquidity->amount = $amount;
        $liquidity->save();

        // Actualizar la liquidez total del pool
        $pool->total_liquidity += $amount;
        $pool->save();

        return redirect()->route('addLiquiditySuccess')->with('info', 'Liquidez agregada exitosamente');
    }

    //Quitar Liquidez
    public function removeLiquidity(Request $request, $userId, $poolId, $tokenId, $amount)
    {
        $request->validate([
            'amount' => 'required|numeric|gt:0',
        ]);

        $user = User::findOrFail($userId);
        $token = Token::findOrFail($tokenId);
        $pool = Pool::findOrFail($poolId);

        $liquidity = Liquidity::where('user_id', $userId)
            ->where('pool_id', $poolId)
            ->where('token_id', $tokenId)
            ->firstOrFail();

        if ($liquidity->amount < $amount) {
            return redirect()->route('removeLiquidityError')->with('error', 'No tienes suficiente liquidez para retirar');
        }

        // Restar la cantidad de liquidez del usuario
        $liquidity->amount -= $amount;
        $liquidity->save();

        // Restar la cantidad de liquidez del pool
        $pool->total_liquidity -= $amount;
        $pool->save();

        // Agregar la transacción de liquidez
        $transaction = new Transaction();
        $transaction->type = 'RemoverLiquidez';
        $transaction->user_id = $userId;
        $transaction->amount = $amount;
        $transaction->save();

        return redirect()->route('removeLiquiditySuccess')->with('info', 'Liquidez retirada exitosamente');
    }

        //Crear POOL
    public function createPool(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string',
        ]);

        $pool = new Pool();
        $pool->name = $request->name;
        $pool->description = $request->description;
        $pool->total_liquidity = 0;
        $pool->save();

        return redirect()->route('createPoolSuccess')->with('info', 'Pool creada exitosamente');
    }

    //Borrar POOL
    public function deletePool($poolId)
    {
        $pool = Pool::findOrFail($poolId);
        $pool->delete();

        return redirect()->route('deletePoolSuccess')->with('info', 'Pool eliminada exitosamente');
    }

    //! FUNCIONES PARA MANEJAR VISTAS
    public function addLiquiditySuccess()
    {
        $info = session('info');
        return view('addLiquiditySuccess', compact('info'));
    }

    public function removeLiquidityError()
    {
        $error = session('error');
        return view('removeLiquidityError', compact('error'));
    }

    public function removeLiquiditySuccess()
    {
        $info = session('info');
        return view('removeLiquiditySuccess', compact('info'));
    }

    public function createPoolSuccess()
    {
        $info = session('info');
        return view('createPoolSuccess', compact('info'));
    }

    public function deletePoolSuccess()
    {
        $info = session('info');
        return view('deletePoolSuccess', compact('info'));
    }
}