<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link
        href="https://cdn.jsdelivr.net/npm/vazirmatn@33.0.3/Round-Dots/misc/UI-Farsi-Digits/Vazirmatn-RD-UI-FD-font-face.min.css"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/assets/css/tree.css">
</head>

<body>
    <main class="text-center p-5">

        <div class="row">
            @foreach ($parents as $parent)
                <div class="col-2">
                    <a href="{{ route('panel.people.tree', ['person' => $parent->id]) }}">
                        <div class="bg-secondary text-white mb-2 py-4 w-100 rounded">
                            {{ $parent->fullname() }}
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="row flex-nowrap">
            <div class="col-2">
                <a href="{{ route('panel.people.show', ['person' => $person->id]) }}">
                    <div class="bg-dark text-white w-100 py-4 rounded">
                        {{ $person->fullname() }}
                    </div>
                </a>
                @foreach ($person->partners()->get() as $partner)
                    <a href="{{ route('panel.people.tree', ['person' => $partner->id]) }}">
                        <div class="bg-light w-100 py-4 my-2 rounded">
                            {{ $partner->fullname() }}
                        </div>
                    </a>
                @endforeach
                @foreach ($person->children()->get() as $child)
                    <a href="{{ route('panel.people.tree', ['person' => $child->id]) }}">
                        <div class="bg-secondary text-white w-100 py-4 my-2 rounded">
                            {{ $child->fullname() }}
                        </div>
                    </a>
                @endforeach
            </div>
            @foreach ($family as $fa)
                <div class="col-2 d-inline-flex flex-column">
                    <a href="{{ route('panel.people.tree', ['person' => $fa->id]) }}">
                        <div class="bg-secondary text-white w-100 py-4 rounded">
                            {{ $fa->fullname() }}
                        </div>
                    </a>
                    @foreach ($fa->children()->get() as $child)
                        <a href="{{ route('panel.people.tree', ['person' => $child->id]) }}">
                            <div class="bg-secondary text-white w-100 py-4 mt-2 rounded">
                                {{ $child->fullname() }}
                            </div>
                        </a>
                    @endforeach
                </div>
            @endforeach
        </div>

    </main>

    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/bootstrap-bundle.js"></script>
</body>

</html>
