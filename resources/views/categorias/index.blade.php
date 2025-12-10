@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h3 class="title-center">Categorias</h3>

   <div id="categoriasCarousel" class="carousel slide" data-bs-ride="carousel">
    
    <div class="carousel-inner">
        @foreach ($categorias->chunk(4) as $index => $chunk)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <div class="row justify-content-center">
                    @foreach ($chunk as $categoria)
                        <a href="{{ route('categorias.show', $categoria->slug) }}" class="col-md-3 click-item">
                            <div class="img-wrapper">
                                <div class="thumbnail">
                                    <img src="{{ $categoria->imagem }}" class="img-fluid">
                                </div>
                                <p class="text-center mt-2">{{ $categoria->nome }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <button class="carousel-control-prev" type="button"
            data-bs-target="#categoriasCarousel"
            data-bs-slide="prev">
        <span class="carousel-control-prev-icon custom-arrow"></span>
    </button>

    <button class="carousel-control-next" type="button"
            data-bs-target="#categoriasCarousel"
            data-bs-slide="next">
        <span class="carousel-control-next-icon custom-arrow"></span>
    </button>
</div>



   <br><br>
   <h3>Eventos</h3>

   @include("eventos.list", ['proximosEventos' => $proximosEventos, "paginacao" => true])
@endsection

<script>
    navigator.geolocation.getCurrentPosition(
        function (position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            
            fetch('/salva-localizacao', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ latitude: latitude, longitude: longitude })
            })
            .then(response => response.json())
            .then(data => {
                //
            })
            .catch(error => {
               //
            });
        },
        function (error) {
            //
        }
    );
</script>