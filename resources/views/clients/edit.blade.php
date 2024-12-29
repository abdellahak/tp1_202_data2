<div>
    <h1>Modifier le client ayant l'id N°: {{$client->id}}</h1>
    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('clients.update', $client->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="prenom">Prenom</label><br>
            <input type="text" name="prenom" value="{{old('prenom', $client->prenom)}}">
        </div>
        <div>
            <label for="nom">Nom</label><br>
            <input type="text" name="nom" value="{{old('nom', $client->nom)}}">
        </div>
        <div>
            <label for="telephone">Telephone</label><br>
            <input type="tel" name="telephone" value="{{old('telephone' ,$client->telephone)}}">
        </div>
        <div>
            <label for="ville">Ville</label><br>
            <input type="tel" name="ville" value="{{old('ville', $client->ville)}}">
        </div>
        <div>
            <label for="date_naissance">Date Naissance</label><br>
            <input type="tel" name="date_naissance" value="{{old('date_naissance', $client->date_naissance)}}">
        </div>
        <input type="submit" value="Modifier">
    </form>
</div>
