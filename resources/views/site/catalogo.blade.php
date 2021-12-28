@include("site.includes.head")
<title> EXPO ENAF | Catálogo </title>

<body id="catalogo">

    @include("site.includes.navbar")

    @php
    $anunciante = App\Models\Contrato::where([["inicio", "<=", date('Y-m-d')], ['fim', ">=" , date('Y-m-d')], ["ativo", true]])->inRandomOrder()->first();
        @endphp



        <section class="container-fluid s_hero" style="background-image: url('{{ asset($anunciante->imagem_desktop)}}')">
            <div class="container-fav">
                <div class="_h1 fade">
                    <h1> {{$anunciante->nome}}</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    </p>

                    <div class="buttonline">
                        <a href=@if ($anunciante->expositor->hotsite &&
                            $anunciante->expositor->hotsite->slug){{ route('site.hotsite', ['slug' => $anunciante->expositor->hotsite->slug]) }}" @else{{ $anunciante->expositor->site }}
                            @endif">
                            <picture>
                                <img src="{{ asset('site/img/feira/catalogo/icon_play.svg') }}">
                            </picture>

                            <span>Acessar</span>
                        </a>

                        {{--
                        <a href="">
                            <span>Mais informações</span>
                        </a> --}}
                    </div>
                </div>
            </div>
        </section>

        {{--
        <section class="container-fluid s_catalogoList">
            <h2>Pilates</h2>

            <div class="--mask">

                <div class="--buttons">
                    <div class="--before">
                        <img src="{{ asset('/site/img/feira/catalogo/next_arrow.svg') }}" />
                    </div>
                    <div class="--next">
                        <img src="{{ asset('/site/img/feira/catalogo/next_arrow.svg') }}" />
                    </div>
                </div>


                <div class="content">

                    <div class="--list">
                        <div class="--item">
                            <img src="{{ asset('/site/img/feira/catalogo/itemExample.jpg') }}" />
                        </div>
                        <div class="--item">
                            <img src="{{ asset('/site/img/feira/catalogo/itemExample.jpg') }}" />
                        </div>
                        <div class="--item">
                            <img src="{{ asset('/site/img/feira/catalogo/itemExample.jpg') }}" />
                        </div>
                        <div class="--item">
                            <img src="{{ asset('/site/img/feira/catalogo/itemExample.jpg') }}" />
                        </div>
                        <div class="--item">
                            <img src="{{ asset('/site/img/feira/catalogo/itemExample.jpg') }}" />
                        </div>
                        <div class="--item">
                            <img src="{{ asset('/site/img/feira/catalogo/itemExample.jpg') }}" />
                        </div>
                        <div class="--item">
                            <img src="{{ asset('/site/img/feira/catalogo/itemExample.jpg') }}" />
                        </div>
                        <div class="--item">
                            <img src="{{ asset('/site/img/feira/catalogo/itemExample.jpg') }}" />
                        </div>
                        <div class="--item">
                            <img src="{{ asset('/site/img/feira/catalogo/itemExample.jpg') }}" />
                        </div>
                    </div>
                </div>
            </div>

        </section>
        --}}

        @foreach (config('expositores.categorias_nome') as $codigo => $nome)

        @if (\App\Models\Expositor::where('categoria', $codigo)->count() > 0)
        <section class="container-fluid s_catalogoList">
            <h2 onclick="window.location.href = '{{route('site.feiraEmpresas', Illuminate\Support\Str::slug($nome))}}'">{{$nome}}</h2>

            <div class="--mask">

                <div class="--buttons">
                    <div class="--before">
                        <img src="{{ asset('/site/img/feira/catalogo/next_arrow.svg') }}" />
                    </div>
                    <div class="--next">
                        <img src="{{ asset('/site/img/feira/catalogo/next_arrow.svg') }}" />
                    </div>
                </div>


                <div class="content">

                    <div class="--list">
                        @foreach(\App\Models\Expositor::where('categoria', $codigo)->get() as $expositor)
                        <div class="--item" onclick="window.location.href = '@if ($expositor->hotsite &&
                    $expositor->hotsite->slug){{ route('site.hotsite', ['slug' => $expositor->hotsite->slug]) }} @else{{ $expositor->site }}
                    @endif'">
                            <img src="{{ asset($expositor->foto) }}" title="{{$expositor->nome}}" />
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </section>


        @endif

        @endforeach




        {{--
        <section class="container-fluid s_top5">
            <div class="--mask">

                <div class="content">

                    <div class="--list">
                        <div class="--item">
                            <picture>
                                <img src="{{ asset('/site/img/feira/catalogo/1_vector.svg') }}">
                            </picture>
                            <picture>
                                <img src="{{ asset('/site/img/feira/catalogo/verticalExample.jpg') }}">
                            </picture>
                        </div>
                        <div class="--item">
                            <picture>
                                <img src="{{ asset('/site/img/feira/catalogo/2_vector.svg') }}">
                            </picture>
                            <picture>
                                <img src="{{ asset('/site/img/feira/catalogo/verticalExample.jpg') }}">
                            </picture>
                        </div>
                        <div class="--item">
                            <picture>
                                <img src="{{ asset('/site/img/feira/catalogo/3_vector.svg') }}">
                            </picture>
                            <picture>
                                <img src="{{ asset('/site/img/feira/catalogo/verticalExample.jpg') }}">
                            </picture>
                        </div>
                        <div class="--item">
                            <picture>
                                <img src="{{ asset('/site/img/feira/catalogo/4_vector.svg') }}">
                            </picture>
                            <picture>
                                <img src="{{ asset('/site/img/feira/catalogo/verticalExample.jpg') }}">
                            </picture>
                        </div>
                        <div class="--item">
                            <picture>
                                <img src="{{ asset('/site/img/feira/catalogo/5_vector.svg') }}">
                            </picture>
                            <picture>
                                <img src="{{ asset('/site/img/feira/catalogo/verticalExample.jpg') }}">
                            </picture>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        --}}

        {{--
        <section class="container-fluid s_catalogoList --livro">
            <h2>Livros</h2>

            <div class="--mask">

                <div class="--buttons">
                    <div class="--before">
                        <img src="{{ asset('/site/img/feira/catalogo/next_arrow.svg') }}" />
                    </div>
                    <div class="--next">
                        <img src="{{ asset('/site/img/feira/catalogo/next_arrow.svg') }}" />
                    </div>
                </div>


                <div class="content">

                    <div class="--list">
                        <div class="--item">
                            <img src="{{ asset('/site/img/feira/catalogo/bookExample.jpg') }}" />
                        </div>
                        <div class="--item">
                            <img src="{{ asset('/site/img/feira/catalogo/bookExample.jpg') }}" />
                        </div>
                        <div class="--item">
                            <img src="{{ asset('/site/img/feira/catalogo/bookExample.jpg') }}" />
                        </div>
                        <div class="--item">
                            <img src="{{ asset('/site/img/feira/catalogo/bookExample.jpg') }}" />
                        </div>
                        <div class="--item">
                            <img src="{{ asset('/site/img/feira/catalogo/bookExample.jpg') }}" />
                        </div>
                        <div class="--item">
                            <img src="{{ asset('/site/img/feira/catalogo/bookExample.jpg') }}" />
                        </div>
                        <div class="--item">
                            <img src="{{ asset('/site/img/feira/catalogo/bookExample.jpg') }}" />
                        </div>
                        <div class="--item">
                            <img src="{{ asset('/site/img/feira/catalogo/bookExample.jpg') }}" />
                        </div>
                        <div class="--item">
                            <img src="{{ asset('/site/img/feira/catalogo/bookExample.jpg') }}" />
                        </div>
                    </div>
                </div>
            </div>

        </section>
        --}}




        @include('site.includes.publicidade')



        @include("site.includes.footer")

        <script>
            $('.--mask .--buttons .--next').click(function() {
        $(this).closest('div.--mask').find('div.content').scrollLeft($(this).closest('div.--mask').find(
            'div.content').scrollLeft() + $('.--item').width() * 3)
    })
    $('.--mask .--buttons .--before').click(function() {
        $(this).closest('div.--mask').find('div.content').scrollLeft($(this).closest('div.--mask').find(
            'div.content').scrollLeft() - $('.--item').width() * 3)
    })

    $('.--mask .content').scrollLeft($('.--mask .content').width() / 3)
        </script>