@extends("layouts.master")

    @section("contenu")
    <div class="container ">
        <h1 class="my-5 text-center">Liste des Etudiants</h1>
        <hr>
        <div class="text-center my-2">
            {{$etudiants->links()}}
            <a href="{{route('etudiant.createview')}}" class="btn btn-primary" role="button" aria-disabled="true" >Ajouter etudiant</a>
        </div>
        @if(session()->has("successDelete"))
            <div class="alert alert-success" role="alert">
                {{session()->get('successDelete')}}
            </div>
        @endif
        <table class="table table-bordered text-center">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">classes</th>
            </tr>
            </thead>
            <tbody>
                
                    
                @foreach ($etudiants as $etudiant)
                <tr>
                    <th scope="row">{{$loop->index+1}}</th>
                    <td>{{$etudiant->nom}}</td>
                    <td>{{$etudiant->prenom}}</td>
                    <td>{{$etudiant->classe->libelle}}</td>
                    <td>
                        <a href="{{route('etudiant.edit',['etudiant'=>$etudiant->id])}}" class="btn btn-outline-primary">Edit</a>
                        <button type="button" class="btn btn-outline-danger" onclick="if(confirm('voulez-vous vriment supprimer cet étudiant?')){document.querySelector('#form-{{$etudiant->id}}').submit()}">Delete</button>
                        <form id="form-{{$etudiant->id}}" method="post" action="{{route('etudiant.supprimer',['etudiant'=>$etudiant->id]) }}">
                            @csrf
                            <input type="text" hidden name="_method" value="delete">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection