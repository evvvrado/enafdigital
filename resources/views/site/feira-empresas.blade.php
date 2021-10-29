@include("site.includes.head")

@php
$categorias = config('expositores.categorias_nome');
$categoriaid = $expositores->first();
@endphp

@if ($categoriaid)
<title>ENAF - {{$categorias[$categoriaid->categoria]}}</title>
@else
<title>ENAF- Vazio</title>
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
      <div style="display: flex; gap: 1rem; align-items:center;">
        <div class="_icon">
          <img src="{{ asset('site/img/halfarrowleft_back.svg') }}" alt="Seta para esquerda" />
        </div>
        <a href="{{ route('site.feira')}}">Voltar para feira</a>
      </div>
    </div>
  </section>

  <section class="container-fluid s_empresas">
    <div class="container-fav">
      <div class="_box main">
        <picture>
          <source media="(max-width: 660px)" srcset="{{ asset('site/img/banner_empresa_nike__mobile.jpg') }}">
          <img src="{{ asset('site/img/banner_empresa_nike.png') }}" alt="Empresa Nike" />
        </picture>

        <div>
          <span>Nike Sports</span>

          <span>
            <div class="_icon">
              <img src="{{ asset('site/img/icon_cursor.svg') }}" alt="Ícone de Cursor" />
            </div>

            <a href="https://nikeworld.com.br">nikeworld.com.br</a>
          </span>

          <span>
            <div class="_icon">
              <img src="{{ asset('site/img/icon_call.svg') }}" alt="Ícone de Chamada" />
            </div>

            <a href="tel:3592665256">35 9266 5256</a>
          </span>

          <span>
            <div class="_icon">
              <img src="{{ asset('site/img/icon_envelop.svg') }}" alt="Ícone de Evenelope" />
            </div>

            <a href="mail:contato@nike.com.br">contato@nike.com.br</a>
          </span>
        </div>
      </div>

      @foreach ($expositores->take(12) as $expositor)
      <div class="_box">
        <picture>
          <a href="{{ $expositor->site }}">
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

      {{--
      <div class="_box">
        <picture>
          <a href="{{ route('site.hotsite')}}">
            <img src="{{ asset('site/img/logo_empresa (3') }}).png" alt="Empresa Embaixadora" />
          </a>
        </picture>
        <div>
          <span>Mizuno</span>
          <ul>
            <li><a href="">mizuno.com.br</a></li>
            <li><a href="">35 99261 5899</a></li>
            <li><a href="">contato@mizuno.com.br</a></li>
          </ul>
        </div>
      </div>

      <div class="_box">
        <picture>
          <a href="{{ route('site.hotsite')}}">
            <img src="{{ asset('site/img/logo_empresa (4') }}).png" alt="Empresa Embaixadora" />
          </a>
        </picture>

        <div>
          <span>Mizuno</span>
          <ul>
            <li><a href="">mizuno.com.br</a></li>
            <li><a href="">35 99261 5899</a></li>
            <li><a href="">contato@mizuno.com.br</a></li>
          </ul>
        </div>
      </div>

      <div class="_box">
        <picture>
          <a href="{{ route('site.hotsite')}}">
            <img src="{{ asset('site/img/logo_empresa (5') }}).png" alt="Empresa Embaixadora" />
          </a>
        </picture>

        <div>
          <span>Mizuno</span>
          <ul>
            <li><a href="">mizuno.com.br</a></li>
            <li><a href="">35 99261 5899</a></li>
            <li><a href="">contato@mizuno.com.br</a></li>
          </ul>
        </div>
      </div>

      <div class="_box">
        <picture>
          <a href="{{ route('site.hotsite')}}">
            <img src="{{ asset('site/img/logo_empresa (6') }}).png" alt="Empresa Embaixadora" />
          </a>
        </picture>

        <div>
          <span>Mizuno</span>
          <ul>
            <li><a href="">mizuno.com.br</a></li>
            <li><a href="">35 99261 5899</a></li>
            <li><a href="">contato@mizuno.com.br</a></li>
          </ul>
        </div>
      </div>

      <div class="_box">
        <picture>
          <a href="{{ route('site.hotsite')}}">
            <img src="{{ asset('site/img/logo_empresa (7') }}).png" alt="Empresa Embaixadora" />
          </a>
        </picture>

        <div>
          <span>Mizuno</span>
          <ul>
            <li><a href="">mizuno.com.br</a></li>
            <li><a href="">35 99261 5899</a></li>
            <li><a href="">contato@mizuno.com.br</a></li>
          </ul>
        </div>
      </div>

      <div class="_box">
        <picture>
          <a href="{{ route('site.hotsite')}}">
            <img src="{{ asset('site/img/logo_empresa (8') }}).png" alt="Empresa Embaixadora" />
          </a>
        </picture>

        <div>
          <span>Mizuno</span>
          <ul>
            <li><a href="">mizuno.com.br</a></li>
            <li><a href="">35 99261 5899</a></li>
            <li><a href="">contato@mizuno.com.br</a></li>
          </ul>
        </div>
      </div>

      <div class="_box">
        <picture>
          <a href="{{ route('site.hotsite')}}">
            <img src="{{ asset('site/img/logo_empresa (9') }}).png" alt="Empresa Embaixadora" />
          </a>
        </picture>

        <div>
          <span>Mizuno</span>
          <ul>
            <li><a href="">mizuno.com.br</a></li>
            <li><a href="">35 99261 5899</a></li>
            <li><a href="">contato@mizuno.com.br</a></li>
          </ul>
        </div>
      </div>

      <div class="_box">
        <picture>
          <a href="{{ route('site.hotsite')}}">
            <img src="{{ asset('site/img/logo_empresa (10') }}).png" alt="Empresa Embaixadora" />
          </a>
        </picture>

        <div>
          <span>Mizuno</span>
          <ul>
            <li><a href="">mizuno.com.br</a></li>
            <li><a href="">35 99261 5899</a></li>
            <li><a href="">contato@mizuno.com.br</a></li>
          </ul>
        </div>
      </div>

      <div class="_box">
        <picture>
          <a href="{{ route('site.hotsite')}}">
            <img src="{{ asset('site/img/logo_empresa (11') }}).png" alt="Empresa Embaixadora" />
          </a>
        </picture>

        <div>
          <span>Mizuno</span>
          <ul>
            <li><a href="">mizuno.com.br</a></li>
            <li><a href="">35 99261 5899</a></li>
            <li><a href="">contato@mizuno.com.br</a></li>
          </ul>
        </div>
      </div>

      <div class="_box">
        <picture>
          <a href="{{ route('site.hotsite')}}">
            <img src="{{ asset('site/img/logo_empresa (12') }}).png" alt="Empresa Embaixadora" />
          </a>
        </picture>

        <div>
          <span>Mizuno</span>
          <ul>
            <li><a href="">mizuno.com.br</a></li>
            <li><a href="">35 99261 5899</a></li>
            <li><a href="">contato@mizuno.com.br</a></li>
          </ul>
        </div>
      </div>

      <div class="_box">
        <picture>
          <a href="{{ route('site.hotsite')}}">
            <img src="{{ asset('site/img/logo_empresa (1') }}).png" alt="Empresa Embaixadora" />
          </a>
        </picture>

        <div>
          <span>Mizuno</span>
          <ul>
            <li><a href="">mizuno.com.br</a></li>
            <li><a href="">35 99261 5899</a></li>
            <li><a href="">contato@mizuno.com.br</a></li>
          </ul>
        </div>
      </div> --}}
    </div>
  </section>

  <section class="container-fluid s_outrasEmpresas">
    <div class="container-fav">
      <div class="_title">
        <h4>Outras empresas</h4>
      </div>

      <ul>

        @foreach ($expositores as $expositor)

        <li>
          <a href="{{ $expositor->site }}">
            <span>{{ $expositor->nome }}</span>


            <main>
              <legend>
                <div class="_icon">
                  <img src="http://enafdigital.test/site/img/icon_call.svg" alt="Ícone de Chamada">
                </div>
                {{ $expositor->telefone }}
              </legend>

              <legend>
                <div class="_icon">
                  <img src="http://enafdigital.test/site/img/icon_call.svg" alt="Ícone de Chamada">
                </div>
                {{ $expositor->telefone }}
              </legend>

              <legend>{{ $expositor->site }}</legend>
            </main>
          </a>
        </li>

        @endforeach



        {{-- <li>
          <a href="https://probiótica.com.br">
            <span>Probiótica</span>


            <main>
              <legend>
                <div class="_icon">
                  <img src="http://enafdigital.test/site/img/icon_call.svg" alt="Ícone de Chamada">
                </div>
                35 9 8809 4603
              </legend>

              <legend>
                <div class="_icon">
                  <img src="http://enafdigital.test/site/img/icon_call.svg" alt="Ícone de Chamada">
                </div>
                35 9 8809 4603
              </legend>

              <legend>probiótica.com.br</legend>

            </main>
          </a>
        </li>
        <li>
          <a href="https://hyp8.com.br">
            <span>hyp8</span>


            <main>
              <legend>
                <div class="_icon">
                  <img src="http://enafdigital.test/site/img/icon_call.svg" alt="Ícone de Chamada">
                </div>
                35 9 8809 4603
              </legend>

              <legend>
                <div class="_icon">
                  <img src="http://enafdigital.test/site/img/icon_call.svg" alt="Ícone de Chamada">
                </div>
                35 9 8809 4603
              </legend>

              <legend>hyp8.com.br</legend>

            </main>
          </a>
        </li>
        <li>
          <a href="https://gefit.com.br">
            <span>Gefit</span>


            <main>
              <legend>
                <div class="_icon">
                  <img src="http://enafdigital.test/site/img/icon_call.svg" alt="Ícone de Chamada">
                </div>
                35 9 8809 4603
              </legend>

              <legend>
                <div class="_icon">
                  <img src="http://enafdigital.test/site/img/icon_call.svg" alt="Ícone de Chamada">
                </div>
                35 9 8809 4603
              </legend>

              <legend>gefit.com.br</legend>

            </main>
          </a>
        </li>
        <li>
          <a href="https://universal.com.br">
            <span>Universal</span>


            <main>
              <legend>
                <div class="_icon">
                  <img src="http://enafdigital.test/site/img/icon_call.svg" alt="Ícone de Chamada">
                </div>
                35 9 8809 4603
              </legend>

              <legend>
                <div class="_icon">
                  <img src="http://enafdigital.test/site/img/icon_call.svg" alt="Ícone de Chamada">
                </div>
                35 9 8809 4603
              </legend>

              <legend>universal.com.br</legend>
            </main>
          </a>
        </li> --}}
      </ul>
    </div>
  </section>

  @include('site.includes.publicidade')



  @include("site.includes.parceiros")


  @include("site.includes.footer-expanded")