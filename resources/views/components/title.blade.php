<div class="mb-3 pb-3 border-bottom">

    @isset($link)
        <div class="mb-2">
            {{$link}}
        </div>
    @endisset
    <div class="d-flex justify-content-between">

        <h1 class="h2 m-0">
            {{$slot}}
        </h1>
        
        @isset($right)
            <div>
                {{$right}}
            </div>
        @endisset

    </div>
</div>

<x-errors/>