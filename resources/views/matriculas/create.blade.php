@extends('components._main')

@section('title', 'Cadastro matricula')

@section('styles')
@stop

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Cadastrar nova matricula</h5>

                    <form action="{{ route('matricula.store') }}" method="POST" class="row needs-validation">
                        @csrf
                        <div class="form-group col-sm-12 col-md-6 col-lg-4">
                            <label for="aluno">Aluno</label>
                            <select name="aluno" class="form-control" id="aluno" required>
                                <option value="">Selecione</option>
                                @foreach ($alunos as $aluno)
                                    <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-12 col-md-6 col-lg-4">
                            <label for="curso">Curso</label>
                            <select name="curso" class="form-control" id="curso" required>
                                <option value="">Selecione</option>
                                @foreach ($cursos as $curso)
                                    <option value="{{ $curso->id }}">{{ $curso->titulo }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit"
                            class="col-sm-12 col-md-3 col-lg-2 offset-md-9 offset-lg-10 btn btn-success">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    {{-- Responsavel por mostrar a mensagem de sucesso --}}
    @include('components._swal')
@endsection
