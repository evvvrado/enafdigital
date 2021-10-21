@include('site.includes.carrinho.head')
<title>Forma de Pagamento</title>

<body class="_carrinho">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;700&display=swap" rel="stylesheet" />




    <!-- HEADER -->
    <header class="container-fluid">
        <div class="container-fav">
            <div class="_first">
                <div class="_logos">
                    <a href="{{ route('site.index') }}"><img src="{{ asset('site/img/_logo47_Color.png') }}" alt="" /></a>
                    <div class="_carButton">
                        <img src="{{ asset('site/img/sistema/car.svg') }}" alt="" />
                    </div>
                </div>

                <div class="_duvidas">
                    <div class="_svg">
                        <img src="{{ asset('site/img/sistema/carrinhoPhone.svg') }}" alt="" />
                    </div>
                    <p>Dúvida na compra ligue - 35 992611988</p>
                </div>
            </div>
            <section class="_meuCarrinho">
                <div class="_top">
                    <div class="_title">
                        <div class="_icon">
                            <img src="{{ asset('site/img/sistema/car.svg') }}" alt="" />
                            <img src="{{ asset('site/img/sistema/cancel.svg') }}" alt="" />
                        </div>
                        <span>Meu Carrinho</span>
                    </div>
                    <div class="_numberofItems">
                        <span>{{$carrinho->produtos->count()}}</span>
                    </div>
                </div>
                <div class="_value">
                    <p>Total</p>
                    <div class="_svg">
                        <img src="{{ asset('site/img/sistema/arrowright.svg') }}" alt="" />
                    </div>
                    <strong>R$ <span class="_total">{{number_format($carrinho->total, 2, ",", ".")}}</span></strong>
                </div>
                <div class="_innerCar">
                    @foreach($carrinho->produtos as $produto)
                    <div class="_innerItem">
                        <div class="_img">
                            <img src="{{ asset('site/img/sistema/carrinhoExample.jpg') }}" alt="" />
                        </div>
                        <div class="_content">
                            {{-- <h3 class="isOnline">Curso Online</h3> --}}
                            <h2 class="itemName">{{$produto->curso->nome}}</h2>
                            {{-- <p class="itemExtra">Certificado de 10hs</p> --}}
                            <div class="itemValue">
                                <strong>R$ <span class="_itemValue">{{number_format($produto->total, 2, ",", ".")}}</span></strong>
                                <div class="_controls">
                                    <div class="itemControl cancel">
                                        <div class="_img">
                                            <img src="{{ asset('site/img/sistema/cancel.svg') }}" alt="" />
                                        </div>
                                    </div>
                                    {{-- <div class="itemControl more">
                                        <div class="_img">
                                            <img src="{{ asset('site/img/sistema/more.svg') }}" alt="" />
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="_bottom">
                    <div class="_subTotal _bottomSub">
                        <div class="_title">
                            <span>Sub Total</span>
                        </div>
                        <div class="_svg">
                            <img src="{{ asset('site/img/sistema/arrowright.svg') }}" alt="" />
                        </div>
                        <span>R$ <span class="_subtotalValue">{{number_format($carrinho->total, 2, ",", ".")}}</span></span>
                    </div>
                    {{-- <div class="_subDesconto _bottomSub">
                        <span>Desconto</span>
                        <div class="_svg">
                            <img src="{{ asset('site/img/sistema/arrowright.svg') }}" alt="" />
                        </div>
                        <span><span class="_subdescontoValue">-</span></span>
                    </div> --}}
                </div>

                <div class="_finalTotal _bottomSub">
                    <span>Total</span>
                    <div class="_svg">
                        <img src="{{ asset('site/img/sistema/arrowright.svg') }}" alt="" />
                    </div>
                    <strong>R$ <span class="_finaltotalValue">{{number_format($carrinho->total, 2, ",", ".")}}</span> </strong>
                </div>
            </section>
        </div>
    </header>
    <!-- HEADER -->

    <div class="pop-up-confirmacao">

        <div class="pop-up-box">

            <div class="pop-up-header">
                <div class="logos">
                    <img src="{{ asset('site/img/_logo92.png') }}" alt="" />
                    <img src="{{ asset('site/img/_logoASI_92.png') }}" alt="" />
                </div>

                <div class="icon">
                    <img src="{{ asset('site/img/sistema/happyemoji.svg') }}" alt="" />
                </div>

                <p>Tudo pronto para finalizar?</p>

            </div>
            <div class="pop-up-middle">

                <div class="icon">
                    <img src="{{ asset('site/img/sistema/mailData.svg') }}" />
                </div>

                <p>Toda as informações de sua compra<br> serão enviadas para seu email.</p>

            </div>

            <div class="pop-up-buttons">
                <button class="cancel" onclick="activepopup()">Cancelar</button>
                <button class="confirm" onclick="window.location = '{{route('site.carrinho.finalizar.boleto')}}'">Finalizar Compra</button>
            </div>

        </div>

        <script>
            function activepopup(){
               $('.pop-up-confirmacao').toggleClass('active')
            }        
        </script>

        <div class="pop-up-blackground"></div>

    </div>



    <section class="container-fluid s_identificacao">
        <div class="container-fav">
            <div class="_half">
                <div class="_top">
                    <div class="_title _active">
                        <div class="_img">
                            <img src="{{ asset('site/img/sistema/personIdentificacao.svg') }}" alt="" />
                        </div>
                        <h2>Identificação</h2>
                    </div>
                    <div class="arrow _title _active">
                        <img src="{{ asset('site/img/sistema/loadingArrow.svg') }}" alt="" />
                    </div>

                    <div class="_title _active">
                        <div class="_img">
                            <img src="{{ asset('site/img/sistema/card.svg') }}" alt="" />
                        </div>
                        <h2>Pagamento</h2>
                    </div>
                </div>
                <div class="_pagamento">
                    <div class="_topInfo">
                        <div class="row">
                            <div class="_name">
                                <div class="_img">
                                    <img src="{{ asset('site/img/sistema/user.svg') }}" alt="" />
                                </div>
                                <p>{{ $aluno->nome }}</p>
                            </div>
                            <p>{{ $aluno->email }}</p>
                        </div>
                        {{-- <div class="row">
                            <div>
                                <p>
                                    Rua Rio Grande do Sul - Centro Poços de Caldas - MG Numero
                                    42 Apartamento - 301
                                </p>
                            </div>
                            <div>
                                <span>JAD Log - R$ 19,90</span>
                            </div>
                        </div> --}}
                    </div>
                    {{-- <div class="_cupom">
                        <div class="_text">
                            <span>Cupom de desconto</span>
                            <p>Digite o código de desconto ao lado:</p>
                        </div>
                        <div class="_input">
                            <div class="_form">
                                <div class="_svg">
                                    <img src="{{ asset('site/img/sistema/cupom.svg') }}" alt="" />
                                </div>
                                <input type="text" placeholder="#AbsÉ10" />
                                <button>
                                    <img src="{{ asset('site/img/sistema/arrowright.svg') }}" alt="" />
                                </button>
                            </div>
                            <p>- R$ 20 aplicado na sua compra</p>
                        </div>
                    </div> --}}
                    <div class="_choose">
                        <div class="_title">
                            <span>Escolha a forma de pagamento</span>
                            <p>Selecione qual opçao deseja realizar o pagamento</p>
                        </div>
                        <div class="_buttons">
                            <div class="bolet button" onclick="window.location.href = '{{route('site.carrinho.pagamento.boleto')}}'">
                                <div class="_icon">
                                    <img src="{{ asset('site/img/sistema/boleto.svg') }}" alt="" />
                                </div>
                                <div class="_text">
                                    <span>Boleto Bancário</span>
                                    <p>10% de desconto</p>
                                </div>
                            </div>

                            <div class="creditCard button" onclick="window.location.href = '{{route('site.carrinho.pagamento.cartao')}}'">
                                <div class="_icon">
                                    <img src="{{ asset('site/img/sistema/creditcard.svg') }}" alt="" />
                                </div>
                                <div class="_text">
                                    <span>Cartão de Crédito</span>
                                    <p>em até 10x sem juros</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('site.includes.aluno.footer')

    <script src=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js "></script>
    <script>
        $(" form label input,form label textarea").focus(function() { $(this).parent().find("span").addClass("active"); }); $("form label input,form label textarea").focusout(function() { if
                            ($(this).val()=="" ) { $(this).parent().find("span").removeClass("active"); } }); $("._carButton").click(()=> {
                        $("._meuCarrinho").animate({
                        top: "0",
                        },
                        400
                        );
                        });
                        $(" section._meuCarrinho ._top ._title ._icon img:last-child").click(() => {
                        $("._meuCarrinho").animate({
                        top: "-200vh",
                        },
                        400
                        );
                        });
    </script>