<?php

namespace App\Http\Livewire;
use App\Models\especialidades;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class EspecialidadesComponent extends Component
{
    public $nome_especialidade, $delete_id, $edit_id;

    public $view_nome;

    public function store(){

        $this->validate([
            'nome_especialidade' => 'required|unique:especialidades',
        ]);

        $especialidades = new especialidades();
        $especialidades->nome_especialidade = $this->nome_especialidade;
        $especialidades->save();

        $this->nome_especialidade = '';

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal', ['title' => 'Dados salvos com sucesso!', 'icon'=>'success',]);
    }

    public function update($fields) {
        $this->validateOnly($fields, [
            'nome_especialidade'=>'required|unique:especialidades',

        ]);
    }

    public function resetInputs()
    {
        $this->nome_especialidade = '';

    }

    public function close()
    {
        $this->resetInputs();
    }

    public function edit($id)
    {
        $especialidades = especialidades::where('id', $id)->first();
        $this->edit_id = $especialidades->id;
        $this->nome_especialidade = $especialidades->nome_especialidade;


        $this->dispatchBrowserEvent('show-edit-modal');
    }
    
    public function editar()
    {
        //on form submit validation
        $this->validate([
            'nome_especialidade' => 'required|unique:especialidades'

        ]);

        $especialidades = especialidades::where('id', $this->edit_id)->first();
        $especialidades->nome_especialidade = $this->nome_especialidade;

        $especialidades->save();

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal', ['title' => 'Dados alterados com sucesso!', 'icon'=>'success',]);
    }

    //Delete Confirmation
    public function deleteConfirmation($id)
    {
        $this->delete_id = $id; 

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function deleteData()
    {
        $especialidades = especialidades::where('id', $this->delete_id)->first();
        $especialidades->delete();

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal', ['title' => 'Dados excluídos com sucesso!']);

        $this->delete_id = '';
    }

    public function cancel()
    {
        $this->delete_id = '';
    }

    public function viewDetails($id)
    {
        $especialidades = especialidades::where('id', $id)->first();

        $this->view_nome = $especialidades->nome_especialidade;


        $this->dispatchBrowserEvent('show-view-modal');
    }

    public function closeViewPessoaModal()
    {
        $this->view_nome = '';

    }

    public function render()
    {
        $especialidades = especialidades::all();

        return view('livewire.especialidades', ['especialidades'=>$especialidades])->layout('livewire.layouts.app');
    }
}
