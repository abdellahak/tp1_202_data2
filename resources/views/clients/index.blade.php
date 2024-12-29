<div>
    <h1>la liste des clients : </h1>
    <p>le nombre de clients est : {{count($clients)}}</p>
    <a href="{{route('clients.create')}}">Ajouter client</a><br><br>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Telephone</th>
                <th>Ville</th>
                <th>Date de naissance</th>
                <th colspan="3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->prenom}}</td>
                    <td>{{$item->nom}}</td>
                    <td>{{$item->telephone}}</td>
                    <td>{{$item->ville}}</td>
                    <td>{{$item->date_naissance}}</td>
                    <td>
                        <a href="{{route('clients.show', $item->id)}}">Details</a>
                        <a href="{{route('clients.edit', $item->id)}}">Modifier</a>
                        <form action="{{route('clients.destroy', $item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Supprimer">
                        </form>
                    </td>
                </tr>    
            @endforeach
        </tbody>
    </table>
</div>
