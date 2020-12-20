<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\misiones;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return $user;
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->nombre = $request->nombre;
        $user->rango = $request->rango;
        $user->habilidades = $request->habilidades;
        $user->estado = $request->estado;
        $user->email = $request->email;
        $user->save();
        return $user;
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return $user;
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->nombre = $request->nombre;
        $user->rango = $request->rango;
        $user->habilidades = $request->habilidades;
        $user->estado = $request->estado;
        $user->email = $request->email;
        $user->save();
        return $user;
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user != null) {
            if ($user->estado == "activo") {
                $user->estado = "retirado";
            } elseif ($user->estado == "retirado") {
                $user->estado = "fallecido";
            } elseif ($user->estado == "fallecido") {
                $user->estado = "desertor";
            } elseif ($user->estado == "desertor") {
            }
            $user->save();
        }
        return $user;
    }
}
