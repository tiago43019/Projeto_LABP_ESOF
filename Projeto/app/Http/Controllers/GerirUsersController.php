<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class GerirUsersController extends Controller
{
    // listar todos os users
    public function listarUsers()
    {
        $users = User::all();
        return view('gerirusers', ['users' => $users]);
    }

    // eliminar um user
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('gerirusers')->with('success', 'User eliminado com sucesso!');
    }
}
