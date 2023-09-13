<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index(){
        $etudiants =Etudiant::orderBy("nom","asc")->paginate(5);
        return view('etudiant',compact("etudiants"));
    }

    public function createview(){
        $classes =Classe::all();
        return view('createEtudiant',compact("classes"));
    }

    public function edit(Etudiant $etudiant){
        $classes =Classe::all();
        return view('editEtudiant',compact("etudiant","classes"));
    }

    public function ajouter(Request $request){
        $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "classe_id"=>"required",
        ]);
        
        Etudiant::create($request->all());

        // ou sinon 
        // Etudiant::create([
        //     "nom"=>$request->nom,
        //     "prenom"=>$request->prenom,
        //     "classe-id"=>$request->classe_id,
        // ]);

        return back()->with("success","Etudiant ajouté avec succès");
    }

    public function delete(Etudiant $etudiant){
        $etudiant->delete();
        return back()->with("successDelete", "Etudiant supprimé !");
    }

    public function update(Request $request,Etudiant $etudiant){
        $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "classe_id"=>"required",
        ]);
        
        //Etudiant::create($request->all());

        // ou sinon 
        $etudiant->update([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "classe-id"=>$request->classe_id,
        ]);

        return back()->with("success","Etudiant modifié avec succès");
    }
}
