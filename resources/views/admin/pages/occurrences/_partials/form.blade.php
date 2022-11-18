@include('admin.includes.alerts')
<?php
if (!isset($occurrences)) {
    $typeoccurrences_id = '';
    $status_occurrences_id = '';

    $issuingsId = '';
} else {
    $typeoccurrences_id = $occurrences->type_occurrences_id;
    $status_occurrences_id = $occurrences->status_occurrences_id;
    $issuingsId = $occurrences->issuings_id;
}
?>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="title">Nome Completo:</label>
                    <input type="text" name="name" id="name" class="form-control"
                        placeholder="Informe o Nome Completo" required value="{{ $occurrences->name ?? old('name') }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="title">Titulo:</label>
                    <input type="text" name="title" class="form-control" placeholder="Informe o Titulo" required
                        value="{{ $occurrences->title ?? old('title') }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="title">Endereço:</label>
                    <input type="text" name="address" id="location-input" class="form-control"
                        placeholder="Informe o Endereço" autocomplete="off" required
                        value="{{ $occurrences->address ?? old('address') }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4  col-md-4  col-sm-4 col-xs-12">
                <div class="form-group">
                    <label for="title">Estado:</label>
                    <input type="text" name="state" class="form-control " readonly
                        id="administrative_area_level_1-input" required
                        value="{{ $occurrences->state ?? old('state') }}">
                </div>
            </div>

            <div class="col-lg-4  col-md-4  col-sm-4 col-xs-12">
                <div class="form-group">
                    <label for="title">Cidade:</label>
                    <input type="text" name="city" id="locality-input" readonly class="form-control" required
                        value="{{ $occurrences->city ?? old('city') }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="title">CEP:</label>
                    <input type="text" name="zip" id="postal_code-input" readonly class="form-control"
                        placeholder="Informe o CEP" id="postal_code-input" required
                        value="{{ $occurrences->zip ?? old('zip') }}">
                </div>
            </div>
        </div>
        <input type="hidden" value="BRASIL" id="country-input" />

        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="title">E-mail:</label>
                    <input type="email" name="email" class="form-control" placeholder="Informe o E-mail" required
                        value="{{ $occurrences->email ?? old('email') }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="title">Telefone:</label>
                    <input type="tel" name="phone" class="form-control phone" placeholder="Informe o Telefone"
                        required value="{{ $occurrences->phone ?? old('phone') }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="latitude">Latitude:</label>
                    <input type="text" name="latitude" class="form-control" id="latitude"
                        placeholder="Informe o
                        Latitude" disabled
                        value="{{ $occurrences->latitude ?? old('latitude') }}">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="longitude">Longitude:</label>
                    <input type="text" name="longitude" class="form-control" id="longitude"
                        placeholder="Informe o Longitude" disabled
                        value="{{ $occurrences->longitude ?? old('longitude') }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="statuus_occurrences_id">Status Ocorrência:</label>
                    <select name="status_occurrences_id" class="form-control" required>
                        <option value="">Selecione...</option>
                        @foreach ($statusOccurrences as $key => $statusOccurrence)
                            <option value="{{ $statusOccurrence->id }}"
                                {{ $statusOccurrence->id == $status_occurrences_id ? 'selected' : '' }}>
                                {{ $statusOccurrence->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="type_occurrences_id">Tipo Ocorrência:</label>
                    <select name="type_occurrences_id" class="form-control" required>
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
                    <select name="issuings_id" id="issuings_id" class="form-control" required>
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
                <input type="file" name="anexo[]" multiple class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <textarea cols="40" rows="5" name="description" id="description" required class="form-control">{{ $occurrences->description ?? old('description') }}</textarea>

                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-success">Salvar</button>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="card">
            <div class="card-body">
                <div id="map" style="height: 1000px"></div>
            </div>
        </div>
    </div>
</div>

<!--row-->
<script>
    "use strict";
    let map;

    function initMap() {
        const CONFIGURATION = {
            "ctaTitle": "Checkout",
            "mapOptions": {
                "center": {
                    "lat": -12.95307,
                    "lng": -38.49706
                },
                "fullscreenControl": true,
                "mapTypeControl": false,
                "streetViewControl": true,
                "zoom": 20,
                "zoomControl": true,
                "maxZoom": 22,
                "mapId": ""
            },
            "mapsApiKey": "AIzaSyAKZUfI6dgn5kzjDSu9MKT84yhMW5UR5M0",
            "capabilities": {
                "addressAutocompleteControl": true,
                "mapDisplayControl": true,
                "ctaControl": true
            }
        };
        const componentForm = [
            'location',
            'locality',
            'administrative_area_level_1',
            'country',
            'postal_code',
        ];
        const getFormInputElement = (component) => document.getElementById(component + '-input');
        map = new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: -12.95307,
                lng: -38.49706
            },
            mapTypeControl: false,
            fullscreenControl: CONFIGURATION.mapOptions.fullscreenControl,
            zoom: CONFIGURATION.mapOptions.zoom,
            streetViewControl: CONFIGURATION.mapOptions.streetViewControl
        });
        const marker = new google.maps.Marker({
            map: map,
            draggable: false
        });
        const autocompleteInput = getFormInputElement('location');
        const autocomplete = new google.maps.places.Autocomplete(autocompleteInput, {
            fields: ["address_components", "geometry", "name"],
            types: ["address"],
        });
        autocomplete.addListener('place_changed', function() {
            marker.setVisible(false);
            const place = autocomplete.getPlace();
            if (!place.geometry) {
                window.alert('No details available for input: \'' + place.name + '\'');
                return;
            }
            renderAddress(place);
            fillInAddress(place);
            $("#longitude").val(place.geometry.location.lat());
            $("#latitude").val(place.geometry.location.lng());
        });

        function fillInAddress(place) { // optional parameter
            const addressNameFormat = {
                'street_number': 'short_name',
                'route': 'long_name',
                'locality': 'long_name',
                'administrative_area_level_1': 'short_name',
                'country': 'long_name',
                'postal_code': 'short_name',
            };

            const getAddressComp = function(type) {
                for (const component of place.address_components) {
                    if (component.types[0] === type) {
                        return component[addressNameFormat[type]];
                    }
                }
                return '';
            };
            getFormInputElement('location').value = getAddressComp('street_number') + ' ' + getAddressComp('route');
            for (const component of componentForm) {
                if (component !== 'location') {
                    getFormInputElement(component).value = getAddressComp(component);
                }
            }
        }

        function renderAddress(place) {
            map.setCenter(place.geometry.location);
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);
        }
    }

    window.initMap = initMap;
</script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKZUfI6dgn5kzjDSu9MKT84yhMW5UR5M0&libraries=places&callback=initMap&solution_channel=GMP_QB_addressselection_v1_cABC"
    async defer></script>
