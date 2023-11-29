@extends('panel.layouts.master')

@section('content')
    <div class="container">

        <div class="row align-items-center my-3">

            <div class="col-auto">
                <span class="page-title">
                    ویرایش {{ $city->name }}
                </span>
            </div>

            <div class="col">
                <hr>
            </div>

            <div class="col-auto">
                @include('panel.elements.button-first', [
                    'url' => route('panel.cities.index'),
                    'text' => 'بازگشت',
                ])
            </div>

        </div>


        <div class="card">

            <form action="{{ route('panel.cities.update', ['city' => $city->id]) }}" method="POST">

                @csrf
                @method('PATCH')

                <div class="card-body">

                    <div class="form-floating">
                        <input name="name" type="text" class="form-control" id="input-name"
                            value="{{ $city->name }}" dir="rtl">
                        <label for="input-name">نام</label>
                    </div>

                </div>

                <div class="card-footer">

                    <div>
                        @include('panel.elements.button-first', [
                            'type' => 'submit',
                            'text' => 'ذخیره',
                        ])
                    </div>

                </div>

            </form>

        </div>

    </div>
@endsection
