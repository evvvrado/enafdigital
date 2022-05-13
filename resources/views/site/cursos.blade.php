@include("site.includes.head")
<title>Nossos Cursos </title>


<body id="nossoscursos">

    @include("site.includes.navbar")


    @livewire('institucional.cursos.listar')



    @include("site.includes.parceiros")


    @include('site.includes.destaque')


    @include("site.includes.footer")