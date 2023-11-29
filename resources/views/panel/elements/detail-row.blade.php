<div class="row align-items-center my-2">

    <div class="col-auto with-icon text-secondary">
        <i class="gg-chevron-left"></i>
        <span>{{ $key ?? '' }}</span>
    </div>

    <div class="col">
        <hr id="dot">
    </div>

    <div class="col-auto">
        <div class="bg-light px-2 py-1 rounded">
            @if (empty($url))
                {{ $value ?? '-' }}
            @else
                <a href="{{ $url }}">
                    {{ $value ?? '-' }}
                </a>
            @endif
        </div>
    </div>

</div>
