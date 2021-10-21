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
        <h4>Atendimento</h4>
        <p>Entre em contato conosco. Estamos à disposição para tirar todas as dúvidas a respeito de como funciona a nossa assessoria e programação de eventos. Entraremos em contato imediatamente.</p>



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
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3710.6516434026657!2d-45.44527188505813!3d-21.560472485712726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ca9284e7b2deef%3A0x5c26d9833dafe570!2sR.%20Cel.%20Jos%C3%A9%20Alves%2C%20361%20-%20Vila%20Pinto%2C%20Varginha%20-%20MG%2C%2037010-540!5e0!3m2!1spt-BR!2sbr!4v1633273799905!5m2!1spt-BR!2sbr"
            width="590 " height="283" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <p>Endereço: Av. Raja Gabaglia, 2000 - Sala 805 e PVMT 8 - Bloco 1
          Alpes - Belo Horizonte - MG / 30.494-170</p>
        <p>
          Horário:
          Segunda a Sexta 08:00 - 18:00
        </p>

        <h6>(35) 99725-9528</h6>


        <div class="_buttons">
          <div>
            <img src="{{asset('site/img/sistema/chat.svg')}}" alt="" />
          </div>
          <div>
            <img src="{{asset('site/img/sistema/call.svg')}}" alt="" />
          </div>
          <div>
            <img src="{{asset('site/img/sistema/whatsappButton.svg')}}" alt="" />
          </div>
          <div>
            <img src="{{asset('site/img/sistema/envelopButton.svg')}}" alt="" />
          </div>
        </div>
      </div>
    </div>
  </section>



  @include("site.includes.parceiros")
  @include("site.includes.footer")