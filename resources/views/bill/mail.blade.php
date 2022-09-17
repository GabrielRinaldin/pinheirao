@component('mail::message')

Olá {{ $user['name'] }}
<br>
<br>Aqui está sua fatura referente ao mês {{now()->format('m')}} de {{now()->format('Y')}} no valor de
{{$bill['amount']}}
<br>Clique <a href="{{url('/pagar-boleto', $bill['id'])}}">aqui</a> para realizar o pagamento!
<br>data limite {{$bill["due_at"]}} 

@endcomponent