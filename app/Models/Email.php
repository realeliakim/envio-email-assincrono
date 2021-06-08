<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $table = 'email_box';

    protected $fillable = [
      'titulo',
      'nome',
      'email',
      'mensagem',
      'data_envio',
      'user_id',
    ];


}
