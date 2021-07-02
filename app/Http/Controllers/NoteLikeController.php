<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteLikeController extends Controller
{
    public function store(Note $note)
    {
        $note->likes()->create([
            'note_id' => $note->id,
        ]);

        return back();
    }

    public function destroy(Note $note, Request $req)
    {
        if ($note->likes()->count() <= 0) {
            return response(null, 409);
        }
        $note->likes()->where('note_id', $note->id)->first()->delete();

        return back();
    }
}
