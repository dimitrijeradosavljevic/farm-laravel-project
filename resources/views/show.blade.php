{{--<div>--}}
{{--    <h1>--}}
{{--        Regular Animal--}}
{{--    </h1>--}}


{{--    <h4>Child: {{$regularAnimal->name}}</h4>--}}
{{--    <h4>Mother: {{$regularAnimal->mother->name}}</h4>--}}
{{--    <h4>Grandmother: {{$regularAnimal->mother->mother->name}}</h4>--}}

{{--</div>--}}

{{--<div>--}}
{{--    <h1>--}}
{{--        New Animal--}}
{{--    </h1>--}}
{{--    <h4>Child: {{$animalNew[count($animalNew)-1]->name}}</h4>--}}
{{--    <h4>Mother: {{$animalNew[count($animalNew)-2]->name}}</h4>--}}
{{--    <h4>Grandmother: {{$animalNew[count($animalNew)-3]->name}}</h4>--}}

{{--</div>--}}


<div>
    <h1>Third way</h1>
    <ul>
    <li>Child: {{$regularAnimal->name}}</li>

        @foreach($regularAnimal->parents as $parent)
            <ul>
            <li>Parent: {{$parent->name}}</li>

            @foreach($parent->parents as $parent)
                <ul>
                    <li>Parent: {{$parent->name}}</li>
                @foreach($parent->parents as $parent)
                    <ul>
                        <li>Parent: {{$parent->name}}</li>
                    </ul>
                @endforeach
                </ul>
            @endforeach
            </ul>
        @endforeach

    </ul>
</div>




