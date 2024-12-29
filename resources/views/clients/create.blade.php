<div>
    <h1>Ajouter un nouvelle client :</h1>
    @if ($errors->any())
    <div class="error">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('clients.store')}}" method="POST">
        @csrf
        <div>
            <label for="prenom">Prenom : </label><br>
            <input type="text" name="prenom">
        </div>
        <div>
            <label for="nom">Nom : </label><br>
            <input type="text" name="nom">
        </div>
        <div>
            <label for="telephone">Telephone : </label><br>
            <input type="tel" name="telephone">
        </div>
        <div>
            <label for="ville">Ville : </label><br>
            <input type="text" name="ville">
        </div>
        <div>
            <label for="date_naissance">Date de naissance : </label><br>
            <input type="date" name="date_naissance">
        </div>
        <div>
            <label for="description">description : </label><br>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
        </div>
        <input type="submit" value="Ajouter">
    </form>
</div>
