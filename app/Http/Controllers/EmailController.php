<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Jobs\JobsMail;
use App\Models\Email;

class EmailController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function create(){
      return view('admin.emails.create');
    }

    public function store(Request $request){

      $this->validate($request, [
        'name'     => 'required',
        'assunto'  => 'required',
        'mensagem' => 'required|min:3|max:10000',
      ]);

      $emails = $request->email;
      $mail_name = $request->name;

      $i = 0;
      if($request->rascunho === 'Sim'){
        foreach ($emails as $email) {
          $table = new Email;
          $table->titulo = $request->assunto;
          $table->nome = $mail_name[$i];
          $table->email = $email;
          $table->mensagem = $request->mensagem;
          $table->data_envio = $request->data;
          $table->status = 'Pendente';
          $table->user_id = auth()->user()->id;
          $table->save();
          $i++;
        }

        return redirect()->route('home')->with('success', 'E-mail salvo como rascunho');

      } else {

        $data = [
          'from'     => auth()->user()->email,
          'name'     => $mail_name,
          'email'    => $request->email,
          'assunto'  => $request->assunto,
          'mensagem' => $request->mensagem,
        ];

          JobsMail::dispatch($data)->delay(now()->addSeconds('2'));

          foreach ($emails as $email) {
            $table = new Email;
            $table->titulo = $request->assunto;
            $table->nome = $mail_name[$i];
            $table->email = $email;
            $table->mensagem = $request->mensagem;
            $table->data_envio = $request->data;
            $table->status = 'Enviado';
            $table->user_id = auth()->user()->id;
            $table->save();
            $i++;
          }
          return redirect()->route('home')->with('success', 'E-mail enviado com sucesso');
      }

    }

    public function edit($id){

      if(!$emails = Email::find($id)){
        return redirect()->back();
      }

      return view('admin.emails.create', compact('emails'));
    }


    public function update(Request $request, $id){

      $this->validate($request, [
        'name'     => 'required',
        'assunto'  => 'required',
        'mensagem' => 'required|min:3|max:10000',
      ]);

      if(!$emails = Email::find($id)){
        return redirect()->back();
      }

      $emails = $request->email;
      $mail_name = $request->name;

      $i = 0;
      if($request->enviar === 'Não'){
        foreach ($emails as $email) {
            Email::where(['id'=>$id])->update([
            'titulo'     => $request->assunto,
            'nome'       => $mail_name[$i],
            'email'      => $email,
            'mensagem'   => $request->mensagem,
            'data_envio' => $request->data,
            'status'     => 'Pendente',
            'user_id'    => auth()->user()->id,
          ]);
          $i++;
        }

        return redirect()->route('home')->with('success', 'E-mail salvo como rascunho');
      } else {

        $data = [
          'from'     => auth()->user()->email,
          'name'     => $mail_name,
          'email'    => $request->email,
          'assunto'  => $request->assunto,
          'mensagem' => $request->mensagem,
        ];

          JobsMail::dispatch($data)->delay(now()->addSeconds('2'));

          foreach ($emails as $email) {

            Email::where(['id'=>$id])->update([
              'titulo'     => $request->assunto,
              'nome'       => $mail_name[$i],
              'email'      => $email,
              'mensagem'   => $request->mensagem,
              'data_envio' => $request->data,
              'status'     => 'Enviado',
              'user_id'    => auth()->user()->id,
            ]);

          }
          return redirect()->route('home')->with('success', 'E-mail enviado com sucesso');
      }
    }


    public function destroy($id){

      Email::find($id)->delete();
      return back()->with('success', 'E-mail apagado com sucesso!');

    }

}
