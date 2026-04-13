<div class="card shadow-sm">
    <div class="card-body">
        <p class="text-uppercase small text-primary fw-bold mb-1">{{ $labTitle }}</p>
        <h1 class="h3">{{ $title }}</h1>

        @if ($tin->isEmpty())
            <p class="text-muted mb-0">Chưa có dữ liệu.</p>
        @else
            <div class="list-group mt-3">
                @foreach ($tin as $item)
                    <a class="list-group-item list-group-item-action" href="{{ route($detailRoute, $item->id) }}">
                        <div class="fw-semibold">{{ $item->tieuDe }}</div>
                        <div class="small text-muted">
                            Ngày đăng: {{ \Illuminate\Support\Carbon::parse($item->ngayDang)->format('d/m/Y H:i') }}
                            - Lượt xem: {{ number_format($item->xem) }}
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</div>
