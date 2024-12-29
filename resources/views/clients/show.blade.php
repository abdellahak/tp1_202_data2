<div>
    <h1>details de la client N° {{$client->id}}</h1>
    <p>
        <strong>Prenom : </strong> {{$client->prenom}}
        <strong>Nom : </strong> {{$client->nom}}<br>
        <strong>Telephone : </strong> {{$client->telephone}}<br>
        <strong>ville : </strong> {{$client->ville}}<br>
        <strong>Date de naissance : </strong> {{$client->date_naissance}}<br>
    </p>
    <a href="{{route('clients.index')}}">Retourner à la liste</a>
</div>
