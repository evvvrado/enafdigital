<section class="container-fluid s_cursos">
    <div class="container-fav">
        <div class="title">
            <h4>Cursos</h4>
            <div class="_filter">
                <nav>
                    <div class="_filterItem active" data-filter="todos">Todos</div>
                    <div class="_filterItem" data-filter="online">Online</div>
                    <div class="_filterItem" data-filter="ead">EAD</div>
                    <div class="_filterItem" data-filter="presencial">Presenciais</div>
                </nav>
            </div>

        </div>
        <div class="_cursosList">


            @foreach ($cursos->where('destaque', 1)->take(8) as $curso)
                <div class="_curso todos"
                    onclick="window.location.href = '{{ route('site.curso', ['slug' => $curso->slug]) }}'">
                    <div class="_pic">
                        <img src="{{ asset($curso->thumbnail) }}" alt="{{ $curso->nome }}" />
                    </div>
                    <div class="_content">
                        <div class="_top">
                            <h4 class="curso_name">{{ $curso->nome }}</h4>
                            <p class="curso_description">
                                {!! $curso->descricao !!}
                            </p>
                        </div>
                        <div class="_bottom">
                            <p class="curso_certificate">
                                @if ($curso->certificacao)
                                    Certificado de {{ $curso->total_horas }} horas
                                @else
                                    Curso de {{ $curso->total_horas }} horas
                                @endif
                            </p>
                            <button>Comprar</button>
                        </div>
                    </div>

                </div>
            @endforeach



            @foreach ($cursos->where('destaque', 1)->where('tipo', 1) as $curso)
                <div class="_curso online"
                    onclick="window.location.href = '{{ route('site.curso', ['slug' => $curso->slug]) }}'">
                    <div class="_pic">
                        <img src="{{ asset($curso->thumbnail) }}" alt="{{ $curso->nome }}" />
                    </div>
                    <div class="_content">
                        <div class="_top">
                            <h4 class="curso_name">{{ $curso->nome }}</h4>
                            <p class="curso_description">
                                {!! $curso->descricao !!}
                            </p>
                        </div>
                        <div class="_bottom">
                            <p class="curso_certificate">
                                @if ($curso->certificacao)
                                    Certificado de {{ $curso->total_horas }} horas
                                @else
                                    Curso de {{ $curso->total_horas }} horas
                                @endif
                            </p>
                            <button>Comprar</button>
                        </div>
                    </div>

                </div>
            @endforeach



            @foreach ($cursos->where('tipo', 0)->where('destaque', 1)->take(4)
    as $curso)
                <div class="_curso ead"
                    onclick="window.location.href = '{{ route('site.curso', ['slug' => $curso->slug]) }}'">
                    <div class="_pic">
                        <img src="{{ asset($curso->thumbnail) }}" alt="{{ $curso->nome }}" />
                    </div>
                    <div class="_content">
                        <div class="_top">
                            <h4 class="curso_name">{{ $curso->nome }}</h4>
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



            @foreach ($cursos->where('tipo', 2)->where('destaque', 1)->take(4)
    as $curso)
                <div class="_curso presencial"
                    onclick="window.location.href = '{{ route('site.curso', ['slug' => $curso->slug]) }}'">
                    <div class="_pic">
                        <img src="{{ asset($curso->thumbnail) }}" alt="{{ $curso->nome }}" />
                    </div>
                    <div class="_content">
                        <div class="_top">
                            <h4 class="curso_name">{{ $curso->nome }}</h4>
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
                        <p class="curso_description">& Longevidade Saud??vel Aplica????o Pr??tica</p>
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
                        <h4 class="curso_name">Muscula????o Feminina</h4>
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
                        <h4 class="curso_name">Muscula????o Feminina</h4>
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
                        <h4 class="curso_name">Meeting de muscula????o</h4>
                        <p class="curso_description">
                            Treinamentos para hipertrofia muscular e suplementa????o combinada
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
                        <p class="curso_description">& Longevidade Saud??vel Aplica????o Pr??tica</p>
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
                        <h4 class="curso_name">Muscula????o Feminina</h4>
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
                        <p class="curso_description">& Longevidade Saud??vel Aplica????o Pr??tica</p>
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
                        <h4 class="curso_name">Meeting de muscula????o</h4>
                        <p class="curso_description">
                            Treinamentos para hipertrofia muscular e suplementa????o combinada
                        </p>
                    </div>
                    <div class="_bottom">
                        <p class="curso_certificate">Certificado de 10hs</p>
                    </div>
                </div>
            </div> --}}



        </div>
    </div>

    <a class="vertodos" href="{{ route('site.cursos') }}">
        Ver Todos
    </a>
</section>
