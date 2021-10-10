<?php
namespace App\Http\Controllers\Admin;


use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $service;

    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }

    public function index()
    {
        $users = User::all();
        $admins = [];

        foreach ($users as $user) {
            $user->isAdmin() ? array_push($admins, $user)  : '';
        }

        return response()->view('admin.users.users_index', compact('users', 'admins'));
    }

    public function create()
    {
        $cargos = Role::all();
        unset($cargos[1]);
        
        return response()->view('admin.users.users_create', compact('cargos'));
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
        $user = User::create($dadosValidados);
   
        $user->roles()->attach(2);

        if (!is_null($request->cargo)) {
            $user->roles()->attach($request->cargo);
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

        return response()->view('admin.users.users_edit', compact('user', 'cargos'));
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

        if (!is_null($request->cargo)) {
            $user->roles()->attach($request->cargo);
        }

        $user->save();

        DB::commit();

        $response = [
            'success' => true,
        ];

        return response()->json($response);
    }

    public function destroy()
    {
        
    }
}
