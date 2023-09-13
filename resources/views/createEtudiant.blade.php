@extends("layouts.master")

    @section("contenu")
    <div class="container ">
        <h1 class="my-5 text-center">Ajouter etudiant</h1>
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
        <form method="post" action="">
            @csrf
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Prenom</label>
                <input type="text" name="prenom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <label for="class" class="form-label">Classe</label>
            <select id="class" name="classe_id" class="form-select my-2" aria-label="Default select example">
                @foreach($classes as $classe)
                <option value="{{$classe->id}}">{{$classe->libelle}}</option>
                @endforeach
            </select>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection