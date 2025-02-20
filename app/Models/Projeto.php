<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projeto extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id', 'name', 'description', 'icone', 'slug', 'initial_date', 'end_date', 'status', 'percent', 'resp_nome', 'resp_email', 'resp_telefone'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'client_id');
    }
}
