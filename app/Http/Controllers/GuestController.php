<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Autor;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    //
    public function index()
    {

        $procurar = request('procurar');

        if ($procurar) {
            $Obras = Obra::join('autors', 'autors.id', '=', 'obras.idAutor')
                ->where([
                    ['obras.titulo', 'like', '%' . $procurar . '%']
                ])
                ->select(
                    'obras.titulo',
                    'obras.subtitulo',
                    'obras.breveDescricao',
                    'obras.dataPubicacao',
                    'autors.nome',
                    'autors.autor_img',
                    'obras.obra_img',
                    'obras.id',
                    'obras.idAutor',
                    'obras.nDown'
                )->orderBy('dataPubicacao', 'DESC')->paginate(4);
        } else {
            $Obras = Obra::join('autors', 'autors.id', '=', 'obras.idAutor')
                ->select(
                    'obras.titulo',
                    'obras.subtitulo',
                    'obras.breveDescricao',
                    'obras.dataPubicacao',
                    'autors.nome',
                    'autors.autor_img',
                    'obras.obra_img',
                    'obras.id',
                    'obras.idAutor',
                    'obras.nDown'
                )->orderBy('dataPubicacao', 'DESC')->paginate(4);
        }
        return view('front_end.index', compact('Obras'));
    }
    public function AutorProfile($id)
    {
        $Obras = Obra::join('autors', 'autors.id', '=', 'obras.idAutor')
            ->where('obras.idAutor', $id)
            ->select(
                'obras.titulo',
                'obras.subtitulo',
                'obras.breveDescricao',
                'obras.dataPubicacao',
                'autors.nome',
                'autors.autor_img',
                'obras.obra_img',
                'obras.id',
                'obras.nDown'
            )->orderBy('dataPubicacao', 'DESC')->get();

        /* $Userid = Auth::user()->id;
        $Users = User::where('id', $Userid)->first()->get('idAutor');
        foreach ($Users as $user) {
            $id = $user->idAutor;
        } */
        $AutorData = Autor::find($id);

        return view('front_end.visitas.autor_profile', compact('Obras', 'AutorData'));
    }
}
