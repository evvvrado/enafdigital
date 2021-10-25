<style>
    section._meuCarrinho {
        height: 100vh;
        width: 38.4rem;
        /* 
  padding: 5rem 2.2rem; */

        border: solid 1px var(--gray19);

        display: flex;
        flex-direction: column;
        align-items: center;
        background: white;

        margin-top: -2.5rem;

        position: absolute;

        z-index: 665;
        right: 0;
        top: 0;
    }

    ._carrinho section._meuCarrinho {
        height: 72.7rem;
    }


    section._meuCarrinho ._top {
        width: 100%;
        max-width: 33.6rem;

        display: flex;
        justify-content: space-between;
        align-items: center;

        padding-top: 5rem;
        padding-bottom: 2.6rem;
    }

    section._meuCarrinho ._top ._title {
        display: flex;
        gap: 1.6rem;
        color: var(--wine12);
        font-weight: 500;
    }

    section._meuCarrinho ._top ._title ._icon img:last-child {
        display: none;
    }

    section._meuCarrinho ._top ._numberofItems {
        width: 3.6rem;
        height: 3.6rem;

        color: var(--white);
        font-weight: 400;

        display: flex;
        align-content: center;
        justify-content: center;

        border-radius: 50%;

        background-color: var(--wine12);
    }

    section._meuCarrinho ._top ._numberofItems span {
        margin: auto 0;
    }

    section._meuCarrinho ._value {
        background-color: var(--gray19);
        width: 100%;

        padding: 2.2rem;

        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    ._carrinho section._meuCarrinho ._innerCar {
        height: 42.2rem;
    }

    section._meuCarrinho ._innerCar {
        height: 100%;
        width: 100%;

        padding-top: 2.5rem;

        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 4.5rem;

        overflow-y: scroll;

        border-bottom: solid 1px var(--gray19);
    }

    section._meuCarrinho ._innerCar::-webkit-scrollbar {
        display: none;
    }

    section._meuCarrinho ._innerCar ._innerItem {
        display: flex;
        max-width: 33rem;
        gap: 1.8rem;

        cursor: pointer;

        width: 100%;
    }

    section._meuCarrinho ._innerCar ._innerItem ._img:not(._controls ._img) {
        width: 105px;
        height: 73px;
        display: flex;
        overflow: hidden;

        border-radius: 4px;
    }

    section._meuCarrinho ._innerCar ._innerItem ._img:not(._controls ._img) img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    section._meuCarrinho ._innerCar ._innerItem ._content {
        width: 100%;
    }

    section._meuCarrinho ._innerCar ._innerItem h3 {
        font-size: 1.4rem;
        font-weight: 400;
        color: var(--lightbrown);
        margin-bottom: 0.6rem;
    }

    section._meuCarrinho ._innerCar ._innerItem h2 {
        font-weight: 600;
        font-size: 1.6rem;
        margin-bottom: 1.6rem;

        color: var(--wine12);
    }

    section._meuCarrinho ._innerCar ._innerItem p {
        font-size: 1.4rem;
        color: var(--wine12);
        margin-bottom: 1.8rem;
    }

    section._meuCarrinho ._innerCar ._innerItem .itemValue {
        display: flex;
        justify-content: space-between;

        font-size: 18px;

        color: var(--wine12);
    }

    section._meuCarrinho ._innerCar ._innerItem .itemValue ._controls {
        display: flex;
        justify-content: space-between;
        width: 100%;
        max-width: 6.6rem;
    }

    section._meuCarrinho ._innerCar ._innerItem .itemValue .itemControl {
        width: 2.8rem;
        height: 2.8rem;
        background: var(--gray19);
        border-radius: 50%;

        cursor: pointer;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    section._meuCarrinho ._bottom {
        width: 100%;
        padding-top: 3.5rem;

        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 2.8rem;
    }

    section._meuCarrinho ._bottom span,
    section._meuCarrinho ._bottom strong {
        font-size: 1.4rem;
    }

    section._meuCarrinho ._bottomSub {
        width: 100%;
        max-width: 33.6rem;

        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    section._meuCarrinho ._bottom ._bottomSub._subTotal span {
        color: var(--wine12);
    }

    section._meuCarrinho ._bottom ._bottomSub._subDesconto span {
        color: var(--lightbrown) !important;
    }

    section._meuCarrinho ._bottomSub._finalTotal {
        background-color: var(--gray19);
        width: 100%;
        max-width: 100%;
        margin-top: 1.7rem;
        padding: 2.1rem 2.4rem;
    }

    section._meuCarrinho ._bottomSub._finalTotal span {
        font-size: 1.6rem;
    }


    @media only screen and (max-width: 1200px) {
        body._carrinho header .container-fav ._first ._duvidas {
            display: none;
        }

        ._carrinho .container-fluid.s_identificacao .container-fav {
            display: flex;
            align-items: center;
            justify-content: center
        }

        ._carrinho section._meuCarrinho .container-fav ._half {
            max-width: unset;
            width: 100%;
        }

        ._carrinho section._meuCarrinho {
            transition: .32s;
            left: 100vw;
            height: 100vh;
            width: 100vw;
        }

        ._carrinho section._meuCarrinho._active {
            left: 0;

        }

        section._meuCarrinho ._top ._title ._icon img:last-child {
            display: inline;
        }
    }
</style>


@php
$carrinho = \App\Models\Carrinho::find(session()->get("carrinho"));
@endphp
<section class="_meuCarrinho">
    <div class="_top">
        <div class="_title">
            <div class="_icon">
                <img src="{{ asset('site/img/sistema/car.svg') }}" alt="" />
                <img class="_close" src="{{ asset('site/img/sistema/cancel.svg') }}" alt="" />
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
                <img @if(!$produto->curso->pacote) src="{{ asset($produto->curso->thumbnail) }}" @else src="{{ asset($produto->curso->cursos->first()->thumbnail) }}" @endif alt="" />
            </div>
            <div class="_content">
                {{-- <h3 class="isOnline">Curso Online</h3> --}}
                <h2 class="itemName">{{$produto->curso->nome}}</h2>
                {{-- <p class="itemExtra">Certificado de 10hs</p> --}}
                <div class="itemValue">
                    <strong>R$ <span class="_itemValue">{{number_format($produto->total, 2, ",", ".")}}</span></strong>
                    <div class="_controls">
                        <div class="itemControl cancel" onclick="window.location.href = '{{route('site.carrinho-remover', ['curso' => $produto->curso])}}'">
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

    @if (Route::is('site.carrinho-efetuar') ||Route::is('site.carrinho-confirmacao') || Route::is('site.carrinho.pagamento.cartao') || Route::is('site.carrinho.pagamento.boleto'))
    @else
    <button name="finalizarCompra" onclick="window.location.href = '{{ route('site.carrinho-efetuar') }}'">
        Finalizar compra
    </button>
    @endif
</section>