<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validador = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|string|unique:users,email',
            'password' => 'required|confirmed|string'
        ], [
            'required' => ':attribute é obrigatório.',
            'email' => 'E-mail inválido.',
            'confimed' => 'As senhas nao conferem.',
            'unique' => 'E-mail já cadastrado.',
        ]);

        if ($validador->fails()) {
            return redirect()->back()->withErrors($validador->errors());
        }

        $dadosValidados = $validador->validated();

        $user = User::create([
            'name' => $dadosValidados['name'],
            'email' => $dadosValidados['email'],
            'password' => Hash::make($dadosValidados['password']),
        ]);

        $user->roles()->attach([2,3]);

        event(new Registered($user));

        return redirect(route('login'));
    }

    private function gerarCargos($tipo, $nome)
    {
        Role::factory()->create([
            'tipo' => 1,
            'nome' => 'admin'
        ]);
    }
}
