@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Moradores</a></li>
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
                        <a class="card-title btn btn-info" href="{{url('/user/create')}}">Cadastrar Usuário.</a>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body ">
                        @include('includes.alerts')
                        <div class="table-responsive p-0" style="height: 500px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Número da casa</th>
                                        <th>Tipo</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->house_number}}</td>
                                        <td>{{$user->user_type}}</td>
                                        <td>
                                            <a class="btn btn-info"
                                                href="{{url('/bill/create/'. $user->id)}}">Gerar Fatura</a>
                                            <a class="btn btn-warning"
                                                href="{{url('/user/edit/' . $user->id)}}">Editar</a>
                                            <a class="btn btn-danger" href="{{url('/user/delete')}}">Excluir</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<script>
    $(document).ready(function() {
       console.log('teste');
    });
</script>

@endsection