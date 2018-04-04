@component('mail::message')
# Olá {{$user['name']}}

@component('mail::button', ['url' => 'http://ceaaprofundamento.ademadan.org.br/login'])

	CEA ADEMADAN

@endcomponent


@component('mail::panel', ['url' => ''])

	Seu cadastro no projeto Comunicação e Educalção Ambiental - CEA foi realizado com sucesso. Aguarde que em breve seu acesso será liberado!

@endcomponent



Obrigado,<br>
{{ config('app.name') }}
@endcomponent
