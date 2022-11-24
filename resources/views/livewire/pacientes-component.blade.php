<div>

<div class="container col-md-9" style="padding-left: 200px; position: center">
        <div class="row mb-6">
            <div class="col-md-12 text-center">
                <h3><strong>Pacientes</strong></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 style="float: left;"><strong>Pacientes Cadastradas</strong></h5>
                        <button class="btn btn-sm btn-primary" style="float: right;" data-toggle="modal" data-target="#addModal">Novo Cadastro</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th style="text-align: center;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($pacientes->count() > 0)
                                    @foreach ($pacientes as $p)
                                        <tr>
                                            <td>{{ $p->id }}</td>
                                            <td>{{ $p->nome }}</td>
                                            <td>{{ $p->email }}</td>
                                            <td>{{ $p->telefone }}</td>
                                            <td style="text-align: center;">
                                                <button class="btn btn-sm btn-secondary" wire:click="viewDetails({{ $p->id }})">Ver</button>
                                                <button class="btn btn-sm btn-primary" wire:click="edit({{ $p->id }})">Editar</button>
                                                <button class="btn btn-sm btn-danger" wire:click="deleteConfirmation({{ $p->id }})">Deletar</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" style="text-align: center;"><small>Nenhum paciente cadastrado</small></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
