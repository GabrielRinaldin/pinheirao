@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Adicionar Veículo!</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Veículos</a></li>
                    <li class="breadcrumb-item"><a href="#">Cadastrar</a></li>
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
                        <div class="row">
                            <div class="col-10">
                                <a class="btn btn-info" href="{{url('/user')}}">Voltar</a>
                            </div>
                            <div class="col-2">
                                <button type="button" class="btn btn-primary" id="exibir_faturas">
                                    Exibir Veículos
                                </button>
                            </div>
                        </div>
                    </div>

                    <form action="{{url('/user/automobile/create')}}" method="POST">
                        @csrf
                        <div class="card-body">

                            @include('includes.alerts')

                            <div class="form-group row">
                                <input id="user_id" name="user_id" value="{{$user->id}}" hidden></input>
                                <div class="col-sm-6">
                                    <label for="user">Usuário</label>
                                    <input type="text" class="form-control  @error('user') is-invalid @enderror"
                                        value="{{$user->name}}" id="user" name="user" placeholder="{{$user->name}}"
                                        readonly>
                                </div>

                                <div class="col-sm-6">
                                    <label for="type">Tipo</label>
                                    <select class="form-control @error('type') is-invalid @enderror" name="type">
                                        <option value="">Selecione</option>
                                        <option value="car">Carro</option>
                                        <option value="motorcicle">Moto</option>
                                    </select>
                                    @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-6">
                                    <label for="identifier">Placa</label>
                                    <input type="text" class="form-control  @error('identifier') is-invalid @enderror"
                                        id="identifier" name="identifier" placeholder="Placa">
                                    @error('identifier')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-6">
                                    <label for="year">Ano</label>
                                    <input type="number" min="1900" max="2099" step="1" value="{{now()->format("Y")}}"
                                        class="form-control  @error('year') is-invalid @enderror" id="year" name="year"
                                        placeholder="Placa">
                                    @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success"> Salvar</button>
                        </div>
                        <!-- /.card-footer-->
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Veículos Cadastrados</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Placa</th>
                                    <th scope="col">Ano</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($user->automobiles))
                                @foreach($user->automobiles as $auto)
                                <tr>
                                    <td>{{$auto->id}}</td>
                                    <td>
                                        @switch($auto->type)
                                        @case("car")
                                        Carro
                                        @break
                                        @case("motorcicle")
                                        Moto
                                        @break
                                        @default
                                        Carro
                                        @endswitch</td>
                                    <td>{{$auto->identifier}}</td>
                                    <td>{{$auto->year}}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $("#exibir_faturas").click(function(){
    $("#exampleModal").modal('show')
})
</script>
<!-- /.content -->
@endsection