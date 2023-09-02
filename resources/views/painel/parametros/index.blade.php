@extends('layouts.template')

@section('title', 'Parâmetros de Agendamento')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTabs">
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#locais">Locais</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#setores">Setores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#periodos">Periodos</a>
                    </li>
                </ul>
                <div class="tab-content mt-3">
                    <div id="locais" class="tab-pane fade show">
                        <h3>Cadastrar/Editar Locais</h3>
                        <form action="{{route('parametrosLocal-storeOrUpdate', ['id' => isset($registroL) ? $registroL->ID : null])}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="nomeLocal">Nome:</label>
                                    <input type="text" class="form-control @error('nomeLocal') is-invalid @enderror" id="nomeLocal" value="{{ isset($registroL) ? old('nomeLocal', $registroL->nome) : old('nomeLocal') }}" name="nomeLocal">
                                    @error('nomeLocal')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-success">Salvar</button>
                                    @if(isset($registroL))
                                    <a href="{{route('parametros-createOrEdit')}}" class="btn btn-primary">Cancel</a>
                                    @endif
                                </div>
                            </div>
                        </form>
                        <hr class="my-4 divider">
                        <table id="tabela" class="table table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="col-1">#</th>
                                    <th class="col-10">Nome</th>
                                    <th class="col-1">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($locais as $local)
                                <tr>
                                    <td class="col-1">{{$local->id}}</td>
                                    <td class="col-10">{{$local->nome}}</td>
                                    <td class="d-flex col-1">
                                        <a href="{{ route('parametros-createOrEdit', ['tab'=>'locais','id'=>$local->id]) }}" class="btn btn-primary me-2"><i class="fas fa-edit" style="color: #ffffff;"></i></a>
                                        <form action="{{route('parametrosLocal-destroy', ['id'=>$local->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt" style="color: #ffffff;"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="setores" class="tab-pane fade">
                        <h3>Cadastrar/Editar Setores</h3>
                        <form action="{{route('parametrosSetor-storeOrUpdate', ['id' => isset($registroS) ? $registroS->id : null])}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="nomeSetor">Nome:</label>
                                    <input type="text" class="form-control @error('nomeSetor') is-invalid @enderror" id="nomeSetor" value="{{ isset($registroS) ? old('nomeSetor', $registroS->nome) : old('nomeSetor') }}" name="nomeSetor">
                                    @error('nomeSetor')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-success">Salvar</button>
                                    @if(isset($registroS))
                                    <a href="{{route('parametros-createOrEdit')}}" class="btn btn-primary">Cancel</a>
                                    @endif
                                </div>
                            </div>
                        </form>
                        <hr class="my-4 divider">
                        <table id="tabela2" class="table table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="col-1">#</th>
                                    <th class="col-10">Nome</th>
                                    <th class="col-1">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($setores as $setor)
                                <tr>
                                    <td class="col-1">{{$setor->id}}</td>
                                    <td class="col-10">{{$setor->nome}}</td>
                                    <td class="d-flex col-1">
                                        <a href="{{ route('parametros-createOrEdit', ['tab'=>'setores','id'=>$setor->id]) }}" class="btn btn-primary me-2"><i class="fas fa-edit" style="color: #ffffff;"></i></a>
                                        <form action="{{route('parametrosSetor-destroy', ['id'=>$setor->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt" style="color: #ffffff;"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="periodos" class="tab-pane fade">
                        <h3>Cadastrar/Editar Períodos</h3>
                        <form action="{{route('parametrosPeriodo-storeOrUpdate', ['id' => isset($registroP) ? $registroP->id : null])}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="nomePeriodo">Nome:</label>
                                    <input type="text" class="form-control @error('nomePeriodo') is-invalid @enderror" id="nomePeriodo" value="{{ isset($registroP) ? old('nomePeriodo', $registroP->nome) : old('nomePeriodo') }}" name="nomePeriodo">
                                    @error('nome')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-success">Salvar</button>
                                    @if(isset($registroP))
                                    <a href="{{route('parametros-createOrEdit')}}" class="btn btn-primary">Cancel</a>
                                    @endif
                                </div>
                            </div>
                        </form>
                        <hr class="my-4 divider">
                        <table id="tabela3" class="table table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="col-1">#</th>
                                    <th class="col-10">Nome</th>
                                    <th class="col-1">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($periodos as $periodo)
                                <tr>
                                    <td class="col-1">{{$periodo->id}}</td>
                                    <td class="col-10">{{$periodo->nome}}</td>
                                    <td class="d-flex col-1">
                                        <a href="{{ route('parametros-createOrEdit', ['tab'=>'periodos','id'=>$periodo->id]) }}" class="btn btn-primary me-2"><i class="fas fa-edit" style="color: #ffffff;"></i></a>
                                        <form action="{{route('parametrosPeriodo-destroy', ['id'=>$periodo->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt" style="color: #ffffff;"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tabela').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/pt-BR.json',
            },
        });
        $('#tabela2').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/pt-BR.json',
            },
        });
        $('#tabela3').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/pt-BR.json',
            },
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Obtenha o valor do tab selecionado do PHP (variável $tab) passado para a visão
        const selectedTab = "{{ $tab }}";
        // Ative o tab selecionado
        $('#myTabs a[href="#' + selectedTab + '"]').tab('show');
    });
</script>
@if(isset($registroL) || isset($registroS) || isset($registroP))
<script>
    $('#myTabs').on('shown.bs.tab', function(e) {
        const selectedTab = "{{ $tab }}";
        $('#myTabs a[href="#' + selectedTab + '"]').tab('show');
    });
</script>
@endif
@endsection