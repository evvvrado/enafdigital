@include("site.includes.head")

<title>ENAF - Esporte, Fitness e Saúde</title>


<body id="home">

    @include("site.includes.navbar")

    <section class="container-fluid s_hero">
        <div class="container-fav">
            <div class="_h1 fade">
                <h6>WORKSHOPS AO VIVO</h6>
                <h1>Invista em você</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua.
                </p>
                <button name="hero_button">
                    <img src="{{ asset('site/img/arrowright.svg') }}" alt="" />
                </button>
            </div>
        </div>
    </section>

    @include('site.includes.publicidade')


    <section class="container-fluid s_nextEvent">
        <div class="container-fav">
            <div class="_case fade">
                {{-- <div class="_buttons">
                    <div class="_previous">
                        <img src="{{ asset('site/img/halfarrowleft.svg') }}" alt="Evento Anterior" />
                    </div>
                    <div class="_next">
                        <img src="{{ asset('site/img/halfarrowright.svg') }}" alt="Próximo Evento" />
                    </div>
                </div> --}}
                <div class="_img">
                    <img src="{{ asset($eventos[0]->thumbnail) }}" alt="Próximo evento aqui no ENAF" />
                </div>
            </div>
            <div class="_content">
                <h6>Próximo evento</h6>
                <h2 class="event_name">{{$eventos[0]->nome}}</h2>
                <span class="event_date">{{date('d/m', strtotime($eventos[0]->inicio))}} a {{date('d/m', strtotime($eventos[0]->fim))}}<br> {{ $eventos[0]->hora_inicio }} às {{ $eventos[0]->hora_fim
                    }}</span>
                <p class="event_local">{{$eventos[0]->local_endereco}}</p>
                <button name="event_button" onclick="window.location.href = '{{route('site.clinica', ['slug' => $eventos[0]->slug])}}'">
                    <img src="{{ asset('site/img/arrowright_white.svg') }}" alt="Vamos nessa!" title="Vamos nessa!" />
                </button>
            </div>
        </div>
    </section>

    <section class="container-fluid s_events">
        <div class="container-fav">
            <div class="_eventList">


                @foreach($eventos->slice(1,4) as $evento)
                <div class="_event" @if($evento->clinica) onclick="window.location.href = '{{route('site.clinica', ['slug' => $evento->slug])}}'" @else onclick="window.location.href =
                    '{{route('site.evento', ['slug' => $evento->slug])}}'" @endif>
                    <div class="_pic">
                        <img src="{{ asset($evento->thumbnail) }}" alt="Imagem do {{$evento->nome}}" />
                    </div>
                    <div class="_content">
                        <div class="_top">
                            <h4 class="event_name">{{$evento->nome}}</h4>
                            <p class="event_local">{{$evento->local_endereco}}</p>
                        </div>
                        <div class="_bottom">
                            <span class="event_date">{{date('d/m', strtotime($evento->inicio))}} a {{date('d/m', strtotime($evento->fim))}}</span>
                            <p class="event_time">Horário: {{ $evento->hora_inicio }} às {{ $evento->hora_fim }}</p>
                            <button>Ver mais</button>
                        </div>
                    </div>
                </div>
                @endforeach




                {{-- <div class="_event">
                    <div class="_pic">
                        <img src="{{ asset('site/img/events_Pic (2).jpg') }}" alt="Imagem deste evento" />
                    </div>
                    <div class="_content">
                        <div class="_top">
                            <h4 class="event_name">Enaf Life of Life</h4>
                            <p class="event_local">Rio de Janeiro - RJ</p>
                        </div>
                        <div class="_bottom">
                            <span class="event_date">20 a 22 de Ago.</span>
                            <p class="event_time">Sábado: 08h às 18h</p>
                            <button>Ver mais</button>
                        </div>
                    </div>
                </div>
                <div class="_event">
                    <div class="_pic">
                        <img src="{{ asset('site/img/events_Pic (3).jpg') }}" alt="Imagem deste evento" />
                    </div>
                    <div class="_content">
                        <div class="_top">
                            <h4 class="event_name">Fitness World</h4>
                            <p class="event_local">Rio de Janeiro - RJ</p>
                        </div>
                        <div class="_bottom">
                            <span class="event_date">08 a 12 de Out.</span>
                            <p class="event_time">Sábado: 08h às 18h</p>
                            <button>Ver mais</button>
                        </div>
                    </div>
                </div>
                <div class="_event">
                    <div class="_pic">
                        <img src="{{ asset('site/img/events_Pic (4).jpg') }}" alt="Imagem deste evento" />
                    </div>
                    <div class="_content">
                        <div class="_top">
                            <h4 class="event_name">25 Anos Fitness</h4>
                            <p class="event_local">Alfenas - MG</p>
                        </div>
                        <div class="_bottom">
                            <span class="event_date">12 de Jan.</span>
                            <p class="event_time">Sábado: 08h às 18h</p>
                            <button>Ver mais</button>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    @include('site.includes.destaque')

    @include('site.includes.cursos')

    @include('site.includes.publicidade')

    @include('site.includes.sobre')

    @include('site.includes.galeria')

    <section class="container-fluid s_professores">
        <div class="container-fav">
            <div class="_left">
                <h4>Nosso Time de Professores Online</h4>
                <p>É hora de se capacitar com professores que são referência do mercado</p>
                <span> Você estuda nos seus horários, de acordo com sua conveniência. </span>

                <button onclick="window.location.href = '{{ route('site.professores')}}'">
                    <img src="{{ asset('site/img/arrowright_white.svg') }}" alt="Seta para direita" />
                </button>
            </div>

            <div class="_right">
                <div class="_content">
                    <div class="_professores">
                        @foreach ($professores as $professor)
                        <div class="_professor">
                            <img src="{{ asset($professor->foto) }}" alt="{{ $professor->nome}}" />
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('site.includes.numeros')


    @include('site.includes.blog-noticias')

    @include('site.includes.publicidade')

    @include('site.includes.blog-artigos')


    @include("site.includes.parceiros")

    @include("site.includes.footer-expanded")
    <script>
        $("button[name='hero_button']").click(() =>{
            window.location.href= "{{ route('site.quem_somos') }}"
        })

        $(".s_destaque button").click(() =>{
            window.location.href= "{{ route('site.feira') }}"
        })
    </script>