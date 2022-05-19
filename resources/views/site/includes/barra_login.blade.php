<!-- BARRA SUPERIOR DE LOGIN E HEADER-->
@if (!session()->get('aluno'))
    <section class="container-fluid s_welcome">
        <div class="main container-fav">
            <div class="text">
                <span>Seja bem-vindo! Faça <a href="{{ route('site.minha-conta') }}">Login</a> ou
                    <a href="{{ route('site.minha-conta') }}">Cadastre-se</a></span>
            </div>
        </div>
    </section>
@else
    @php
        
        $aluno = App\Models\Aluno::find(session()->get('aluno')['id']);
    @endphp
    <section class="container-fluid s_welcome">
        <div class="main container-fav">
            <div class="text">
                <span>Seja bem-vindo de volta, <strong
                        style="color: #fbff36">{{ explode(' ', $aluno->nome)[0] }}</strong>!
                    <a href="{{ route('site.aluno.deslogar') }}">Sair</a></span>
            </div>
        </div>
    </section>
@endif



<style>
    section.s_welcome {
        display: flex;
        background-color: var(--gray4);
        height: 4rem;
        position: fixed;
        z-index: 665;
        top: 0;
        font-family: "Poppins", sans-serif;
        color: #fff;

        background: #1ac7d6;
    }

    section.s_welcome .main,
    section.s_welcome .welcome_item,
    section.s_welcome .content {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    section.s_welcome .main .text span {
        font-size: 1.4rem;
    }

    section.s_welcome .main .text span a {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--wine3);
    }

    section.s_welcome .content {
        width: 100%;
        max-width: 34rem;
    }

    section.s_welcome .content .phone {
        margin-right: 1rem;
    }

    section.s_welcome .content span {
        font-size: 1.1rem;
        line-height: 125%;
        color: var(--gray6);
    }

    section.s_welcome .content .social {
        gap: 1.7rem;
    }

    section.s_welcome .container-fav {
        max-width: 1560px;
    }

    @media (max-width: 992px) {
        section.s_welcome .text {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        section.s_welcome .content {
            display: none;
        }
    }

    @media only screen and (max-width: 600px) {

        section.s_welcome .main .text span a,
        section.s_welcome .main .text span {
            font-size: 1.5rem;
        }
    }

    /*! CSS Used fontfaces */
    @font-face {
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 500;
        font-display: swap;
        src: url(https://fonts.gstatic.com/s/poppins/v15/pxiByp8kv8JHgFVrLGT9Z11lFc-K.woff2) format('woff2');
        unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
    }

    @font-face {
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 500;
        font-display: swap;
        src: url(https://fonts.gstatic.com/s/poppins/v15/pxiByp8kv8JHgFVrLGT9Z1JlFc-K.woff2) format('woff2');
        unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
    }

    @font-face {
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 500;
        font-display: swap;
        src: url(https://fonts.gstatic.com/s/poppins/v15/pxiByp8kv8JHgFVrLGT9Z1xlFQ.woff2) format('woff2');
        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }

    @font-face {
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 600;
        font-display: swap;
        src: url(https://fonts.gstatic.com/s/poppins/v15/pxiByp8kv8JHgFVrLEj6Z11lFc-K.woff2) format('woff2');
        unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
    }

    @font-face {
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 600;
        font-display: swap;
        src: url(https://fonts.gstatic.com/s/poppins/v15/pxiByp8kv8JHgFVrLEj6Z1JlFc-K.woff2) format('woff2');
        unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
    }

    @font-face {
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 600;
        font-display: swap;
        src: url(https://fonts.gstatic.com/s/poppins/v15/pxiByp8kv8JHgFVrLEj6Z1xlFQ.woff2) format('woff2');
        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }

    @font-face {
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 700;
        font-display: swap;
        src: url(https://fonts.gstatic.com/s/poppins/v15/pxiByp8kv8JHgFVrLCz7Z11lFc-K.woff2) format('woff2');
        unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
    }

    @font-face {
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 700;
        font-display: swap;
        src: url(https://fonts.gstatic.com/s/poppins/v15/pxiByp8kv8JHgFVrLCz7Z1JlFc-K.woff2) format('woff2');
        unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
    }

    @font-face {
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 700;
        font-display: swap;
        src: url(https://fonts.gstatic.com/s/poppins/v15/pxiByp8kv8JHgFVrLCz7Z1xlFQ.woff2) format('woff2');
        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }

</style>
