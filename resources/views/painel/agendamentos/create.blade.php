@extends('layouts.template')

@section('title', 'Solicitar Agendamento')

@section('head')
<link rel="stylesheet" href="/css/agendamento.css">
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{route('agendamentos-store')}}" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <div class="container">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="local">Local:</label>
                                        <select class="form-select @error('idLocal') is-invalid @enderror" id="local" onchange="limitarSetores()" name="idLocal">
                                            <option value="">Selecione</option>
                                            @foreach($locais as $local)
                                            <option value="{{$local->id}}" {{$local->id == old('idLocal') ? 'selected' : ''}}>{{$local->nome}}</option>
                                            @endforeach
                                        </select>
                                        @error('idLocal')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="setor">Setor:</label>
                                        <select class="form-select @error('idSetor') is-invalid @enderror" id="setor" name="idSetor">
                                            <option value="">Selecione</option>
                                            @foreach($setores as $setor)
                                            <option value="{{$setor->id}}" {{$setor->id == old('idSetor') ? 'selected' : ''}}>{{$setor->nome}}</option>
                                            @endforeach
                                        </select>
                                        @error('idSetor')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="periodo">Período:</label>
                                        <select class="form-select @error('idPeriodo') is-invalid @enderror" id="periodo" name="idPeriodo">
                                            <option value="">Selecione</option>
                                            @foreach($periodos as $periodo)
                                            <option value="{{$periodo->id}}" {{$periodo->id == old('idPeriodo') ? 'selected' : ''}}>{{$periodo->nome}}</option>
                                            @endforeach
                                        </select>
                                        @error('idPeriodo')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <label id="DataSelecionada" for="DataSelecionada">Data Selecionada:</label>
                                <input type="text" id="data" class="form-control data" name="data" readonly>
                                <div>
                                    <br>
                                    <button type="button" class="btn btn-primary" onclick="$('#modal').modal('show')">Agendar</button>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="calendar">
                                <div class="calendar-header">
                                    <!-- BOTÃO DO MÊS -->
                                    <button class="btn btn-outline-info btn-lg" type="button" id="month-picker"></button>
                                    <div class="year-picker">
                                        <span id="year"></span>
                                    </div>
                                </div>
                                <div class="calendar-body">
                                    <div class="calendar-week-day">
                                        <div>D</div>
                                        <div>S</div>
                                        <div>T</div>
                                        <div>Q</div>
                                        <div>Q</div>
                                        <div>S</div>
                                        <div>S</div>
                                    </div>
                                    <div class="calendar-days" id="calendar-days">
                                    </div>
                                </div>
                                <div class="calendar-footer">
                                    <div class="legend">
                                        <div class="calendar-footer-item">
                                            <div class="circle disponivel"></div>
                                            <span>Disponível</span>
                                        </div>
                                        <div class="calendar-footer-item">
                                            <div class="circle cheio"></div>
                                            <span>Cheio</span>
                                        </div>
                                        <div class="calendar-footer-item">
                                            <div class="circle indisponivel"></div>
                                            <span>Indisponível</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="card month-list p-3 position-fixed" style="display: none" id="month-list"></div>
                                <div class="overlay-cover-screen" id="overlay-month-list" style="display: none"></div>

                            </div>
                        </div>


                    </div>
                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">
                                        <p id="tituloModal">Agendar?</p>
                                    </h5>
                                    <button type="button" class="close btn btn-secondary" data-dismiss="modal" onclick="$('#modal').modal('hide')" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Realmente deseja agendar na data:
                                    <!-- <input type="text" class="form-control data" name="data" readonly> -->
                                    <strong>
                                        <p class="data text-danger"></p>
                                    </strong>
                                </div>
                                <div class="modal-footer" id="modalFooter">
                                    <button type="submit" class="btn btn-primary">Agendar</button>
                                    <button type="button" class="btn btn-secondary" onclick="$('#modal').modal('hide')">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="/js/agendamento.js"></script>
@endsection