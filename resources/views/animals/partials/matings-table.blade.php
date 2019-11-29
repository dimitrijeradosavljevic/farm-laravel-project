<div class="sub-table">
    <div class="sub-table-title"><a href="{{route('matings.index', $animal->id)}}">Pripust</a></div>
    <div class="sub-table-body">
        @foreach($animal->matings as $mating)
            <div class="col-pair">
                <span class="custom-col custom-col-head"><span>Datum</span></span>
                <span class="custom-col">{{$mating->pivot->date}}</span>
            </div>
            <div class="col-pair">
                <span class="custom-col custom-col-head"><span>Krmaca</span></span>
                <span class="custom-col"><a href="{{route('animals.show', $mating->id)}}">{{$mating->id_number}}</a></span>
            </div>
        @endforeach
    </div>
</div>
