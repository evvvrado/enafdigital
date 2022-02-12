{{-- HOMOLOGACAO --}}
@if (env('GERENCIANET_ENV') == 'sandbox')
    <script type='text/javascript'>
        var s = document.createElement('script');
        s.type = 'text/javascript';
        var v = parseInt(Math.random() * 1000000);
        s.src = 'https://sandbox.gerencianet.com.br/v1/cdn/8b4bc8b08e06089bf48561b3e34d13a0/' + v;
        s.async = false;
        s.id = '8b4bc8b08e06089bf48561b3e34d13a0';
        if (!document.getElementById('8b4bc8b08e06089bf48561b3e34d13a0')) {
            document.getElementsByTagName('head')[0].appendChild(s);
        };
        $gn = {
            validForm: true,
            processed: false,
            done: {},
            ready: function(fn) {
                $gn.done = fn;
            }
        };
    </script>
@else
    <script type='text/javascript'>
        var s = document.createElement('script');
        s.type = 'text/javascript';
        var v = parseInt(Math.random() * 1000000);
        s.src = 'https://api.gerencianet.com.br/v1/cdn/8b4bc8b08e06089bf48561b3e34d13a0/' + v;
        s.async = false;
        s.id = '8b4bc8b08e06089bf48561b3e34d13a0';
        if (!document.getElementById('8b4bc8b08e06089bf48561b3e34d13a0')) {
            document.getElementsByTagName('head')[0].appendChild(s);
        };
        $gn = {
            validForm: true,
            processed: false,
            done: {},
            ready: function(fn) {
                $gn.done = fn;
            }
        };
    </script>
@endif
