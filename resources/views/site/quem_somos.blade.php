@include("site.includes.head")
<title>ENAF - Quem somos</title>

<body id="sobre">

  @include("site.includes.navbar")

  @include('site.includes.sobre')

  <section class="container-fluid _video">
    <div class="container-fav">
      <div class="_text">
        <h4>Vídeo</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vulputate facilisis volutpat ultrices eget faucibus. Ultrices euismod gravida eget adipiscing orci.</p>
      </div>
      <div class="_videoFrame">
        <img src="{{ asset('site/img/banner_video.jpg') }}" alt="Video Institucional" />
      </div>
    </div>
  </section>

  <section class="container-fluid s_galeria">
    <div class="container-fav">
      <div class="_title">
        <h4>#SINTAANERGIA</h4>
      </div>

      <div class="_content">
        <div class="_galeriaList">
          <div class="_picture">
            <img src="{{ asset('site/img/galeria_Pic (1') }}).jpg" alt="Foto presente na galeria ENAF" />
          </div>
          <div class="_picture">
            <img src="{{ asset('site/img/galeria_Pic (2') }}).jpg" alt="Foto presente na galeria ENAF" />
          </div>
          <div class="_picture">
            <img src="{{ asset('site/img/galeria_Pic (3') }}).jpg" alt="Foto presente na galeria ENAF" />
          </div>

          <div class="_picture">
            <img src="{{ asset('site/img/galeria_Pic (1') }}).jpg" alt="Foto presente na galeria ENAF" />
          </div>
          <div class="_picture">
            <img src="{{ asset('site/img/galeria_Pic (2') }}).jpg" alt="Foto presente na galeria ENAF" />
          </div>
          <div class="_picture">
            <img src="{{ asset('site/img/galeria_Pic (3') }}).jpg" alt="Foto presente na galeria ENAF" />
          </div>

          <div class="_picture">
            <img src="{{ asset('site/img/galeria_Pic (1') }}).jpg" alt="Foto presente na galeria ENAF" />
          </div>
          <div class="_picture">
            <img src="{{ asset('site/img/galeria_Pic (2') }}).jpg" alt="Foto presente na galeria ENAF" />
          </div>
          <div class="_picture">
            <img src="{{ asset('site/img/galeria_Pic (3') }}).jpg" alt="Foto presente na galeria ENAF" />
          </div>
        </div>
      </div>

      <div class="_menu">
        <strong>GALERIA DE FOTOS</strong>
        <div class="_buttons">
          <div class="_previous _button">
            <img src="{{ asset('site/img/halfarrowleft.svg') }}" alt="Seta indicando a esquerda" />
          </div>

          <div class="_indicator">
            <img class="active" alt="Indicador da lista" />
            <img alt="Indicador da lista" />
            <img alt="Indicador da lista" />
          </div>

          <div class="_next _button">
            <img src="{{ asset('site/img/halfarrowright.svg') }}" alt="Seta indicando a direita" />
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('site.includes.numeros')

  @include('site.includes.blog-noticias')

  @include('site.includes.publicidade')



  @include("site.includes.parceiros")
  @include("site.includes.footer-expanded")