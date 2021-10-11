<?php
namespace App\Http\Controllers\Admin;


use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\ImagemService;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $service;
    private $imagemService;

    public function __construct(UserService $userService, ImagemService $imagemService)
    {
        $this->service = $userService;
        $this->imagemService = $imagemService;
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
        $validador = $this->service->validar($request->all());

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
            $images = $this->imagemService->salvar($request->file('imagem'), $user);

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

        return response()->view('admin.users.users_edit', compact('user', 'cargos'));
    }

    public function update(Request $request, int $id)
    {
        $validador = $this->service->validar($request->except('email'));

        if (!$validador['success']) {
            $erros = $validador;
            return response()->json($erros);
        }

        $dadosValidados = $validador['dados'];

        DB::beginTransaction();

        $user = User::find($id);

        $user->name = $dadosValidados['name'];

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

        return [
            'success' => true
        ];
    }
}
