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
    <div class="row justify-content-center">
        <form method="POST" action="{{ route('update') }}">
            @csrf
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <input type="hidden" name="id" value="{{ old('id', $id) }}">
                    <h3>{{__('messages.edit_discount')}}</h3>
                    <p>{{__('messages.section3')}}</p>
                </div>

                <div class="card-body">
                    <div class="container text-center">
                        <div class="row align-items-start">

                            <div class="col">
                                <label for="nombre">{{__('messages.name_rule')}}</label>
                                <input type="text" class="form-control" id="nombre" name='name' placeholder="Ingresar..." value="{{ old('name', $data->name) }}">
                            </div>
                            <div class="col">
                                <div class="alert alert-light mt-2" role="alert">
                                    {{__('messages.max_char')}}
                                  </div>
                            </div>
                            <div class="col mt-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="active"  value="0" {{ !$data->active ? 'checked' : '' }}>
                                    <label class="form-check-label" for="exampleRadios1">
                                        {{__('messages.inactive')}}
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="active"  value="1" {{ $data->active ? 'checked' : '' }}>
                                    <label class="form-check-label" for="exampleRadios2">
                                        {{__('messages.active')}}
                                    </label>
                                    </div>
                            </div>

                        </div>
                    </div>
                    <div class="container text-center mt-2">
                        <div class="row align-items-start">

                            <div class="col">
                                <label for="nombre"> {{__('messages.renter')}}</label>
                                <select class="form-select" name='brand_id' aria-label="Default select example">
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ $brand->id == $data->brand_id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                @endforeach
                                  </select>
                            </div>
                            <div class="col">
                                <label for="nombre"> {{__('messages.TypesAccess')}}</label>
                                <select class="form-select"  name='access_type_code' aria-label="Default select example">
                                    @foreach ($access_types as $types)
                                    <option value="{{ $types->code }}"  {{ $types->code == $data->access_type_code ? 'selected' : '' }}>{{ $types->name }}</option>
                                @endforeach
                                  </select>
                            </div>
                            <div class="col">
                                <label for="nombre"> {{__('messages.priority')}}</label>
                                <input type="text" class="form-control" name='priority'  value="{{ old('priority', $data->priority) }}" placeholder={{__('messages.priority')}}>
                            </div>
                            <div class="col">
                                <label for="nombre"> {{__('messages.regions')}}</label>
                                <select class="form-select" name='region_id' aria-label="Default select example">
                                    @foreach ($regions as $region)
                                    <option value="{{ $region->id }}" {{ $region->id == $data->region_id? 'selected' : '' }}>{{ $region->name }}</option>
                                @endforeach
                                  </select>
                            </div>

                        </div>
                    </div>
                    <div class="container text-center mt-2">
                        <div class="row align-items-start">

                            <div class="col">
                                <div class="alert alert-light" role="alert">
                                    {{__('messages.section2')}}
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="container text-center mt-2">
                        <div class="row align-items-start">

                            <div class="col border border-secondary p-2 mb-2 border-opacity-25">
                                <p> {{__('messages.periods')}}</p>
                                <div class="row g-3">
                                    <div class="col">

                                      <input type="text" name='from_days1' class="form-control" placeholder={{__('messages.from')}} aria-label="Desde" value="{{ old('from_days1', $data->discounts_ranges[0]->from_days) }}">
                                    </div>

                                    <div class="col">

                                      <input type="text" name='to_days1' class="form-control" placeholder={{__('messages.until')}} aria-label="Hasta" value="{{ old('to_days1', $data->discounts_ranges[0]->to_days) }}">
                                    </div>
                                </div>

                                <div class="row mb-3">

                                    <label for="colFormLabelSm" class="row-sm-2 col-form-label col-form-label-sm">{{__('messages.discount_awd_code')}}</label>
                                    <div class="col-sm-10">
                                      <input type="text"  name='code1' class="form-control form-control-sm"  placeholder={{__('messages.code')}} value="{{ old('from_days1', $data->discounts_ranges[0]->code) }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="colFormLabelSm" class="row-sm-2 col-form-label col-form-label-sm">{{__('messages.percentage_discount_gsa')}}</label>
                                    <div class="col-sm-10">
                                      <input type="text"  name='discount1' class="form-control form-control-sm"  placeholder={{__('messages.percentage')}} value="{{ old('from_days1', $data->discounts_ranges[0]->discount) }}">
                                    </div>
                                  </div>

                            </div>

                            <div class="col border border-secondary p-2 mb-2 border-opacity-25">
                                <p>{{__('messages.periods1')}}</p>
                                <div class="row g-3">
                                    <div class="col">

                                      <input type="text" name='from_days2' class="form-control" placeholder={{__('messages.from')}} aria-label={{__('messages.since')}} value="{{ old('from_days2', $data?->discounts_ranges[1]->from_days ??  null) }}">
                                    </div>

                                    <div class="col">

                                      <input type="text" name='to_days2' class="form-control" placeholder={{__('messages.until')}} aria-label={{__('messages.since')}}  value="{{ old('to_days2', $data?->discounts_ranges[1]->to_days ??  null) }}">
                                    </div>
                                </div>

                                <div class="row mb-3">

                                    <label for="colFormLabelSm" class="row-sm-2 col-form-label col-form-label-sm">{{__('messages.discount_awd_code')}}</label>
                                    <div class="col-sm-10">
                                      <input type="text" name='code2' class="form-control form-control-sm"  placeholder={{__('messages.code')}}  value="{{ old('from_days2', $data?->discounts_ranges[1]->code ??  null) }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="colFormLabelSm" class="row-sm-2 col-form-label col-form-label-sm">{{__('messages.discount_gsa_code')}}</label>
                                    <div class="col-sm-10">
                                      <input type="text" name='discount2' class="form-control form-control-sm"  placeholder={{__('messages.percentage_discount_gsa')}}  value="{{ old('from_days2', $data?->discounts_ranges[1]->discount ??  null) }}">
                                    </div>
                                  </div>

                            </div>

                            <div class="col border border-secondary p-2 mb-2 border-opacity-25">
                                <p>{{__('messages.periods2')}}</p>
                                <div class="row g-3">
                                    <div class="col">

                                      <input type="text" name='from_days3' class="form-control" placeholder={{__('messages.from')}} aria-label="Desde"  value="{{ old('from_days3', $data?->discounts_ranges[2]->from_days ??  null) }}">
                                    </div>

                                    <div class="col">

                                      <input type="text" name='to_days3' class="form-control" placeholder={{__('messages.until')}} aria-label="Hasta"  value="{{ old('to_days3', $data?->discounts_ranges[1]->to_days ??  null) }}">
                                    </div>
                                </div>

                                <div class="row mb-3">

                                    <label for="colFormLabelSm" class="row-sm-2 col-form-label col-form-label-sm">{{__('messages.discount_awd_code')}}</label>
                                    <div class="col-sm-10">
                                      <input type="text" name='code3' class="form-control form-control-sm"  placeholder={{__('messages.code')}}  value="{{ old('code3', $data?->discounts_ranges[2]->code ??  null) }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="colFormLabelSm" class="row-sm-2 col-form-label col-form-label-sm">{{__('messages.percentage_discount_gsa')}}</label>
                                    <div class="col-sm-10">
                                      <input type="text" name='discount3' class="form-control form-control-sm"  placeholder={{__('messages.percentage')}}  value="{{ old('discount3', $data?->discounts_ranges[2]->discount ??  null) }}">
                                    </div>
                                  </div>

                            </div>



                        </div>
                    </div>
                    <div class="container text-center">
                        <div class="row align-items-start">

                            <div class="col">
                                <label for="nombre">{{__('messages.init_app')}}</label>
                                <input type="datetime-local" class="form-control" name="start_date" value="{{old('start_date')?? date('Y-m-d\TH:i', strtotime($data->start_date)) }}" >
                            </div>
                            <div class="col">
                                <label for="nombre">{{__('messages.end_app')}}</label>
                                <input type="datetime-local" class="form-control" name="end_date" value="{{old('end_date')?? date('Y-m-d\TH:i', strtotime($data->end_date)) }}">
                            </div>
                            <div class="col">
                                <div class="alert alert-light mt-2" role="alert">
                                    {{__('messages.section4')}}
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
                            <a href="{{ route('home') }}" class="btn btn-secondary">{{__('messages.back')}}</a>
                            <button type="submit"  class="btn btn-secondary">{{__('messages.save')}}</button>

                        </div>
                    </div>
                </div>



            </div>





            </div>
        </form>
    </div>
</div>
@endsection
