<?php

namespace App\Http\Livewire;
use App\Models\Pacientes;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class PacientesComponent extends Component
{
    public function render()
    {
        $pacientes = Pacientes::all();
        return view('livewire.pacientes-component', ['pacientes'=>$pacientes])->layout('livewire.layouts.app');
    }
}
