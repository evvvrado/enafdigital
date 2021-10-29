@php
$publicidades = \App\Models\Anuncio::inRandomOrder()->get();
$publicidade = $publicidades->first();
@endphp

@if ($publicidade)

<section class="container-fluid s_publi">
  <div class="container-fav">
    <a target="_blank" rel="noopener" href="/" title="Conheça {{$publicidade->nome}}">
      <img src="{{ asset($publicidade->imagem_desktop) }}" rel="noopener" data-size="desktop" alt="" />
      <img src="{{ asset($publicidade->imagem_mobile) }}" rel="noopener" data-size="responsive" alt="" />
    </a>
  </div>
</section>

@endif