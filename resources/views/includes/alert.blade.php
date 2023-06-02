@if($alert = session()->pull('alert'))
    <div class="alert alert-success text-center py-2 small rounded-0 mb-0">
        {{$alert}}
    </div>
@endif