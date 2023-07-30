<?php

namespace App\Http\Controllers;

use App\Models\Laranote;
use Illuminate\Http\Request;

class LaranoteController extends Controller
{
    //Create Note
    public function store(Request $request){
       $noteInputs = $request -> validate([
        'title' => 'required',
        'tags' => 'required',
        'body' => 'required'
       ]);

       $noteInputs['user_id'] = auth()->id();

       Laranote::create([
        'title' => $noteInputs['title'],
        'note' => $noteInputs['body'],
        'tags' => $noteInputs['tags'],
        'user_id' => $noteInputs['user_id'],
       ]);

       return redirect('/')->with('message','Successfully posted...');
    }

    //Create Note in the dashboard
    public function store_dashboard(Request $request){
        $noteInputs = $request -> validate([
         'title' => 'required',
         'tags' => 'required',
         'body' => 'required'
        ]);
 
        $noteInputs['user_id'] = auth()->id();
 
        Laranote::create([
         'title' => $noteInputs['title'],
         'note' => $noteInputs['body'],
         'tags' => $noteInputs['tags'],
         'user_id' => $noteInputs['user_id'],
        ]);
 
        return redirect('/dashboard')->with('message','Successfully posted...');
     }
    //View notes

    public function index(){
        $searchResult = request('search');
        $searchNote = $searchResult ? $searchResult : "";
        return view('home', [
        'notes' => Laranote::latest()
        ->filter(request(['search', 'tag']))
        ->paginate(4),
        'searchNote' => $searchNote
    ]);
    }

    //Delete Note
    public function destroy(Laranote $note){
        $note->delete();

        return redirect('/dashboard')->with('message', 'Deleted successfully!');
    }

    //Edit Note
    public function edit(Laranote $note){
        return view('editnote',[
            'note' => $note
        ]);
    }
    //Update Note
    public function update(Request $request, laranote $note){
        $noteFields = $request -> validate([
            'title' => 'required',
            'tags' => 'required',
            'body' => 'required'
        ]);

        $noteFields['title'] = strip_tags($noteFields['title']);
        $noteFields['tags'] = strip_tags($noteFields['tags']);
        $noteFields['body'] = strip_tags($noteFields['body']);

        $note -> update([
            'title' => $noteFields['title'],
            'tags' => $noteFields['tags'],
            'note' => $noteFields['body']
        ]);

        return redirect('/dashboard')->with('message', 'Updated successfully');
    }
    //dashboard
    public function dashboard(){
        $searchResult = request('search');
        $searchNote = $searchResult ? $searchResult : "";
        return view('dashboard', [
        'notes' => Laranote::where('user_id',auth()->id())
        ->latest()
        ->filter(request(['search', 'tag']))
        ->paginate(4),
        'searchNote' => $searchNote
    ]);
    }

    
}
