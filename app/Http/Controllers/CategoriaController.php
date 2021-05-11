<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRequestValidation;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriaController extends Controller
{
    protected $auth;
    protected $categoria;
    protected $params;

    public function __construct(
        Categoria $categoria
    ) {
        $this->middleware(function ($request, $next) {
            $this->auth = auth()->user();

            return $next($request);
        });
        $this->categoria    = $categoria;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $this->params = $request->all();

        $categorias = null;

        if (array_key_exists('q', $this->params)) {
            $categorias =  $this->categoria->orWhere('nome', 'like', '%' . $this->params['q'] . '%')->get();
        } else {
            $categorias = $this->categoria->all();
        }

        return view('categorias.index', [
            'categorias' => $categorias,
            'params' => $this->params
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaRequestValidation $request)
    {
        $data = $request->all();
        $data['slug']               = Str::slug($data['nome']);
        $categoria = $this->categoria->create($data);
        if ($categoria) {
            return redirect()->route('categorias.edit', $categoria->id)
                ->with('success', 'Nova categoria cadastrada com sucesso.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria        = $this->categoria->find($id);
        if (!$categoria) {
            return notfound("Categoria não encontrada.");
        }
        return view('categorias.edit', ['categoria' => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $categoria = $this->categoria->find($id);

        if (!$categoria) {
            return notfound("Categoria não encontrada.");
        }

        $result = $categoria->update($data);

        if ($result) {
            return redirect()->route('categorias.edit', $id)
                ->with('success', 'A categoria foi atualizada com sucesso.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->auth->level != 0) {
            return json_encode(['status' => 'info', 'message' => 'Você não é administrador.']);
        } else {
            $categoria = $this->categoria->where('id', $id);
            if ($categoria->count() == 0) {
                return json_encode(['status' => 'error', 'message' => 'Recurso não encontrado.']);
            }
            if ($categoria->delete()) {
                return json_encode(['status' => 'success', 'message' => 'Usuário excluído com sucesso.']);
            }
        }
    }
}
