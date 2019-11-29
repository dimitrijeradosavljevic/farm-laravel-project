@foreach($births as $birth)
    <div class="table-holder">
        {{-- Matings Table--}}
        @if($birth->matings->count() > 0)
            <div class="sub-table">
                <div class="sub-table-title"><a href="{{route('matings.index', $animal->id)}}">Pripust</a></div>

                <div class="sub-table-body">
                    @foreach($birth->matings as $mating)
                        <div class="col-pair">
                            <span class="custom-col custom-col-head"><span>Datum</span></span>
                            <span class="custom-col">{{$mating->date}}</span>
                        </div>
                        <div class="col-pair">
                            <span class="custom-col custom-col-head"><span>Nerast</span></span>
                            <span class="custom-col"><a href="{{route('animals.show', $mating->male_id)}}">{{$birth->animal->matings->where('id', $mating->male_id)->first()->id_number}}</a></span>
                        </div>
                    @endforeach
                </div>

            </div>
        @endif
        {{-- Births Table--}}
        <div class="sub-table">
            <div class="sub-table-title"><a href="{{route('births.index', $animal->id)}}">Prasenje</a></div>

            <div class="sub-table-body">
                <div class="col-pair">
                    <span class="custom-col custom-col-head"><span>Red prasenja</span></span>
                    <span class="custom-col">{{$birth->birth_number}}</span>
                </div>
                <div class="col-pair">
                    <span class="custom-col custom-col-head"><span>Datum</span></span>
                    <span class="custom-col">{{$birth->date}}</span>
                </div>
                <div class="col-pair">
                    <span class="custom-col custom-col-head"><span>M</span></span>
                    <span class="custom-col">{{$birth->males}}</span>
                </div>
                <div class="col-pair">
                    <span class="custom-col custom-col-head"><span>Z</span></span>
                    <span class="custom-col">{{$birth->females}}</span>
                </div>
                <div class="col-pair">
                    <span class="custom-col custom-col-head"><span>Mrtvo</span></span>
                    <span class="custom-col">{{$birth->passed}}</span>
                </div>
                <div class="col-pair">
                    <span class="custom-col custom-col-head"><span>Mumific</span></span>
                    <span class="custom-col">{{$birth->mummified}}</span>
                </div>
                <div class="col-pair">
                    <span class="custom-col custom-col-head"><span>Prasadi</span></span>
                    <span class="custom-col">{{$birth->males + $birth->females}}</span>
                </div>
            </div>
        </div>


        {{-- Exclusions Table--}}
        <div class="sub-table">
            @if($birth->exclusion)
                <div class="sub-table-title"><a href="{{route('exclusions.index', $animal->id)}}">Zalucenje</a></div>
                <div class="sub-table-body">
                    <div class="col-pair">
                        <span class="custom-col custom-col-head"><span>Datum</span></span>
                        <span class="custom-col">{{$birth->exclusion->date}}</span>
                    </div>
                    <div class="col-pair">
                        <span class="custom-col custom-col-head"><span>Sa dana</span></span>
                        <span class="custom-col">{{$birth->exclusion->days_old}}</span>
                    </div>
                    <div class="col-pair">
                        <span class="custom-col custom-col-head"><span>Prasadi</span></span>
                        <span class="custom-col">{{$birth->exclusion->animals_count}}</span>
                    </div>
                    <div class="col-pair">
                        <span class="custom-col custom-col-head"><span>Masa legla(kg)</span></span>
                        <span class="custom-col">{{$birth->exclusion->litter_weight}}</span>
                    </div>
                    <div class="col-pair">
                        <span class="custom-col custom-col-head"><span>Ocena legla</span></span>
                        <span class="custom-col">{{$birth->exclusion->litter_mark}}</span>
                    </div>
                    <div class="col-pair">
                        <span class="custom-col custom-col-head"><span>Ocena krmace</span></span>
                        <span class="custom-col">{{$birth->exclusion->mother_mark}}</span>
                    </div>
                    <div class="col-pair">
                        <span class="custom-col custom-col-head"><span>Odabrano za priplod M</span></span>
                        <span class="custom-col">{{$birth->exclusion->males_for_breeding}}</span>
                    </div>
                    <div class="col-pair">
                        <span class="custom-col custom-col-head"><span>Odabrano za priplod Z</span></span>
                        <span class="custom-col">{{$birth->exclusion->females_for_breeding}}</span>
                    </div>
                    <div class="col-pair">
                        <span class="custom-col custom-col-head"><span>Broj potvrde o prasenju</span></span>
                        <span class="custom-col">{{$birth->birth_certificate}}</span>
                    </div>
                </div>

            @endif
        </div>
    </div>

@endforeach
