<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class UserController extends Controller
{


    protected $auth;
    protected $user;
    protected $params;

    public function __construct(
        User $user
    ) {
        $this->middleware(function ($request, $next) {
            $this->auth = auth()->user();

            return $next($request);
        });
        $this->user    = $user;
    }


    public function index(Request $request)
    {
        $this->params = $request->all();

        $users = null;

        if (array_key_exists('q', $this->params)) {
            $users =  $this->user->where('name', 'like', '%' . $this->params['q'] . '%')->get();
        } else {
            $users = $this->user::all();
        }

        return view(
            'users.index',
            [
                'users' => $users,
                'params' => $this->params
            ]
        );
    }

    public function store(Request $request)
    {

        $data =  $request->all();

        $user = $this->user->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if ($user) {
            return redirect()->route('users.edit', $user->id)
                ->with('success', 'O usuário foi atualizado com sucesso.');
        }
    }

    public function create(User $model)
    {
        return view('users.create');
    }

    public function edit(Request $user, $id)
    {
        $user        = $this->user->find($id);
        if (!$user) {
            return notfound('Usuário não encontrado.');
        }
        return view('users.edit', ['user' => $user]);
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();


        if (is_null($data['password_confirmation']) || is_null($data['password'])) {
            unset($data['password_confirmation'], $data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        $user = $this->user->find($id)->update($data);

        if ($user) {

            return redirect()->route('users.edit', $id)
                ->with('success', 'O usuário foi atualizado com sucesso.');
        }
    }
    public function destroy($id)
    {

        if ($this->auth->level != 0) {
            return json_encode(['status' => 'info', 'message' => 'Você não é administrador.']);
        } else if ($this->auth->id != $id) {
            $user = $this->user->where('id', $id);
            if ($user->count() == 0) {
                return json_encode(['status' => 'error', 'message' => 'Item não encontrado']);
            }
            if ($user->delete()) {
                return json_encode(['status' => 'success', 'message' => 'Usuário excluído com sucesso.']);
            }
        } else {
            return json_encode(['status' => 'info', 'message' => 'Você não pode excluir seu próprio cadastro.']);
        }
    }
}
