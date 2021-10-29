@php
$apoios = \App\Models\Apoio::all();
$apoio = $apoios->first();
@endphp


<section class="container-fluid s_parceiros">
    <div class="container-fav">
        <div class="_apoio">
            <span>Apoio</span>
            @if ($apoio)
            <a target="_blank" href="{{ $apoio->url }}" class="_apoiador">
                <img src="{{ asset($apoio->foto) }}" alt="{{ $apoio->nome }}" title="{{ $apoio->nome }} ~ CLIQUE PARA VER MAIS" />
            </a>
            @endif
        </div>
        <div class="_patrocinadores">
            <span>Patrocinadores</span>
            <div class="_patrocinadorList">

                @foreach (\App\Models\Patrocinador::take(4)->get() as $patrocinador)

                <a target="_blank" href="{{ $patrocinador->url }}" class="_patrocinador">
                    <img src="{{ asset($patrocinador->foto) }}" alt="{{ $patrocinador->nome }}" title="{{ $patrocinador->nome }}" />
                </a>

                @endforeach



                {{-- <a target="_blank" href="https://www.sistemasca.com/inicio" class="_patrocinador">
                    <img src="{{ asset('site/img/patrocinadores_LION.png') }}" alt="Logo Lion" title="Lion ~ Equipamentos Fitness" />
                </a>
                <a target="_blank" href="https://www.sistemasca.com/inicio" class="_patrocinador">
                    <img src="{{ asset('site/img/patrocinadores_GYMPASS.png') }}" alt="Logo Gympass" title="Gympass ~ Academias próximas - Descubra academias perto" />
                </a>
                <a target="_blank" href="https://www.sistemasca.com/inicio" class="_patrocinador">
                    <img src="{{ asset('site/img/patrocinadores_REDE.png') }}" alt="Logo Rede" title="Rede ~ Máquina de cartão de crédito e débito sem fio" />
                </a> --}}
            </div>
        </div>
    </div>
</section>