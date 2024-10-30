@extends('front_end.main_master')
@section('main')

<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<?php
function EncriptarOpenSSL($texto)
{
    $metodo = "AES-256-CBC";
    $chave = "obra_data_3ncr1pt";
    $optional = 0;
    $iv = '1234567891011121';

    return openssl_encrypt($texto, $metodo, $chave, $optional, $iv);
}

?>

<article class="post">
    <header>
        <div class="title">
            <h2>Todas as tuas Obras</h2>
            <p>Aqui tu verás todas as tuas obras, bem como a liberdade de poder editá-las</p>
        </div>
        <!-- <div class="meta">
            <time class="published" datetime="2015-10-18">October 18, 2015</time>
            <a href="#" class="author"><span class="name">Jane Doe</span><img src="http://127.0.0.1:8000/front_end/images/avatar.jpg" alt=""></a>
        </div> -->

    </header>
    <section>
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

        @if(count($todasObras)>0)
        <div class="table-wrapper">
            <table class="alt">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Subtítulo</th>
                        <th>Breve Descrição</th>
                        <th>Imagem</th>
                        <th style="width: 30px">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach($todasObras as $obra)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$obra->titulo}}</td>
                        <td>{{$obra->subtitulo}}</td>
                        <td>{{$obra->breveDescricao}}</td>
                        <td><img src="{{asset($obra->obra_img)}}" alt="" width="70px" height="70px"></td>
                        <td>
                            <a href="{{route('editar.obra', App\Http\Controllers\ObraController::EncriptarOpenSSL($obra->id))}}" class="btn btn-info sm" title="Edit Data">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{route('eliminar.obra', App\Http\Controllers\ObraController::EncriptarOpenSSL($obra->id))}}" class="btn btn-danger sm" title="Delete Data" onclick="confirmation(event)">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p>
        <h2>Não tens nenhuma obra publicada nessa plataforma</h2>
        </p>
        @endif
    </section>

</article>


<script type="text/javascript">
    function confirmation(ev) {
        ev.preventDefault();

        var urlToRedirect = ev.currentTarget.getAttribute('href');

        console.log(urlToRedirect);

        swal({

                title: "Tens a Certeza que Queres Eliminar?",
                text: "Queres reverter essa situação ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })

            .then((willCancel) => {
                if (willCancel) {
                    window.location.href = urlToRedirect;
                }
            });
    }
</script>
@endsection