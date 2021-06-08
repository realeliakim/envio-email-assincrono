
@component('mail::message')

  <p>Olá, {{ $nome }}, Como vai? </p>

  <p>{{ $mensagem }}</p>

  <br />
  <hr />

  Atenciosamente.

@endcomponent
