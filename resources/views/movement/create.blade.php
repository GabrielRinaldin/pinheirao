@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Adicionar Movimentação!</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Movimentações</a></li>
                    <li class="breadcrumb-item"><a href="#">Adicionar</a></li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a class="card-title btn btn-info" href="{{url('/movement')}}">Voltar</a>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{url('/movement/create')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select class="form-control" name="type_of_movement">
                                            <option value="">Tipo de movimentação</option>
                                            <option value="credit">Crédito</option>
                                            <option value="debit">Débito</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="value" name="value" value="{{old('value')}}"
                                        placeholder="Valor">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="description" name="description"  value="{{old('description')}}"
                                        placeholder="Descrição">
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select class="form-control" name="house_number">
                                            <option value="">Número da casa</option>
                                            @foreach ($houseNumbers as $number)
                                            <option value="{{$number}}">{{$number}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" name="date" value="{{old('date')}}">
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"> Salvar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection