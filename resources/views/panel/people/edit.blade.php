@extends('panel.layouts.master')

@section('content')
    <div class="container">

        <div class="row align-items-center my-3">

            <div class="col-auto">
                <span class="page-title">
                    ویرایش {{ $person->firstname . ' ' . $person->lastname }}
                </span>
            </div>

            <div class="col">
                <hr>
            </div>

            <div class="col-auto">
                @include('panel.elements.button-first', [
                    'url' => route('panel.people.index'),
                    'text' => 'بازگشت',
                ])
            </div>

        </div>


        <div class="card mb-3">

            <form action="{{ route('panel.people.update', ['person' => $person->id]) }}" method="post">

                @csrf
                @method('PUT')

                <div class="card-body">

                    <div class="form-floating mb-3">
                        <select name="city" class="form-select" id="input-city">
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                        <label for="input-city">اهل یا محل تولد</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select name="father" class="form-select" id="input-father">
                            <option value="">انتخاب نشده</option>
                            @foreach ($males as $male)
                                <option value="{{ $male->id }}">{{ $male->firstname . ' ' . $male->lastname }}</option>
                            @endforeach
                        </select>
                        <label for="input-father">پدر</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select name="mother" class="form-select" id="input-mother">
                            <option value="">انتخاب نشده</option>
                            @foreach ($females as $female)
                                <option value="{{ $female->id }}">{{ $female->firstname . ' ' . $female->lastname }}
                                </option>
                            @endforeach
                        </select>
                        <label for="input-mother">مادر</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select name="gender" class="form-select" id="input-gender">
                            <option value="male">مرد</option>
                            <option value="female">زن</option>
                        </select>
                        <label for="input-gender">جنسیت</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input name="firstname" type="text" class="form-control" id="input-firstname"
                            value="{{ $person->firstname }}">
                        <label for="input-firstname">نام کوچک</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input name="nickname" type="text" class="form-control" id="input-nickname"
                            value="{{ $person->nickname }}">
                        <label for="input-nickname">لقب</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input name="lastname" type="text" class="form-control" id="input-lastname"
                            value="{{ $person->lastname }}">
                        <label for="input-lastname">نام خانوادگی</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input name="national" type="text" class="form-control" id="input-national"
                            value="{{ $person->national }}">
                        <label for="input-national">کد ملی</label>
                    </div>

                    <div class="form-floating">
                        <input name="note" type="text" class="form-control" id="input-note"
                            value="{{ $person->note }}">
                        <label for="input-note">یادداشت</label>
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
