@extends('front_end.main_master')
@section('main')

<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<article class="post">
    <header>
        <div class="title">
            <h2>Autor Perfil</h2>
            <p>Aqui tu verás todas as tuas obras, bem como a liberdade de poder editá-las</p>
        </div>
    </header>
    
    @if(session('message'))
    <script type="text/javascript">
        iziToast.success({
            title: '',
            message: "{{ session('message') }}",
            position: "topRight",
        });
    </script>
    <!-- <p class="alert alert-success">{{ session('message') }}</p> -->
    @endif

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
                <h5 class="card-title">Nome : {{ $AutorData->nome }}</h5>
                <hr>
                <h5 class="card-title">Email : {{ $AutorData->email }}</h5>
                <hr>
                <h5 class="card-title">Ocupação : {{ $AutorData->ocupacao }}</h5>
                <hr>
                <h5 class="card-title">Data de Nascimento : {{ $dataNasc }}</h5>
                <hr>
                <center>
                    <a href="{{ route('autor.edit.profile') }}" class="btn btn-outline-info m-1">Edit Profile</a>
                </center>
            </div>
        </div>
    </div>
</article>
@endsection