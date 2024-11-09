@extends('layouts.app')
@section('content')
<form method="post"
action="{{route('main.search')}}"
>
    @csrf
    <input type="text" name="search"
           value="{{$term ?? ''}}"
           class="border-2 mt-2 py-1 px-2 text-2xl "/>

    <button type="submit" class="btn btn-green">Search</button>
    @if($results)
    @foreach($results as $result)
        <x-tech-result :tech="$result" />
    @endforeach
    {{ $results->links() }}
    @endif

</form>
@endsection
