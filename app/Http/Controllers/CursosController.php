<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cursos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required'
        ]);

        $curso = Cursos::create($request->except(['_token']));

        return redirect()->back()->with([
            "title" => "Curso cadastrado",
            "text" => "O curso $curso->titulo foi cadastrado com sucesso !",
            "icon" => "success"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function show(Cursos $cursos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function edit(Cursos $cursos)
    {
        return view('cursos.edit')->with('curso', $cursos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cursos $cursos)
    {
        $cursos->titulo = $request->titulo;
        $cursos->descricao = $request->descricao;
        $cursos->save();

        return redirect()->back()->with([
            "title" => "Curso alterado",
            "text" => "O curso $cursos->titulo foi alterado com sucesso !",
            "icon" => "success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cursos $cursos)
    {
        $cursos->delete();

        return redirect()->back()->with([
            "title" => "Curso Deletado",
            "text" => "O curso $cursos->titulo foi apagado com sucesso !",
            "icon" => "success"
        ]);
    }


    /**
     * FUNÇÃO RESPONSAVEL POR RETORNAR TODOS OS CURSOS DA BASE DE DADOS PARA LISTAR NA TABELA DO INDEX
     */
    public function indexTable()
    {

        $cursos = Cursos::orderBy('titulo');

        return datatables($cursos)
            ->addColumn('link', null)
            ->editColumn('link', function ($cursos) {
                $rota_edit = route('curso.edit', [$cursos->id]);
                $rota_destroy = route('curso.destroy', [$cursos->id]);
                return "<a href='$rota_edit' class='text-warning'><i class='fa-solid fa-pencil' title='Editar cadastro do curso'></i></a>
                    <a href='$rota_destroy' class='text-danger ms-2'><i class='fa-solid fa-trash' title='Deletar cadastro do curso'></i></a>";
            })
            ->rawColumns(['link'])
            ->toJson();
    }
}
