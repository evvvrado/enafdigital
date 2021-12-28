@php
$publicidades = \App\Models\Anuncio::inRandomOrder()->get();
$publicidade = $publicidades->first();
@endphp

@if ($publicidade)

<section class="container-fluid s_publi">
  <div class="container-fav">
    <a target="_blank" rel="noopener" href="{{$publicidade->url}}" title="Conheça {{$publicidade->nome}}" pid="{{$publicidade->id}}">
      <img src="{{ asset($publicidade->imagem_desktop) }}" rel="noopener" data-size="desktop" alt="" />
      <img src="{{ asset($publicidade->imagem_mobile) }}" rel="noopener" data-size="responsive" alt="" />
    </a>
  </div>
</section>

@endif

<script src="{{ asset('site/js/jquery.min.js') }}"></script>
<script src="{{ asset('site/js/jquery-ui.js') }}"></script>
<script>
  $('.s_publi .container-fav a[pid="{{$publicidade->id}}"]').click(function() {
                var pid = $(this).attr("pid");
                var elem = $(this);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "GET",
                    url: "/publicidade/clicar/" + pid,
                    success: function(ret) {
                      // console.log('Sucessso')
                    },
                    error: function(ret) {
                        // console.log("Deu muito ruim");
                        // console.log(ret);
                    }
                });
  }); 
</script>