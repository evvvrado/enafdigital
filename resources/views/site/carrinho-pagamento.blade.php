@include('site.includes.carrinho.head')
<title>Realizar Pagamento</title>

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

            @if(session()->get("carrinho"))
            @include('site.includes.carrinho')
            @endif
        </div>
    </header>
    <!-- HEADER -->

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
                    </div>

                    <div class="_pagamentoCartao">
                        @if($forma == 'cartao')
                        <div class="_text">
                            <span>Pagamento Cartão de Crédito</span>
                            <p>Digite os dados do seu cartão abaixo:</p>
                        </div>
                        <div class="_form">
                            <div>
                                <small style="color: red;">{{session()->get("erro")}}</small>
                            </div>

                            <form action="{{route('site.carrinho.finalizar.credito.cielo')}}" method="POST">
                                @csrf
                                <label>
                                    <span>N. Cartão</span>
                                    <input type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" name="numero" maxlength="19" />
                                </label>
                                <label>
                                    <span>Nome do cartão</span>
                                    <input type="text" name="nome" />
                                </label>
                                <label>
                                    <span>Validade</span>
                                    <input type="tel" inputmode="numeric" name="expiracao" maxlength="7" />
                                </label>
                                <label>
                                    <span>CVV</span>
                                    <input type="tel" maxlength="3" name="cvv" />
                                </label>
                                <label>
                                    <span>Parcelas</span>
                                    <input type="number" name="parcelas" max="10" min="1" step="1" required />
                                </label>
                                <button type="submit">
                                    Efetuar pagamento <img src="{{ asset('site/img/arrowlong.svg') }}" alt="" />
                                </button>
                            </form>
                        </div>
                        @else
                        <div class="_text">
                            <span>Pagamento por boleto ou carnê</span>
                            <p>Escolha o número de parcelas desejadas:</p>
                        </div>
                        <div class="_form">
                            <div>
                                <small style="color: red;">{{session()->get("erro")}}</small>
                            </div>

                            <form action="{{route('site.carrinho.finalizar.boleto')}}" method="POST">
                                @csrf
                                <label>
                                    <span>Parcelas</span>
                                    <select name="parcelas" required>
                                        <option value="1">1x de {{$carrinho->total - ($carrinho->total * 10 / 100)}}</option>
                                        @for($i = 2; ((($carrinho->total / $i) > $configuracao->min_valor_parcela_boleto) && $i <= $configuracao->max_parcelas_boleto); $i++)
                                            <option value="{{$i}}">{{$i}}x de {{number_format($carrinho->total / $i, 2, ",", ".")}}</option>
                                            @endfor
                                    </select>
                                </label>
                                <button type="submit">
                                    Efetuar pagamento <img src="{{ asset('site/img/arrowlong.svg') }}" alt="" />
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>



    @include('site.includes.aluno.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js "></script>
    @include('site.includes.gerencianet')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
        integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $("form label input,form label textarea").focus(function() {
            $(this).parent().find("span").addClass("active");
        });

        $("form label input,form label textarea").focusout(function() {
            if ($(this).val() == "") {
                $(this).parent().find("span").removeClass("active");
            }
        });


        $("._carButton").click(() => {
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

        $('form label input[name = "cpf"]').mask("000.000.000-00", {
        reverse: true,
    });
    $('form label input[name = "telefone"]').mask("(00) 00000-0000");
    $('form label input[name = "expiracao"]').mask("00/0000");
    $('form label input[name= "numero"]').mask("0000 0000 0000 0000");
    </script>