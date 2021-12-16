@include('admin.includes.alerts')
<?php if (!isset($occurrences)) {
    $typeoccurrences_id = '';
    $issuingsId = '';
} else {
    $typeoccurrences_id = $occurrences->type_occurrences_id;
    $issuingsId = $occurrences->issuings_id;
} ?>
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="title">Nome Completo:</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nome Completo"
                        value="{{ $occurrences->name ?? old('name') }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="title">Titulo:</label>
                    <input type="text" name="title" class="form-control" placeholder="Titulo"
                        value="{{ $occurrences->title ?? old('title') }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="title">Endereço:</label>
                    <input type="text" name="address" class="form-control" placeholder="Endereço"
                        value="{{ $occurrences->address ?? old('address') }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="title">E-mail:</label>
                    <input type="email" name="email" class="form-control" placeholder="E-mail"
                        value="{{ $occurrences->email ?? old('email') }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="latitude">Latitude:</label>
                    <input type="text" name="latitude" class="form-control" placeholder="Latitude"
                        value="{{ $occurrences->latitude ?? old('latitude') }}">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="longitude">Longitude:</label>
                    <input type="text" name="longitude" class="form-control" placeholder="Longitude"
                        value="{{ $occurrences->longitude ?? old('longitude') }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="type_occurrences_id">Tipo Ocorrência:</label>
                    <select name="type_occurrences_id" class="form-control">
                        <option value="">Selecione...</option>
                        @foreach ($typeOccurrences as $key => $typeOccurrence)
                            <option value="{{ $typeOccurrence->id }}"
                                {{ $typeOccurrence->id == $typeoccurrences_id ? 'selected' : '' }}>
                                {{ $typeOccurrence->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="issuings_id">Orgão:</label>
                    <select name="issuings_id" id="issuings_id" class="form-control">
                        <option value="">Selecione...</option>
                        @foreach ($issuings as $key => $issuing)
                            <option value="{{ $issuing->id }}" {{ $issuing->id == $issuingsId ? 'selected' : '' }}>
                                {{ $issuing->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>Anexo:</label>
                <input type="file" name="anexo" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <textarea cols="40" rows="5" name="description" id="description"
                        class="form-control">{{ $occurrences->description ?? old('description') }}</textarea>

                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-success">Salvar</button>
            </div>
        </div>
    </div>

</div>
<!--row-->
