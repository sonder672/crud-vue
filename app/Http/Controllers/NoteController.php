<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    public function index()
    {
        $notes = Note::all();
        return response()->json($notes); 
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'max:255'],
            'content' => ['required', 'string']
        ]);
        $AllInput = $request->except('_token');
        $notes = Note::create($AllInput);
        return response()->json($notes);
    }

    public function show($id)
    {
        try {
            $notes = Note::findOrFail($id);
        return response()->json($notes);
        }
        catch (\Exception $e)
        {
            return response()->json([
                'msg' => 'not found'
            ], 404);
        }
    }

    public function edit($id)
    {
        try {
            $notes = Note::findOrFail($id);
        return response()->json($notes);
        }
        catch (\Exception $e)
        {
            return response()->json([
                'msg' => 'not found'
            ], 404);
        }    
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => ['required', 'max:255'],
            'content' => ['required', 'string']
        ]);
        $AllInput = $request->except('_token');

        try {
            $notes = Note::findOrFail($id);
            $notes->update($AllInput);
        return response()->json($notes);
        }
            catch (\Exception $e)
        {
            return response()->json([
                'msg' => 'not found'
            ], 404);
        }
    }

    public function destroy($id)
    {
        try{
            $notes = Note::findOrFail($id);
            $notes->delete();
        return response()->json($notes);
        }
        catch (\Exception $e) {
            return response()->json([
                'msg' => 'not possible'
            ], 404);
        }     
    }
}
