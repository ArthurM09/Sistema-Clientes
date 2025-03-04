<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mensagem extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mensagens';
    protected $fillable = [
        'atendimento_id', 'user_id', 'visualizacao', 'mensagem', 'anexo'
    ];

    public function atendimento()
    {
        return $this->belongsTo(Atendimento::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
