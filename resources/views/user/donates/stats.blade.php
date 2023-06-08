@foreach ($statistics as $stats)
<div class="row border-bottom mb-3">
    <h6>
        {{__("Statistic for :currency", ['currency'=>$stats->currency_id])}}
    </h6>
    <div class="col-12 col-md-4">
        <x-card>
            <x-card-body>
                <div class="mb-2 text-muted small">
                    Count donates
                </div>
                <h4 class="m-0">
                    {{$stats->total_count}}
                </h4>
            </x-card-body>
        </x-card>
    </div>
    <div class="col-12 col-md-4">
        <x-card>
            <x-card-body>
                <div class="mb-2 text-muted small">
                   Sum_amount
                </div>
                <h4 class="m-0">
                    {{ __money($stats->sum_amount, $stats->currency_id) }}
                </h4>
            </x-card-body>
        </x-card>
    </div>
    <div class="col-12 col-md-4">
        <x-card>
            <x-card-body>
                <div class="mb-2 text-muted small">
                    Average_amount
                </div>
                <h4 class="m-0">
                    {{__money($stats->avg_amount, $stats->currency_id)}}
                </h4>
            </x-card-body>
        </x-card>
    </div>
    <div class="col-12 col-md-4">
        <x-card>
            <x-card-body>
                <div class="mb-2 text-muted small">
                    Min donat
                </div>
                <h4 class="m-0">
                    {{__money($stats->min_amount, $stats->currency_id)}}
                </h4>
            </x-card-body>
        </x-card>
    </div>
    <div class="col-12 col-md-4">
        <x-card>
            <x-card-body>
                <div class="mb-2 text-muted small">
                    Max donat
                </div>
                <h4 class="m-0">
                    {{__money($stats->max_amount, $stats->currency_id)}}
                </h4>
            </x-card-body>
        </x-card>
    </div>
</div>   
@endforeach
        