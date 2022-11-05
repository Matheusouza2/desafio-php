@extends('components._main')

@section('title', 'Lista de Matriculas')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/datatables.min.css">
@stop

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Lista de Matriculas</h5>

                    <div class="row my-4">
                        <div class="col-12 text-end">
                            <a href="{{ route('matricula.create') }}" class="btn btn-info">
                                <i class="fa-solid fa-plus"></i> Realizar nova matricula
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Código</th>
                                    <th>Aluno</th>
                                    <th>Curso</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/datatables.min.js"></script>
    @include('components._swal')

    <script>
        let table = $('.table').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.11.4/i18n/pt_br.json"
            },
            processing: true,
            serverSide: true,
            fixedHeader: true,
            pageLength: 50,
            lengthMenu: [
                [10, 25, 50, 100, 500, -1],
                [10, 25, 50, 100, 500, 'Todos'],
            ],
            ajax: '/api/datatables/matriculas',
            columns: [{
                    data: 'link',
                    name: 'link'
                },
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'aluno',
                    name: 'aluno'
                },
                {
                    data: 'curso',
                    name: 'curso'
                }
            ],
        });
    </script>
@endsection
