@extends('front_end.main_master')
@section('main')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<article class="post">
    <header>
        <div class="title">
            <h2>Edite As Tuas Obras</h2>
            <p>Aqui Farás as alterações das tuas obras</p>
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
        <h3>Form</h3>
        <form method="POST" action="{{Route('actualizar.obra')}}" enctype="multipart/form-data">
            @csrf
            <div class="row gtr-uniform">
                <input type="hidden" name="id" id="id" value="{{$obras->id}}" placeholder="Título da Obra" />
                <div class="col-6 col-12-xsmall">
                    <input type="text" name="titulo" id="titulo" value="{{$obras->titulo}}" placeholder="Título da Obra" />
                </div>
                <div class="col-6 col-12-xsmall">
                    <input type="text" name="subtitulo" id="subtitulo" value="{{$obras->subtitulo}}" placeholder="Subtítulo da Obra" />
                </div>
                <div class="col-12">
                    <input type="text" name="breveDescricao" id="breveDescricao" value="{{$obras->breveDescricao}}" placeholder="Faça uma breve descrição da Obra" />
                </div>
                <div class="col-12">
                    <textarea name="sinopse" id="sinopse" placeholder="Escreva a Sinopse" rows="6">{{$obras->sinopse}}</textarea>
                </div>
                <div class="col-6 col-12-xsmall">
                    <label for="exampleInputtext1" class="form-label">Capa Da Obra:</label>
                    <input type="file" name="obra_img" id="obra_img">
                </div>
                <div class="col-6 col-12-xsmall">
                    <label for="exampleInputtext1" class="form-label">Obra em Pdf:</label>
                    <input type="file" name="obra_arquivo" id="obra_arquivo" accept=".pdf">
                    @if($obras->obra_arquivo!=null)
                    <p>(Já Têm um Arquivo)</p>
                    @else
                    <p>(Precisas adicionar um Arquivo)</p>
                    @endif
                </div>
                <div class="col-12">
                    <img id="showProfile_image" src="{{ (!empty($obras->obra_img)) ? url($obras->obra_img) : url('upload/user.jpg') }}" class="rounded" width="125" height="125" alt="...">
                    <ul class="actions">
                        <li><input type="submit" value="Editar" /></li>
                    </ul>
                </div>
            </div>
        </form>
    </section>
</article>


<script type="text/javascript">
    $(document).ready(function() {
        $('#obra_img').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showProfile_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    })
</script>
@endsection