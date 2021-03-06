<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoticiaRequest;
use App\Models\Noticia;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $auth;
    protected $noticia;
    protected $params;

    public function __construct(
        Noticia $noticia
    ) {
        $this->middleware(function ($request, $next) {
            $this->auth = auth()->user();

            return $next($request);
        });
        $this->noticia    = $noticia;
    }


    public function index(Request $request)
    {
        $this->params = $request->all();

        $noticias = $this->noticia->where('autor_id', $this->auth->id);

        if (array_key_exists('q', $this->params)) {
            $noticias->where(function ($query) {
                $filtro =  $this->params['q'];
                $query->where('titulo', 'like', '%' . $filtro . '%')
                    ->orWhere('resumo', 'like', '%' . $filtro . '%')
                    ->orWhere('conteudo', 'like', '%' . $filtro . '%');
            });
        }

        $noticias = $noticias->get();

        return view('noticias.index', [
            'noticias' => $noticias,
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
        $noticias = $this->noticia->where('autor_id', $this->auth->id)->get();
        $categorias = Categoria::all()->pluck('nome', 'id');
        return view('noticias.create', ['noticias' => $noticias, 'categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoticiaRequest $request)
    {

        $data = $request->all();
        $data['autor_id']       = auth()->user()->id;
        $data['mostrar']        = isset($data['mostrar']);
        $data['slug']           = Str::slug($data['titulo']);
        $data['categoria_id']   = (int) $data['categoria_id'];
        $noticia = $this->noticia->create($data);
        if ($noticia) {
            return redirect()->route('noticias.edit', $noticia->id)
                ->with('success', 'Nova not??cia cadastrada com sucesso.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noticia        = $this->noticia->find($id);
        if (!$noticia) {
            return notfound("Not??cia n??o encontrada.");
        }
        return view('noticias.show', ['noticia' => $noticia]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia        = $this->noticia->find($id);
        if (!$noticia) {
            return notfound("Not??cia n??o encontrada.");
        }
        $categorias     = Categoria::all()->pluck('nome', 'id');
        return view('noticias.edit', ['noticia' => $noticia, 'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['autor_id']       = auth()->user()->id;
        $data['mostrar']        = isset($data['mostrar']);
        $data['slug']           = Str::slug($data['titulo']);
        $data['categoria_id']   = (int) $data['categoria_id'];
        $noticia = $this->noticia->find($id)->update($data);
        if (!$noticia) {
            return notfound('Not??cia n??o encontrada');
        }
        if ($noticia) {
            return redirect()->route('noticias.edit', $id)
                ->with('success', 'A not??cia foi atualizada com sucesso.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticia = $this->noticia->where('id', $id)->where('autor_id',  $this->auth->id);
        if ($noticia->count() == 0) {
            return json_encode(['status' => 'info', 'message' => 'Item n??o encontrado']);
        }
        if ($noticia->delete()) {
            return json_encode(['status' => 'success', 'message' => 'Not??cia exclu??da com sucesso.']);
        }
    }
}
