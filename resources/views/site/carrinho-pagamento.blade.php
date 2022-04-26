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
                    <p>Dúvida na compra ligue - 35 997259528</p>
                </div>
            </div>

            @if(session()->get("carrinho"))
            @include('site.includes.carrinho')
            @endif
        </div>
    </header>
    <!-- HEADER -->

    <section class="container-fluid s_identificacao">
        <div class="container-fav" style="display: flex; gap: 5rem; align-content: space-between; justify-content: flex-start;">
            <div class="_half" style="justify-content: flex-start; width: 100%;">

                <div class="_top">
                    <div class="_title _active">
                        <div class="_img">
                            <img src="{{ asset('site/img/sistema/doorData.svg') }}" alt="">
                        </div>
                        <h2><a href="/">Home</a></h2>
                    </div>

                    <div class="arrow _title _active">
                        <img src="{{ asset('site/img/sistema/loadingArrow.svg') }}" alt="" />
                    </div>

                    <div class="_title _active">
                        <div class="_img">
                            <img src="{{ asset('site/img/sistema/personIdentificacao.svg') }}" alt="" />
                        </div>
                        <h2><a href="{{ route('site.carrinho-identificacao', ['curso' => $curso])}}">Identificação</a></h2>
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

                    <div class="_pagamentoCartao" style="max-width: 100% !important;">
                        @if($forma == 'cartao')
                        <div class="_text">
                            <span>Pagamento Cartão de Crédito</span>
                            <p>Digite os dados do seu cartão abaixo:</p>
                        </div>
                        <div class="_form">

                            <div id="div-erro">
                                <div class="box">
                                    <div class="col-12 text-center">
                                        <img src="{{ asset('site/img/icone_erro.png') }}" style="width: 100px; margin: auto auto;" alt="Ícone de Cadastro">
                                    </div>
                                    <h1>Ocorreu um erro !</h1>
                                    <h2>{{ session()->get('erro') }}</h2>
                                </div>
                            </div>


                            <form id="form-cartao" @if($curso->gateway_cartao == 1) action="{{route('site.carrinho.finalizar.credito.cielo', ['curso' => $curso])}}" @else
                                action="{{route('site.carrinho.finalizar.credito.gerencianet', ['curso' => $curso])}}" @endif method="POST">

                                @csrf
                                <input type="hidden" name="payment_token" value="-">
                                <div style="display:flex; flex-direction: row;">
                                    <div style="width: 50%;">
                                        <label for="">
                                            <span>Nome</span>
                                            <input type="text" name="nome" value="{{ $aluno->nome }}" required>
                                        </label>
                                    </div>
                                    <div style="margin-left: 5px; width: 50%;">
                                        <label for="">
                                            <span>CPF</span>
                                            <input type="text" name="cpf" value="{{ $aluno->cpf }}" required>
                                        </label>
                                    </div>
                                </div>
                                <div style="display:flex; flex-direction: row;">
                                    <div style="width: 50%;">
                                        <label for="">
                                            <span>Telefone</span>
                                            <input type="text" name="telefone" value="{{ $aluno->telefone }}" required>
                                        </label>
                                    </div>
                                    <div style="margin-left: 5px; width: 50%;">
                                        <label for="">
                                            <span>Data de Nascimento</span>
                                            <input type="date" name="nascimento" value="{{ $aluno->nascimento }}" required>
                                        </label>
                                    </div>
                                </div>
                                <div style="display:flex; flex-direction: row;">
                                    <div style="width: 100%;">
                                        <label for="">
                                            <span>E-mail</span>
                                            <input type="text" name="email" value="{{ $aluno->email }}" required>
                                        </label>
                                    </div>
                                </div>
                                <div style="display:flex; flex-direction: row;">
                                    <div style="width: 80%;">
                                        <label for="">
                                            <span>Rua</span>
                                            <input type="text" name="rua" value="{{ $aluno->rua }}" required>
                                        </label>
                                    </div>
                                    <div style="margin-left: 5px; width: 20%;">
                                        <label for="">
                                            <span>Nº</span>
                                            <input type="text" name="numero_endereco" value="{{ $aluno->numero }}" required>
                                        </label>
                                    </div>
                                </div>
                                <div style="display:flex; flex-direction: row;">
                                    <div style="width: 50%;">
                                        <label for="">
                                            <span>Bairro</span>
                                            <input type="text" name="bairro" value="{{ $aluno->bairro }}" required>
                                        </label>
                                    </div>
                                    <div style="margin-left: 5px; width: 50%;">
                                        <label for="">
                                            <span>CEP</span>
                                            <input type="text" name="cep" value="{{ $aluno->cep }}" required>
                                        </label>
                                    </div>
                                </div>
                                <div style="display:flex; flex-direction: row;">
                                    <div style="width: 50%;">
                                        <label for="">
                                            <span>Cidade</span>
                                            <input type="text" name="cidade" value="{{ $aluno->cidade }}" required>
                                        </label>
                                    </div>
                                    <div style="margin-left: 5px; width: 50%;">
                                        <label for="">
                                            <span>Estado</span>
                                            <select type="text" name="estado" required style="padding: 5px !important; max-width: 100%;">
                                                @foreach(config("estados.estados") as $key => $estado)
                                                    <option value="{{ $key }}" @if($aluno->estado == $estado) selected @endif>{{ $estado }}</option>
                                                @endforeach     
                                            </select>   
                                        </label>
                                    </div>
                                </div>
                                <label>
                                    <span>N. Cartão</span>
                                    <input required type="tel" inputmode="numeric" placeholder="0000 0000 0000 0000" pattern="[0-9\s]{13,19}" autocomplete="cc-number" name="numero" maxlength="19" />
                                </label>
                                <label>
                                    <span>Nome do cartão</span>
                                    <input required type="text" name="nome" placeholder="Nome do cartão" />
                                </label>
                                <label class="validade">
                                    <span>Validade</span>
                                    <input required type="tel" inputmode="numeric" name="expiracao" placeholder="00/0000" maxlength="7" />

                                    <p>Ano composto por 4 digitos! MM/YYYY</p>
                                </label>
                                <label class="cvv">
                                    <span>CVV</span>
                                    <input required type="tel" maxlength="3" placeholder="000" name="cvv" />

                                    <picture>
                                        <svg title="Informação fica atrás do cartão" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"
                                            style="fill: #11aacc;transform: ;msFilter:;">
                                            <path
                                                d="M20 4H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zM5 8.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-2zm6 7.5H5v-2h6v2zm8 0h-6v-2h6v2z">
                                            </path>
                                        </svg>

                                        <span>
                                            Informação atrás do cartão
                                        </span>
                                    </picture>

                                </label>
                                <label>
                                    <span>Parcelas</span>
                                    <select style="padding: 0 0 0 2.7rem!important;" name="parcelas" id="parcelas" required>
                                        @for($i = 1; $i <= $parcelas; $i++) 
                                            <option value="{{$i}}">{{$i}}x - R${{number_format($curso->valor/$i, 2, ",", ".")}}</option>
                                        @endfor
                                    </select>
                                </label>
                                <div class="_cupom">
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
                                </div>
                                <div id="div-ajax">
                                    <picture>
                                        <img src="{{ asset('site/img/sistema/loadingEnaf.png') }}" alt="">
                                    </picture>
                                </div>
                                <button type="submit" id="btn-form-cartao">
                                    Efetuar pagamento <img src="{{ asset('site/img/arrowlong.svg') }}" alt="" />
                                </button>
                                <a class="changefom" href="{{ route('site.carrinho-efetuar', ['curso' => $curso])}}">Trocar forma de pagamento</a>
                            </form>
                        </div>
                        @else
                        <div class="_text">
                            <span>Pagamento por boleto ou carnê</span>
                            <p>Escolha o número de parcelas desejadas:</p>
                        </div>
                        <div class="_form" style="width: 100% !important;">
                            <div>
                                <small style="color: red;">{{session()->get("erro")}}</small>
                            </div>

                            <form action="{{route('site.carrinho.finalizar.boleto', ['curso' => $curso])}}" method="POST">
                                @csrf
                                <div style="display:flex; flex-direction: row;">
                                    <div style="width: 50%;">
                                        <label for="">
                                            <span>Nome</span>
                                            <input type="text" name="nome" value="{{ $aluno->nome }}" required>
                                        </label>
                                    </div>
                                    <div style="margin-left: 5px; width: 50%;">
                                        <label for="">
                                            <span>CPF</span>
                                            <input type="text" name="cpf" value="{{ $aluno->cpf }}" required>
                                        </label>
                                    </div>
                                </div>
                                <div style="display:flex; flex-direction: row;">
                                    <div style="width: 50%;">
                                        <label for="">
                                            <span>Telefone</span>
                                            <input type="text" name="telefone" value="{{ $aluno->telefone }}" required>
                                        </label>
                                    </div>
                                    <div style="margin-left: 5px; width: 50%;">
                                        <label for="">
                                            <span>Data de Nascimento</span>
                                            <input type="text" name="nascimento" value="{{ $aluno->nascimento }}" required>
                                        </label>
                                    </div>
                                </div>
                                
                                <label>
                                    <span>Parcelas</span>
                                    <select style="padding: 0 0 0 2.7rem!important;" name="parcelas" required>
                                        @for($i = 1; ((($curso->valor / $i) > $configuracao->min_valor_parcela_boleto) && $i <= $configuracao->max_parcelas_boleto); $i++)
                                            <option value="{{$i}}">{{$i}}x de {{number_format($curso->valor / $i, 2, ",", ".")}}</option>
                                        @endfor
                                    </select>
                                </label>
                                <div class="_cupom">
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
                                </div>
                                <button type="submit">
                                    Efetuar pagamento <img src="{{ asset('site/img/arrowlong.svg') }}" alt="" />
                                </button>


                                <a class="changefom" href="{{ route('site.carrinho-efetuar', ['curso' => $curso])}}">Trocar forma de pagamento</a>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="_half" style="justify-content: flex-start; width: 70%;">
                <div class="publi">
                    <img src="{{ asset('site/img/sistema/publi.png') }}" alt="publicidade">
                </div>
            </div>

        </div>
    </section>




    @include('site.includes.aluno.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js "></script>
    @if($curso->gateway_cartao == 0)
    <script src=" {{ asset('site/js/bandeira.js') }}"></script>
    @include('site.includes.gerencianet')
    <script>
        $gn.ready(function(checkout) {
                $("#btn-form-cartao").on("click", function(e) {
                    e.preventDefault();
                    var erro = false;
                    $("#form-cartao input").each(function(){
                        if(!$(this).val()){
                            $("#div-erro h2").html("Por favor, preencha todos os campos.")
                            $('#div-erro').attr('show', '')
                            erro = true;
                            return false;
                        }
                    })
                    if(erro){
                        return false;
                    }
                    $("#btn-form-cartao").hide();
                    $("#div-ajax").show();
                    var cartao = $("input[name='numero']").val();
                    var nome = $("input[name='nome']").val();
                    var validade = $("input[name='expiracao']").val();
                    validade = validade.split("/");
                    var cvv = $("input[name='cvv']").val();
                    var bandeira = getCardBrand(cartao);
                    checkout.getPaymentToken({
                            brand: bandeira, // bandeira do cartão
                            number: cartao, // número do cartão
                            cvv: cvv, // código de segurança
                            expiration_month: validade[0], // mês de vencimento
                            expiration_year: validade[1] // ano de vencimento
                        },
                        function(error, response) {
                            if (error) {
                                // Trata o erro ocorrido
                                $("#div-erro h2").html("Não foi possível validar o cartão. Por favor, verifique os dados e tente novamente.")
                                $('#div-erro').attr('show', '')
                                $("#btn-form-cartao").show();
                                $("#div-ajax").hide();
                            } else {
                                if(response.data && response.data.payment_token){
                                    $("input[name='payment_token']").val(response.data.payment_token);
                                    $("#form-cartao").submit();
                                }else{
                                    $('#div-erro').attr('show', '')
                                    $("#div-erro").html("Não foi possível validar o cartão. Por favor, verifique os dados e tente novamente.")
                                }
                            }
                        }
                    );
                });

            });
    </script>
    @endif
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

  

        $('form label input[name = "cpf"]').mask("000.000.000-00", {
        reverse: true,
    });
    $('form label input[name = "telefone"]').mask("(00) 00000-0000");
    $('form label input[name = "expiracao"]').mask("00/0000");
    $('form label input[name= "numero"]').mask("0000 0000 0000 0000");

    $('input[name="expiracao"]').keydown(() =>{
        if($('input[name="expiracao"]').val().length < 6){
            $('input:not(input[name="expiracao"])').attr('disabled', '');
            $('input[name="expiracao"]').css('border-color', 'red');
        }else{
            $('input:not(input[name="expiracao"])').removeAttr('disabled');
            $('input[name="expiracao"]').css('border-color', '#d8d8d8');
        }
    })
    
    
    $('#div-erro').click(() => {
        $('#div-erro').removeAttr('show');
    })
    </script>