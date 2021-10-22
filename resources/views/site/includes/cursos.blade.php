<section class="container-fluid s_cursos">
    <div class="container-fav">
        <div class="title">
            <h4>Cursos</h4>
            <div class="_filter">
                <nav>
                    <div class="_filterItem">Online</div>
                    <div class="_filterItem ">EAD</div>
                    <div class="_filterItem">Presenciais</div>
                </nav>
            </div>

        </div>
        <div class="_cursosList">

            @foreach ($cursos->where('tipo', 1)->take(4) as $curso)

            <div class="_curso online" onclick="window.location.href = '{{route('site.curso', ['slug' => $curso->slug])}}'">
                <div class="_pic">
                    <img src="{{ asset($curso->thumbnail) }}" alt="{{$curso->nome}}" />
                </div>
                <div class="_content">
                    <div class="_top">
                        <h4 class="curso_name">{{$curso->nome}}</h4>
                        <p class="curso_description">
                            {!! $curso->descricao !!}
                        </p>
                    </div>
                    <div class="_bottom">
                        @if ($curso->certificacao)
                        <p class="curso_certificate">Certificado de {{ $curso->total_horas }} horas</p>
                        @endif
                        <button>Comprar</button>
                    </div>
                </div>

            </div>


            @endforeach



            @foreach ($cursos->where('tipo', 0)->take(4) as $curso)

            <div class="_curso ead" onclick="window.location.href = '{{route('site.curso', ['slug' => $curso->slug])}}'">
                <div class="_pic">
                    <img src="{{ asset($curso->thumbnail) }}" alt="{{$curso->nome}}" />
                </div>
                <div class="_content">
                    <div class="_top">
                        <h4 class="curso_name">{{$curso->nome}}</h4>
                        <p class="curso_description">
                            {!! $curso->descricao !!}
                        </p>
                    </div>
                    <div class="_bottom">
                        @if ($curso->certificacao)
                        <p class="curso_certificate">Certificado de {{ $curso->total_horas }} horas</p>
                        @endif
                        <button>Comprar</button>
                    </div>
                </div>

            </div>


            @endforeach



            @foreach ($cursos->where('tipo', 2)->take(4) as $curso)

            <div class="_curso presencial" onclick="window.location.href = '{{route('site.curso', ['slug' => $curso->slug])}}'">
                <div class="_pic">
                    <img src="{{ asset($curso->thumbnail) }}" alt="{{$curso->nome}}" />
                </div>
                <div class="_content">
                    <div class="_top">
                        <h4 class="curso_name">{{$curso->nome}}</h4>
                        <p class="curso_description">
                            {!! $curso->descricao !!}
                        </p>
                    </div>
                    <div class="_bottom">
                        @if ($curso->certificacao)
                        <p class="curso_certificate">Certificado de {{ $curso->total_horas }} horas</p>
                        @else
                        <p class="curso_certificate">Sem certificado</p>
                        @endif
                        <button>Comprar</button>
                    </div>
                </div>

            </div>


            @endforeach




            {{-- <div class="_curso online">
                <div class="_pic">
                    <img src="{{ asset('site/img/curso_Pic (2).jpg') }}" alt="Imagem deste curso" />
                </div>
                <div class="_content">
                    <div class="_top">
                        <h4 class="curso_name">Treinamento Multifuncional</h4>
                        <p class="curso_description">& Longevidade Saudável Aplicação Prática</p>
                    </div>
                    <div class="_bottom">
                        <p class="curso_certificate">Certificado de 10hs</p>
                    </div>
                </div>
            </div>
            <div class="_curso online">
                <div class="_pic">
                    <img src="{{ asset('site/img/curso_Pic (3).jpg') }}" alt="Imagem deste curso" />
                </div>
                <div class="_content">
                    <div class="_top">
                        <h4 class="curso_name">Cross Training</h4>
                        <p class="curso_description">Baseado na metodologia do CrossFit</p>
                    </div>
                    <div class="_bottom">
                        <p class="curso_certificate">Certificado de 10hs</p>
                    </div>
                </div>
            </div>
            <div class="_curso online">
                <div class="_pic">
                    <img src="{{ asset('site/img/curso_Pic (4).jpg') }}" alt="Imagem deste curso" />
                </div>
                <div class="_content">
                    <div class="_top">
                        <h4 class="curso_name">Musculação Feminina</h4>
                        <p class="curso_description">Programa para maximizar os resultados</p>
                    </div>
                    <div class="_bottom">
                        <p class="curso_certificate">Certificado de 10hs</p>
                    </div>
                </div>
            </div>




            <div class="_curso ead">
                <div class="_pic">
                    <img src="{{ asset('site/img/curso_Pic (4).jpg') }}" alt="Imagem deste curso" />
                </div>
                <div class="_content">
                    <div class="_top">
                        <h4 class="curso_name">Musculação Feminina</h4>
                        <p class="curso_description">Programa para maximizar os resultados</p>
                    </div>
                    <div class="_bottom">
                        <p class="curso_certificate">Certificado de 10hs</p>
                    </div>
                </div>
            </div>
            <div class="_curso ead">
                <div class="_pic">
                    <img src="{{ asset('site/img/curso_Pic (3).jpg') }}" alt="Imagem deste curso" />
                </div>
                <div class="_content">
                    <div class="_top">
                        <h4 class="curso_name">Cross Training</h4>
                        <p class="curso_description">Baseado na metodologia do CrossFit</p>
                    </div>
                    <div class="_bottom">
                        <p class="curso_certificate">Certificado de 10hs</p>
                    </div>
                </div>
            </div>
            <div class="_curso ead">
                <div class="_pic">
                    <img src="{{ asset('site/img/curso_Pic (1).jpg') }}" alt="Imagem deste curso" />
                </div>
                <div class="_content">
                    <div class="_top">
                        <h4 class="curso_name">Meeting de musculação</h4>
                        <p class="curso_description">
                            Treinamentos para hipertrofia muscular e suplementação combinada
                        </p>
                    </div>
                    <div class="_bottom">
                        <p class="curso_certificate">Certificado de 10hs</p>
                    </div>
                </div>
            </div>
            <div class="_curso ead">
                <div class="_pic">
                    <img src="{{ asset('site/img/curso_Pic (2).jpg') }}" alt="Imagem deste curso" />
                </div>
                <div class="_content">
                    <div class="_top">
                        <h4 class="curso_name">Treinamento Multifuncional</h4>
                        <p class="curso_description">& Longevidade Saudável Aplicação Prática</p>
                    </div>
                    <div class="_bottom">
                        <p class="curso_certificate">Certificado de 10hs</p>
                    </div>
                </div>
            </div>

            <div class="_curso presencial">
                <div class="_pic">
                    <img src="{{ asset('site/img/curso_Pic (4).jpg') }}" alt="Imagem deste curso" />
                </div>
                <div class="_content">
                    <div class="_top">
                        <h4 class="curso_name">Musculação Feminina</h4>
                        <p class="curso_description">Programa para maximizar os resultados</p>
                    </div>
                    <div class="_bottom">
                        <p class="curso_certificate">Certificado de 10hs</p>
                    </div>
                </div>
            </div>
            <div class="_curso presencial">
                <div class="_pic">
                    <img src="{{ asset('site/img/curso_Pic (3).jpg') }}" alt="Imagem deste curso" />
                </div>
                <div class="_content">
                    <div class="_top">
                        <h4 class="curso_name">Cross Training</h4>
                        <p class="curso_description">Baseado na metodologia do CrossFit</p>
                    </div>
                    <div class="_bottom">
                        <p class="curso_certificate">Certificado de 10hs</p>
                    </div>
                </div>
            </div>
            <div class="_curso presencial">
                <div class="_pic">
                    <img src="{{ asset('site/img/curso_Pic (2).jpg') }}" alt="Imagem deste curso" />
                </div>
                <div class="_content">
                    <div class="_top">
                        <h4 class="curso_name">Treinamento Multifuncional</h4>
                        <p class="curso_description">& Longevidade Saudável Aplicação Prática</p>
                    </div>
                    <div class="_bottom">
                        <p class="curso_certificate">Certificado de 10hs</p>
                    </div>
                </div>
            </div>
            <div class="_curso presencial">
                <div class="_pic">
                    <img src="{{ asset('site/img/curso_Pic (1).jpg') }}" alt="Imagem deste curso" />
                </div>
                <div class="_content">
                    <div class="_top">
                        <h4 class="curso_name">Meeting de musculação</h4>
                        <p class="curso_description">
                            Treinamentos para hipertrofia muscular e suplementação combinada
                        </p>
                    </div>
                    <div class="_bottom">
                        <p class="curso_certificate">Certificado de 10hs</p>
                    </div>
                </div>
            </div> --}}



        </div>

        <a href="{{ route('site.cursos') }}" style="margin-top: 20px; float: right;">
            Ver Todos
        </a>
    </div>
</section>