@php
    $galeria = \App\Models\Galeria::where('ativo', 1)->orderBy('created_at', 'DESC')->first();
    if ($galeria){
        $fotos = \App\Models\GaleriaFoto::where('galeria_id', $galeria->id)->get();
    }
    else{
        $fotos = false;
    };
@endphp

@if (!$fotos == false)

<script>
</script>

<section class="container-fluid s_galeria">
    <div class="container-fav">
        <div class="_title">
            <h4>#SINTAANERGIA</h4>
        </div>

        <div class="_content">
            <div class="_galeriaList">

                @foreach ($fotos as $foto)

                <div class="_picture">
                    <img src="{{ asset($foto->imagem) }}" alt="Foto presente na galeria ENAF" />
                </div>

                @endforeach

                {{--
                <div class="_picture">
                    <img src="{{ asset('site/img/galeria_Pic (2).jpg') }}" alt="Foto presente na galeria ENAF" />
                </div>
                <div class="_picture">
                    <img src="{{ asset('site/img/galeria_Pic (3).jpg') }}" alt="Foto presente na galeria ENAF" />
                </div> --}}
            </div>
        </div>

        <div class="_menu">
            <strong><a href="{{ route('site.galerias') }}">GALERIAS DE FOTOS</a></strong>
            <div class="_buttons">
                <div class="_previous _button">
                    <img src="{{ asset('site/img/halfarrowleft.svg') }}" alt="Seta indicando a esquerda" />
                </div>

                <div class="_indicator">
                    <img class="active" alt="Indicador da lista" />
                    <img alt="Indicador da lista" />
                    <img alt="Indicador da lista" />
                </div>

                <div class="_next _button">
                    <img src="{{ asset('site/img/halfarrowright.svg') }}" alt="Seta indicando a direita" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class="fullscreen-image">
    <div>
        <button><img src="{{ asset('site/img/halfarrowleft.svg') }}" alt="Seta indicando a esquerda" /></button>
        <button><img src="{{ asset('site/img/halfarrowright.svg') }}" alt="Seta indicando a direita" /> </button>
    </div>
    <picture>
        <img src="{{ asset('site/img/galeria_Pic (1).jpg')}} " alt="">
    </picture>

    <span></span>
</section>

@endif