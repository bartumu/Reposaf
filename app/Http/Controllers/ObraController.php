<?php

namespace App\Http\Controllers;

use Image;
use App\Models\Obra;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Session;

class ObraController extends Controller
{
    public function NovaObra()
    {

        return view('front_end.obras.nova_obra_autor');
    }
    public function LerObra($id)
    {
        $obra = Obra::findOrFail($id);
        $autor = Obra::join('autors', 'autors.id', '=', 'obras.idAutor')
            ->where('obras.id', $id)
            ->select('autors.nome', 'autors.autor_img', 'autors.id')->get();

        return view('front_end.obras.apresentacao_obra', compact('obra', 'autor'));
    }
    public function AddObra(Request $request)
    {
        $request->validate(
            ['titulo' => 'required'],
            ['titulo.required' => 'Título is Required']
        );

        $request->validate(
            ['subtitulo' => 'required'],
            ['subtitulo.required' => 'Subtítulo is Required']
        );
        $request->validate(
            ['breveDescricao' => 'required'],
            ['breveDescricao.required' => 'Breve Descrição is Required']
        );
        $request->validate(
            ['sinopse' => 'required'],
            ['sinopse.required' => 'Sinopse is Required']
        );
        $request->validate(
            ['obra_img' => 'required'],
            ['obra_img.required' => 'Capa Da Obra is Required']
        );
        $request->validate(
            ['obra_arquivo' => 'required'],
            ['obra_arquivo.required' => 'O Arquivo Pdf da Obra is Required']
        );

        $Userid = Auth::user()->id;
        $Users = User::where('id', $Userid)->get('idAutor');
        foreach ($Users as $user) {
            $idAutor = $user->idAutor;
        }

        if ($request->file('obra_img')) {
            $obra_img = $request->file('obra_img');
            $ArquivoPDF = $request->file('obra_arquivo');
            $gen_nome_img = hexdec(uniqid()) . '.' . $obra_img->getClientOriginalExtension();
            $gen_nome_arq = hexdec(uniqid()) . '.' . $ArquivoPDF->getClientOriginalExtension();

            $request->obra_arquivo->move(public_path('upload/obra_arquivo/'), $gen_nome_arq);
            Image::make($obra_img)->fit(840, 341)->save('upload/obra_images/' . $gen_nome_img);
            $img_url = 'upload/obra_images/' . $gen_nome_img;
            $arq_url = 'upload/obra_arquivo/' . $gen_nome_arq;
        }

        Obra::insert([
            'titulo' => $request->titulo,
            'subtitulo' => $request->subtitulo,
            'breveDescricao' => $request->breveDescricao,
            'sinopse' => $request->sinopse,
            'obra_img' => $img_url,
            'idAutor' => $idAutor,
            'dataPubicacao' => now(),
            'pendente' => 1,
            'obra_arquivo' => $arq_url,
        ]);
        return redirect()->route('todas.obra')->with('message', 'Adicionado Com Sucesso');
    }

    public function EditarObra($id)
    {
        $idDes = $this->DesencriptarOpenSSL($id);
        $obras = Obra::findOrFail($idDes);

        return view('front_end.obras.editar_obra_autor', compact('obras'));
    }

    public function ActualizarObra(Request $request)
    {
        $idObra = $request->id;

        $request->validate(
            ['titulo' => 'required'],
            ['titulo.required' => 'Título is Required']
        );

        $request->validate(
            ['subtitulo' => 'required'],
            ['subtitulo.required' => 'Subtítulo is Required']
        );
        $request->validate(
            ['breveDescricao' => 'required'],
            ['breveDescricao.required' => 'Breve Descrição is Required']
        );
        $request->validate(
            ['sinopse' => 'required'],
            ['sinopse.required' => 'Sinopse is Required']
        );

        $Userid = Auth::user()->id;
        $Users = User::where('id', $Userid)->first()->get('idAutor');
        foreach ($Users as $user) {
            $idAutor = $user->idAutor;
        }

        //Verificar se Existe Arquivo no Input
        if ($request->file('obra_arquivo')) {
            $ArquivoPDF = $request->file('obra_arquivo');
            $gen_nome_arq = hexdec(uniqid()) . '.' . $ArquivoPDF->getClientOriginalExtension();
            $request->obra_arquivo->move(public_path('upload/obra_arquivo/'), $gen_nome_arq);
            $arq_url = 'upload/obra_arquivo/' . $gen_nome_arq;
            Obra::findOrFail($idObra)->update([
                'obra_arquivo' => $arq_url,
            ]);
        }

        //Verificar se Existe Imagem no Input
        if ($request->file('obra_img')) {
            $obra_img = $request->file('obra_img');
            $gen_nome_img = hexdec(uniqid()) . '.' . $obra_img->getClientOriginalExtension();

            Image::make($obra_img)->fit(840, 341)->save('upload/obra_images/' . $gen_nome_img);
            $img_url = 'upload/obra_images/' . $gen_nome_img;

            Obra::findOrFail($idObra)->update([
                'titulo' => $request->titulo,
                'subtitulo' => $request->subtitulo,
                'breveDescricao' => $request->breveDescricao,
                'sinopse' => $request->sinopse,
                'obra_img' => $img_url,
                'idAutor' => $idAutor,
                'obra_arquivo' => $arq_url,
            ]);
        } else {
            Obra::findOrFail($idObra)->update([
                'titulo' => $request->titulo,
                'subtitulo' => $request->subtitulo,
                'breveDescricao' => $request->breveDescricao,
                'sinopse' => $request->sinopse,
                'idAutor' => $idAutor,
            ]);
        }


        return redirect()->route('todas.obra')->with('message', 'Editado Com Sucesso');
    }

    public function EliminarObra($id)
    {
        $idDes = $this->DesencriptarOpenSSL($id);
        $obras = Obra::findOrFail($idDes);
        $img = $obras->obra_img;
        unlink($img);
        $obras = Obra::findOrFail($idDes)->delete();

        return redirect()->route('todas.obra')->with('message', 'Eliminado Com Sucesso');
    }

    public function TodasObra()
    {
        $Userid = Auth::user()->id;
        $Users = User::where('id', $Userid)->get('idAutor');
        foreach ($Users as $user) {
            $id = $user->idAutor;
        }


        $todasObras = Obra::all()->where('idAutor', $id);
        return view('front_end.obras.todas_obra_autor', compact('todasObras'));
    }

    //
    static function DesencriptarOpenSSL($texto)
    {
        $metodo = "AES-256-CBC";
        $chave = "obra_data_3ncr1pt";
        $optional = 0;
        $iv = '1234567891011121';

        return openssl_decrypt($texto, $metodo, $chave, $optional, $iv);
    }

    static function EncriptarOpenSSL($texto){
        $metodo = "AES-256-CBC";
        $chave = "obra_data_3ncr1pt";
        $optional = 0;
        $iv = '1234567891011121';
        
        return openssl_encrypt($texto, $metodo, $chave, $optional,$iv);
    }
}
