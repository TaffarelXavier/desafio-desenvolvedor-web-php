<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    protected $auth;
    protected $user;

    public function __construct(
        User $user
    ) {
        $this->middleware(function ($request, $next) {
            $this->auth = auth()->user();

            return $next($request);
        });
        $this->user    = $user;
    }


    public function index()
    {
        $users = $this->user::all();
        return view('users.index', ['users' => $users]);
    }

    public function create(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function edit(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }
}
