@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Movimentações!</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Movimentações</a></li>
                    <li class="breadcrumb-item"><a href="#">Index</a></li>
                    {{-- <li class="breadcrumb-item active"></li> --}}
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <a class="card-title btn btn-info" href="{{url('/movement/create')}}">Adicionar Movimentação.</a>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show " role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        @if ($movements->count() == 0)
                        <p>Que pena, não foi feita nenhuma movimentação.</p>
                        @else
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tipo</th>
                                        <th>Valor</th>
                                        <th>Descrição</th>
                                        <th>Criado Por</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($movements as $movement)

                                    <tr>
                                        <td>{{$movement->id}}</td>
                                        <td>{{$movement->type_of_movement}}</td>
                                        <td>{{$movement->value}}</td>
                                        <td>{{$movement->description}}</td>
                                        <td>{{$movement->user->name}}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        @endif

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        Att Conjunto Pinheirão.
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection