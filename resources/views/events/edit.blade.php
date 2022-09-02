@extends("layouts.main")

@section("title", "Editar")

@section("content")
    <div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{ $event->title }}</h1>
    <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image">Imagem:</label>
            <input type="file" class="form-control" id="image" name="image">
            <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="img-preview">  
        </div>
        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento" value = "{{ $event->title }}">
        </div>
        <div class="form-group">
            <label for="date">Evento:</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $event->date->format('Y-m-d') }}">
        </div>
        <div class="form-group">
            <label for="city">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento" value="{{ $event->city }}">
        </div>
        <div class="form-group">
            <label for="private">O evento é privado?</label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1" {{ $event->private === 1 ? "selected" : "" }}>Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?">{{ $event->description }}</textarea>
        </div>
        <div class="form-group">
            
            <label for="description">Descrição:</label>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cadeiras" {{ (in_array("Cadeiras", $event->items)) ? "checked"  :  ""  }}> Cadeiras
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Palco" {{ (in_array("Palco", $event->items)) ? "checked"  :  ""  }}> Palco
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cerveja Grátis" {{ (in_array("Cerveja Grátis", $event->items)) ? "checked"  :  ""  }}> Cerveja Grátis
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Open Food" {{ (in_array("Open Food", $event->items)) ? "checked"  :  ""  }}> Open Food
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Brindes" {{ (in_array("Brindes", $event->items)) ? "checked"  :  ""  }}> Cadeiras
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Editar Evento" {{ (in_array("Editar Evento", $event->items)) ? "checked"  :  ""  }}>
    </form>
    </div>
@endsection