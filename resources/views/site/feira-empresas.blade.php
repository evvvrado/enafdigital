@include("site.includes.head")

@php
$categorias = config('expositores.categorias_nome');
$expositor = $expositores->first();
$isApp = false;



if($expositor->categoria == 6){
$isApp = true;
}
@endphp

@if ($expositor)
<title>ENAF - {{ $categorias[$expositor->categoria] }}</title>
@else
<title>ENAF - Vazio</title>
@endif

<body id="feiraEmpresas">

  @include("site.includes.navbar")

  <section class="container-fluid s_hero">
    <div class="container-fav">
      <div class="_h1 fade">
        <img src="{{ asset('site/img/svg_poweroflife_minor.svg') }}" alt="Simbolo Power of Life" />
      </div>
    </div>
  </section>

  <section class="container-fluid s_backtoFeira">
    <div class="container-fav">
      <div style="padding: 15px; display: flex; gap: 1rem; align-items:center;">
        <div class="_icon">
          <img src="{{ asset('site/img/halfarrowleft_back.svg') }}" alt="Seta para esquerda" />
        </div>
        <a href="{{ route('site.feira') }}">Voltar para feira</a>
      </div>
    </div>
  </section>

  @if($isApp)

  <section class="container-fluid s_empresas">
    <div class="container-fav">
      @if ($anunciante)
      <div class="_box main">
        <a href=" @if ($anunciante->expositor->hotsite && $anunciante->expositor->hotsite->slug){{ route('site.hotsite', ['slug' => $anunciante->expositor->hotsite->slug]) }}" @else{{
          $anunciante->expositor->site }}@endif">
          <picture>
            <source media="(max-width: 660px)" srcset="{{ asset($anunciante->imagem_mobile) }}">
            <img src="{{ asset($anunciante->imagem_desktop) }}" alt="Empresa Nike" />
          </picture>
        </a>

        <div>
          <span>{{ $anunciante->nome }}</span>

          <span>
            <div class="_icon">
              <img src="{{ asset('site/img/icon_googleplay.svg') }}" alt="Ícone de Cursor" />
            </div>

            <a href="{{ $anunciante->expositor->site }}" target="_blank">Baixar no Google Play</a>
          </span>

          <span>
            <div class="_icon">
              <img src="{{ asset('site/img/icon_appstore.svg') }}" alt="Ícone de Evenelope" />
            </div>

            <a href="{{ $anunciante->expositor->email }}">Baixar na App Store</a>
          </span>
        </div>
      </div>
      @endif

      @foreach ($expositores->where("destaque", true) as $expositor)
      <div class="_box">
        <picture>
          <a href=" @if ($expositor->hotsite &&
                            $expositor->hotsite->slug){{ route('site.hotsite', ['slug' => $expositor->hotsite->slug]) }}" @else{{ $expositor->site }}
            @endif">
            <img src="{{ asset($expositor->foto) }}" alt="{{ $expositor->nome }}" />
          </a>
        </picture>

        <div>
          <span>{{ $expositor->nome }}</span>
          <ul>
            <li>
              <a href="{{ $expositor->site }}">
                <img style="display: unset;" src="{{ asset('/site/img/icon_googleplay.svg') }}" alt="Ícone">
              </a>
            </li>

            <li>
              <a href="{{ $expositor->email }}">
                <img style="display: unset;" src="{{ asset('/site/img/icon_appstore.svg') }}" alt="Ícone">
              </a>
            </li>
          </ul>
        </div>
      </div>
      @endforeach

    </div>
  </section>

  <section class="container-fluid s_outrasEmpresas">
    <div class="container-fav">
      <div class="_title">
        <h4>Outras empresas</h4>
      </div>

      <ul>

        @foreach ($expositores->where("destaque", false) as $expositor)

        <li>
          <a href="#">
            <span>{{ $expositor->nome }}</span>



            <legend onclick="window.open('{{ $expositor->site }}')">
              <div class="_icon">
                <img src="{{ asset('/site/img/icon_appstore.svg') }}" alt="Ícone">
              </div>
              Baixar na Appstore
            </legend>


            <legend onclick="window.open('{{ $expositor->email }}')">
              <div class="_icon">
                <img src="{{ asset('/site/img/icon_googleplay.svg') }}" alt="Ícone">
              </div>
              Baixar na Google Play
            </legend>
          </a>
        </li>

        @endforeach
      </ul>
    </div>
  </section>

  @else

  <section class="container-fluid s_empresas">
    <div class="container-fav">
      @if ($anunciante)
      <div class="_box main">
        <a href=" @if ($anunciante->expositor->hotsite && $anunciante->expositor->hotsite->slug){{ route('site.hotsite', ['slug' => $anunciante->expositor->hotsite->slug]) }}" @else{{
          $anunciante->expositor->site }}@endif">
          <picture>
            <source media="(max-width: 660px)" srcset="{{ asset($anunciante->imagem_mobile) }}">
            <img src="{{ asset($anunciante->imagem_desktop) }}" alt="Empresa Nike" />
          </picture>
        </a>

        <div>
          <span>{{ $anunciante->nome }}</span>

          <span>
            <div class="_icon">
              <img src="{{ asset('site/img/icon_cursor.svg') }}" alt="Ícone de Cursor" />
            </div>

            <a href="{{ $anunciante->expositor->site }}" target="_blank">{{ $anunciante->expositor->site }}</a>
          </span>

          <span>
            <div class="_icon">
              <img src="{{ asset('site/img/icon_call.svg') }}" alt="Ícone de Chamada" />
            </div>

            <a href="tel:{{ \App\Classes\Util::limparString($anunciante->expositor->telefone) }}">{{ $anunciante->expositor->telefone }}</a>
          </span>

          <span>
            <div class="_icon">
              <img src="{{ asset('site/img/icon_envelop.svg') }}" alt="Ícone de Evenelope" />
            </div>

            <a href="mail:{{ $anunciante->expositor->email }}">{{ $anunciante->expositor->email }}</a>
          </span>
        </div>
      </div>
      @endif

      @foreach ($expositores->where("destaque", true) as $expositor)
      <div class="_box">
        <picture>
          <a href=" @if ($expositor->hotsite &&
                            $expositor->hotsite->slug){{ route('site.hotsite', ['slug' => $expositor->hotsite->slug]) }}" @else{{ $expositor->site }}
            @endif">
            <img src="{{ asset($expositor->foto) }}" alt="{{ $expositor->nome }}" />
          </a>
        </picture>

        <div>
          <span>{{ $expositor->nome }}</span>
          <ul>
            <li><a href="{{ $expositor->site }}">{{ $expositor->site }}</a></li>
            <li><a href="tel:{{ $expositor->telefone }}">{{ $expositor->telefone }}</a></li>
            <li><a href="mailto:{{ $expositor->email }}">{{ $expositor->email }}</a></li>
          </ul>
        </div>
      </div>
      @endforeach

    </div>
  </section>

  <section class="container-fluid s_outrasEmpresas">
    <div class="container-fav">
      <div class="_title">
        <h4>Outras empresas</h4>
      </div>

      <ul>

        @foreach ($expositores->where("destaque", false) as $expositor)

        <li>
          <a href="{{ $expositor->site }}">
            <span>{{ $expositor->nome }}</span>


            {{-- <main> --}}

              @if ($expositor->telefone)
              <legend>
                <div class="_icon">
                  <img src="{{ asset('/site/img/icon_call.svg') }}" alt="Ícone de Chamada">
                </div>
                {{ $expositor->telefone }}
              </legend>
              @endif

              @if ($expositor->site)
              <legend>{!! \App\Classes\Util::limparURL($expositor->site) !!}</legend>
              @endif
              {{--
            </main> --}}
          </a>
        </li>

        @endforeach
      </ul>
    </div>
  </section>

  @endif


  @include('site.includes.publicidade')



  @include("site.includes.parceiros")


  @include("site.includes.footer-expanded")