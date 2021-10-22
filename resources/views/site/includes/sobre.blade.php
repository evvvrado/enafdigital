<section class="container-fluid s_sobre">
    <div class="container-fav">
        <div class="_left">
            <h4>Sobre o Enaf</h4>
            <p>
                O ENAF é o maior evento de Sport & Fitness e Saúde realizado nas Américas e um dos mais
                importantes do mundo. Tendo como objetivo promover a reciclagem e aprimoramento de
                técnicas.<br /><br />
                São dezenas de cursos, palestras e workshops acontecendo simultâneamente, de manhã, à
                tarde e à noite. Essa intensa troca de informações faz do ENAF um congresso obrigatório
                para estudantes e profissionais de sport, fitness e saúde.
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
                        Para você qualificar se e distinguir-se no mercado trabalho, venha e atualize-se com
                        quem conhece do assunto.
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