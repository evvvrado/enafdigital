@include('site.includes.aluno.header')



<section class="container-fluid _menu">
    <div class="container-fav">
        <div class="_logo">
            <a href="/"> <img src="{{ asset('site/img/hotsite/_logo57.png') }}" alt="Logo Enaf" height="40px" /></a>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="/minha-area">
                        <div class="svg">
                            <img src="{{ asset('site/img/sistema/user.svg') }}" alt="">
                        </div>
                        Minha Área
                    </a>
                </li>
                <li>
                    <a href="/minha-area/compras">
                        <div class="svg">
                            <img src="{{ asset('site/img/sistema/bag.svg') }}" alt="">
                        </div>
                        Meus Pedidos
                    </a>
                </li>
                <li class="_active">
                    <a href="/minha-area/matriculas">
                        <div class="svg">
                            <img src="{{ asset('site/img/sistema/page.svg') }}" alt="">
                        </div>
                        Minhas Matrículas
                    </a>
                </li>
                <li>
                    <a href="/minha-area/dados">
                        <div class="svg">
                            <img src="{{ asset('site/img/sistema/clipboard.svg') }}" alt="">
                        </div>
                        Meus Dados
                    </a>
                </li>
            </ul>
        </nav>
        <div class="_user">
            <div class="_img">
                @if (!$aluno->avatar)
                    <img src="{{ asset('site/img/sistema/user.svg') }}" style="max-width: 100%;
                            min-height: unset;
                            min-width: unset;" alt="">
                @else
                    <img src="{{ asset($aluno->avatar) }}" style="width: 100%; height: 100%; object-fit: cover;"
                        alt="">
                @endif
            </div>
            <div class="_text">
                Olá <span class="_username">{{ explode(' ', session()->get('aluno')['nome'])[0] }}</span>
                <a href="{{ route('site.aluno.deslogar') }}" class="_sair">
                    Sair
                </a>
            </div>
        </div>
    </div>

</section>
<div class="_menuMax">
    <img src="{{ asset('site/img/arrowright.svg') }}" alt="">
</div>
<section class="container-fluid _menu _mobileMenu">
    <div class="_closeButton">
        <img src="{{ asset('site/img/arrowleft.svg') }}" alt="">
    </div>
    <div class="container-fav">
        <nav>
            <ul>
                <li>
                    <a href="/minha-area/">
                        <div class="svg">
                            <img src="{{ asset('site/img/sistema/user.svg') }}" alt="">
                        </div>
                        Minha Área
                    </a>
                </li>
                <li>
                    <a href="/minha-area/compras">
                        <div class="svg">
                            <img src="{{ asset('site/img/sistema/bag.svg') }}" alt="">
                        </div>
                        Meus Pedidos
                    </a>
                </li>
                <li class="_active">
                    <a href="/minha-area/matriculas">
                        <div class="svg">
                            <img src="{{ asset('site/img/sistema/page.svg') }}" alt="">
                        </div>
                        Minhas Matrículas
                    </a>
                </li>
                <li>
                    <a href="/minha-area/dados">
                        <div class="svg">
                            <img src="{{ asset('site/img/sistema/clipboard.svg') }}" alt="">
                        </div>
                        Meus Dados
                    </a>
                </li>
            </ul>
        </nav>
        <div class="_user">
            <div class="_img">
                @if (!$aluno->avatar)
                    <img src="{{ asset('site/img/sistema/user.svg') }}" style="max-width: 100%;
                            min-height: unset;
                            min-width: unset;" alt="">
                @else
                    <img src="{{ asset($aluno->avatar) }}" style="width: 100%; height: 100%; object-fit: cover;"
                        alt="">
                @endif
            </div>
            <div class="_text">
                Olá <span class="_username">{{ explode(' ', session()->get('aluno')['nome'])[0] }}</span>
                <a href="{{ route('site.aluno.deslogar') }}" class="_sair">
                    Sair
                </a>
            </div>
        </div>
    </div>

</section>
</div>




<section class="mA_showcase">
    <div class="container-fluid">
        <div class="container-fav">
            <a href="{{ route('site.minha-area-matricula') }}"
                style="float: right; color: var(--orange); display: flex; gap: 2rem; align-items: center;">
                <picture>
                    <img src="{{ asset('site/img/arrowleft.svg') }}" alt="">
                </picture>

                Voltar para
                minhas matrículas
            </a>
            <div class="top">

                <picture>
                    <img src="{{ asset($matricula->curso->thumbnail) }}" alt="">
                </picture>

                <h2>
                    {{ $matricula->curso->nome }}
                    <p>{{ $matricula->curso->descricao }}</p>

                    <div class="details">
                        <span>

                            <img src="{{ asset('site/img/sistema/calendar.svg') }}" alt="">

                            <p>Matrícula {{ date('d.m.Y', strtotime($matricula->created_at)) }}</p>
                        </span>
                        <span>

                            <img src="{{ asset('site/img/sistema/dollar.svg') }}" alt="">

                            <p>R$ {{ number_format($matricula->curso->valor, 2, ',', '.') }}</p>
                        </span>
                    </div>
                </h2>
            </div>


            <nav>
                <span data-filter="agenda" active>Conteúdo</span>
            </nav>

            <main>
                <div class="list " data-filter="agenda" active>


                    <article>
                        <div class="date">
                            20/01/2021 <br>
                            às 09:00

                            <picture>
                                <img src="{{ asset('site/img/sistema/calendar white.svg') }}" alt="Aprovado">
                            </picture>
                        </div>


                        <div class="content">
                            <strong>Primeiro Outline do Curso</strong>
                            <p>Descrevendo matéria do curso</p>

                            <div class="files">
                                <a class="pdf" href="/">Outline - Primeiro.pdf</a>
                                <a class="video" href="/">Vídeo de Apresentação</a>
                            </div>

                        </div>

                    </article>


                    <article>
                        <div class="date">
                            <picture>
                                <img src="{{ asset('site/img/sistema/approved.svg') }}" alt="Aprovado">
                            </picture>
                        </div>


                        <div class="content">
                            <strong>Início do curso</strong>
                            <p>Criado: {{ date('d/m/Y', strtotime($matricula->curso->created_at)) }}</p>
                        </div>

                    </article>
                </div>
            </main>
        </div>
    </div>
</section>
