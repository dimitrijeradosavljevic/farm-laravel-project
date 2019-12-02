{{--<table class="table border border-dark">--}}
{{--    <td colspan="{{2*$colspan}}">{{$name}} </td>--}}
{{--    <td colspan="{{2*$colspan}}">HB/RB {{$animal->hb . '/' . $animal->rb}} </td>--}}
{{--    <td colspan="{{2*$colspan}}">ID {{$animal->id}} </td>--}}
{{--    <td colspan="{{2*$colspan}}">TB {{$animal->tatoo_number}} </td>--}}
{{--</table>--}}

<div class="container-za-podatke">
    @foreach($animal as $a)
        <p class="btn-primary">{{$name}}</p>
        <br>
        <p>{{'HB/RB     ' . $a->hb . '/' . $a->rb}}</p>
        <br>
        <p>{{'ID   ' . $a->id}}</p>
        <br>
        <p>{{'TB    ' . $a->tatoo_number}}</p>
        <br>
    @endforeach
</div>
