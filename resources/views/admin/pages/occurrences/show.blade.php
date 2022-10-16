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
                    @foreach ($occurrencesImagens as $occurrencesImagen)
                        <li
                            style="padding:5px; background:#343a40!important;  border-radius:24px; list-style:none; margin:10px 0">
                            <img style=" border-radius:24px "
                                src="https://sopanexos.s3.amazonaws.com/{{ $occurrencesImagen->url }}"
                                alt="{{ $occurrences->title }}" width="500" height="500" />
                        </li>
                    @endforeach
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
