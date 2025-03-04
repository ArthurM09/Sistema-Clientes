<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Atendimento extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'project_id', 'assunto', 'descricao', 'status'
    ];

    public function projeto()
    {
        return $this->belongsTo(Projeto::class, 'project_id');
    }

    public function mensagens()
    {
        return $this->hasMany(Mensagem::class);
    }
}
