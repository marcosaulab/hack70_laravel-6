<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comic;
use App\Models\Format;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ComicController extends Controller
{
    public function create() { // ! ritorna la vista in cui è contenuto il form
        $categories = Category::all(); // ! prendo tutte le categorie
        $formats = Format::all(); // ! prendo tutti i formats
        return view('comics.create', compact('categories', 'formats'));
    }

    public function store(Request $request){

        if($request->file('img') == null) {
            $img = '';
        } else {
            $img = $request->file('img')->store('public/comics');
        }

        $comic = Comic::create(
            [   
                'user_id' => Auth::user()->id,
                'category_id' => $request->input('category_id'),
                'title' => $request->input('title'),
                'img' => $img,
                'editor' => $request->input('editor'),
                'abstract' => $request->input('abstract'),
                'release_year' => $request->input('release_year'),
                'price' => $request->input('price')
             ]
        );

        $formats = $request->input('formats');

        // ! uso la funzione per fare l'inserimento
        $comic->formats()->attach($formats);


        return redirect()->route('comic.index')->with('message', 'Comic creato correttamente!');

    }

    public function index() {

        $comics = Comic::orderBy('created_at', 'desc')->get(); // ! prendo la lista di tutti gli elementi
        
        return view('comics.index', compact('comics'));
    }

    public function show(Comic $comic) {

        // $comic = Comic::findOrFail($id); // ! prende il singolo elemento dal database
        $formats = $comic->formats; // ! leggo la relazione: ovvero mi vado a prendere tutti 
                                    // ! i formats appartenenti al comic che sto visualizzando 
        return view('comics.show', compact('comic', 'formats'));
    }

    public function edit(Comic $comic){
        // ! model binding -> significa: vai nel database e prendi il record di $comic che ti sto passando
        return view('comics.edit', compact('comic')); // ! passa $comic alla view
    }

    public function update(Request $request, Comic $comic) {

        $imgComic = $comic->img;

        $comic->update([
            'title' => $request->input('title'),
            'img' => ($request->file('img') == null) ? $comic->img : $request->file('img')->store('public/comics'),
            'genre' => $request->input('genre'),
            'editor' => $request->input('editor'),
            'abstract' => $request->input('abstract'),
            'release_year' => $request->input('release_year'),
            'price' => $request->input('price')
        ]);

        if ($request->file('img') !== null) { // ! ti sto passando una nuova immagine? 
            // ! se è vero: cancello l'immagine vecchia ovvero quello dell'oggetto $comic
            Storage::delete($imgComic);
        }

        return redirect()->route('home')->with('message', "Comic $comic->title modificato correttamente!!");

    }

    public function delete(Comic $comic){
        Storage::delete($comic->img);
        $comic->delete();
        return redirect()->route('comic.index')->with('message', "Comic $comic->title cancellato correttamente!!");
    }


    public function filterByFormat(Format $format) { // ! uso il model binding
        $formatName = $format->name;
        $comics = $format->comics; // ! uso la funzione di relazione per prendere tutti i comics di un determinato formato
        return view('comics.formats', compact('comics', 'formatName'));
    }


}
