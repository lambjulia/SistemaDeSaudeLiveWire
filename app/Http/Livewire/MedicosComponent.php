<?php

namespace App\Http\Livewire;
use App\Models\medicos;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class MedicosComponent extends Component
{
    public $nome_convenio, $delete_id, $edit_id;

    public $view_nome;

    public function store(){

        $this->validate([
            'nome_convenio' => 'required|unique:convenios',
        ]);

        $convenios = new convenios();
        $convenios->nome_convenio = $this->nome_convenio;
        $convenios->save();

        $this->nome_convenio = '';

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal', ['title' => 'Dados salvos com sucesso!', 'icon'=>'success',]);
    }

    public function update($fields) {
        $this->validateOnly($fields, [
            'nome_convenio'=>'required|unique:convenios',

        ]);
    }

    public function close()
    {
        $this->resetInputs();
    }

    public function edit($id)
    {
        $convenios = convenios::where('id', $id)->first();
        $this->edit_id = $convenios->id;
        $this->nome_convenio = $convenios->nome_convenio;


        $this->dispatchBrowserEvent('show-edit-modal');
    }
    
    public function editar()
    {
        //on form submit validation
        $this->validate([
            'nome_convenio' => 'required|unique:convenios'

        ]);

        $convenios = convenios::where('id', $this->edit_id)->first();
        $convenios->nome_convenio = $this->nome_convenio;

        $convenios->save();

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal', ['title' => 'Dados alterados com sucesso!', 'icon'=>'success',]);
    }

    public function resetInputs()
    {
        $this->nome_convenio = '';

    }
    //Delete Confirmation
    public function deleteConfirmation($id)
    {
        $this->delete_id = $id; 

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function deleteData()
    {
        $convenios = convenios::where('id', $this->delete_id)->first();
        $convenios->delete();

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
        $convenios = convenios::where('id', $id)->first();

        $this->view_nome = $convenios->nome_convenio;


        $this->dispatchBrowserEvent('show-view-modal');
    }

    public function closeViewPessoaModal()
    {
        $this->view_nome = '';

    }
    
    public function render()
    {
        $medicos = Medicos::all();
        return view('livewire.medicos', ['medicos'=>$medicos])->layout('livewire.layouts.app');
    }
}
