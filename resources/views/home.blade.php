@extends('layouts.app')

@section('content')

<div class="container">

    @if(session('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{session('success')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>{{ __('messages.discount') }}</h3>
                    <p>{{__('messages.section')}}</p>
                        <div class="row align-items-start">
                            <div class="col">
                                <a href="{{ route('create') }}" class="btn btn-primary">{{__('messages.new_discount')}}</a>
                                <a href="{{ route('export') }}" class="btn btn-secondary">{{__('messages.export')}}</a>
                            </div>

                        </div>
                </div>
                <div class="card-body">
                    <div class="container text-center">
                        <form method="GET" action="{{ route('filter') }}">
                        <div class="row align-items-start">
                            <div class="col">
                                <label for="rentadora">{{__('messages.renter')}}</label>
                                <select id='rentadora' name='rentadora' class="form-select" aria-label="Default select example">
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                                    </select>
                            </div>
                            <div class="col">
                                <label for="region">{{__('messages.regions')}}</label>
                                <select id='region' class="form-select" name='region' aria-label="Default select example">
                                    @foreach ($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                @endforeach
                                    </select>
                            </div>
                            <div class="col">
                                <label for="nombre">{{__('messages.name')}}</label>
                                <input type="text" class="form-control"  name='nombre_descuento' id="nombre" name='nombre' placeholder="Ingresar...">
                            </div>
                            <div class="col">
                                <label for="awd_bcd">{{__('messages.awdcbd')}}</label>
                                <input type="text" class="form-control" id="awd_bcd" name='code' placeholder="Missing">
                            </div>
                            <div class="col mt-4">
                                <button type='submit'  class="btn btn-primary">{{__('messages.filter')}}</a>
                            </div>
                            <div class="col mt-4">
                                <a href="{{ route('home') }}" class="btn btn-primary">{{__('messages.back')}}</a>
                            </div>
                        </div>
                    </form>

                </div>


                </div>
            </div>
            <div class='card mt-2'>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">{{__('messages.renter')}}</th>
                        <th scope="col">{{__('messages.regions')}}</th>
                        <th scope="col">{{__('messages.name')}}</th>
                        <th scope="col">{{__('messages.TypesAccess')}}</th>
                        <th scope="col">{{__('messages.status')}}</th>
                        <th scope="col">{{__('messages.period')}}</th>
                        <th scope="col">{{__('messages.awdcbd')}}</th>
                        <th scope="col">{{__('messages.discount_gsa')}}</th>
                        <th scope="col">{{__('messages.promotion_period')}}</th>
                        <th scope="col">{{__('messages.priority')}}</th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($discounts as $discount)
                        <tr>
                            <td>{{ $discount->brands->name}}</td>
                            <td>{{ $discount->regions->name}}</td>
                            <td>{{ $discount->name}}</td>
                            <td>{{ $discount->accessTypes->name}}</td>
                            <td>{{ $discount->active}}</td>
                            <td>@foreach ($discount->discountsRanges as $range)
                            {{ $range->from_days . '-' . $range->to_days }}
                            @endforeach</td>
                            <td>@foreach ($discount->discountsRanges as $range)
                                {{ $range->code . '-'  }}
                                @endforeach</td>
                            <td>@foreach ($discount->discountsRanges as $range)
                                {{ $range->discount . '-'  }}
                                @endforeach</td>
                            <td>{{ substr($discount->start_date, 0, 10) . ' / ' .substr($discount->end_date, 0, 10)}}</td>
                            <td>{{ $discount->priority}}</td>
                            <td><a href="{{ route('edit', ['data' =>$discount->id]) }}" class="btn btn-primary">{{__('messages.edit')}}</a></td>
                            <td><a href="{{ route('delete',['data' =>$discount->id]) }}" class="btn btn-secondary">{{__('messages.delete')}}</a><td>
                        </tr>
                    @endforeach

                    </tbody>
                  </table>
                  <div class=" d-flex justify-content-center ">
                        <div class='pagination'>  {!! $discounts->links() !!}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
