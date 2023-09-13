@extends("layouts.master")

    @section("contenu")
    <div class="container ">
        <h1 class="my-5 text-center">Modifier etudiant</h1>
        <hr>
        <div class="text-center my-2">

            @if(session()->has("success"))
                <div class="alert alert-success" role="alert">
                    {{session()->get('success')}}
                </div>
            @endif
            @if ($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <form method="post" action="{{route('etudiant.modifier',['etudiant'=>$etudiant->id])}}">
            @csrf

            <input type="hidden" value="put" name="_method">
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nom</label>
            <input type="text" name="nom" value="{{$etudiant->nom}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Prenom</label>
                <input type="text" name="prenom"  value="{{$etudiant->prenom}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <label for="class" class="form-label">Classe</label>
            <select id="class" name="classe_id" value="{{$etudiant->classe_id}}" class="form-select my-2" aria-label="Default select example">
                @foreach($classes as $classe)
                    @if($classe->id==$etudiant->classe_id)
                        <option value="{{$classe->id}}" selected>{{$classe->libelle}}</option>
                    @else
                        <option value="{{$classe->id}}">{{$classe->libelle}}</option>
                    @endif
                @endforeach
            </select>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection