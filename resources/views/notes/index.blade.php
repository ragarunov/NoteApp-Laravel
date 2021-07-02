@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-3/4 bg-white p-8 rounded-lg">
        <form action="{{ route('notes') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="sr-only">Name</label>
                <input type="text" value="{{ old('name') }}" name="name" id="name"
                class="bg-gray-100 p-3 border-4 w-full rounded-lg
                @error('name') border-red-500 @enderror" placeholder="Enter Name">

                @error('name')
                <div class="text-red-500 mt-2">
                    {{ $message }}
                </div>
                @enderror

            </div>
            <div class="mb-4">
                <label for="note_content" class="sr-only">Note</label>
                <textarea name="note_content" id="note_content" cols="30" rows="4"
                class="bg-gray-100 p-3 border-4 w-full rounded-lg
                    @error('note_content') border-red-500 @enderror" 
                    placeholder="Enter a note here">{{ old('note_content') }}</textarea>

                @error('note_content')
                <div class="text-red-500 mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="flex justify-center">
                <button type="submit" class="bg-blue-600 text-white px-5 py-1
                    rounded">Post Note</button>
            </div>
        </form>

        @if ($notes->count())
            @foreach ($notes as $note)
                <x-note :note="$note"/>
                <hr>
            @endforeach

            {{ $notes->links() }}
        @else
            <p>Nothing</p>
        @endif
    </div>
</div>
@endsection