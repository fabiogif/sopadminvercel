@extends('adminlte::page')
@section('title', 'Painel de Controle')

@section('content_header')


    <h1 class="m-0 text-dark">Painel de Controle</h1>
    <div class="row">

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalUsers }}</h3>
                    <p>Usuário</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="/admin/users" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalIssuings }}</h3>
                    <p>Orgão</p>
                </div>
                <div class="icon">
                    <i class="fas fa-tablet"></i>
                </div>
                <a href="/admin/issuings" class="small-box-footer">Mais informações <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totalTypeOccurrence }}</h3>
                    <p>Tipo de Ocorrência</p>
                </div>
                <div class="icon">
                    <i class="fas fa-layer-group"></i>
                </div>
                <a href="/admin/typeOccurrences" class="small-box-footer">Mais informações <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $totalOcurrencies }}</h3>
                    <p>Ocorrência</p>
                </div>
                <div class="icon">
                    <i class="fas fa-utensils"></i>
                </div>
                <a href="/admin/occurrences" class="small-box-footer">Mais informações <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-address-book "></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Perfis</span>
                    <span class="info-box-number">
                        {{ $totalTypeOccurrence }}
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-address-card  "></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Cargos</span>
                    <span class="info-box-number">{{ $totalRoles }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-list-ul "></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Usuários</span>
                    <span class="info-box-number">{{ $totalUsers }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-lock"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Ocorrências</span>
                    <span class="info-box-number">{{ $totalOcurrencies }}</span>
                </div>
                <div class="icon">
                    <i class="fas fa-layer-group"></i>
                </div>


                <!-- /.info-box-content -->
            </div>

            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>

@stop

@section('content')

@stop
