@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="row justify-content-center">
        <form method="POST" action="{{ route('send') }}">
            @csrf
        <div class="col-md-10">

            <div class="card">
                <div class="card-header">
                    <h3>Crear descuento</h3>
                    <p>En esta seccion podras crear un descuento</p>
                </div>

                <div class="card-body">
                    <div class="container text-center">
                        <div class="row align-items-start">

                            <div class="col">
                                <label for="nombre">Nombre de la regla:</label>
                                <input type="text" class="form-control" id="nombre" name="name" placeholder="Ingresar...">
                            </div>
                            <div class="col">
                                <div class="alert alert-light mt-2" role="alert">
                                    Se permite un maximo de 30 caracteres
                                  </div>
                            </div>
                            <div class="col mt-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="active"  value="0" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                      Inactivo
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="active"  value="1">
                                    <label class="form-check-label" for="exampleRadios2">
                                      Activo
                                    </label>
                                    </div>
                            </div>

                        </div>
                    </div>
                    <div class="container text-center mt-2">
                        <div class="row align-items-start">

                            <div class="col">
                                <label for="nombre">Rentadora:</label>
                                <select class="form-select" name='brand_id' aria-label="Default select example">
                                        @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                  </select>
                            </div>
                            <div class="col">
                                <label for="nombre">tipo de acceso:</label>
                                <select class="form-select" name='access_type_code' aria-label="Default select example">
                                    @foreach ($access_types as $types)
                                        <option value="{{ $types->code }}">{{ $types->name }}</option>
                                    @endforeach
                                  </select>
                            </div>
                            <div class="col">
                                <label for="nombre">Prioridad:</label>
                                <input type="text" class="form-control" name='priority' id="nombre" placeholder="Ingresar...">
                            </div>
                            <div class="col">
                                <label for="nombre">Region:</label>
                                <select class="form-select" name='region_id' aria-label="Default select example">
                                    @foreach ($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                @endforeach
                                  </select>
                            </div>

                        </div>
                    </div>
                    <div class="container text-center mt-2">
                        <div class="row align-items-start">

                            <div class="col">
                                <div class="alert alert-light" role="alert">
                                    Desde esta seccion podra cargar descuentos promocionales AWD/CBD o un descuento
                                    GSA(cediendo comision). Podra agregar uno o ambos descuentos al mismo tiempo para que se apliquen al mismo
                                    tiempo, tenga en cuenta que si una tarifa tiene diferentes precios por vigencia, debera definirdescuentos
                                    diferentes para cada uno sde ellos.
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="container text-center mt-2">
                        <div class="row align-items-start">

                            <div class="col border border-secondary p-2 mb-2 border-opacity-25">
                                <p>Periodo de aplicacion 1</p>
                                <div class="row g-3">
                                    <div class="col">

                                      <input type="text" name='from_days1' id="input11"  class="form-control" placeholder="Desde" aria-label="Desde">
                                    </div>

                                    <div class="col">

                                      <input type="text" name='to_days1' id="input12"  class="form-control" placeholder="Hasta" aria-label="Hasta">
                                    </div>
                                </div>

                                <div class="row mb-3">

                                    <label for="colFormLabelSm" class="row-sm-2 col-form-label col-form-label-sm">Codigo de descuento AWD/CBD</label>
                                    <div class="col-sm-10">
                                      <input type="text"  name='code1'  id="input13" class="form-control form-control-sm"  placeholder="Codigo">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="colFormLabelSm" class="row-sm-2 col-form-label col-form-label-sm">Porcentaje de descuento GSA</label>
                                    <div class="col-sm-10">
                                      <input type="text"  name='discount1' id="input14" class="form-control form-control-sm"  placeholder="Porcentaje">
                                    </div>
                                  </div>

                            </div>

                            <div class="col border border-secondary p-2 mb-2 border-opacity-25">
                                <p>Periodo de aplicacion 2</p>
                                <div class="row g-3">
                                    <div class="col">

                                      <input type="text" name='from_days2' id="input21" class="form-control" placeholder="Desde" aria-label="Desde" disabled>
                                    </div>

                                    <div class="col">

                                      <input type="text" name='to_days2' id="input22"  class="form-control" placeholder="Hasta" aria-label="Hasta" disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">

                                    <label for="colFormLabelSm" class="row-sm-2 col-form-label col-form-label-sm">Codigo de descuento AWD/CBD</label>
                                    <div class="col-sm-10">
                                      <input type="text" name='code2' id="input23" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Codigo" disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="colFormLabelSm" class="row-sm-2 col-form-label col-form-label-sm">Porcentaje de descuento GSA</label>
                                    <div class="col-sm-10">
                                      <input type="text" name='discount2' id="input24" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Porcentaje" disabled>
                                    </div>
                                  </div>

                            </div>

                            <div class="col border border-secondary p-2 mb-2 border-opacity-25">
                                <p>Periodo de aplicacion 3</p>
                                <div class="row g-3">
                                    <div class="col">

                                      <input type="text" name='from_days3' id="input31" class="form-control" placeholder="Desde" aria-label="Desde" disabled>
                                    </div>

                                    <div class="col">

                                      <input type="text" name='to_days3' id="input32" class="form-control" placeholder="Hasta" aria-label="Hasta" disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">

                                    <label for="colFormLabelSm" class="row-sm-2 col-form-label col-form-label-sm">Codigo de descuento AWD/CBD</label>
                                    <div class="col-sm-10">
                                      <input type="text" name='code3' id="input33" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Codigo" disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="colFormLabelSm" class="row-sm-2 col-form-label col-form-label-sm">Porcentaje de descuento GSA</label>
                                    <div class="col-sm-10">
                                      <input type="text" name='discount3' id="input34"  class="form-control form-control-sm" id="colFormLabelSm" placeholder="Porcentaje" disabled>
                                    </div>
                                  </div>

                            </div>



                        </div>
                    </div>
                    <script>
                        $(document).ready(function () {
                            $('#input14').on('input', function () {
                                var triggerValue = $(this).val();
                                var targetInput21 = $('#input21');
                                var targetInput22 = $('#input22');
                                var targetInput23 = $('#input23');
                                var targetInput24 = $('#input24');
                                if (triggerValue !== '') {
                                    targetInput21.prop('disabled', false);
                                    targetInput22.prop('disabled', false);
                                    targetInput23.prop('disabled', false);
                                    targetInput24.prop('disabled', false); // Enable the target input
                                } else {
                                    targetInput21.prop('disabled', true);
                                    targetInput22.prop('disabled', true);
                                    targetInput23.prop('disabled', true);
                                    targetInput24.prop('disabled', true);  // Disable the target input
                                }
                            });
                            $('#input24').on('input', function () {
                                var triggerValue = $(this).val();
                                var targetInput = $('#input3');

                                var triggerValue = $(this).val();
                                var targetInput31 = $('#input31');
                                var targetInput32 = $('#input32');
                                var targetInput33 = $('#input33');
                                var targetInput34 = $('#input34');
                                if (triggerValue !== '') {
                                    targetInput31.prop('disabled', false);
                                    targetInput32.prop('disabled', false);
                                    targetInput33.prop('disabled', false);
                                    targetInput34.prop('disabled', false); // Enable the target input
                                } else {
                                    targetInput31.prop('disabled', true);
                                    targetInput32.prop('disabled', true);
                                    targetInput33.prop('disabled', true);
                                    targetInput34.prop('disabled', true);  // Disable the target input
                                }
                            });
                        });
                        </script>
                    <div class="container text-center">
                        <div class="row align-items-start">

                            <div class="col">
                                <label for="nombre">Periodo inicio de aplicacion:</label>
                                <input type="date" class="form-control" name="start_date" value="{{ old('start_date') }}" >
                            </div>
                            <div class="col">
                                <label for="nombre">Periodo fin de aplicacion:</label>
                                <input type="date" class="form-control" name="end_date" value="{{ old('end_date') }}">
                            </div>
                            <div class="col">
                                <div class="alert alert-light mt-2" role="alert">
                                    Utilice esta seccion para definir el periodo de aplicacion de la relga de negocio
                                  </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class='card-footer '>
                    <div class="row align-items-end ">
                        <div class="col">

                          </div>
                          <div class="col">

                          </div>
                          <div class="col">

                          </div>
                        <div class="col">
                            <a href="{{ route('home') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-secondary">Guardar</button>

                        </div>
                    </div>
                </div>



            </div>





            </div>
        </form>
    </div>
</div>
@endsection
