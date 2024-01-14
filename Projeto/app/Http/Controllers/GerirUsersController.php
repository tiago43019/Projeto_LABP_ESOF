<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class GerirUsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('gerirusers', ['users' => $users]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('gerirusers')->with('success', 'Usuário excluído com sucesso!');
    }
}
