@extends('adminlte::page')

@section('title', "Detalhes Tipo de Ocorrência { $occurrences->title }")

@section('content_header')
    <h1 class="m-0 text-dark">Detalhes da Ocorrência <b>{{ $occurrences->title }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @csrf
            <div class="row">
                <ul>
                    <li><b>Nome:</b> {{ $occurrences->title }}</li>
                    <li><b>Ultima Atualização:</b> {{ date('d/M/Y h:m:s', strtotime($occurrences->updated_at)) }}</li>
                    <li><b>E-mail:</b> {{ $occurrences->email }}</li>
                    <li><b>Endereço:</b> {{ $occurrences->address }}</li>
                </ul>
            </div>
            <!--row-->
            @include('admin.includes.alerts')

            <form action="{{ route('occurrences.destroy', $occurrences->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="far fa-trash-alt"></i>
                    <span class=m-4>Excluir</span>
                </button>
            </form>
        </div>
        <!--card-body-->
    </div>
    <!--card-->
@endsection
