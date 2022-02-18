<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use App\Models\Municipality;
use App\Models\User;
use Illuminate\Http\Request;

class Afiliado_InstitucionController extends Controller
{
    //

    public function index(Request $request){

        $id_user = auth()->id();
        $search = str_replace('.', '',trim($request->get('search')));
        $afiliados = "";

        $user = User::find($id_user)
        ->first();

        $id_municipio = $user->Id_Municipio;

        $municipio = Municipality::where('id', $id_municipio)
        ->first();
        
        
        
        if ($request){

            $afiliados = Affiliate::where('document_number', $search)
            ->where('municipality_id', $municipio)
            ->orWhere('name', 'LIKE', '%' . $search . '%')
            ->where('municipality_id', $municipio)
            ->orWhere('lastname', 'LIKE', '%' . $search . '%')
            ->where('municipality_id', $municipio)
            ->get();

        }

        return view('afiliado_institucion.index', compact('search', 'afiliados'));

    }
}
