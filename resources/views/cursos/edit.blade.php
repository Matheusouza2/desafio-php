@extends('components._main')

@section('title', 'Alterar Cadastro do Curso')

@section('styles')
@stop

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Alterar cadastro do curso</h5>

                    <form action="{{ route('curso.update', [$curso->id]) }}" method="POST" class="row needs-validation">
                        @csrf
                        @method('PUT')

                        <div class="form-group col-sm-12 col-md-6 col-lg-4">
                            <label for="titulo">Titulo</label>
                            <input type="text" class="form-control" name="titulo" value="{{ $curso->titulo }}" required>
                        </div>

                        <div class="form-group col-sm-12 col-md-6 col-lg-4">
                            <label for="descricao">Descricao</label>
                            <input type="text" class="form-control" name="descricao" value="{{ $curso->descricao }}">
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
