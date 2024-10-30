<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Autor;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $verifADM = User::where('type', 1)->get();
        if (count($verifADM) > 0) {
            return view('auth.register_autor');
        } else {
            return view('auth.register');
        }
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $verifADM = User::where('type', 1)->get();
        $verifAutoresCadastrado = Autor::where([['nome', $request->nome], ['email', $request->email]])->latest()->get();
        if (count($verifADM) > 0) {
            if (count($verifAutoresCadastrado)<1) {

                $request->validate([
                    'username' => ['required', 'string', 'max:255', 'unique:' . User::class],
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
                    'email' => ['required'],
                    'nome' => ['required'],
                    'dataNasc' => ['required'],
                    'ocupacao' => ['required'],
                ]);


                Autor::insert([
                    'nome' => $request->nome,
                    'dataNasc' => $request->dataNasc,
                    'email' => $request->email,
                    'ocupacao' => $request->ocupacao,
                ]);

                $Autor = Autor::where([['nome', $request->nome], ['email', $request->email]])->latest()->get();
                foreach ($Autor as $value) {
                    /* dd($value->id); */
                    $id = $value->id;
                }
                
                $user = User::create([
                    'type' => 0,
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'idAutor' => $id,
                ]);

                event(new Registered($user));

                Auth::login($user);

                return redirect()->route('frontEnd.home')->with('message', 'Registrado Com Sucesso');
            }else{
                return redirect()->back()->with('warning', 'Esse Autor Já Existe');
            }
        } else {
            $request->validate([
                'username' => ['required', 'string', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user = User::create([
                'type' => 1,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME)->with('message', 'Registrado Com Sucesso');
        }
    }
}
