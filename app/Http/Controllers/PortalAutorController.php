<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Obra;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Image;

use Illuminate\Http\Request;

class PortalAutorController extends Controller
{
    public function index()
    {
        $Obras = Obra::join('autors', 'autors.id','=','obras.idAutor')
        ->select('obras.titulo','obras.subtitulo','obras.breveDescricao','obras.dataPubicacao'
        ,'autors.nome', 'autors.autor_img','obras.obra_img','obras.id','obras.idAutor','obras.nDown')->orderBy('dataPubicacao', 'DESC')->paginate(4);
        /* dd(Auth::user()->username); */
        return view('front_end.index', compact('Obras'));
    }
    public function PortalAutor()
    {

        $Userid = Auth::user()->id;
        $Users = User::where('id', $Userid)->get('idAutor');
        foreach ($Users as $user) {
            $id = $user->idAutor;
        }
        $AutorData = Autor::find($id);
        return view('front_end.autores.portal_autor', compact('AutorData'));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    } //End MEthod

    public function ProfileAutor()
    {
        $Userid = Auth::user()->id;
        $Users = User::where('id', $Userid)->get('idAutor');
        foreach ($Users as $user) {
            $id = $user->idAutor;
        }
        $AutorData = Autor::find($id);
        return view('front_end.autores.portal_autor_profile', compact('AutorData'));
    } // End method
    public function EditProfileAutor()
    {
        $Userid = Auth::user()->id;
        $Users = User::where('id', $Userid)->first()->get('idAutor');
        foreach ($Users as $user) {
            $id = $user->idAutor;
        }
        $AutorData = Autor::find($id);
        return view('front_end.autores.autor_editar_profile', compact('AutorData'));
    } // End method
    public function AtualizarProfile(Request $request)
    {
        $idAutor = $request->id;

        $request->validate(
            ['nome' => 'required'],
            ['nome.required' => 'Nome is Required']
        );

        $request->validate(
            ['email' => 'required'],
            ['email.required' => 'Email is Required']
        );
        $request->validate(
            ['dataNasc' => 'required'],
            ['dataNasc.required' => 'Data De Nascimento is Required']
        );
        $request->validate(
            ['ocupacao' => 'required'],
            ['ocupacao.required' => 'Ocupação is Required']
        );

        /* $Userid = Auth::user()->id;
        $Users = User::where('id', $Userid)->first()->get('idAutor');
        foreach ($Users as $user) {
            $idAutor = $user->idAutor;
        } */

        if ($request->file('autor_img')) {
            $autor_img = $request->file('autor_img');
            $gen_nome = hexdec(uniqid()) . '.' . $autor_img->getClientOriginalExtension();

            /* $request->autor_img->move(public_path('upload/autor_images/'), $gen_nome); */
            Image::make($autor_img)->fit(500, 500)->save('upload/autor_images/' . $gen_nome);
            $img_url = 'upload/autor_images/' . $gen_nome;

            Autor::findOrFail($idAutor)->update([
                'nome' => $request->nome,
                'email' => $request->email,
                'dataNasc' => $request->dataNasc,
                'ocupacao' => $request->ocupacao,
                'autor_img' => $img_url,
            ]);
        }else {
            Autor::findOrFail($idAutor)->update([
                'nome' => $request->nome,
                'email' => $request->email,
                'dataNasc' => $request->dataNasc,
                'ocupacao' => $request->ocupacao,
            ]);
            
        }


        return redirect()->route('autor.profile')->with('message','Editado Com Sucesso');

    } // End method

    public function ChangePassword()
    {

    }
    public function UpdatePassword(Request $request)
    {

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',
        ]);
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

            session()->flash('message', 'Password Updated Sucessfully');
            return redirect()->back();
        } else {
            session()->flash('message', 'Old Password Is Not Match');
            return redirect()->back();
        }
    }
}
