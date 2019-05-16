<ul uk-accordion>
    @foreach( range(1,10) as $index=>$value)
    <li>
        <a class="uk-accordion-title" href="#">{{$index}}</a>
        <div class="uk-accordion-content">
            <p>{{$value}}</p>
        </div>
    </li>
        @endforeach
</ul>