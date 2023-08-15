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
                <form method="POST">
                    <div class="container-agendamento">
                        <div class="form-group col">
                            <div class="select-container">
                                <label>Hotel</label>
                                <select id="hotel" name="hotel" class="form-select" onchange="limitarSetores()" aria-label="Default select example">
                                    <option selected>Selecione</option>
                                    <option value="HOTEL - BELA VISTA">HOTEL - BELA VISTA</option>
                                    <option value="HOTEL - VILA BUSINESS">HOTEL - VILA BUSINESS</option>
                                </select>
                                <label>Setor</label>
                                <select id="setor" name="setor" class="form-select" aria-label="Default select example">
                                    <option selected>Selecione</option>
                                    <option value="Barman">Barman</option>
                                    <option value="Cozinha">Cozinha</option>
                                    <option value="Garçom">Garçom</option>
                                    <option value="Governança">Governança</option>
                                    <option value="Recepção">Recepção</option>
                                </select>
                                <label>Período</label>
                                <select name="periodo" class="form-select" aria-label="Default select example">
                                    <option selected>Selecione</option>
                                    <option value="manha">Manhã</option>
                                    <option value="tarde">Tarde</option>
                                    <option value="integral">Integral</option>
                                </select>
                            </div>
                            <label id="DataSelecionada" for="DataSelecionada">Data Selecionada:</label>
                            <br>
                            <input name="data" id="data" type="text" required readonly>
                            <div class="asdhfgdskhfgkhg">
                                <br>
                                <button type="submit" class="btn btn-primary">Agendar</button>
                            </div>
                        </div>
                        <div class="calendar col">
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
                                <div class="calendar-days">
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
                            <div class="card month-list p-3 d-flex position-fixed"></div>
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