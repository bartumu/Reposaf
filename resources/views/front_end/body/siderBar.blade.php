@auth
@php
$Userid = Illuminate\Support\Facades\Auth::user()->id;

$Users = App\Models\User::where('id',$Userid)->get('idAutor');
foreach ($Users as $user) {
$id=$user->idAutor;
}
$AutorData = App\Models\Autor::find($id);

$obras_side = App\Models\Obra::join('autors  as a', 'a.id','=','obras.idAutor')
->select('obras.titulo','obras.obra_img','obras.dataPubicacao','obras.id','a.autor_img')
->orderBy('nDown', 'DESC')->get()->take(4);
@endphp
@endauth

@guest
@php
$Page = App\Models\HomePage::find(1);
$obras = App\Models\Obra::join('autors', 'autors.id','=','obras.idAutor')
->select('obras.titulo','obras.obra_img','obras.dataPubicacao','obras.id')->orderBy('nDown', 'DESC')->get()->take(4);
@endphp
@endguest

<section id="sidebar">

    <!-- Intro -->
    @guest
    @if (!empty($Page->img_logo))
        
        <section id="intro">
            <a href="{{route('frontEnd.home')}}" class="logo"><img src="{{ (!empty($Page->img_logo)) ? asset($Page->img_logo) : url('upload/user.jpg') }}" alt="" /></a>
            <header>
                <h2>
                    {{ $Page->titulo }}
                </h2>
                <p>{{ $Page->slogan }}</a></p>
            </header>
        </section>
    @endif

    @endguest

    @auth
    <section id="intro">
        <a href="{{route('autor.profile')}}" class="logo"><img src="{{ (!empty($AutorData->autor_img)) ? url($AutorData->autor_img) : url('upload/user.jpg') }}" alt="" /></a>
        <header>
            <h2>{{$AutorData->nome}}</h2>
            <p>{{$AutorData->email}}</a></p>
        </header>
    </section>
    @endauth

    <!-- Mini Posts -->
    <section>
        @auth
        <section>
            <ul class="posts">
                <li>
                    <article>
                        <header>
                            <h2><a href="{{ route('todas.obra') }}">Ver Minhas Obras</a></h2>
                        </header>
                        <a href="#" class="image"></a>
                    </article>
                </li>
                <li>
                    <article>
                        <header>
                            <h2><a href="{{ route('nova.obra') }}">Adicionar Obras</a></h2>
                        </header>
                        <a href="#" class="image"></a>
                    </article>
                </li>
            </ul>
        </section>
    </section>

    <section>
        <!-- Mini Posts -->
        <section>
            <div class="mini-posts">
                <header>
                    <p>
                        Veja também obras parecidas:
                    </p>
                </header>

                <!-- Mini Post -->
                @foreach($obras_side as $obra)
                @php
                setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                date_default_timezone_set('America/Sao_Paulo');
                $dataPublicacao = strftime("%B %d, %Y", strtotime($obra->dataPubicacao));
                @endphp
                <article class="mini-post">
                    <header>
                        <h3><a href="single.html">{{ $obra->titulo }}</a></h3>
                        <time class="published" datetime="2015-10-20">{{ $dataPublicacao }}</time>
                        <a href="#" class="author"><img src="{{ (!empty($obra->autor_img)) ? url($obra->autor_img) : url('upload/user.jpg') }}" alt="" /></a>
                    </header>
                    <a href="single.html" class="image"><img src="{{ asset($obra->obra_img) }}" alt="" /></a>
                </article>
                @endforeach
            </div>
        </section>
        @endauth
        <!-- Mini Post -->

        <!-- Posts List -->
        @guest
        <section>
            <ul class="posts">
                @foreach($obras as $obra)
                @php
                setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                date_default_timezone_set('America/Sao_Paulo');
                $dataPublicacao = strftime("%B %d, %Y", strtotime($obra->dataPubicacao));
                @endphp
                <li>
                    <article>
                        <header>
                            <h3><a href="{{route('ler.obra.guest', $obra->id)}}">{{$obra->titulo}}</a></h3>
                            <time class="published" datetime="2015-10-20">{{$dataPublicacao}}</time>
                        </header>
                        <a href="{{route('ler.obra.guest', $obra->id)}}" class="image"><img src="{{ asset($obra->obra_img) }}" alt="" /></a>
                    </article>
                </li>
                @endforeach
            </ul>
        </section>


        <!-- About -->
        <section class="blurb">
            <h2>Sobre</h2>
            @if(!empty($Page->descricao))
            <p>{{$Page->descricao}}</p>
            @endif
        </section>
        @endguest

        <section id="footer">
            <ul class="icons">
                <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="#" class="icon solid fa-rss"><span class="label">RSS</span></a></li>
                <li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
            </ul>
            <p class="copyright">&copy; Feito Por: <a href="https://www.linkedin.com/in/b%C3%AAn%C3%A7%C3%A3o-artur-munzenga-8437a21aa/">BARTUMU</a>.</p>
        </section>
    </section>
</section>