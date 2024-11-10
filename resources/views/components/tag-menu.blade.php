<div>
    @if($selectedTags)
        <div class="font-bold">Selected tags:</div>
    @endif
    @foreach($selectedTags as $tag)
        <div>
            <a href="{{route('main.removeTag', $tag)}}?query={{$search ?? ''}}">
                {{$tag}} (remove)
            </a>
        </div>
    @endforeach

    <div class="font-bold">Available tags:</div>
    @foreach($tags as $tag)
        <div>
            <a href="{{route('main.addTag', $tag['tagname'])}}?query={{$search ?? ''}}">
                {{$tag['tagname']}} ({{$tag['technologies_count']}})
            </a>
        </div>
    @endforeach
</div>
