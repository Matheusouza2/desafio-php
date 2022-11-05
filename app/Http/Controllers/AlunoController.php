<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('alunos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alunos.create');
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
            "nome" => "required",
            "email" => "email|required"
        ]);

        $aluno = Aluno::create($request->except(['_token']));

        return redirect()->back()->with([
            "title" => "Aluno Cadastrado",
            "text" => "O aluno $aluno->nome foi cadastrado com sucesso !",
            "icon" => "success"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function show(Aluno $aluno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function edit(Aluno $aluno)
    {
        return view('alunos.edit')->with('aluno', $aluno);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aluno $aluno)
    {
        $aluno->nome = $request->nome;
        $aluno->email = $request->email;
        $aluno->nascimento = $request->nascimento;

        $aluno->save();

        return redirect()->back()->with([
            "title" => "Cadastro Alterado",
            "text" => "O aluno $aluno->nome teve seu cadastro alterado !",
            "icon" => "success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aluno $aluno)
    {
        $aluno->delete();

        return redirect()->back()->with([
            "title" => "Aluno Deletado",
            "text" => "O aluno $aluno->nome foi apagado com sucesso !",
            "icon" => "success"
        ]);
    }

    /**
     * FUNÇÃO RESPONSAVEL POR RETORNAR TODOS OS ALUNOS DA BASE DE DADOS PARA LISTAR NA TABELA DO INDEX
     */
    public function indexTable()
    {
        $alunos = Aluno::orderBy('nome');

        return datatables($alunos)
            ->addColumn('link', null)
            ->editColumn('link', function ($alunos) {
                $rota_edit = route('aluno.edit', [$alunos->id]);
                $rota_destroy = route('aluno.destroy', [$alunos->id]);
                return "<a href='$rota_edit' class='text-warning'><i class='fa-solid fa-pencil' title='Editar cadastro do aluno'></i></a>
                    <a href='$rota_destroy' class='text-danger ms-2'><i class='fa-solid fa-trash' title='Deletar cadastro do aluno'></i></a>";
            })
            ->editColumn('nascimento', function ($alunos) {
                return $alunos->nascimento ? with(new Carbon($alunos->nascimento))->format('d/m/Y') : '';
            })
            ->filterColumn('nascimento', function ($query, $keyword) {
                $sql = "DATE_FORMAT(nascimento,'%d/%m/%Y') like ?";
                $query->whereRaw($sql, ["%$keyword%"]);
            })
            ->rawColumns(['link'])
            ->toJson();
    }
}
