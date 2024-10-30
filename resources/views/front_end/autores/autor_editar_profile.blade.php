@extends('front_end.main_master')
@section('main')

<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<article class="post">
    <header>
        <div class="title">
            <h2>Adicione Novas Obras</h2>
            <p>Aqui tu verás todas as tuas obras, bem como a liberdade de poder editá-las</p>
        </div>
        <!-- <div class="meta">
            <time class="published" datetime="2015-10-18">October 18, 2015</time>
            <a href="#" class="author"><span class="name">Jane Doe</span><img src="http://127.0.0.1:8000/front_end/images/avatar.jpg" alt=""></a>
        </div> -->
    </header>

    <section>
        @if(count($errors))
        @foreach($errors->all() as $error)
        <script type="text/javascript">
            iziToast.warning({
                title: '',
                message: "{{ $error }}",
                position: "topRight",
            });
        </script>
        <!-- <p class="alert alert-danger">{{ $error }}</p> -->
        @endforeach
        @endif

        @php
        $dataNasc = date("d/m/Y", strtotime($AutorData->dataNasc));
        @endphp

        <h3>Form</h3>
        <form method="POST" action="{{Route('atualizar.autor.profile')}}" enctype="multipart/form-data">
            @csrf
            <div class="row gtr-uniform">
                <input type="hidden" name="id" id="id" value="{{$AutorData->id}}">
                <div class="col-6 col-12-xsmall">
                    <input type="text" name="nome" id="nome" value="{{$AutorData->nome}}" placeholder="Título da Obra" />
                </div>
                <div class="col-6 col-12-xsmall">
                    <input type="email" name="email" id="email" value="{{$AutorData->email}}" placeholder="Subtítulo da Obra" />
                </div>
                <div class="mb-3 col-6 col-12-xsmall">
                    <input type="date" class="form-control" id="dataNasc" name="dataNasc" value="{{$AutorData->dataNasc}}">
                </div>
                <div class="mb-3 col-6 col-12-xsmall">
                    <input type="text" class="form-control" id="ocupacao" name="ocupacao" value="{{$AutorData->ocupacao}}">
                </div>
                <div class="col-12">
                    <input type="file" name="autor_img" id="autor_img">
                </div>
                <div class="col-12">
                    <ul class="actions">
                        <img id="showProfile_image" src="{{ (!empty($AutorData->autor_img)) ? url($AutorData->autor_img) : url('upload/user.jpg') }}" class="rounded" width="125" height="125" alt="...">
                        <li><input type="submit" value="Editar" /></li>
                    </ul>
                </div>
            </div>
        </form>
    </section>
</article>


<script type="text/javascript">
    $(document).ready(function() {
        $('#autor_img').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showProfile_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    })
</script>
@endsection