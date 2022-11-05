@extends('components._main')

@section('title', 'Alterar aluno')

@section('styles')
@stop

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Alterar cadastro do aluno</h5>

                    <form action="{{ route('aluno.update', [$aluno->id]) }}" method="POST" class="row needs-validation">
                        @csrf
                        @method('PUT')

                        <div class="form-group col-sm-12 col-md-6 col-lg-4">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" value="{{ $aluno->nome }}" required>
                        </div>

                        <div class="form-group col-sm-12 col-md-6 col-lg-4">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" name="email" value="{{ $aluno->email }}" required>
                        </div>

                        <div class="form-group col-sm-12 col-md-6 col-lg-4">
                            <label for="nascimento">Data de Nascimento</label>
                            <input type="date" class="form-control" name="nascimento" value="{{ $aluno->nascimento }}">
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
