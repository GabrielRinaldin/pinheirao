@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Gerar Fatura!</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Faturas</a></li>
                    <li class="breadcrumb-item"><a href="#">Gerar</a></li>
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

                        <a class="card-title btn btn-info" href="{{url('/user')}}">Voltar</a>
                    </div>

                    <form action="{{url('/bill/create')}}" method="POST">
                        @csrf
                        <div class="card-body">

                            @include('includes.alerts')

                            <div class="form-group row">
                                <input id="user_id" name="user_id" value="{{$user->id}}" hidden></input>
                                <div class="col-sm-4">
                                    <label for="user">Usuário</label>
                                    <input type="text" class="form-control  @error('user') is-invalid @enderror"
                                        value="{{$user->name}}" id="user" name="user" placeholder="{{$user->name}}"
                                        readonly>
                                </div>

                                <div class="col-sm-4">
                                    <label for="amount">Valor da cobrança</label>
                                    <input type="text" class="form-control @error('amount') is-invalid @enderror"
                                        id="amount" name="amount" placeholder="00,00">
                                    @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-4">
                                    <label for="date">Data limite</label>
                                    <input type="date" class="form-control @error('due_at') is-invalid @enderror"
                                        id="due_at" name="due_at">
                                    @error('due_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="description">Descrição</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" rows="10"
                                        id="description" name="description" placeholder="..."></textarea>
                                    @error('description')
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
    </div>
</section>
<!-- /.content -->
@endsection