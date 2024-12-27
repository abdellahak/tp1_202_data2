<div>
    <h1>Modifier la categorie ayant l'id N° {{$categorie->id}}</h1>
    @if ($errors->any())
    <div class="error">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('categories.update', $categorie->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div>
            <label for="nom">Nom :</label><br>
            <input type="text" id="nom" name="nom" value="{{old('nom',$categorie->nom)}}"><br><br>
        </div>
        <div>
            <label for="description">Description :</label><br>
            <textarea name="description" id="description" cols="30" rows="10">{{old('description', $categorie->description)}}
            </textarea>
        </div>
        <input type="submit" value="Modifier">
    </form>
</div>
