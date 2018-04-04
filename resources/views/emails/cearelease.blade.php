@component('mail::message')
# Prezado(a) {{$user['name']}}

@component('mail::button', ['url' => 'http://ceaaprofundamento.ademadan.org.br/login'])

	CEA ADEMADAN

@endcomponent

@component('mail::panel', ['url' => ''])

	Seu cadastro no projeto Comunicação e Educalção Ambiental - CEA foi atualizado!

@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent