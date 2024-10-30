@extends('front_end.main_apresentacao')
@section('main')

<!-- Post -->
<article class="post">

    @php
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    $dataPublicacao = strftime("%B %d, %Y", strtotime($obra->dataPubicacao));
    @endphp
    <header>
        <div class="title">
            <h2><a href="#">{{ $obra->titulo }}</a></h2>
            <p>{{ $obra->subtitulo }}</p>
        </div>
        <div class="meta">
            <time class="published" datetime="2015-11-01">{{ $dataPublicacao }}</time>
            @foreach($autor as $umAutor)
            <a href="{{route('guest.autor.profile', $umAutor->id)}}" class="author"><span class="name">{{ $umAutor->nome }}</span><img src="{{ (!empty($umAutor->autor_img)) ? url($umAutor->autor_img) : url('upload/user.jpg') }}" alt="" /></a>
            @endforeach
        </div>
    </header>
    <span class="image featured"><img src="{{asset($obra->obra_img)}}" alt="" /></span>
    <p>{{$obra->sinopse}}</p>
    
    <footer>
        <ul class="stats">
            <li><a href="{{asset($obra->obra_arquivo)}}" class="icon solid fa-download" download>Download</a></li>
            <li><a href="#" class="icon solid fa-heart">28</a></li>
            <li><a href="#" class="icon solid fa-comment">128</a></li>
        </ul>
    </footer>
</article>

@endsection