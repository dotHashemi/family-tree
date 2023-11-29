@extends('panel.layouts.master')

@section('content')
    <div class="container">

        <div class="row align-items-center my-3">

            <div class="col-auto">
                <span class="page-title">
                    شهر جدید
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

            <form action="{{ route('panel.cities.store') }}" method="post">

                @csrf

                <div class="card-body">

                    <div class="form-floating">
                        <input name="name" type="text" class="form-control" id="floatingInput">
                        <label for="floatingInput">نام</label>
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
