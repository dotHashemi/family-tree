@if (empty($url))
    <button class="btn btn-primary" type="{{ $type ?? '' }}">
        <i data-feather="{{ $icon ?? '' }}"></i>
        {{ $text ?? '' }}
    </button>
@else
    <a href="{{ $url }}">
        <button class="btn btn-primary" type="{{ $type ?? '' }}">
            <i data-feather="{{ $icon ?? '' }}"></i>
            {{ $text ?? '' }}
        </button>
    </a>
@endif
