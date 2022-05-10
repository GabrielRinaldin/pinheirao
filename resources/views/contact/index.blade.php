@extends('layouts.app')

@section('content')


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class="card-header">
                        Formulário
                    </div>
                    <div class="card-body ">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form method="POST" action="{{url('/send-contact')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-8">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="name">Nome para contato</label>
                                            <input type="name" class="form-control @error('name') is-invalid @enderror"
                                                id="name" name="name" placeholder="...">
                                        </div>
                                        <div class="col-6">
                                            <label for="email">E-mail para contato</label>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                name="email" placeholder="...">
                                        </div>
                                        <div class="col-6">
                                            <label for="phone">DDD + Telefone para contato</label>
                                            <input type="phone"
                                                class="form-control @error('phone') is-invalid @enderror phone"
                                                id="phone" name="phone" placeholder="...">
                                        </div>
                                        <div class="col-6">
                                            <label for="cnpj">CNPJ:</label>
                                            <input type="cnpj"
                                                class="form-control @error('cnpj') is-invalid @enderror cnpj" id="cnpj"
                                                name="cnpj" placeholder="...">
                                        </div>
                                    </div>
                                    <div>
                                        <label for="cnpj">Adquirente:</label>
                                        <div class="accordion" id="accordionExample">
                                            @foreach($adquirentes as $key => $adquirente)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="{{$key}}">
                                                    <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapse{{$key}}"
                                                        aria-expanded="true" aria-controls="collapse{{$key}}">
                                                        {{$adquirente}}
                                                    </button>
                                                </h2>
                                                <div id="collapse{{$key}}" class="accordion-collapse collapse "
                                                    aria-labelledby="{{$key}}" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="row">
                                                            <div class="col-sm-6">

                                                                <div class="form-group">
                                                                    <label>Ainda Utiliza:</label>
                                                                    <select class="form-control" name="utiliza{{$key}}">
                                                                        <option value="">Selecione uma das opções
                                                                        </option>
                                                                        <option value="Sim">Sim</option>
                                                                        <option value="Não">Não</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Contratou Antecipação:</label>
                                                                    <select class="form-control"
                                                                        name="antecipacao{{$key}}">
                                                                        <option value="">Selecione uma das opções
                                                                        </option>
                                                                        <option
                                                                            value="Contratei via portal do usuário (Internet)">
                                                                            Contratei via portal do usuário (Internet)
                                                                        </option>
                                                                        <option value="Não contratei antecipações">Não
                                                                            contratei
                                                                            antecipações</option>
                                                                        <option
                                                                            value="Contratei via ligação telefonica (Central)">
                                                                            Contratei via ligação telefonica (Central)
                                                                        </option>
                                                                        <option
                                                                            value="Contratei via contato com o gestor">
                                                                            Contratei
                                                                            via
                                                                            contato com o gestor</option>
                                                                        <option
                                                                            value="Já antecipei, mas não antecipo mais">
                                                                            Já
                                                                            antecipei, mas não antecipo mais</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <label for="bank">Banco:</label>
                                                                <input type="text" class="form-control bank"
                                                                    id="bank{{$key}}" name="bank{{$key}}"
                                                                    placeholder="...">
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="agency">Agência:</label>
                                                                <input type="text" class="form-control agency"
                                                                    id="agency{{$key}}" name="agency{{$key}}"
                                                                    placeholder="...">
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="account">Conta:</label>
                                                                <input type="text" class="form-control account"
                                                                    id="account{{$key}}" name="account{{$key}}"
                                                                    placeholder="...">
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="number">Nº de Estabelecimento:</label>
                                                                <input type="number" class="form-control number"
                                                                    id="number{{$key}}" name="number{{$key}}"
                                                                    placeholder="...">
                                                                <small>Número de estabelecimento disponibilizado pela
                                                                    adquirente</small>
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="login">Login:</label>
                                                                <input type="text" class="form-control"
                                                                    id="login{{$key}}" name="login{{$key}}"
                                                                    placeholder="...">
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="password">Senha:</label>
                                                                <input type="password" class="form-control"
                                                                    id="password{{$key}}" name="password{{$key}}"
                                                                    placeholder="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <div class="row">
                                        @foreach($archives as $key => $archive)
                                        <div class="col-12">
                                            <label for="{{$key}}">{{$archive}}</label>
                                            <input type="file" class="form-control @error($key) is-invalid @enderror"
                                                id="{{$key}}" name="file[]">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Enviar" class="btn btn-success" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    $(document).ready(function() {
           $('.phone').mask('(00)00000-0000');
           
           $('.cnpj').mask('99.999.999/9999-99', {
               reverse: true
           });
       })
</script>

@endsection