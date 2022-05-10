@component('mail::message')

{{-- Novo Contato de {{ $data['name'] }}
<br>
Informações de contato:
<br> Email: {{ $data['email'] }}
<br> Telefone: {{ $data['phone'] }}<br>
CNPJ: {{ $data['cnpj'] }} --}}


<br><br><br>
Informações de Bancarias

{{-- <table class="table">
    <thead>
        <tr>
            <th scope="col" style="width: 20%">#</th>
            <th scope="col" style="width: 20%">Rede</th>
            <th scope="col" style="width: 20%">Cielo</th>
            <th scope="col" style="width: 20%">GetNet</th>
            <th scope="col" style="width: 20%">Stone</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Ainda Utiliza:</td>
            <td>@if(!is_null($data['utilizarede']))
                {{$data['utilizarede']}}
                @endif</td>
            <td>@if(!is_null($data['utilizacielo']))
                {{$data['utilizacielo']}}
                @endif</td>
            <td>@if(!is_null($data['utilizagetnet']))
                {{$data['utilizagetnet']}}
                @endif</td>
            <td>@if(!is_null($data['utilizastone']))
                {{$data['utilizastone']}}
                @endif</td>
        </tr>
        <tr>
            <td>Houve Antecipação:</td>
            <td>@if(!is_null($data['antecipacaorede']))
                {{$data['antecipacaorede']}}
                @endif</td>
            <td>@if(!is_null($data['antecipacaocielo']))
                {{$data['antecipacaocielo']}}
                @endif</td>
            <td>@if(!is_null($data['antecipacaogetnet']))
                {{$data['antecipacaogetnet']}}
                @endif</td>
            <td>@if(!is_null($data['antecipacaostone']))
                {{$data['antecipacaostone']}}
                @endif</td>
        </tr>
        <tr>
            <td>Banco:</td>
            <td>@if(!is_null($data['bankrede']))
                {{$data['bankrede']}}
                @endif</td>
            <td>@if(!is_null($data['bankcielo']))
                {{$data['bankcielo']}}
                @endif</td>
            <td>@if(!is_null($data['bankgetnet']))
                {{$data['bankgetnet']}}
                @endif</td>
            <td>@if(!is_null($data['bankstone']))
                {{$data['bankstone']}}
                @endif</td>
        </tr>
        <tr>
            <td>Agência:</td>
            <td>@if(!is_null($data['agencyrede']))
                {{$data['agencyrede']}}
                @endif</td>
            <td>@if(!is_null($data['agencycielo']))
                {{$data['agencycielo']}}
                @endif</td>
            <td>@if(!is_null($data['agencygetnet']))
                {{$data['agencygetnet']}}
                @endif</td>
            <td>@if(!is_null($data['agencystone']))
                {{$data['agencystone']}}
                @endif</td>
        </tr>
        <tr>
            <td>Conta:</td>
            <td>@if(!is_null($data['accountrede']))
                {{$data['accountrede']}}
                @endif</td>
            <td>@if(!is_null($data['accountcielo']))
                {{$data['accountcielo']}}
                @endif</td>
            <td>@if(!is_null($data['accountgetnet']))
                {{$data['accountgetnet']}}
                @endif</td>
            <td>@if(!is_null($data['accountstone']))
                {{$data['accountstone']}}
                @endif</td>
        </tr>
        <tr>
            <td>Número:</td>
            <td>@if(!is_null($data['numberrede']))
                {{$data['numberrede']}}
                @endif</td>
            <td>@if(!is_null($data['numbercielo']))
                {{$data['numbercielo']}}
                @endif</td>
            <td>@if(!is_null($data['numbergetnet']))
                {{$data['numbergetnet']}}
                @endif</td>
            <td>@if(!is_null($data['numberstone']))
                {{$data['numberstone']}}
                @endif</td>
        </tr>
        <tr>
            <td>Acesso:</td>
            <td>@if(!is_null($data['loginrede']))
                {{$data['loginrede']}}
                @endif</td>
            <td>@if(!is_null($data['logincielo']))
                {{$data['logincielo']}}
                @endif</td>
            <td>@if(!is_null($data['logingetnet']))
                {{$data['logingetnet']}}
                @endif</td>
            <td>@if(!is_null($data['loginstone']))
                {{$data['loginstone']}}
                @endif</td>
        </tr>
        <tr>
            <td>Senha:</td>
            <td>@if(!is_null($data['passwordrede']))
                {{$data['passwordrede']}}
                @endif</td>
            <td>@if(!is_null($data['passwordcielo']))
                {{$data['passwordcielo']}}
                @endif</td>
            <td>@if(!is_null($data['passwordgetnet']))
                {{$data['passwordgetnet']}}
                @endif</td>
            <td>@if(!is_null($data['passwordstone']))
                {{$data['passwordstone']}}
                @endif</td>
        </tr>
    </tbody>
</table> --}}

{{now()->format('d/m/Y H:i:s')}}

@endcomponent