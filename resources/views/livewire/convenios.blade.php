<div>

    <div class="container col-md-9" style="padding-left: 200px; position: center">
            <div class="row mb-6">
                <div class="col-md-12 text-center">
                    <h3><strong>Convênios</strong></h3>
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
                                        <th style="text-align: center;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($convenios->count() > 0)
                                        @foreach ($convenios as $c)
                                            <tr>
                                                <td>{{ $c->id }}</td>
                                                <td>{{ $c->nome_convenio }}</td>
                                                <td style="text-align: center;">
                                                    <button class="btn btn-sm btn-primary" wire:click="edit({{ $c->id }})">Editar</button>
                                                    <button class="btn btn-sm btn-danger" wire:click="deleteConfirmation({{ $c->id }})">Deletar</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" style="text-align: center;"><small>Nenhum convênio cadastrado</small></td>
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
                        <h5 class="modal-title">Adicionar Convênio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
    
                        <form wire:submit.prevent="store">
    
                            <div class="form-group row">
                                <label for="nome_convenio" class="col-3">Nome</label>
                                <div class="col-9">
                                    <input type="text" id="nome_convenio" class="form-control" wire:model="nome_convenio">
                                    @error('nome_convenio')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
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