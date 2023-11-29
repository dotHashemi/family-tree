@extends('panel.layouts.master')

@section('content')
    <div class="container">

        <div class="row align-items-center my-3">

            <div class="col-auto">
                <span class="page-title">
                    {{ $person->fullname() }}
                </span>
            </div>

            <div class="col">
                <hr>
            </div>

            <div class="col-auto">
                @include('panel.elements.button-first', [
                    'url' => route('panel.people.create', ['parent' => $person->id]),
                    'text' => 'افزودن فرزند',
                ])
                @include('panel.elements.button-first', [
                    'url' => route('panel.people.tree', ['person' => $person->id]),
                    'text' => 'درخت',
                ])
                @include('panel.elements.button-first', [
                    'url' => route('panel.people.index'),
                    'text' => 'بازگشت',
                ])
            </div>

        </div>


        <div class="row">

            <div class="col-6 mb-3">
                <div class="card shadow-sm border-0 p-3">

                    <div class="card-title">
                        <i class="gg-shape-circle"></i>
                        هویت
                    </div>

                    <div>

                        @include('panel.elements.detail-row', [
                            'key' => 'لقب',
                            'value' => $person->nickname,
                        ])

                        @include('panel.elements.detail-row', [
                            'key' => 'کد ملی',
                            'value' => $person->national,
                        ])

                    </div>

                </div>

            </div>

            <div class="col-6 mb-3">
                <div class="card shadow-sm border-0 p-3">

                    <div class="card-title">
                        <i class="gg-shape-circle"></i>
                        اصالت
                    </div>

                    <div>

                        @if ($person->father)
                            @include('panel.elements.detail-row', [
                                'key' => 'پدر',
                                'value' => $person->father()->first()->fullname(),
                                'url' => route('panel.people.show', ['person' => $person->father]),
                            ])
                        @else
                            @include('panel.elements.detail-row', [
                                'key' => 'پدر',
                            ])
                        @endif

                        @if ($person->mother)
                            @include('panel.elements.detail-row', [
                                'key' => 'مادر',
                                'value' => $person->mother()->first()->fullname(),
                                'url' => route('panel.people.show', ['person' => $person->mother]),
                            ])
                        @else
                            @include('panel.elements.detail-row', [
                                'key' => 'مادر',
                            ])
                        @endif

                    </div>

                </div>

            </div>

            <div class="col-6 mb-3">
                <div class="card shadow-sm border-0 p-3">

                    <div class="card-title">
                        <i class="gg-shape-circle"></i>
                        همسرها
                    </div>

                    <div>

                        @forelse ($person->partners()->get() as $partner)
                            @include('panel.elements.detail-row', [
                                'value' => $partner->fullname(),
                                'url' => route('panel.people.show', ['person' => $partner->id]),
                            ])
                        @empty
                            @include('panel.elements.detail-row')
                        @endforelse

                    </div>

                </div>

            </div>

            <div class="col-6 mb-3">
                <div class="card shadow-sm border-0 p-3">

                    <div class="card-title">
                        <i class="gg-shape-circle"></i>
                        فرزندها
                    </div>

                    <div>

                        @forelse ($person->children()->get() as $child)
                            @include('panel.elements.detail-row', [
                                'value' => $child->fullname(),
                                'url' => route('panel.people.show', ['person' => $child->id]),
                            ])
                        @empty
                            @include('panel.elements.detail-row')
                        @endforelse

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
