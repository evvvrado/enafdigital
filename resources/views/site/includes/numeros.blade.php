<section class="container-fluid s_depoimentos">
    <div class="container-fav">
        <div class="_numeros">
            <div class="_title">
                <h6>Alguns números dos 35 anos</h6>
            </div>

            <div class="_boxes">
                <div class="_box">
                    <div class="_icon">
                        <img src="{{ asset('site/img/icon_calendar.svg') }}" alt="Ícone de calendário" />
                    </div>
                    <span class="counting">144</span>
                    <p>Eventos</p>
                </div>
                <div class="_box">
                    <div class="_icon">
                        <img src="{{ asset('site/img/icon_pin.svg') }}" alt="Ícone de Pin" />
                    </div>
                    <span class="counting">26</span>
                    <p>Cidades</p>
                </div>
                <div class="_box">
                    <div class="_icon">
                        <img src="{{ asset('site/img/icon_check@x2') }}.svg" alt="Ícone de check" />
                    </div>
                    <span class="counting">323982</span>
                    <p>Congressistas</p>
                </div>
                <div class="_box">
                    <div class="_icon">
                        <img src="{{ asset('site/img/icon_persons.svg') }}" alt="Ícone de Perssoas" />
                    </div>
                    <span class="counting">5493</span>
                    <p>Professores</p>
                </div>
                <div class="_box">
                    <div class="_icon">
                        <img src="{{ asset('site/img/icon_layers.svg') }}" alt="Ícone de Páginas" />
                    </div>
                    <span class="counting">4563</span>
                    <p>Cursos</p>
                </div>
            </div>
        </div>

        <div class="_depoimentos">
            <div class="_title">
                <h6>Reconhecimento de Grandes Referências</h6>
            </div>

            <div class="_content">
                <div class="_depoimentosList">

                    @foreach(\App\Models\Depoimento::take(3)->get() as $depoimento)
                    <div class="_depoimento">
                        <div class="_pic">
                            <img src="{{ asset($depoimento->foto) }}" alt="{{$depoimento->nome}}" />
                        </div>
                        <div class="_text">
                            <p>
                                {{$depoimento->depoimento}}
                            </p>
                            <h5>{{$depoimento->nome}}</h5>
                        </div>
                    </div>
                    @endforeach





                    {{-- <div class="_depoimento">
                        <div class="_pic">
                            <img src="{{ asset('site/img/depoimento_Pic (2).jpg') }}" alt="Foto de Dr. Turíbio" />
                        </div>
                        <div class="_text">
                            <p>
                                O ENAF plantou a semente da ciência na Educação Física no Brasil. A árvore
                                nasceu, cresceu e hoje, 30 anos após, todos nós estamos colhendo seus frutos.
                            </p>
                            <h5>Dr. Turíbio Leite B. Neto</h5>
                        </div>
                    </div>
                    <div class="_depoimento">
                        <div class="_pic">
                            <img src="{{ asset('site/img/depoimento_Pic (3).jpg') }}" alt="Foto de Dr. Turíbio" />
                        </div>
                        <div class="_text">
                            <p>
                                O ENAF plantou a semente da ciência na Educação Física no Brasil. A árvore
                                nasceu, cresceu e hoje, 30 anos após, todos nós estamos colhendo seus frutos.
                            </p>
                            <h5>Dr. Turíbio Leite B. Neto</h5>
                        </div>
                    </div> --}}
                </div>
            </div>

            <div class="_menu">
                <div class="_buttons">
                    <div class="_previous _button">
                        <img src="{{ asset('site/img/halfarrowleft_alternative.svg') }}" alt="Seta indicando a esquerda" />
                    </div>

                    <div class="_indicator">
                        <img class="active" alt="Indicador da lista" />
                        <img alt="Indicador da lista" />
                        <img alt="Indicador da lista" />
                    </div>

                    <div class="_next _button">
                        <img src="{{ asset('site/img/halfarrowright_alternative.svg') }}" alt="Seta indicando a direita" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>