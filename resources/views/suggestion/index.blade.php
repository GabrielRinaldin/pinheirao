@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Sugestões</a></li>
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
                        <a class="card-title btn btn-info" href="{{url('/suggestion/create')}}">Adicionar Sugestão.</a>
                    </div>

                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show " role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <div class="card-body">
                        @if ($suggestions->count() == 0)
                        <p>Que pena, não foi feita nenhuma sugestão.</p>
                        <p>Seja o primerio a adiconar!</p>
                        @else
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Sugestão</th>
                                        <th>Celular para contato</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($suggestions as $suggestion)

                                    <tr>
                                        <td>{{$suggestion->suggestion}}</td>
                                        @if(count(json_decode($suggestion->cellphone)) > 0)
                                            @foreach (json_decode($suggestion->cellphone) as $phone)
                                            <td>{{$phone}}</td>
                                            @endforeach
                                        @endif
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection