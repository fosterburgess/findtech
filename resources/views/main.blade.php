@extends('layouts.app')
@section('content')
<form method="post"
action="{{route('main.search')}}"
>
    @csrf
    <input type="text" name="search" class="border-4 text-2xl "/>
    <br/>
    <input type="submit" class="btn btn-blue">Search</input>
</form>
@endsection
