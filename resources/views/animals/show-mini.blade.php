<div class="col-{{$colnum}} d-flex flex-column justify-content-between">
    <div class="row border border-dark bg-secondary flex-grow-1 flex-shrink-1">{{$name}}</div>
    <div class="row border border-dark flex-grow-1 flex-shrink-1">HB/RB  {{$animal->hb . '/' . $animal->rb}}</div>
    <div class="row border border-dark flex-grow-1 flex-shrink-1">ID    {{$animal->identification_number}}</div>
    <div class="row border border-dark flex-grow-1 flex-shrink-1">TB    {{$animal->tattoo_number}}</div>
</div>