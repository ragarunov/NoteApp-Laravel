<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        // Adding with('likes') significantly speeds up query
        // latest() == orderBy('created_at', 'DESC')
        $notes = Note::with('likes')->latest()->paginate(15);
        return view('notes.index', [
            'notes' => $notes
        ]);
    }

    // Going to do it within web.php as it's a short func
    // public function get(Note $note)
    // {
    //     return view('notes.note', [
    //         'note' => $note,
    //     ]);
    // }

    public function store(Request $req)
    {
        $this->validate($req, [
            'name' => "required",
            'note_content' => "required",
        ]);

        Note::create([
            'name' => $req->name,
            'note_content' => $req->note_content
        ]);

        return back();
    }

    public function destroy(Note $note, Request $req)
    {
        $note->delete();

        return redirect()->route('notes');
    }
}
