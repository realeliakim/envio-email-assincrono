@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-11">

    @if(count($errors) > 0)
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @if($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>{{ $message }}</strong>
      </div>
    @endif
    <div class="card">
        @if(isset($emails))
          <div class="card-header">Editar Email #{{ $emails->id }}</div>
        @else
          <div class="card-header">Cadastrar novo Email</div>
        @endif

          <div class="card-body">
            @if(!isset($emails))

              <form method="POST" action="{{ route('emails.store') }}">
                @csrf
                <div class="form-group row">
                  <label for="titulo" class="col-md-2 col-form-label text-md-center">{{ __('Destino:') }}</label>
                  <div class="col-md-4">
                    <input id="name" type="text" class="form-control" name="name[]" placeholder="Nome" value="" required autocomplete="" autofocus>
                  </div>

                  <div class="col-md-5">
                    <input id="email" type="email" class="form-control" name="email[]" placeholder="Email" value="" required autocomplete="" autofocus>
                  </div>
                  <div class="col-md-1 col-form-label text-md-center">
                    <button onClick=adicionar(); class="adicionar btn btn-info btn-sm text-light">
                      +
                    </button>
                  </div>
                </div>

                <div id="destinoHTML"></div>

                <br />

                <div class="form-group row">
                  <label for="assunto" class="col-md-2 col-form-label text-md-center">{{ __('Assunto') }}</label>

                  <div class="col-md-9 mb-3">
                    <input id="assunto" type="text" class="form-control" name="assunto" value="" required autocomplete="" autofocus>
                  </div>

                </div>

                <div class="form-group row">
                  <label for="mensagem" class="col-md-2 col-form-label text-md-center">{{ __('Mensagem') }}</label>

                  <div class="col-md-9 mb-3">
                    <textarea id="mensagem" type="text" class="form-control" name="mensagem" required autocomplete=""></textarea>
                  </div>
                </div>

                <div class="row">
                  <label for="rascunho" class="col-md-2 col-form-label text-md-center">{{ __('Rascunho') }}</label>
                  <div class="col-md-4 mb-3 rascunho-radio">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="rascunho" onChange="check(this)" id="radio1" value="Sim">
                      <label class="form-check-label" for="inlineRadio1">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="rascunho" onChange="check(this)" checked id="radio2" value="Não">
                      <label class="form-check-label" for="inlineRadio2">Não</label>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-6">
                    <input type="hidden" class="form-control" name="data" value="{{date('Y-m-d H:i:s')}}" required autocomplete="" />
                  </div>
                </div>

                <div class="form-group row mb-3">
                  <div class="col-md-5 offset-md-5">
                    <button type="submit" class="btn btn-success" id="btn-submit">
                      {{ __('Enviar e-mail') }}
                    </button>
                    &nbsp;
                  </div>
                </div>
              </form>

            @else

              <form method="POST" action="{{ route('emails.update', $emails->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                  <label for="titulo" class="col-md-2 col-form-label text-md-center">{{ __('Destino:') }}</label>
                  <div class="col-md-4">
                    <input id="nome" type="text" class="form-control" name="name[]" placeholder="Nome" value="{{$emails->nome}}" required autocomplete="" autofocus>
                  </div>

                  <div class="col-md-5">
                    <input id="email" type="email" class="form-control" name="email[]" placeholder="Email" value="{{$emails->email}}" required autocomplete="" autofocus>
                  </div>
                  <div class="col-md-1 col-form-label text-md-center">
                    <input type="button" onClick=adicionar(); value="+" class="adicionar btn btn-info btn-sm text-light" />
                  </div>
                </div>

                <div id="destinoHTML"></div>

                <br />

                <div class="form-group row">
                  <label for="assunto" class="col-md-2 col-form-label text-md-center">{{ __('Assunto') }}</label>

                  <div class="col-md-9 mb-3">
                    <input id="assunto" type="text" class="form-control" name="assunto" value="{{$emails->titulo}}" required autocomplete="" autofocus>
                  </div>

                </div>

                <div class="form-group row">
                  <label for="mensagem" class="col-md-2 col-form-label text-md-center">{{ __('Mensagem') }}</label>

                  <div class="col-md-9 mb-3">
                    <textarea id="mensagem" type="text" class="form-control" name="mensagem" required autocomplete="">{{$emails->mensagem}}</textarea>
                  </div>
                </div>

                <div class="row">
                  @if($emails->status == 'Enviado')
                    <label for="rascunho" class="col-md-2 col-form-label text-md-center">{{ __('Reenviar?') }}</label>
                  @else
                    <label for="rascunho" class="col-md-2 col-form-label text-md-center">{{ __('Enviar?') }}</label>
                  @endif
                  <div class="col-md-3 mb-3 rascunho-radio">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="enviar" onClick="reverse(this)" @if($emails->status != 'Enviado') checked @endif id="radio1" value="Sim">
                      <label class="form-check-label" for="inlineRadio1">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="enviar" onClick="reverse(this)" @if($emails->status != 'Pendente') checked @endif id="radio2" value="Não">
                      <label class="form-check-label" for="inlineRadio2">Não</label>
                    </div>
                  </div>
                  <div class="col-md-3 mb-3 rascunho-radio ">
                  @if($emails->status == 'Enviado')
                    <em>E-mail enviado dia {{ date('d/m/Y', strtotime($emails->data_envio)) }}</em>
                  @endif
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-6">
                    <input type="hidden" class="form-control" name="data" value="{{date('Y-m-d H:i:s')}}" required autocomplete="" />
                  </div>
                </div>
                <br />

                <div class="form-group row mb-3">
                  <div class="col-md-5 offset-md-5">
                    @if($emails->status == 'Enviado')
                      <button type="submit" disabled class="btn btn-success" id="btn-submit">
                        Salvar e Reenviar e-mail
                      </button>
                      @else
                      <button type="submit" class="btn btn-success" id="btn-submit">
                        Salvar e Enviar e-mail
                      </button>
                      @endif
                    </button>
                    &nbsp;
                  </div>
                </div>
              </form>

          @endif

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

