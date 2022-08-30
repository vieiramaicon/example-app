<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index() {
        $search = request('search');

        if($search) {
            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $events = Event::all();
        }

        return view("welcome", ["events" => $events, 'search' => $search]); 
    }

    public function create() {
        return view("events.create");
    }

    public function login() {
        return view("events.login");
    }

    public function register() {
        return view("events.register");
    }

    public function show($id) {
        $event = Event::findOrFail($id);

        return view("events.show", ["event" => $event]);
    }

    public function store(Request $request) {
        $event = new Event;
        
        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description ;
        $event->items = $request->items;

        // Image upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            // Pegar imagem
            $requestImage = $request->image;
            
            // Pegar extensão da imagem
            $extension = $requestImage->extension();
            
            // Criar nome único da imagem
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            
            // Salvar imagem no diretório
            $requestImage->move(public_path("img/events"), $imageName);

            $event->image = $imageName;
        }

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }
}
