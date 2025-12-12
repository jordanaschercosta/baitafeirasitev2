<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipacaoBanca extends Model
{
    use HasFactory;

    protected $table = 'participacao_banca';

    protected $fillable = [
        'banca_id',	
        'participacao_id',
    ];

    public $timestamps = true;

    public function participacao()
    {
        return $this->belongsTo(Participacao::class, 'participacao_id', 'id');
    }

    public function banca()
    {
        return $this->belongsTo(Banca::class, 'banca_id', 'id');
    }
}
