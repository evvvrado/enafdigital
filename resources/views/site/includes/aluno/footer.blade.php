<footer class="container-fluid">
    <section class="container-fav s_faleConosco">
        <div class="_text">
            <h3>FALE CONOSCO</h3>
            <h2>Entre em contato com a nossa equipe</h2>
            <p>Estamos prontos para te ajudar</p>
        </div>
        <div class="_buttons">
            <div>
                <img src="{{ asset('site/img/sistema/chat.svg') }}" alt="" />
            </div>
            <div>
                <img src="{{ asset('site/img/sistema/call.svg') }}" alt="" />
            </div>
            <div>
                <img src="{{ asset('site/img/sistema/whatsappButton.svg') }}" alt="" />
            </div>
            <div>
                <img src="{{ asset('site/img/sistema/envelopButton.svg') }}" alt="" />
            </div>
        </div>
    </section>
    <section class="container-fav s_info">
        <div class="_left">
            <p>Av. Raja Gabaglia, 2000 - Sala 805 e PVMT 8 - Bloco 1
                Alpes - Belo Horizonte - MG / 30.494-170</p>

            <div class="_siga">
                <p>Siga-nos</p>
                <div class="_social">
                    <a href="/"><img src="{{ asset('site/img/sistema/instagramLogo.svg') }}" alt="" /></a>
                    <a href="/"><img src="{{ asset('site/img/sistema/facebookLogo.svg') }}" alt="" /></a>
                </div>
            </div>

            <div class="_compraSegura">
                <div class="_svg">
                    <img src="{{ asset('site/img/sistema/lock.svg') }}" alt="" />
                </div>
                <p>Compra 100% segura</p>
            </div>
        </div>
        <div class="_right">
            <p>Formas de Pagamento</p>
            <div class="_formasPagamento">
                <img src="{{ asset('site/img/sistema/pagamentoLogos1.jpg') }}" alt="" />
                <img src="{{ asset('site/img/sistema/pagamentoLogos2.jpg') }}" alt="" />
                <img src="{{ asset('site/img/sistema/pagamentoLogos3.jpg') }}" alt="" />
                <img src="{{ asset('site/img/sistema/pagamentoLogos4.jpg') }}" alt="" />
                <img src="{{ asset('site/img/sistema/pagamentoLogos5.jpg') }}" alt="" />
                <img src="{{ asset('site/img/sistema/pagamentoLogos6.jpg') }}" alt="" />
                <img src="{{ asset('site/img/sistema/pagamentoLogos7.jpg') }}" alt="" />
                <img src="{{ asset('site/img/sistema/pagamentoLogos8.jpg') }}" alt="" />
            </div>
        </div>
    </section>
</footer>


<section class="container-fluid _copyRight">
    <div class="container-fav">
        <p>Copyright © ENAF DIGITAL - Todos os direitos reservados. Todo o conteúdo do site, incluindo fotos,
            imagens,
            logotipos, marcas, dizeres, som, software, conjunto imagem, layout e trade dress, são de propriedade
            exclusiva do ENAF. É vedada a reprodução total ou parcial de qualquer elemento de identidade sem a
            expressa autorização. A violação de qualquer direito mencionado implicará na responsabilização cível e
            criminal nos termos da Lei. CNPJ: 17.190.409/0001-10
        </p>

        <p>
            <strong>
                Desenvolvido por
                <a href="https://7seventrends.com"" class=" _img">
                    <img src="{{ asset('site/img/_logo7seven.png') }}" style="filter: brightness(0);""  alt="">
              </a> </div></p> 
              </strong>
          </p>          
        </div>
      </section>



      <script src=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js "></script>
      <script>
          $(" header main button.hamburguer-menu").click(()=> {
                    $("div._sidemenu nav").css("height", "497px");
                    });

                    $("div._sidemenu nav .hamburguerClose").click(() => {
                    $("div._sidemenu nav").css("height", "0");
                    });



                    $("._menuMax").click(() => {
                    $("._mobileMenu").css("display", "flex");
                    $("._mobileMenu").animate({
                    left: "0",
                    top: "44px",
                    },
                    500
                    );
                    });

                    $("section._mobileMenu ._closeButton").click(() => {
                    $("._mobileMenu").animate({
                    left: "-200vw",
                    top: "44px",
                    },
                    500
                    );
                    });


                    $("._hamburguer, .close_superMenu").click(() => {
                    $(".d_superMenu").toggleClass("_showed");
                    });

                    $("._carrinho_button, .d_carrinho ._close").click(() => {
                    $(".d_carrinho").toggleClass("active");
                    });

                    $("._carrinho_button, .d_carrinho ._close").click(() => {
                    $(".d_carrinho").toggleClass("active");
                    });

                    $("body._carrinho .container-fav ._carButton").click(() => {
                    $("._meuCarrinho").toggleClass("_active");

                    })

                    $("section._meuCarrinho ._top ._title ._close").click(() =>{
                    $("._meuCarrinho").toggleClass("_active");

                    })
                    </script>