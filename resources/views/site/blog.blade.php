@include("site.includes.head")
<title>{{ $noticia->titulo }}</title>


<body id="blogPostagem">

    @include("site.includes.navbar")



    <section class="container-fluid s_cover">
        <div class="container-fav">
            <div class="_pic">
                <img src="{{ asset($noticia->banner) }}" alt="Banner da noticia" />
            </div>
            <div class="_menu">
                <div class="_comp">
                    <div class="_ico">
                        <img src="{{ asset('site/img/calendar.svg') }}" alt="Ícone de calendário" />
                    </div>
                    <span>{{date('d/m/Y', strtotime($noticia->publicacao))}}</span>
                </div>
                {{-- <div class="_comp">
                    <div class="_ico">
                        <img src="{{ asset('site/img/chatscircle.svg') }}" alt="Ícone de chat" />
                    </div>
                    <span>89</span>
                </div> --}}
                <div class="_comp">
                    <div class="_ico">
                        <img src="{{ asset('site/img/sistema/user.svg') }}" alt="Ícone de coração" />
                    </div>
                    <span>{{ $noticia->autor }}</span>
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid b_content">
        <div class="container-fav">
            <main>
                <h6>{{$noticia->titulo}}</h6>

                <p>
                    {!! $noticia->conteudo !!}
                </p>

            </main>

            <div class="_lastones _posts">
                <div class="_text">Últimas postagens</div>

                <div class="_lastpost-list">
                    @foreach(\App\Models\Noticia::where([["publicacao", "<=", date("Y-m-d")], ["tipo", $noticia->tipo]])->orderby("publicacao")->limit(3)->get() as $noticia)
                        <div class="_post" onclick="window.location.href='{{route('site.noticia', ['categoria' => $noticia->categoria->slug, 'noticia' => $noticia->slug])}}'">
                            <div class="_pic">
                                <img src="{{ asset($noticia->preview) }}" alt="" />
                            </div>
                            <div class="_content">
                                <span class="date">{{date('d/m/Y', strtotime($noticia->publicacao))}}</span>
                                <div class="_postTitle">{{$noticia->titulo}}</div>
                                <a href="{{route('site.noticia', ['categoria' => $noticia->categoria->slug, 'noticia' => $noticia->slug])}}">
                                    Leia mais
                                    <div class="_icon">
                                        <img src="{{ asset('site/img/blog_icon_arrowright.svg') }}" alt="Seta para direita" />
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
    </section>

    @if($noticia->tipo == 0)
    @include('site.includes.blog-noticias')
    @else
    @include('site.includes.blog-artigos')
    @endif

    {{-- <section class="container-fluid s_send">
        <div class="container-fav">

            <main>
                <div class="title">ENVIE SUA MENSAGEM</div>

                <form action="/">

                    <label>
                        <input type="text" placeholder="Nome" />
                    </label>
                    <label>
                        <input type="e-mail" placeholder="E-mail" />
                    </label>

                    <textarea placeholder="Mensagem"></textarea>

                    <button>Enviar</button>

                </form>

        </div>
        </main>
    </section> --}}



    @include('site.includes.publicidade')
    @include('site.includes.parceiros')
    @include('site.includes.footer-expanded')