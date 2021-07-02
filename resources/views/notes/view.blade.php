@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-3/4 bg-white p-8 rounded-lg">
        <x-note :note="$note"/>
    </div>
</div>
@endsection