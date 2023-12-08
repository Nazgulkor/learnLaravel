@foreach ($stats as $item)
    <span>
       {{ __('Статистика для :currency', ['currency' => $item->currency_id]) }}
    </span>
    <div class="row">
        <div class="col">
            <x-card>
                <div class="mb-2 text-muted small">
                    Количество донатов
                </div>
                <h5 class="m-0">{{ $item['total_count'] }}</h5>
            </x-card>
        </div>
        <div class="col">
            <x-card>
                <div class="mb-2 text-muted small">
                    Сумма донатов
                </div>
                <h5 class="m-0">{{ number_format($item['total_amount'], 2, '.', ' ') }}</h5>
            </x-card>
        </div>
        <div class="col">
            <x-card>
                <div class="mb-2 text-muted small">
                    Срендяя сумма
                </div>
                <h5 class="m-0">{{ number_format($item['avg_amount'], 2, '.', ' ') }}</h5>
            </x-card>
        </div>
        <div class="col">
            <x-card>
                <div class="mb-2 text-muted small">
                    Мин. сумма
                </div>
                <h5 class="m-0">{{ $item['min_amount'] }}</h5>
            </x-card>
        </div>
        <div class="col">
            <x-card>
                <div class="mb-2 text-muted small">
                    Макс. сумма
                </div>
                <h5 class="m-0">{{ $item['max_amount'] }}</h5>
            </x-card>
        </div>
    </div>
@endforeach
