@include('site.includes.head')
<title>Fale conosco!</title>


<body id="contato">

    @include('site.includes.navbar')


    <section class="container-fluid s_hero">
        <div class="container-fav">
            <div class="_h1 fade" style="margin-left: 0; color: white;">
                <h2> Assessoria de Imprensa</h2>
            </div>
        </div>
    </section>


    <section class="container-fluid s_atendimento" style="padding-top: 5rem; padding-bottom: 13.4rem;">

        <div class="container-fav"></div>

        <div class="container-fav">
            <div class="_col">
                <h4>Assessoria:</h4>
                <p>Nosso suporte online é um canal de comunicação para que você possa entrar em contato conosco. Estamos
                    à disposição para tirar todas as dúvidas a respeito de como funciona a nossa assessoria
                    e programação de eventos. Deixe sua mensagem abaixo.</p>


            </div>

            <div class="_col">
                {{-- <div class="_pic">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3750.3012805171807!2d-43.96197338509894!3d-19.953828086590324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa697777a2018f7%3A0x4ae6ff1a84e0326c!2sAv.%20Raja%20Gab%C3%A1glia%2C%202000%20-%20Estoril%2C%20Belo%20Horizonte%20-%20MG%2C%2030494-170!5e0!3m2!1spt-BR!2sbr!4v1640697705920!5m2!1spt-BR!2sbr"
                        width="590 " height="283" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <p>Endereço: Av. Raja Gabaglia, 2000 - Sala 805E e PVMT 08 - Bloco 1
                    Alpes - Belo Horizonte - MG / 30.494-170</p>
                <p>
                    Horário:
                    Segunda a Sexta 08:00 - 18:00
                </p>

                <h6>(35) 99725-9528</h6>


                <div class="_buttons">

                    <div style="cursor: pointer"
                        onclick="window.open('https://api.whatsapp.com/send?phone=3599725-9528')">
                        <img src="{{ asset('site/img/sistema/chat.svg') }}" alt="" />
                    </div>
                    <div style="cursor: pointer" onclick="window.open('tel:(35) 99725-9528')">
                        <img src="{{ asset('site/img/sistema/call.svg') }}" alt="" />
                    </div>
                    <div style="cursor: pointer"
                        onclick="window.open('https://api.whatsapp.com/send?phone=3599725-9528')">
                        <img src="{{ asset('site/img/sistema/whatsappButton.svg') }}" alt="" />
                    </div>
                    <div style="cursor: pointer" onclick="window.open('mailto:contato@enaf.com.br')">
                        <img src="{{ asset('site/img/sistema/envelopButton.svg') }}" alt="" />
                    </div>
                </div> --}}

                <aside class="s_baixar">
                    <div>
                        <h3>Baixar mídia kit</h3>


                        @foreach (\App\Models\Midiakit::where('mostrar', true)->get() as $midiakit)
                            <a href="{{ asset($midiakit->arquivo) }}" target="_blank"
                                download="{{ $midiakit->nome }}">{{ $midiakit->nome }}</a>
                        @endforeach
                    </div>
                </aside>
            </div>
        </div>
    </section>


    <div class="container-fluid s_story_line">
        <div class="container-fav">

            <img src="{{ asset('site/img/enafCircle_color.png') }}" alt="" style="margin: 0 auto;">
            <div class="agenda">


                @foreach (\App\Models\Cronograma::where('fim', '>=', date('Y-m-d'))->orderBy('inicio')->get()
    as $cronograma)
                    <div class="line fade">
                        <strong>{{ $cronograma->mes_ano }}</strong>
                        <strong>{{ $cronograma->titulo }}</strong>
                        <p>{{ $cronograma->descricao }}</p>

                        <picture>
                            <img src="{{ asset($cronograma->imagem) }}" alt="">
                        </picture>
                    </div>
                @endforeach
                {{-- <div class="line fade">
                    <strong>Abril de 2022</strong>
                    <strong>Texto minúsculo</strong>
                    <p>Texto pequeno com descrição descritiva sobre os acontecimentos descritos.</p>

                    <picture>
                        <img src="{{ asset('site/img/banner_local.jpg') }}" alt="">
                    </picture>
                </div>
                <div class="line fade">
                    <strong>Abril de 2022</strong>
                    <strong>Texto minúsculo</strong>
                    <p>Texto pequeno com descrição descritiva sobre os acontecimentos descritos.</p>

                    <picture>
                        <img src="{{ asset('site/img/banner_local.jpg') }}" alt="">
                    </picture>
                </div>
                <div class="line fade">
                    <strong>Abril de 2022</strong>
                    <strong>Texto minúsculo</strong>
                    <p>Texto pequeno com descrição descritiva sobre os acontecimentos descritos.</p>

                    <picture>
                        <img src="{{ asset('site/img/banner_local.jpg') }}" alt="">
                    </picture>
                </div>
                <div class="line fade">
                    <strong>Abril de 2022</strong>
                    <strong>Texto minúsculo</strong>
                    <p>Texto pequeno com descrição descritiva sobre os acontecimentos descritos.</p>

                    <picture>
                        <img src="{{ asset('site/img/banner_local.jpg') }}" alt="">
                    </picture>
                </div>
                <div class="line fade">
                    <strong>Abril de 2022</strong>
                    <strong>Texto minúsculo</strong>
                    <p>Texto pequeno com descrição descritiva sobre os acontecimentos descritos.</p>

                    <picture>
                        <img src="{{ asset('site/img/banner_local.jpg') }}" alt="">
                    </picture>
                </div>
                <div class="line fade">
                    <strong>Abril de 2022</strong>
                    <strong>Texto minúsculo</strong>
                    <p>Texto pequeno com descrição descritiva sobre os acontecimentos descritos.</p>

                    <picture>
                        <img src="{{ asset('site/img/banner_local.jpg') }}" alt="">
                    </picture>
                </div>
                <div class="line fade">
                    <strong>Abril de 2022</strong>
                    <strong>Texto minúsculo</strong>
                    <p>Texto pequeno com descrição descritiva sobre os acontecimentos descritos.</p>

                    <picture>
                        <img src="{{ asset('site/img/banner_local.jpg') }}" alt="">
                    </picture>
                </div>
                <div class="line fade">
                    <strong>Abril de 2022</strong>
                    <strong>Texto minúsculo</strong>
                    <p>Texto pequeno com descrição descritiva sobre os acontecimentos descritos.</p>

                    <picture>
                        <img src="{{ asset('site/img/banner_local.jpg') }}" alt="">
                    </picture>
                </div> --}}
            </div>

        </div>
    </div>

    @include('site.includes.parceiros')
    @include('site.includes.footer')
