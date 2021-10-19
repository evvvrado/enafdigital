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

                <div class="_whatsapp"><a style="color: white;" target="_blank" href="https://web.whatsapp.com/send?phone=">Whats: (35) 9.87074902</a></div>

                <div class="_email">
                    <div class="_icon">
                        <img src="{{ asset('/site/img/icon_envelop_footer.svg') }}" alt="Ícone de Envelope" />
                    </div>
                    <a href="mailto:contato@enafdigital.com.br"> contato@enafdigital.com.br </a>
                </div>

                <div class="_social">
                    <span>Estamos nas redes sociais:</span>
                    <div class="_media">
                        <ul>
                            <li>
                                <a target="_blank" href="#">
                                    <img src="{{ asset('/site/img/icon_facebook_footer.svg') }}" alt="Ícone facebook" />
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="#">
                                    <img src="{{ asset('/site/img/icon_instagram_footer.svg') }}" alt="Ícone instagram" />
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="#">
                                    <img src="{{ asset('/site/img/icon_youtube_footer.svg') }}" alt="Ícone youtube" />
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="#">
                                    <img src="{{ asset('/site/img/icon_twitter_footer.svg') }}" alt="Ícone twitter" />
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="#">
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
                        <li><a href="{{ route('site.clinicas') }}">Eventos</a></li>
                        <li><a href="{{ route('site.clinicas') }}">Clínicas</a></li>
                        <li><a href="{{ route('site.cursos') }}">Cursos</a></li>
                        <li><a href="{{ route('site.professores') }}">Professores</a></li>
                        <li><a href="{{ route('site.feira') }}">EXPO ENAF</a></li>
                        <li><a href="{{ route('site.quem_somos') }}">Sobre</a></li>
                        <li><a href="{{ route('site.blog-lista') }}">Artigos</a></li>
                        <li><a href="{{ route('site.blog-grid') }}">Blog</a></li>
                        <li><a href="{{ route('site.contato') }}">Imprenssa</a></li>
                        <li><a href="{{ route('site.duvidas') }}">Dúvidas Frequentes</a></li>
                </nav>

                <a href="https://7seventrends.com" style="width: 100%; display: flex; align-items: flex-end; justify-content: center;">
                    <img src="{{ asset('/site/img/_logo7seven.png') }}" alt="Ícone 7Seven" style="margin-top: 50px;" />
                </a>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js "></script>

<script src="{{ asset('site/js/jquery.min.js') }}"></script>
<script src="{{ asset('site/js/jquery-ui.js') }}"></script>
<script src="{{ asset('/site/js/main.js') }}"></script>


<script>
    $('.footer_expanded button').click(()=>{
        window.location.href="{{ route('site.aguarde') }}"
    })
</script>


</body>

</html>