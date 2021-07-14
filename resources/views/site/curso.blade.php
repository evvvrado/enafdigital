@include('site.includes.head')
<body class="cursos curso-detalhes" style="overflow:hidden;">
    @include('site.includes.bodyHeader', [
        "classe" => "brasil cursos",
        "adicional" => '<div class="direita" style="padding-right: 150px;padding-bottom: 50px;">
        <div class="_headertitle">
                <h2>Introdução ao<br>mundo do vinho</h2>
                <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                <path d="M9.66887 25.2345L5.64348 28.6184C5.49771 28.741 5.31998 28.8193 5.1312 28.8443C4.94241 28.8693 4.75042 28.8399 4.57779 28.7595C4.40516 28.6791 4.25908 28.551 4.15673 28.3905C4.05437 28.2299 4 28.0434 4 27.853V8C4 7.73478 4.10536 7.48043 4.29289 7.29289C4.48043 7.10536 4.73478 7 5 7H27C27.2652 7 27.5196 7.10536 27.7071 7.29289C27.8946 7.48043 28 7.73478 28 8V24C28 24.2652 27.8946 24.5196 27.7071 24.7071C27.5196 24.8946 27.2652 25 27 25H10.3123C10.0769 25 9.84907 25.0831 9.66887 25.2345Z" stroke="#E2B63A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M10 17.5C10.8284 17.5 11.5 16.8284 11.5 16C11.5 15.1716 10.8284 14.5 10 14.5C9.17157 14.5 8.5 15.1716 8.5 16C8.5 16.8284 9.17157 17.5 10 17.5Z" fill="black"/>
                <path d="M16 17.5C16.8284 17.5 17.5 16.8284 17.5 16C17.5 15.1716 16.8284 14.5 16 14.5C15.1716 14.5 14.5 15.1716 14.5 16C14.5 16.8284 15.1716 17.5 16 17.5Z" fill="black"/>
                <path d="M22 17.5C22.8284 17.5 23.5 16.8284 23.5 16C23.5 15.1716 22.8284 14.5 22 14.5C21.1716 14.5 20.5 15.1716 20.5 16C20.5 16.8284 21.1716 17.5 22 17.5Z" fill="black"/>
                <path d="M10 17.5C10.8284 17.5 11.5 16.8284 11.5 16C11.5 15.1716 10.8284 14.5 10 14.5C9.17157 14.5 8.5 15.1716 8.5 16C8.5 16.8284 9.17157 17.5 10 17.5Z" fill="#E2B63A"/>
                <path d="M16 17.5C16.8284 17.5 17.5 16.8284 17.5 16C17.5 15.1716 16.8284 14.5 16 14.5C15.1716 14.5 14.5 15.1716 14.5 16C14.5 16.8284 15.1716 17.5 16 17.5Z" fill="#E2B63A"/>
                <path d="M22 17.5C22.8284 17.5 23.5 16.8284 23.5 16C23.5 15.1716 22.8284 14.5 22 14.5C21.1716 14.5 20.5 15.1716 20.5 16C20.5 16.8284 21.1716 17.5 22 17.5Z" fill="#E2B63A"/>
                </svg>
                Aulas ministradas online (ao vivo)
                </span>
                <div class="_price">
                    10X <span>R5</span>550<span>,00</span>
                </div>
            </div>
        </div>'    
    ])
    <main class="main">
        <section class="container-fluid s_detail">
            <div class="container-fav">
                <div class="card-area">
                    <div class="card-relative">
                    <div class="_card">
                        <div class="_top">
                            Inscrições Encerradas
                        </div>
                        <main>
                            <div class="row">
                                <div class="svg">
                                    <img src="{{asset('site/img/calendar.svg')}}" alt="">
                                </div>
                                04.02.21
                            </div>
        
                            <div class="row">
                                <div class="svg">
                                    <img src="{{asset('site/img/user_2.svg')}}" alt="">
                                </div>
                                Noite, 20h00
                            </div>
                            <div class="row">
                                <div class="svg">
                                    <img src="{{asset('site/img/alarm.svg')}}" alt="">
                                </div>
                                35 turmas
                            </div>
                            <div class="row">
                                <div class="svg">
                                    <img src="{{asset('site/img/MapPin.svg')}}" alt="">
                                </div>
                                ABS São Paulo
                                São Paulo, SP
                            </div>
                            <div class="row">
                                <button>Inscreva-se</button>
                            </div>
                        </main>
                    </div></div>
                </div>
                <nav>
                    <div class="nav-component _active">
                        <a href="/curso">
                            <div class="svg">
                                <img src="{{asset('site/img/TextAlignLeftActive.svg')}}" alt="">
                            </div>
                            Detalhes
                        </a>
                    </div>
                    <div class="nav-component">
                        <a href="/curso/programacao">
                            <div class="svg">
                                <img src="{{asset('site/img/FolderNotchOpen.svg')}}" alt="">
                            </div>
                            Programação
                        </a>
                    </div>
                    <div class="nav-component">
                        <a href="/curso/instrutores">                    
                            <div class="svg">
                                <img src="{{asset('site/img/user.svg')}}" alt="">
                            </div>
                            Instrutores
                        </a>
                    </div>
                    <div class="nav-component">
                        <a href="/curso/local">
                            <div class="svg">
                                <img src="{{asset('site/img/MapPinLine.svg')}}" alt="">
                            </div>
                            Local  
                        </a>
                    </div>
                </nav>
            </div>
    
            <div class="container-fav">
                <!-- <h1>Introdução ao mundo do vinho</h1> -->
                <div class="_intro">
                    <p style="text-align: center;max-width:  650px;color: var(--corVinho2); font-size: 18px!important; margin-bottom: 35px;">Introdução ao Mundo do Vinho, porta de entrada nesse fascinante
                        universo, é um curso abrangente e completo, desenvolvido pelos 
                       especialistas da ABS-Brasil com o objetivo de oferecer, num
                       formato compacto (8 aulas), o máximo de informações e curiosidades 
                       sobre tudo o que diz respeito a essa bebida maravilhosa.</p>
                </div>

                       <div style="margin-right:  276px; background-image: url('https://abs-brasil.com/site/img/_linedivider.png'); background-size: 100%; width: 250px; height: 50px;"></div>

                <div class="_text">
                    <p>Introdução ao Mundo do Vinho, porta de entrada nesse fascinante
                        universo, é um curso abrangente e completo, desenvolvido pelos 
                       especialistas da ABS-Brasil com o objetivo de oferecer, num
                       formato compacto (8 aulas), o máximo de informações e curiosidades 
                       sobre tudo o que diz respeito a essa bebida maravilhosa.
                        O curso se destina especialmente a leigos ou enófilos amadores 
                       que desejam ampliar seus conhecimentos sobre o assunto, mas 
                       não dispõem de muito tempo para isso.</p>
                       <p>As oito aulas (uma por semana) analisam temas que vão dos 
                        princípios de degustação à fascinante arte de compatibilizar 
                        vinho e comida. E sempre incluem a degustação de ótimos vinhos 
                        relacionados aos assuntos comentados em aula. O curso visa, 
                        assim, capacitar o consumidor a, em pouco tempo, adquirir os 
                        conhecimentos necessários para escolher cada vez melhor seus 
                        vinhos e consumi-los, em casa ou num restaurante, sabendo o que
                         esperar de cada garrafa.</p>
                    <p>O curso aborda, de forma sistemática e didática, todos os 
                        principais tópicos relacionados a degustação e apreciação de 
                        vinhos -- de sua história e importância social ao serviço do vinho 
                        em casa ou nos restaurantes. São analisadas também questões 
                        como a importância da viticultura para a qualidade do vinho, o 
                        processo de vinificação de brancos, tintos e espumantes, a relação
                         entre vinho e saúde, os cuidados na guarda e armazenamento 
                        dos vinhos e ainda os fundamentos da harmonização entre vinho 
                        e comida.<br> <br>
                        
                        Ressalte-se que em todas as aulas são degustados vinhos, de
                         diferentes tipos e origem, para ilustrar de forma prática os pontos
                         mais importantes abordados em cada uma.  As aulas são 
                        ministradas por profissionais da própria Brasil, com grande 
                        experiência na análise e degustação de vinhos e muitos anos de 
                        prática didática nos vários cursos oferecidos regularmente pela ABS - Brasil.</p>
    
                        <!-- <div class="_certify">
                            <h2>Certificação Brasileira e Internacional</h2>
                            <p>Associação Brasileira de Sommelier, e ASI(Association de la Sommellerie Internationale - França)</p>
                            <div class="logo">
                                <img src="{{asset('site/img/Mask Group.png')}}" alt="">
                                <img src="{{asset('site/img/Logo asi.png')}}" alt="">
                            </div>
                        </div> -->
    
                </div>
                <!-- <div class="_imgs">
                    <div class="png">
                        <img src="{{asset('site/img/image_19.png')}}" alt="">                    
                    </div>
    
                    <div class="_card">
                        <div class="_top">
                             Turma prevista para iniciar
                        </div>
                        <main>
                            <div class="row">
                                <div class="svg">
                                    <img src="{{asset('site/img/calendar.svg')}}" alt="">
                                </div>
                                21 De Setembro
                            </div>
        
                            <div class="row">
                                <div class="svg">
                                    <img src="{{asset('site/img/alarm.svg')}}" alt="">
                                </div>
                                Ás 20 Horas
                            </div>
                            <div class="row">
                                <div class="svg">
                                    <img src="{{asset('site/img/GlobeHemisphereWest.svg')}}" alt="">
                                </div>
                                Aulas Ministradas Online.
                            </div>
                    </div>
    
                    <div class="_card __alternative">
                        <div class="_top">
                             INVESTIMENTO
                             <p>O investimento total do curso
                            </p>
                           
                        </div>
    
                        <h3> 10X<span>R$</span>190<span>,00</span></h3>
                        <main>
                            <div class="row">
                                
                                <button>Inscreva-se</button>
                            </div>
                    </div>
                </div> -->
               
            </div>
        </section>
    </main>
    @include('site.includes.footer')
</body>

</html>
