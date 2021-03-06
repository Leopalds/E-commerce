<?php
namespace App\Http\Controllers\Admin;


use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\ImagemGerenciador;
use App\Services\Validadores\UserValidador;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $service;
    private $imagemGerenciador;

    public function __construct(UserValidador $userValidador, ImagemGerenciador $imagemGerenciador)
    {
        $this->service = $userValidador;
        $this->imagemGerenciador = $imagemGerenciador;
    }

    public function index()
    {
        $users = User::all();
        $admins = [];

        foreach ($users as $user) {
            $user->isAdmin() ? array_push($admins, $user)  : '';
        }

        return response()->view('paginas.admin.users.users_index', compact('users', 'admins'));
    }

    public function create()
    {
        $cargos = Role::all();
        unset($cargos[1]);
        
        return response()->view('paginas.admin.users.users_create', compact('cargos'));
    }

    public function store(Request $request)
    {
        $validador = $this->service->validar($request);

        if (!$validador['success']) {
            $erros = $validador;
            return response()->json($erros);
        }

        $dadosValidados = $validador['dados'];
        DB::beginTransaction();
        
        $senhaHash = Hash::make($dadosValidados['password']);
        $dadosValidados['password'] = $senhaHash;
        $user = User::create([
            'name' => $dadosValidados['name'],
            'email' => $dadosValidados['email'],
            'password' => $dadosValidados['password']
        ]);
        
        $user->roles()->attach(2);
        
        if (!is_null($request->cargo)) {
            $user->roles()->attach($request->cargo);
        }
        
        if ($request->hasFile('imagem')) {
            $images = $this->imagemGerenciador->salvar($request->file('imagem'), $user);

            if ($images['success'] === false) {
                $response = [
                    'success' => false,
                    'erro_img' => $images['erro']
                ];
                return response()->json($response);
            }
        }

        DB::commit();

        $response = [
            'success' => true,
        ];

        return response()->json($response);
    }

    public function edit(int $id)
    {
        $user = User::find($id);
        $cargos = Role::all();

        return response()->view('paginas.admin.users.users_edit', compact('user', 'cargos'));
    }

    public function update(Request $request, int $id)
    {
        $validador = $this->service->validar($request);

        if (!$validador['success']) {
            $erros = $validador;
            return response()->json($erros);
        }

        $dadosValidados = $validador['dados'];

        DB::beginTransaction();

        $user = User::find($id);

        $user->name = $dadosValidados['name'];
        $user->email = $dadosValidados['email'];

        if ($request->hasFile('imagem')) {
            $images = $this->imagemGerenciador->salvar($request->file('imagem'), $user);

            if ($images['success'] === false) {
                $response = [
                    'success' => false,
                    'erro_img' => $images['erro']
                ];
                return response()->json($response);
            }
        } 

        if (!is_null($request->cargo)) {
            $user->roles()->sync($request->cargo);
        } else {
            $user->roles()->detach();
        }

        $user->save();

        DB::commit();

        $response = [
            'success' => true,
        ];

        return response()->json($response);
    }

    public function destroy(int $id)
    {
        $user = User::find($id);
        $user->roles()->detach();
        $user->imagens()->detach();
        $user->delete();

        return response()->json([
                'success' => true
            ]
        );
    }
}
