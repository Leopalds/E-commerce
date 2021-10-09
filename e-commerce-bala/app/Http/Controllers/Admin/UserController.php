<?php
namespace App\Http\Controllers\Admin;


use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

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
        return response()->view('admin.categorias.categorias_create');
    }

   
}
