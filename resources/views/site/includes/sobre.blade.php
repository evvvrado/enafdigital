<section class="container-fluid s_sobre">
    <div class="container-fav">
        <div class="_left">
            <h4>Sobre o Enaf</h4>
            <p>
                Ao longo desses 35 anos, colecionados não apenas número, mas também histórias inspiradoras. Nosso principal compromisso é oferecer o melhor do universo fitness para todas as pessoas
                que estarão presentes conosco, de forma online ou presencial. <br /><br />
                Somos o maior evento de Sport & Fitness e Saúde realizado nas Américas e um dos mais importantes do mundo, e iniciamos agora um novo ciclo - CONECTAR PARA EVOLUIR, trazendo toda nossa
                experiência presencial para dentro das telas.


            </p>
            @if (!Route::is('site.quem_somos') )
            <button onclick="window.location.href = '{{ route('site.quem_somos')}}'">
                <img src="{{ asset('site/img/arrowright_white.svg') }}" alt="Seta para a direita" />
            </button>
            @endif
        </div>
        <div class="_right">
            <div class="_text">
                <div class="_icon">
                    <img src="{{ asset('site/img/icon_star.svg') }}" alt="Estrela" />
                    <p>
                        Nosso objetivo é a reciclagem e aprimoramento dos profissionais das áreas de esporte e fitness e a criação de networking entre empresas e o seu público-alvo.
                    </p>
                </div>
            </div>

            <div class="_cases fade">
                <div class="_case">
                    <div class="_icon">
                        <img src="{{ asset('site/img/icon_form.svg') }}" alt="Papel preenchido" />
                    </div>
                    <span>Técnicas e Conceitos</span>
                </div>
                <div class="_case">
                    <div class="_icon">
                        <img src="{{ asset('site/img/icon_screen.svg') }}" alt="Monitor" />
                    </div>
                    <span>Treinamentos e Aulas</span>
                </div>
                <div class="_case">
                    <div class="_icon">
                        <img src="{{ asset('site/img/icon_folder.svg') }}" alt="Papel limpo" />
                    </div>
                    <span>Dicas e Estratégias</span>
                </div>
            </div>

            <div class="_background">
                <img src="{{ asset('site/img/banner_sobre.jpg') }}" alt="Pessoa com planilha" />
            </div>
        </div>
    </div>
</section>