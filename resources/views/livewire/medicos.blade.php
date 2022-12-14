<div>

    <div class="container col-md-10" style="padding-left: 200px; position: center">
            <div class="row mb-6">
                <div class="col-md-12 text-center">
                    <h3><strong>Médicos</strong></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-sm btn-primary" style="float: right;" data-toggle="modal" data-target="#addModal">Novo Cadastro</button>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>CPF</th>
                                        <th>Telefone</th>
                                        <th>Especialidade</th>
                                        <th style="text-align: center;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($medicos->count() > 0)
                                        @foreach ($medicos as $m)
                                            <tr>
                                                <td>{{ $m->id }}</td>
                                                <td>{{ $m->nome }}</td>
                                                <td>{{ $m->cpf }}</td>
                                                <td>{{ $m->telefone }}</td>
                                                <td>{{ $m->especialidades()}}</td>
                                                <td style="text-align: center;">
                                                    <button class="btn btn-sm btn-secondary" wire:click="viewDetails({{ $m->id }})">Ver</button>
                                                    <button class="btn btn-sm btn-primary" wire:click="edit({{ $m->id }})">Editar</button>
                                                    <button class="btn btn-sm btn-danger" wire:click="deleteConfirmation({{ $m->id }})">Deletar</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" style="text-align: center;"><small>Nenhum médico cadastrado</small></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div wire:ignore.self class="modal fade" id="addModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Adicionar Médico</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
    
                        <form wire:submit.prevent="store">
                            <div class="form-group">
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                <label for="nome">Nome</label>
                                    <input type="text" id="nome" class="form-control" wire:model="nome">
                                    @error('nome')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
            
                                <div class="form-group col-md-6">
                                <label for="cpf">CPF</label>
                                    <input type="text" id="cpf" class="form-control" wire:model="cpf">
                                    @error('cpf')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
        
                                <div class="form-group col-md-6">
                                <label for="data_nascimento">Data de Nascimento</label>
                                    <input type="date" id="data_nascimento" class="form-control" wire:model="data_nascimento">
                                    @error('data_nascimento')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
 
                                <div class="form-group col-md-6">
                                <label for="genero">Gênero</label>
                                <div class="input-group">
                                    <select id="genero" name="genero" class="form-control">
                                        <option value="">Selecione</option>
                                        <option value="feminino">Feminino</option>
                                        <option value="masculino">Masculino</option>
                                    </select>
                                </div>
                                    @error('genero')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                          
                                <div class="form-group col-md-6">
                                <label for="especialidade_id">Especialidade</label>
                                <div class="input-group">
                                    <select id="especialidade_id" name="especialidade_id" class="form-control">
                                        <option value="">Selecione</option>
                                        @foreach($especialidades as $e)
                                            <option value="{{ $e->id }}">{{ $e->nome_especialidade }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                    @error('especialidade_id')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                <label for="convenio_id">Convênios</label>
                                <div class="input-group">
                                    <select id="convenio_id" name="convenio_id" class="form-control">
                                        <option value="">Selecione</option>
                                        @foreach($convenios as $c)
                                            <option value="{{ $c->id }}">{{ $c->nome_convenio }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                    @error('convenio_id')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                    <input type="text" id="email" class="form-control" wire:model="email">
                                    @error('email')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                     
                                <div class="form-group col-md-6">
                                <label for="telefone">Telefone</label>
                                    <input type="text" id="telefone" class="form-control" wire:model="telefone">
                                    @error('telefone')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            </div>
    
                            <div class="form-group row" >
                                <div class="col-9">
                                    <button type="submit"  class="btn btn-sm btn-primary">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
        <div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
    
                        <form wire:submit.prevent="editar">

                            <div class="form-group row">
                                <label for="nome_convenio" class="col-3">Nome</label>
                                <div class="col-9">
                                    <input type="text" id="nome_convenio" class="form-control" wire:model="nome_convenio">
                                    @error('nome_convenio')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-9">
                                    <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
        <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Deletar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pt-4 pb-4">
                        <h6>Você tem certeza que quer deletar?</h6>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-sm btn-primary" wire:click="cancel()" data-dismiss="modal" aria-label="Close">Cancelar</button>
                        <button class="btn btn-sm btn-danger" wire:click="deleteData()">Sim</button>
                    </div>
                </div>
            </div>
        </div>
    

    </div>
    @push('scripts')
        <script>
            window.addEventListener('close-modal', event =>{
                $('#addModal').modal('hide');
                $('#editModal').modal('hide');
                $('#deleteModal').modal('hide');
            });
            window.addEventListener('show-edit-modal', event =>{
                $('#editModal').modal('show');
            });
            window.addEventListener('show-delete-confirmation-modal', event =>{
                $('#deleteModal').modal('show');
            });
            window.addEventListener('swal',function(e){
            Swal.fire(e.detail);
        });
        </script>
    @endpush