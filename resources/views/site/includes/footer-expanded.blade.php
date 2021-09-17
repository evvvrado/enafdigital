<footer data-size="expanded">
    <div class="container-fluid footer_expanded">
        <div class="container-fav">
        <div class="_text">
            <h6>SEJA UM MEMBRO</h6>
            <h2>lorem ipsum dolor.</h2>
            <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
            </p>
        </div>
        <button>
            <img src="{{ asset('/site/img/arrowright.svg') }}" alt="Seta para a direita" />
        </button>
        </div>
    </div>

    <div class="container-fluid footer_base">
        <div class="container-fav">
        <div class="_top">
            <div class="_logo">
            <img src="{{ asset('/site/img/_logo45.svg') }}" alt="Logo Enaf" />
            </div>

            <div class="_whatsapp">Whats: (35) 9.87074902</div>

            <div class="_email">
            <div class="_icon">
                <img src="{{ asset('/site/img/icon_envelop_footer.svg') }}" alt="Ícone de Envelope" />
            </div>
            <a href="mailto:faleconosco@enaf.com.br"> faleconosco@enaf.com.br </a>
            </div>

            <div class="_social">
            <span>Estamos nas redes sociais:</span>
            <div class="_media">
                <ul>
                <li>
                    <a href="#">
                    <img src="{{ asset('/site/img/icon_facebook_footer.svg') }}" alt="Ícone facebook" />
                    </a>
                </li>
                <li>
                    <a href="#">
                    <img src="{{ asset('/site/img/icon_instagram_footer.svg') }}" alt="Ícone instagram" />
                    </a>
                </li>
                <li>
                    <a href="#">
                    <img src="{{ asset('/site/img/icon_youtube_footer.svg') }}" alt="Ícone youtube" />
                    </a>
                </li>
                <li>
                    <a href="#">
                    <img src="{{ asset('/site/img/icon_twitter_footer.svg') }}" alt="Ícone twitter" />
                    </a>
                </li>
                <li>
                    <a href="#">
                    <img src="{{ asset('/site/img/icon_linkedin_footer.svg') }}" alt="Ícone linkedin" />
                    </a>
                </li>
                </ul>
            </div>
            </div>
        </div>
        <div class="_end">
            <nav>
            <ul>
                <li><a href="/">EVENTOS</a></li>
                <li><a href="{{ route('site.cursos') }}">CURSOS ONLINE</a></li>
                <li><a href="{{ route('site.clinicas') }}">CLÍNICAS</a></li>
                <li><a href="{{ route('site.professores') }}">PROFESSORES</a></li>
                <li><a href="/">EMBAIXADORES</a></li>
                <li><a href="{{ route('site.feira') }}">Feira Online</a></li>
                <li><a href="/nossoblog-lista.html">BLOG</a></li>
                <li><a href="/nossoblog.html">ARTIGOS</a></li>
                <li><a href="/contato.html">IMPRENSA</a></li>
                <li><a href="{{ route('site.contato') }}">CONTATO</a></li>
            </ul>
            </nav>
        </div>
        </div>
    </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js "></script>


    <script src="{{ asset('site/js/jquery.min.js')}}"></script>
    <script src="{{ asset('site/js/jquery-ui.js')}}"></script>
    <script src="{{ asset('/site/js/main.js')}}"></script>

    


</body>
</html>