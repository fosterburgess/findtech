<div>

    {{$tech->title}}
    <br/>
    <div class="ml-4 italic font-bold">
    tags: {{$tech->tags->pluck('name')->implode(', ')}}
    </div>
    <hr/>
</div>
