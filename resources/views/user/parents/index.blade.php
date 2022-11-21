@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Visitantes</a></li>
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
                        <div class="row">
                            <div class="col-10">
                                <h4>Morador {{ucfirst($user->name)}} n° {{$user->house_number}}</h4>
                            </div>
                            <div class="col-2 ">
                                <button type="button" class="card-title btn btn-info" id="cadastro">
                                    Cadastrar Novo
                                    Visitante.
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body ">
                        @include('includes.alerts')
                        <div class="table-responsive p-0" style="height: 500px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nome</th>
                                        <th class="text-center">Número da casa</th>
                                        <th class="text-center">Última Entrada</th>
                                        <th class="text-center">Última Saída</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($childrens as $child)
                                    <tr>
                                        <td class="text-center">{{ucfirst($child->name)}}</td>
                                        <td class="text-center">{{$user->house_number}}</td>
                                        <td class="text-center" id="lastHistoryIn{{$child->id}}">
                                            {{$child->lastHistory() ?
                                            Carbon\Carbon::parse($child->lastHistory()->date_in)->format("d/m/Y H:i:s")
                                            : ''}}</td>
                                        <td class="text-center" id="lastHistoryOut{{$child->id}}">
                                            @if(!is_null($child->lastHistory())){{$child->lastHistory()->date_out ?
                                            Carbon\Carbon::parse($child->lastHistory()->date_out)->format("d/m/Y H:i:s")
                                            : ''}}@endif</td>
                                        <td class="text-center">
                                            <a>

                                                <button class="btn btn-sm btn-link date_out"
                                                    @if(!is_null($child->lastHistory()) &&
                                                    !is_null($child->lastHistory()->date_out) ||
                                                    is_null($child->lastHistory())) hidden @endif
                                                    id="date_out{{$child->id}}" value={{$child->id}}>Marcar
                                                    Saída</button>
                                                <button class="btn btn-sm btn-link date_in"
                                                    @if(!is_null($child->lastHistory()) &&
                                                    is_null($child->lastHistory()->date_out)) hidden @endif
                                                    id="date_in{{$child->id}}" value={{$child->id}}> Marcar Entrada
                                                </button>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-primary exibir_historico"
                                                value={{$child}}>
                                                Histórico de visitas
                                            </button>
                                            <a class="btn btn-sm btn-info"
                                                href="{{url('/user/automobile/'. $child->id)}}">Gerenciar
                                                Veículos</a>
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

    <div class="modal fade" id="cadastroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelCadastro"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelCadastro">Cadastrar Visitante </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url("/user/parent/". $user->id)}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="name" class="form-control  @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" id="name" name="name" placeholder="Nome">

                                @error('name')

                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" data-dismiss="modal">Salvar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($childrens as $child)
    <div class="modal fade" id="historico_id{{$child->id}}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Histórico de Entrada do Usuário <span
                            id="userHistory"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Data de Entrada</th>
                                <th scope="col">Data de Saída</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($child->history))
                            @foreach($child->history as $history)
                            <tr>
                                <td>{{$history->id}}</td>
                                <td>{{Carbon\Carbon::parse($history->date_in)->format('d/m/y H:i:s')}}</td>
                                <td>{{$history->date_out ? Carbon\Carbon::parse($history->date_out)->format('d/m/y
                                    H:i:s') : ''}}</td>
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
    @endforeach

</section>
<!-- /.content -->

<script>
    $(".exibir_historico").click(function(){
        let user = JSON.parse(this.value);
        $("#userHistory").html(user['name']);
        $("#historico_id" + user['id']).modal('show');
})
    $("#cadastro").click(function(){
        $("#cadastroModal").modal('show');
})

    $(".date_in").click(function(){
        axios.post('/user/parent/update-date-in/' + this.value).then((response) =>{
            if(response.data.status == "Success"){
                $("#lastHistoryIn"+this.value).html(response.data.history);
                $("#lastHistoryOut"+this.value).html("");
                $("#date_in"+this.value).attr("hidden", true);
                $("#date_out"+this.value).attr("hidden", false);
                

            }
        })
    })
    $(".date_out").click(function(){
        axios.post('/user/parent/update-date-out/' + this.value).then((response) =>{
            if(response.data.status == "Success"){
                $("#lastHistoryOut"+this.value).html(response.data.history)
                $("#date_out"+this.value).attr("hidden", true);
                $("#date_in"+this.value).attr("hidden", false);
            }
        })
    })
</script>

@endsection