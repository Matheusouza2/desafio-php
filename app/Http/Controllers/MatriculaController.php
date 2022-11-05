<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Cursos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('matriculas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alunos = Aluno::all();
        $cursos = Cursos::all();

        return view('matriculas.create', compact('alunos', 'cursos'));
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
            'aluno' => 'required',
            'curso' => 'required'
        ]);

        DB::table('matricula')->updateOrInsert(
            ['aluno' => $request->aluno, 'curso' => $request->curso],
            ['aluno' => $request->aluno, 'curso' => $request->curso]
        );

        return redirect()->back()->with([
            "title" => "Matricula realizada",
            "text" => "A matricula foi realizada com sucesso",
            "icon" => "success"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $alunos = Aluno::all();
        $cursos = Cursos::all();

        $matricula = DB::table('matricula')
            ->select([
                'matricula.id',
                'matricula.aluno',
                'matricula.curso',
                DB::raw('alunos.id as aluno_id'),
                DB::raw('cursos.id as curso_id')
            ])
            ->join('alunos', 'alunos.id', 'matricula.aluno')
            ->join('cursos', 'cursos.id', 'matricula.curso')
            ->where('matricula.id', $id)
            ->first();

        return view('matriculas.edit', compact('matricula', 'alunos', 'cursos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('matricula')->where('id', $id)->update([
            'aluno' => $request->aluno,
            'curso' => $request->curso
        ]);

        return redirect()->back()->with([
            "title" => "Matricula Alterada",
            "text" => "A matricula foi alterada com sucesso!",
            "icon" => "success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('matricula')->where('id', $id)->delete();

        return redirect()->back()->with([
            "title" => "Matricula Deletada",
            "text" => "A matricula foi excluida com sucesso!",
            "icon" => "success"
        ]);
    }

    public function indexTable()
    {
        $matriculas = DB::table('matricula')
            ->join('alunos', 'alunos.id', 'matricula.aluno')
            ->join('cursos', 'cursos.id', 'matricula.curso');

        return datatables($matriculas)
            ->addColumn('link', null)
            ->editColumn('link', function ($matriculas) {
                $rota_edit = route('matricula.edit', [$matriculas->id]);
                $rota_destroy = route('matricula.destroy', [$matriculas->id]);
                return "<a href='$rota_edit' class='text-warning'><i class='fa-solid fa-pencil' title='Editar cadastro do curso'></i></a>
                    <a href='$rota_destroy' class='text-danger ms-2'><i class='fa-solid fa-trash' title='Deletar cadastro do curso'></i></a>";
            })
            ->editColumn('aluno', function ($matriculas) {
                return $matriculas->nome;
            })
            ->editColumn('curso', function ($matriculas) {
                return $matriculas->titulo;
            })
            ->filterColumn('aluno', function ($query, $keyword) {
                $sql = "alunos.nome LIKE ?";
                return $query->whereRaw($sql, ["%$keyword%"]);
            })
            ->filterColumn('curso', function ($query, $keyword) {
                $sql = "cursos.titulo LIKE ?";
                return $query->whereRaw($sql, ["%$keyword%"]);
            })
            ->rawColumns(['link'])
            ->toJson();
    }
}
