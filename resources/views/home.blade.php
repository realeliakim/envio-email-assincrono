@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">

  @if(sizeof($emails) == 0)
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">{{ __('LISTA DE EMAILS VAZIO') }}</div>
          <div class="card-body center">
            <h5>Nenhum e-mail cadastrado ou enviado até o momento.</h5>
            <h5>Cadastre ou envie o seu primeiro email: &nbsp;
              <a href="{{ route('emails.create') }}" class="btn btn-success btn-md">+ Criar novo email</a>
            </h5>
          </div>
        </div>
      </div>
    </div>


  @else
    <div class="col-md-12">
      @if($message = Session::get('success'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{ $message }}</strong>
        </div>
      @endif
      <div class="offset-md-10">
        <a href="{{ route('emails.create') }}" class="w100 btn btn-success btn-md">+ Criar novo email</a>
      </div>
      <br />

      <div class="card">
        <div class="card-header">{{ __('LISTA DE EMAILS') }}</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            <table class="table table-striped table-hover table-bordered">
              <thead>
                <tr>
                  <th class="w5 center" scope="col">#</th>
                  <th class="w30 center" scope="col">ASSUNTO</th>
                  <th class="w15 center" scope="col">STATUS</th>
                  <th class="w20 center" scope="col">DATA DE ENVIO</th>
                  <th class="w30 center" scope="col">AÇÕES</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($emails as $email)
                <tr>
                  <th class="center" scope="row">{{$email->id}}</th>
                  <td class="center">{{$email->titulo}}</td>
                  @if($email->status == 'Enviado')
                  <td class="center"><span class="badge status badge-success">{{$email->status}}</span></td>
                  @else
                  <td class="center"><span class="badge status badge-danger">{{$email->status}}</span></td>
                  @endif
                  <td class="center">{{date('d/m/Y H:i', strtotime($email->data_envio))}}</td>
                  <td class="center flex">
                    <button type="button" class="action btn btn-dark btn-sm text-light" data-toggle="modal" data-target="#a{{$email->id}}">
                      Visualizar
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="a{{$email->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Informações sobre Email #{{$email->id}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Destinátario: <strong>{{$email->nome}} &nbsp; < {{$email->email}} > </strong></p>
                            <p>Assunto: <strong>{{$email->titulo}}</strong></p>
                            <p>Assunto: <strong>{{$email->mensagem}}</strong></p>
                            <hr />
                            @if( $email->status === 'Enviado')
                              <em>* E-mail enviado no dia {{date('d/m/Y', strtotime($email->data_envio))}}. Deseja reenviá-lo com edição? </em>

                            @else

                              <em>* E-mail com status <strong>{{$email->status}}</strong>. Deseja enviá-lo com edição? </em>

                            @endif
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="w20 btn btn-danger" data-dismiss="modal">Fechar</button>
                            @if( $email->status === 'Enviado')
                              <a class="w20 btn btn-primary" href="{{ route('emails.edit', $email->id)}}">
                                Reenviar
                              </a>
                            @else
                              <a class="w20 btn btn-primary" href="{{ route('emails.edit', $email->id)}}">
                                Enviar
                              </a>
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                    <a href="{{ route('emails.edit', $email->id)}}">
                      <button class="action btn btn-primary btn-sm text-light">Editar</button>
                    </a>
                    <form action="{{ route('emails.delete', $email->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="action btn-delete btn btn-danger btn-sm text-light">Excluir</button>
                    </form>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  @endif

  </div>
</div>
@endsection
