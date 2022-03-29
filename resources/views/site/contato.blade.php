@include("site.includes.head")
<title>Fale conosco!</title>


<body id="contato">

  @include("site.includes.navbar")


  <section class="container-fluid s_atendimento">
    <div class="container-fav">

      {{-- <div class="_filter">
        <nav>
          <div class="_filterItem active">Contato</div>
          <div class="_filterItem ">Imprensa</div>
        </nav>
      </div> --}}

    </div>

    <div class="container-fav">
      <div class="_col">
        <h4>Contato:</h4>
        <p>Nosso suporte online é um canal de comunicação para que você possa entrar em contato conosco. Estamos à disposição para tirar todas as dúvidas a respeito de como funciona a nossa assessoria
          e programação de eventos. Deixe sua mensagem abaixo.</p>



        <section class=" s_send">
          <div class="container-fav">

            <main>
              <div class="title">ENVIE SUA MENSAGEM</div>

              <form action="/">

                <label>
                  <input type="text" placeholder="Nome" />
                </label>
                <label>
                  <input type="e-mail" placeholder="E-mail" />
                </label>
                <label>
                  <input type="tel" placeholder="Telefone" />
                </label>

                <textarea placeholder="Mensagem"></textarea>

                <button>Enviar</button>

              </form>

          </div>
          </main>
        </section>

      </div>

      <div class="_col">
        <div class="_pic">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3750.3012805171807!2d-43.96197338509894!3d-19.953828086590324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa697777a2018f7%3A0x4ae6ff1a84e0326c!2sAv.%20Raja%20Gab%C3%A1glia%2C%202000%20-%20Estoril%2C%20Belo%20Horizonte%20-%20MG%2C%2030494-170!5e0!3m2!1spt-BR!2sbr!4v1640697705920!5m2!1spt-BR!2sbr"
            width="590 " height="283" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <p>Endereço: Av. Raja Gabaglia, 2000 - Sala 805E e PVMT 08 - Bloco 1
          Alpes - Belo Horizonte - MG / 30.494-170</p>
        <p>
          Horário:
          Segunda a Sexta 08:00 - 18:00
        </p>

        <h6>(35) 99725-9528</h6>


        <div class="_buttons">

          <div style="cursor: pointer" onclick="window.open('https://api.whatsapp.com/send?phone=3599725-9528')">
            <img src="{{ asset('site/img/sistema/chat.svg') }}" alt="" />
          </div>
          <div style="cursor: pointer" onclick="window.open('tel:(35) 99725-9528')">
            <img src="{{ asset('site/img/sistema/call.svg') }}" alt="" />
          </div>
          <div style="cursor: pointer" onclick="window.open('https://api.whatsapp.com/send?phone=3599725-9528')">
            <img src="{{ asset('site/img/sistema/whatsappButton.svg') }}" alt="" />
          </div>
          <div style="cursor: pointer" onclick="window.open('mailto:contato@enaf.com.br')">
            <img src="{{ asset('site/img/sistema/envelopButton.svg') }}" alt="" />
          </div>
        </div>
      </div>
    </div>
  </section>



  @include("site.includes.parceiros")
  @include("site.includes.footer")