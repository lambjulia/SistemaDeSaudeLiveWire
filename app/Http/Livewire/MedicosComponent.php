<?php

namespace App\Http\Livewire;
use App\Models\medicos;
use App\Models\especialidades;
use App\Models\convenios;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class MedicosComponent extends Component
{
    public $nome, $cpf, $data_nascimento, $genero, $especialidade_id, $convenio_id, $email, $telefone, $delete_id, $edit_id;

    public $view_nome, $view_cpf, $view_data, $view_genero, $view_especialidade, $view_convenio, $view_email, $view_telefone;

    public function store(){

        $this->validate([
            'nome' => 'required|unique:medicos',
            'cpf' => 'required|unique:medicos',
            'data_nascimento' => 'required',
            'genero' => 'required',
            'especialidade_id' => 'required',
            'convenio_id' => 'required',
            'email' => 'required',
            'telefone' => 'required',
        ]);

        $medicos = new medicos();
        $medicos->nome = $this->nome;
        $medicos->cpf = $this->cpf;
        $medicos->data_nascimento = $this->data_nascimento;
        $medicos->genero = $this->genero;
        $medicos->especialidade_id = $this->especialidade_id;
        $medicos->convenio_id = $this->convenio_id;
        $medicos->email = $this->email;
        $medicos->telefone = $this->telefone;
        $medicos->save();

        $this->nome = '';
        $this->cpf = '';
        $this->data_nascimento = '';
        $this->genero = '';
        $this->especialidade_id = '';
        $this->convenio_id = '';
        $this->email = '';
        $this->telefone = '';

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal', ['title' => 'Dados salvos com sucesso!', 'icon'=>'success',]);
    }

    public function update($fields) {
        $this->validateOnly($fields, [
            'nome' => 'required|unique:medicos',
            'cpf' => 'required|unique:medicos',
            'data_nascimento' => 'required',
            'genero' => 'required',
            'especialidade_id' => 'required',
            'convenio_id' => 'required',
            'email' => 'required',
            'telefone' => 'required',

        ]);
    }

    public function close()
    {
        $this->resetInputs();
    }

    public function edit($id)
    {
        $medicos = medicos::where('id', $id)->first();
        $this->edit_id = $medicos->id;
        $this->nome = $medicos->nome;
        $this->cpf = $medicos->cpf;
        $this->data_nascimento = $medicos->data_nascimento;
        $this->genero = $medicos->genero;
        $this->especialidade_id = $medicos->especialidade_id;
        $this->convenio_id = $medicos->convenio_id;
        $this->email = $medicos->email;
        $this->telefone = $medicos->telefone;

        $this->dispatchBrowserEvent('show-edit-modal');
    }
    
    public function editar()
    {
        //on form submit validation
        $this->validate([
            'nome' => 'required|unique:medicos',
            'cpf' => 'required|unique:medicos',
            'data_nascimento' => 'required',
            'genero' => 'required',
            'especialidade_id' => 'required',
            'convenio_id' => 'required',
            'email' => 'required',
            'telefone' => 'required',

        ]);

        $medicos = medicos::where('id', $this->edit_id)->first();
        $medicos->nome = $this->nome;
        $medicos->cpf = $this->cpf;
        $medicos->data_nascimento = $this->data_nascimento;
        $medicos->genero = $this->genero;
        $medicos->especialidade_id = $this->especialidade_id;
        $medicos->convenio_id = $this->convenio_id;
        $medicos->email = $this->email;
        $medicos->telefone = $this->telefone;

        $medicos->save();

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal', ['title' => 'Dados alterados com sucesso!', 'icon'=>'success',]);
    }

    public function resetInputs()
    {
        $this->nome = '';
        $this->cpf = '';
        $this->data_nascimento = '';
        $this->genero = '';
        $this->especialidade_id = '';
        $this->convenio_id = '';
        $this->email = '';
        $this->telefone = '';

    }
    //Delete Confirmation
    public function deleteConfirmation($id)
    {
        $this->delete_id = $id; 

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function deleteData()
    {
        $medicos = medicos::where('id', $this->delete_id)->first();
        $medicos->delete();

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
        $medicos = medicos::where('id', $id)->first();

        $this->view_nome = $medicos->nome;
        $this->view_cpf = $medicos->cpf;
        $this->view_data = $medicos->data_nascimento;
        $this->view_genero = $medicos->genero;
        $this->view_especialidade = $medicos->especialidade_id;
        $this->view_convenio = $medicos->convenio_id;
        $this->view_email = $medicos->email;
        $this->view_telefone = $medicos->telefone;
        $this->dispatchBrowserEvent('show-view-modal');
    }

    public function closeViewPessoaModal()
    {
        $this->view_nome = '';
        $this->view_cpf = '';
        $this->view_data = '';
        $this->view_genero = '';
        $this->view_convenio = '';
        $this->view_convenio = '';
        $this->view_email = '';
        $this->view_telefone = '';

    }
    
    public function render()
    {
        $medicos = Medicos::all();
        $convenios = convenios::all();
        $especialidades = especialidades::all();
        return view('livewire.medicos', ['medicos'=>$medicos,'convenios'=>$convenios,'especialidades'=>$especialidades ])->layout('livewire.layouts.app');
    }
}
