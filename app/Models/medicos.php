<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicos extends Model
{
    use HasFactory;

    protected $table = 'medicos';

    public function convenios(){
        return convenios::where('id','=',$this->convenio_id)->value('nome_convenio');
    }
    public function especialidades(){
        return especialidades::where('id','=',$this->especialidade_id)->value('nome_especialidade');
    }
}
