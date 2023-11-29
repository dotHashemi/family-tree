@extends('panel.layouts.master')

@section('content')
    <div class="container">

        <div class="row align-items-center my-3">

            <div class="col-auto">
                <span class="page-title">
                    شهرها
                </span>
            </div>

            <div class="col">
                <hr>
            </div>

            <div class="col-auto">
                @include('panel.elements.button-first', [
                    'url' => route('panel.cities.create'),
                    'text' => 'جدید',
                ])
            </div>

        </div>


        @foreach ($cities as $city)
            <div class="card shadow-sm border-0 p-3 mb-2">
                <div class="d-flex justify-content-between align-items-center">

                    <span>
                        {{ $city->name }}
                    </span>

                    <a href="{{ route('panel.cities.edit', ['city' => $city->id]) }}" class="badge bg-light text-dark">
                        ویرایش
                    </a>

                </div>
            </div>
        @endforeach

    </div>
@endsection
