{{-- HOMOLOGACAO --}}
@if (env('GERENCIANET_ENV') == 'sandbox')
<script type='text/javascript'>
    var s=document.createElement('script');s.type='text/javascript';var v=parseInt(Math.random()*1000000);s.src='https://sandbox.gerencianet.com.br/v1/cdn/933d5d024d1d7ea82fe1134ef29af003/'+v;s.async=false;s.id='933d5d024d1d7ea82fe1134ef29af003';if(!document.getElementById('933d5d024d1d7ea82fe1134ef29af003')){document.getElementsByTagName('head')[0].appendChild(s);};$gn={validForm:true,processed:false,done:{},ready:function(fn){$gn.done=fn;}};
</script>
@else
<script type='text/javascript'>
    var s=document.createElement('script');s.type='text/javascript';var v=parseInt(Math.random()*1000000);s.src='https://api.gerencianet.com.br/v1/cdn/933d5d024d1d7ea82fe1134ef29af003/'+v;s.async=false;s.id='933d5d024d1d7ea82fe1134ef29af003';if(!document.getElementById('933d5d024d1d7ea82fe1134ef29af003')){document.getElementsByTagName('head')[0].appendChild(s);};$gn={validForm:true,processed:false,done:{},ready:function(fn){$gn.done=fn;}};
</script>
@endif