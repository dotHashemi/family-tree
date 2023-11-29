@extends('panel.layouts.master')

@section('content')
    <div class="container">

        <div class="row align-items-center my-3">

            <div class="col-auto">
                <span class="page-title">
                    شخص‌ها
                </span>
            </div>

            <div class="col">
                <hr>
            </div>

            <div class="col-auto">
                @include('panel.elements.button-first', [
                    'url' => route('panel.people.create'),
                    'text' => 'جدید',
                ])
            </div>

        </div>


        <form method="GET">
            <div class="form-floating shadow-sm mb-3">
                <input name="search" type="text" class="form-control border-0" value="{{ request('search') }}">
                <label for="floatingInput">جستجو + اینتر</label>
            </div>
        </form>
        

        @foreach ($people as $person)
            <div class="card shadow-sm border-0 p-3 mb-2">
                <div class="d-flex justify-content-between align-items-center">

                    <span>
                        <a href="{{ route('panel.people.show', ['person' => $person->id]) }}">
                            {{ $person->fullname() }}
                        </a>

                        <span class="ms-2 text-secondary">
                            {{ $person->father ? '[' . $person->father()->first()->firstname . ']' : '' }}
                            {{ $person->mother ? '[' . $person->mother()->first()->firstname . ']' : '' }}
                            {{ '[' . $person->city()->first()->name . ']' }}
                        </span>

                    </span>


                    <a href="{{ route('panel.people.edit', ['person' => $person->id]) }}" class="badge bg-light text-dark">
                        ویرایش
                    </a>

                </div>
            </div>
        @endforeach

    </div>
@endsection
