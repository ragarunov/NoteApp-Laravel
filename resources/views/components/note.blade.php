@props(['note' => $note])

<div>
    <span class="font-bold">{{ $note->name }}</span> 
    <span class="text-gray-600 text-sm">{{ $note->created_at->diffForHumans() }}</span>
    <form action="{{ route('notes.destroy', $note) }}" method="post" class="inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-500" title="Remove">X</button>
    </form>
                    
    <p class="mb-4"><a href='/notes/{{ $note->id }}'>{{ $note->note_content }}</a></p>

    <div class="flex items-center">
        <form action="{{ route('notes.likes', $note->id) }}" method="post" class="mr-1">
            @csrf
            <button type="submit" class="text-blue-500">Like</button>
        </form>
        @if ($note->likes->count() > 0)
            <form action="{{ route('notes.likes', $note->id) }}" method="post" class="mr-1">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-blue-500">Unike</button>
            </form>
        @endif

        <span>{{ $note->likes->count() }} {{ Str::plural('like', $note->likes->count()) }}</span>
    </div>           
</div>