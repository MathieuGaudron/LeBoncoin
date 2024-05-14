<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Annonce;

class AnnonceController extends Controller
{
    public function showAnnonce() {
        return view('annonce');
    }

    public function saveAnnonce(Request $request) {
        $image1 = Storage::disk('local')->put('public/img', $request->file("image1"));
        $image2 = Storage::disk('local')->put('public/img', $request->file("image2"));
        $image3 = Storage::disk('local')->put('public/img', $request->file("image3"));
        $annonce = new Annonce();
        $annonce->title = request('title');
        $annonce->description = request('description');
        $annonce->image1 = $image1;
        $annonce->image2 = $image2;
        $annonce->image3 = $image3;
        $annonce->price = request('price');
        $annonce->iduser = Auth::user()->id;
        $annonce->save();
        return redirect('/liste')->with('succes', 'Annonce publiée !');
    }

    public function listAnnonce () {
        $annonces = Annonce::all();
        return view('liste', compact('annonces'));
    }

    public function modifAnnonce() {
        return view('modifannonce');
    }

    public function modifierAnnonce($id,Request $request) {
        $annonce = Annonce::findOrFail($id);
        $annonce->title = $request->input('titlemodif');
        $annonce->description = $request->input('descriptionmodif');
        $annonce->price = $request->input('pricemodif');
        $annonce->save();
        return redirect('/liste')->with('success', 'Annonce modifiée avec succès');
    }

    public function deleteAnnonce($id,Request $request){
        $annonce = Annonce::findOrFail($id);
        $annonce->delete();
        return redirect('/liste');
    }

    public function searchAnnonce(Request $request) {
        $query = Annonce::query();

    if ($request->has('mot_cle')) {
        $query->where('title', 'like', '%' . $request->input('mot_cle') . '%');
    }
    if ($request->has('price')) {
        $query->where('price', '>=', $request->input('price'));
    }
    if ($request->has('created_at')) {
        $query->orderBy('created_at', 'desc');
    }
    $annonces = $query->get();
    return view('liste', compact('annonces'));
    }

}


