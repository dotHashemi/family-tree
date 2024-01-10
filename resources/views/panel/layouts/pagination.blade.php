@if (!$data->isEmpty() && $data->lastPage() > 1)

    <div class="d-flex justify-content-center mt-3">

        <ul class="pagination">
            <button class="{{ $data->currentPage() == 1 ? 'disabled' : '' }} btn px-2 btn-dark mx-1">
                <a href="{{ $data->url(1) }}">
                    <i class="gg-arrow-right"></i>
                </a>
            </button>
            @for ($i = 1; $i <= $data->lastPage(); $i++)
                <a href="{{ $data->url($i) }}">
                    <button
                        class="{{ $data->currentPage() == $i ? 'active' : '' }} btn px-2 btn-dark mx-1">
                        {{ $i }}
                    </button>
                </a>
            @endfor
            <a href="{{ $data->url($data->currentPage() + 1) }}">
                <button
                    class="{{ $data->currentPage() == $data->lastPage() ? 'disabled' : '' }} btn px-2 btn-dark mx-1">
                    <i class="gg-arrow-left"></i>
                </button>
            </a>
        </ul>

    </div>

@endif
