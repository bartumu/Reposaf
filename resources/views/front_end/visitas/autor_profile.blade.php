@extends('front_end.main_master')
@section('main')

<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<article class="post">
    <header>
        <div class="title">
            <h2>Perfil</h2>
            <p>---------------</p>
        </div>
    </header>

    <div class="col-md-6">
        @php
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        $dataNasc = strftime("%d de %B de %Y", strtotime($AutorData->dataNasc));
        @endphp
        <div class="card"><br><br>
            <center>
                <img src="{{ (!empty($AutorData->autor_img)) ? url($AutorData->autor_img) : url('upload/user.jpg') }}" width="225" height="225" alt="...">
            </center>
            <div class="card-body">
                <br>
                <hr>
                <h5 class="card-title">Nome : {{ $AutorData->nome }}</h5>
                <!-- 
                <h5 class="card-title">Email : {{ $AutorData->email }}</h5> -->
                
                <h5 class="card-title">Ocupação : {{ $AutorData->ocupacao }}</h5>
                
                <!-- <h5 class="card-title">Data de Nascimento : {{ $dataNasc }}</h5> -->
                @foreach($Obras as $obra)
                <h5 class="card-title">Nº Download : {{ $obra->nDown }}</h5>
                @endforeach
                <hr>
            </div>
        </div>
    </div>
</article>

@if(count($Obras)>0)
<!-- Post -->
@foreach($Obras as $obra)
@php
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$dataPublicacao = strftime("%B %d, %Y", strtotime($obra->dataPubicacao));
@endphp
<article class="post">
    <header>
        <div class="title">

            <h2><a href="{{route('ler.obra.guest', $obra->id)}}">{{ $obra->titulo }}</a></h2>

            <p>{{ $obra->subtitulo }}</p>
        </div>
        <div class="meta">
            <time class="published" datetime="2015-11-01">{{ $dataPublicacao }}</time>
            <a href="#" class="author"><span class="name">{{ $obra->nome }}</span><img src="{{ (!empty($obra->autor_img)) ? url($obra->autor_img) : url('upload/user.jpg') }}" alt="" /></a>
        </div>
    </header>
    <a href="{{route('ler.obra.guest', $obra->id)}}" class="image featured"><img src="{{ asset($obra->obra_img) }}" alt="" /></a>
    <p>{{ $obra->breveDescricao }}</p>
    <footer>
        <ul class="actions">
            <li><a href="{{route('ler.obra.guest', $obra->id)}}" class="button large">Continue Lendo</a></li>

        </ul>
        <ul class="stats">
            <li><a href="#">General</a></li>
            <li><a href="#" class="icon solid fa-heart">28</a></li>
            <li><a href="#" class="icon solid fa-comment">128</a></li>
        </ul>
    </footer>
</article>
@endforeach

@else
<p>
<h1>Não tem nenhuma Obra Inserida nessa plataforma</h1>
</p>
@endif

<!-- Pagination -->
<ul class="actions pagination">
    <li><a href="" class="disabled button large previous">Previous Page</a></li>
    <li><a href="#" class="button large next">Next Page</a></li>
</ul>

@endsection