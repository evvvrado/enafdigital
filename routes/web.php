<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/testes', [\App\Http\Controllers\CieloController::class, 'capturar']);

// Route::get('/', [\App\Http\Controllers\SiteController::class, 'aguarde'])->name("site.index");

Route::get('/', [\App\Http\Controllers\SiteController::class, 'index'])->name("site.index");

Route::post('/precadastro/salvar', [\App\Http\Controllers\PrecadastroController::class, 'salvar'])->name("site.precadastro.salvar");

// Route::middleware(['redirecionainicio'])->group(function () {
    Route::get('/quem-somos', [\App\Http\Controllers\SiteController::class, 'quem_somos'])->name("site.quem_somos");
    // Route::get('/curso/{slug}', [\App\Http\Controllers\SiteController::class, 'curso'])->name("site.curso");
    // Route::get('/curso/{slug}/instrutores', [\App\Http\Controllers\SiteController::class, 'instrutores'])->name("site.curso.instrutores");
    // Route::get('/curso/{slug}/local', [\App\Http\Controllers\SiteController::class, 'local'])->name("site.curso.local");
    // Route::get('/curso/{slug}/programacao', [\App\Http\Controllers\SiteController::class, 'programacao'])->name("site.curso.programacao");
    Route::get('/sejamembro', [\App\Http\Controllers\SiteController::class, 'aguarde'])->name("site.aguarde");
    Route::post('/contato/salvar', [\App\Http\Controllers\MensagemController::class, 'salvar'])->name("site.contato.salvar");



    Route::get('/duvidas', [\App\Http\Controllers\SiteController::class, 'duvidas'])->name("site.duvidas");



    // ENAF ~

    Route::get('/feira', [\App\Http\Controllers\SiteController::class, 'feira'])->name("site.feira");
    Route::get('/feira/empresas', [\App\Http\Controllers\SiteController::class, 'feiraEmpresas'])->name("site.feiraEmpresas");
    Route::get('/feira/catalogo', [\App\Http\Controllers\SiteController::class, 'feiraCatalogo'])->name("site.catalogo");

    Route::get('/professores', [\App\Http\Controllers\SiteController::class, 'professores'])->name("site.professores");
    Route::get('/clinicas', [\App\Http\Controllers\SiteController::class, 'clinicas'])->name("site.clinicas");
    Route::get('/clinicas/clinica/{slug}', [\App\Http\Controllers\SiteController::class, 'clinica'])->name("site.clinica");
    Route::get('/eventos', [\App\Http\Controllers\SiteController::class, 'eventos'])->name("site.eventos");
    Route::get('/eventos/evento/{slug}', [\App\Http\Controllers\SiteController::class, 'evento'])->name("site.evento");
    Route::get('/cursos', [\App\Http\Controllers\SiteController::class, 'cursos'])->name("site.cursos");
    Route::get('/cursos/curso/{slug}', [\App\Http\Controllers\SiteController::class, 'curso'])->name("site.curso");
    Route::get('/contato', [\App\Http\Controllers\SiteController::class, 'contato'])->name("site.contato");

    Route::get('/blog/lista', [\App\Http\Controllers\SiteController::class, 'blogLista'])->name("site.blog-lista");
    Route::get('/blog/', [\App\Http\Controllers\SiteController::class, 'blogGrid'])->name("site.blog-grid");
    Route::get('/artigos/', [\App\Http\Controllers\SiteController::class, 'artigoGrid'])->name("site.artigo-grid");
    Route::get('/blog/blog', [\App\Http\Controllers\SiteController::class, 'blogPost'])->name("site.blog");
    
    Route::get('/treinador', [\App\Http\Controllers\TreinadorController::class, 'treinador'])->name("site.treinador");
    Route::get('/hotsite', [\App\Http\Controllers\SiteController::class, 'hotsite'])->name("site.hotsite");



    // ENAF~ 

    // Route::get('/cadastro', [\App\Http\Controllers\SiteController::class, 'cadastro'])->name("site.cadastro");
    // Route::get('/login', [\App\Http\Controllers\SiteController::class, 'login'])->name("site.login");
    Route::get('/associe-se', [\App\Http\Controllers\SiteController::class, 'associese'])->name("site.associe-se");
    Route::get('/diretoria', [\App\Http\Controllers\SiteController::class, 'diretoria'])->name("site.diretoria");
    Route::get('/experiencia', [\App\Http\Controllers\SiteController::class, 'experiencia'])->name("site.experiencia");
    Route::get('/galerias', [\App\Http\Controllers\SiteController::class, 'galerias'])->name("site.galerias");
    Route::get('/imprensa', [\App\Http\Controllers\SiteController::class, 'imprensa'])->name("site.imprensa");
    Route::get('/estaduais', [\App\Http\Controllers\SiteController::class, 'estaduais'])->name("site.estaduais");
    Route::get('/estaduais/{slug}', [\App\Http\Controllers\SiteController::class, 'estaduais_filtro'])->name("site.estaduais.filtro");
    Route::get('/estadual/{slug}', [\App\Http\Controllers\SiteController::class, 'estadual'])->name("site.estadual");
    Route::get('/sommelier', [\App\Http\Controllers\SiteController::class, 'sommelier'])->name("site.sommelier");
    Route::get('/noticias/{slug?}', [\App\Http\Controllers\SiteController::class, 'noticias'])->name("site.noticias");
    Route::get('/noticia/{categoria}/{noticia}', [\App\Http\Controllers\SiteController::class, 'noticia'])->name("site.noticia");
    Route::get('/artigo/{categoria}/{noticia}', [\App\Http\Controllers\SiteController::class, 'noticia'])->name("site.artigo");
    Route::get('/recuperar-senha', [\App\Http\Controllers\SiteController::class, 'recuperar_senha'])->name("site.recuperar-senha");

    //ROTAS DE CARRINHO
    Route::get('/carrinho/adicionar/{curso}', [\App\Http\Controllers\CarrinhoController::class, 'adicionar'])->name("site.carrinho-adicionar");
    Route::get('/carrinho/remover/{curso}', [\App\Http\Controllers\CarrinhoController::class, 'remover'])->name("site.carrinho-remover");
    Route::get('/carrinho/pagamento/cartao', [\App\Http\Controllers\CarrinhoController::class, 'pagamento_cartao'])->name("site.carrinho.pagamento.cartao");
    Route::get('/carrinho/pagamento/boleto', [\App\Http\Controllers\CarrinhoController::class, 'pagamento_boleto'])->name("site.carrinho.pagamento.boleto");
    Route::get('/carrinho/identificacao', [\App\Http\Controllers\CarrinhoController::class, 'identificacao'])->name("site.carrinho-identificacao");
    Route::post('/carrinho/identificar', [\App\Http\Controllers\CarrinhoController::class, 'identificar'])->name("site.carrinho-identificar");
    Route::get('/carrinho/confirmacao', [\App\Http\Controllers\CarrinhoController::class, 'confirmacao'])->name("site.carrinho-confirmacao");
    Route::get('/carrinho/efetuar', [\App\Http\Controllers\CarrinhoController::class, 'efetuar'])->name("site.carrinho-efetuar");
    Route::post('/carrinho/finalizar/boleto', [\App\Http\Controllers\CarrinhoController::class, 'finalizar_boleto'])->name("site.carrinho.finalizar.boleto");
    Route::post('/carrinho/finalizar/credito/cielo', [\App\Http\Controllers\CieloController::class, 'finalizar_credito'])->name("site.carrinho.finalizar.credito.cielo");

    // ROTAS GERENCIANET
    Route::get('/carrinho/finalizar/boleto/gerencianet/{parcelas}', [\App\Http\Controllers\GerencianetController::class, 'boleto'])->name("site.carrinho.finalizar.boleto.gerencianet");


    // ROTA TEMPORARIA
    Route::get('/aluno/login', [\App\Http\Controllers\SiteController::class, 'minhaConta'])->name("site.minha-conta");


    Route::post('/aluno/cadastrar', [\App\Http\Controllers\AlunosController::class, 'cadastrar'])->name("site.aluno.cadastrar");
    Route::post('/aluno/logar', [\App\Http\Controllers\AlunosController::class, 'logar'])->name("site.aluno.logar");
    Route::get('/aluno/deslogar', [\App\Http\Controllers\AlunosController::class, 'deslogar'])->name("site.aluno.deslogar");
    
    Route::middleware(['aluno'])->group(function () {
        //ROTAS DE MINHA ÁREA
        Route::get('/minha-area', [\App\Http\Controllers\SiteController::class, 'minhaArea'])->name("site.minha-area");
        Route::get('/minha-area/compras', [\App\Http\Controllers\SiteController::class, 'minhaAreaCompras'])->name("site.minha-area-compras");
        Route::get('/minha-area/compras/{venda}/detalhes', [\App\Http\Controllers\SiteController::class, 'minhaAreaDetalhes'])->name("site.minha-area-detalhes");
        Route::get('/minha-area/dados', [\App\Http\Controllers\SiteController::class, 'minhaAreaDados'])->name("site.minha-area-dados");
        Route::post('/minha-area/dados/salvar', [\App\Http\Controllers\SiteController::class, 'minhaAreaDadosSalvar'])->name("site.minha-area-dados.salvar");
        Route::post('/minha-area/dados/avatar/alterar', [\App\Http\Controllers\SiteController::class, 'minhaAreaDadosAvatarAlterar'])->name("site.minha-area-dados.avatar.alterar");
        Route::post('/minha-area/dados/senha/alterar', [\App\Http\Controllers\SiteController::class, 'minhaAreaDadosSenhaAlterar'])->name("site.minha-area-dados.senha.alterar");
        Route::get('/minha-area/matriculas', [\App\Http\Controllers\SiteController::class, 'minhaAreaMatricula'])->name("site.minha-area-matricula");
        Route::get('/minha-area/matricula/{matricula}/conteudo', [\App\Http\Controllers\SiteController::class, 'minhaAreaMatriculaConteudo'])->name("site.minha-area-matricula.conteudo");
    });

    Route::get('/links/{slug}', [\App\Http\Controllers\AppController::class, 'index'])->name("site.app");
    Route::post('/api/click', [\App\Http\Controllers\AppController::class, 'click'])->name("site.app.click");

    Route::get('/sistema/login', [\App\Http\Controllers\PainelController::class, 'login'])->name("painel.login");
    Route::post('/sistema/logar', [\App\Http\Controllers\PainelController::class, 'logar'])->name("painel.logar");



    Route::post('/gerencianet/notificacao', [\App\Http\Controllers\GerencianetController::class, 'notificacao'])->name("gerencianet.notificacao")->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);;

    Route::middleware(['admin'])->group(function () {
        
        Route::get('/sistema', [\App\Http\Controllers\PainelController::class, 'index'])->name("painel.index");
        Route::get('/sistema/indisponivel', [\App\Http\Controllers\PainelController::class, 'indisponivel'])->name("painel.indisponivel");
        Route::get('/sistema/sair', [\App\Http\Controllers\PainelController::class, 'sair'])->name("painel.sair");
        Route::get('/sistema/leads', [\App\Http\Controllers\PainelController::class, 'leads'])->name("painel.leads");

        // ROTAS DE USUÁRIOS
        Route::get('/sistema/usuarios', [\App\Http\Controllers\UsuariosController::class, 'consultar'])->name("painel.usuarios");
        Route::get('/sistema/usuarios/inativos', [\App\Http\Controllers\UsuariosController::class, 'consultar_inativos'])->name("painel.usuarios.inativos");
        Route::get('/sistema/usuarios/ativos', [\App\Http\Controllers\UsuariosController::class, 'consultar_ativos'])->name("painel.usuarios.ativos");
        Route::get('/sistema/usuarios/cadastro', [\App\Http\Controllers\UsuariosController::class, 'cadastro'])->name("painel.usuario.cadastro");
        Route::post('/sistema/usuarios/cadastrar', [\App\Http\Controllers\UsuariosController::class, 'cadastrar'])->name("painel.usuario.cadastrar");
        Route::get('/sistema/usuarios/editar/{usuario}', [\App\Http\Controllers\UsuariosController::class, 'editar'])->name("painel.usuario.editar");
        Route::post('/sistema/usuarios/salvar/{usuario}', [\App\Http\Controllers\UsuariosController::class, 'salvar'])->name("painel.usuario.salvar");
        Route::get('/sistema/usuarios/bloqueio/{usuario}', [\App\Http\Controllers\UsuariosController::class, 'bloqueio'])->name("painel.usuario.bloqueio");

        //ROTAS DE ESTADUAIS
        Route::get('/sistema/estaduais', [\App\Http\Controllers\EstaduaisController::class, 'consultar'])->name("painel.estaduais");
        Route::get('/sistema/estaduais/cadastro', [\App\Http\Controllers\EstaduaisController::class, 'cadastro'])->name("painel.estadual.cadastro");
        Route::post('/sistema/estaduais/cadastrar', [\App\Http\Controllers\EstaduaisController::class, 'cadastrar'])->name("painel.estadual.cadastrar");
        Route::get('/sistema/estaduais/editar/{estadual}', [\App\Http\Controllers\EstaduaisController::class, 'editar'])->name("painel.estadual.editar");
        Route::post('/sistema/estaduais/salvar/{estadual}', [\App\Http\Controllers\EstaduaisController::class, 'salvar'])->name("painel.estadual.salvar");
        Route::get('/sistema/estaduais/deletar/{estadual}', [\App\Http\Controllers\EstaduaisController::class, 'deletar'])->name("painel.estadual.deletar");

        // ROTAS DE DIRETORIAS
        Route::get('/sistema/{estadual}/diretorias', [\App\Http\Controllers\DiretoriasController::class, 'consultar'])->name("painel.diretorias");
        Route::post('/sistema/diretorias/cadastrar', [\App\Http\Controllers\DiretoriasController::class, 'cadastrar'])->name("painel.diretoria.cadastrar");
        Route::post('/sistema/diretorias/salvar/{diretoria}', [\App\Http\Controllers\DiretoriasController::class, 'salvar'])->name("painel.diretoria.salvar");
        Route::get('/sistema/diretorias/deletar/{diretoria}', [\App\Http\Controllers\DiretoriasController::class, 'deletar'])->name("painel.diretoria.deletar");

        // ROTAS DE TAGS
        Route::get('/sistema/tags', [\App\Http\Controllers\TagsController::class, 'consultar'])->name("painel.tags");
        Route::post('/sistema/tags/cadastrar', [\App\Http\Controllers\TagsController::class, 'cadastrar'])->name("painel.tag.cadastrar");
        Route::post('/sistema/tags/salvar/{tag}', [\App\Http\Controllers\TagsController::class, 'salvar'])->name("painel.tag.salvar");
        Route::get('/sistema/tags/deletar/{tag}', [\App\Http\Controllers\TagsController::class, 'deletar'])->name("painel.tag.deletar");

        // ROTAS DE HASHTAGS
        Route::get('/sistema/hashtags', [\App\Http\Controllers\HashtagsController::class, 'consultar'])->name("painel.hashtags");
        Route::post('/sistema/hashtags/cadastrar', [\App\Http\Controllers\HashtagsController::class, 'cadastrar'])->name("painel.hashtag.cadastrar");
        Route::post('/sistema/hashtags/salvar/{hashtag}', [\App\Http\Controllers\HashtagsController::class, 'salvar'])->name("painel.hashtag.salvar");
        Route::get('/sistema/hashtags/deletar/{hashtag}', [\App\Http\Controllers\HashtagsController::class, 'deletar'])->name("painel.hashtag.deletar");

        // ROTAS DE CATEGORIAS
        Route::get('/sistema/categorias', [\App\Http\Controllers\CategoriasController::class, 'consultar'])->name("painel.categorias");
        Route::post('/sistema/categorias/salvar/{categoria}', [\App\Http\Controllers\CategoriasController::class, 'salvar'])->name("painel.categoria.salvar");
        Route::get('/sistema/categorias/deletar/{categoria}', [\App\Http\Controllers\CategoriasController::class, 'deletar'])->name("painel.categoria.deletar");

        Route::get('/sistema/categorias/cadastrar', [\App\Http\Controllers\CategoriasController::class, 'cadastrar'])->name("painel.categorias.cadastro");
        Route::get('/sistema/categorias/editar', [\App\Http\Controllers\CategoriasController::class, 'editar'])->name("painel.categorias.editar");

        // ROTAS DE EXPOSITORES
        Route::match(['get', 'post'], '/sistema/expositores', [\App\Http\Controllers\ExpositoresController::class, 'consultar'])->name("painel.expositores");
        Route::get('/sistema/expositores/hotsite', [\App\Http\Controllers\ExpositoresController::class, 'hotsite'])->name("painel.expositores.hotsite");
        Route::get('/sistema/expositores/cadastro', [\App\Http\Controllers\ExpositoresController::class, 'cadastrar'])->name("painel.expositores.cadastro");
        Route::get('/sistema/expositores/editar/{expositor}', [\App\Http\Controllers\ExpositoresController::class, 'editar'])->name("painel.expositores.editar");
        Route::post('/sistema/expositores/salvar', [\App\Http\Controllers\ExpositoresController::class, 'salvar'])->name("painel.expositores.salvar");    

        // ROTA DE PUBLICIDADE
        Route::get('/sistema/anuncios', [\App\Http\Controllers\PublicidadeController::class, 'consultarAnuncios'])->name("painel.anuncios");
        Route::get('/sistema/anuncios/cadastro', [\App\Http\Controllers\PublicidadeController::class, 'cadastrarAnuncios'])->name("painel.anuncios.cadastro");
        Route::get('/sistema/anuncios/editar', [\App\Http\Controllers\PublicidadeController::class, 'editarAnuncios'])->name("painel.anuncios.editar");

        
        Route::get('/sistema/patrocinadores', [\App\Http\Controllers\PublicidadeController::class, 'consultarPatrocinadores'])->name("painel.patrocinadores");
        Route::get('/sistema/patrocinadores/cadastro', [\App\Http\Controllers\PublicidadeController::class, 'cadastrarPatrocinadores'])->name("painel.patrocinadores.cadastro");
        Route::get('/sistema/patrocinadores/editar', [\App\Http\Controllers\PublicidadeController::class, 'editarPatrocinadores'])->name("painel.patrocinadores.editar");

        
        Route::get('/sistema/apoio', [\App\Http\Controllers\PublicidadeController::class, 'consultarApoio'])->name("painel.apoio");
        Route::get('/sistema/apoio/cadastro', [\App\Http\Controllers\PublicidadeController::class, 'cadastrarApoio'])->name("painel.apoio.cadastro");
        Route::get('/sistema/apoio/editar', [\App\Http\Controllers\PublicidadeController::class, 'editarApoio'])->name("painel.apoio.editar");

        // ROTA DE INSTITUCIONAL
        Route::get('/sistema/galeria', [\App\Http\Controllers\GaleriaController::class, 'consultar'])->name("painel.galeria");
        
        
        Route::get('/sistema/depoimento', [\App\Http\Controllers\DepoimentoController::class, 'consultar'])->name("painel.depoimento");
        Route::get('/sistema/depoimento/cadastro', [\App\Http\Controllers\DepoimentoController::class, 'cadastrar'])->name("painel.depoimento.cadastro");
        Route::get('/sistema/depoimento/editar', [\App\Http\Controllers\DepoimentoController::class, 'editar'])->name("painel.depoimento.editar");

        
        
        Route::get('/sistema/duvidas', [\App\Http\Controllers\DuvidasController::class, 'consultar'])->name("painel.duvidas");
        Route::get('/sistema/duvidas/cadastro', [\App\Http\Controllers\DuvidasController::class, 'cadastrar'])->name("painel.duvidas.cadastro");
        Route::get('/sistema/duvidas/editar', [\App\Http\Controllers\DuvidasController::class, 'editar'])->name("painel.duvidas.editar");
        

        // ROTAS DE NOTÍCIAS
        Route::get('/sistema/artigos', [\App\Http\Controllers\ArtigosController::class, 'consultar'])->name("painel.artigos");
        Route::get('/sistema/artigos/cadastro', [\App\Http\Controllers\ArtigosController::class, 'cadastro'])->name("painel.artigo.cadastro");
        Route::get('/sistema/artigos/leads/{artigo}', [\App\Http\Controllers\ArtigosController::class, 'visitas'])->name("painel.artigo.visitas");
        Route::post('/sistema/artigos/cadastrar', [\App\Http\Controllers\ArtigosController::class, 'cadastrar'])->name("painel.artigo.cadastrar");
        Route::get('/sistema/artigos/editar/{artigo}', [\App\Http\Controllers\ArtigosController::class, 'editar'])->name("painel.artigo.editar");
        Route::post('/sistema/artigos/salvar/{artigo}', [\App\Http\Controllers\ArtigosController::class, 'salvar'])->name("painel.artigo.salvar");
        Route::get('/sistema/artigos/deletar/{artigo}', [\App\Http\Controllers\ArtigosController::class, 'deletar'])->name("painel.artigo.deletar");
        Route::get('/sistema/artigos/publicar/{artigo}', [\App\Http\Controllers\ArtigosController::class, 'publicar'])->name("painel.artigo.publicar");
        Route::get('/sistema/artigos/preview/{artigo}', [\App\Http\Controllers\ArtigosController::class, 'preview'])->name("painel.artigo.preview");

        // ROTAS DE NOTICIAS
        Route::match(['get','post'], '/sistema/noticias', [\App\Http\Controllers\NoticiasController::class, 'consultar'])->name("painel.noticias");
        Route::get('/sistema/noticias/cadastro', [\App\Http\Controllers\NoticiasController::class, 'cadastro'])->name("painel.noticia.cadastro");
        Route::get('/sistema/noticias/leads/{noticia}', [\App\Http\Controllers\NoticiasController::class, 'visitas'])->name("painel.noticia.visitas");
        Route::post('/sistema/noticias/cadastrar', [\App\Http\Controllers\NoticiasController::class, 'cadastrar'])->name("painel.noticia.cadastrar");
        Route::get('/sistema/noticias/editar/{noticia}', [\App\Http\Controllers\NoticiasController::class, 'editar'])->name("painel.noticia.editar");
        Route::post('/sistema/noticias/salvar/{noticia}', [\App\Http\Controllers\NoticiasController::class, 'salvar'])->name("painel.noticia.salvar");
        Route::get('/sistema/noticias/deletar/{noticia}', [\App\Http\Controllers\NoticiasController::class, 'deletar'])->name("painel.noticia.deletar");
        Route::get('/sistema/noticias/publicar/{noticia}', [\App\Http\Controllers\NoticiasController::class, 'publicar'])->name("painel.noticia.publicar");
        Route::get('/sistema/noticias/preview/{noticia}', [\App\Http\Controllers\NoticiasController::class, 'preview'])->name("painel.noticia.preview");

        // ROTAS DE ARTIGOS
        
        Route::match(['get','post'], '/sistema/artigos', [\App\Http\Controllers\ArtigosController::class, 'consultar'])->name("painel.artigos");
        Route::get('/sistema/artigos/cadastro', [\App\Http\Controllers\ArtigosController::class, 'cadastro'])->name("painel.artigo.cadastro");
        Route::post('/sistema/artigos/cadastrar', [\App\Http\Controllers\ArtigosController::class, 'cadastrar'])->name("painel.artigo.cadastrar");
        Route::get('/sistema/artigos/editar/{noticia}', [\App\Http\Controllers\ArtigosController::class, 'editar'])->name("painel.artigo.editar");
        Route::get('/sistema/artigos/deletar/{noticia}', [\App\Http\Controllers\ArtigosController::class, 'deletar'])->name("painel.artigo.deletar");


        // ROTAS DE PROFESSORES
        Route::match(['get', 'post'], '/sistema/professores', [\App\Http\Controllers\ProfessoresController::class, 'consultar'])->name("painel.professores");
        Route::get('/sistema/professores/cadastrar', [\App\Http\Controllers\ProfessoresController::class, 'cadastrar'])->name("painel.professores.cadastrar");
        Route::get('/sistema/professores/editar/{professor}', [\App\Http\Controllers\ProfessoresController::class, 'editar'])->name("painel.professores.editar");
        Route::get('/sistema/professores/deletar/{professor}', [\App\Http\Controllers\ProfessoresController::class, 'deletar'])->name("painel.professores.deletar");
        Route::post('/sistema/professores/salvar', [\App\Http\Controllers\ProfessoresController::class, 'salvar'])->name("painel.professores.salvar");
        Route::get('/sistema/professores/hotsite', [\App\Http\Controllers\ProfessoresController::class, 'hotsite'])->name("painel.professores.hotsite");
        
        // ROTAS DE MENSAGENS
        Route::get('/sistema/mensagens', [\App\Http\Controllers\MensagemController::class, 'consultar'])->name("painel.mensagens");
        Route::get('/sistema/mensagens/exportar', [\App\Http\Controllers\MensagemController::class, 'exportar'])->name("painel.mensagens.exportar");

        //ROTAS DE CONFIGURAÇÕES
        Route::get('/sistema/configuracoes/contato', [\App\Http\Controllers\ConfiguracoesController::class, 'contato'])->name("painel.configuracoes.contato");
        Route::post('/sistema/configuracoes/contato/salvar', [\App\Http\Controllers\ConfiguracoesController::class, 'contato_salvar'])->name("painel.configuracoes.contato.salvar");
        Route::get('/sistema/configuracoes/seo', [\App\Http\Controllers\ConfiguracoesController::class, 'seo'])->name("painel.configuracoes.seo");
        Route::post('/sistema/configuracoes/seo/salvar/{pagina}', [\App\Http\Controllers\ConfiguracoesController::class, 'seo_salvar'])->name("painel.configuracoes.seo.salvar");
        Route::get('/sistema/configuracoes/meios-pagamento', [\App\Http\Controllers\ConfiguracoesController::class, 'meios_pagamento'])->name("painel.configuracoes.meios-pagamento");
        Route::post('/sistema/configuracoes/meios-pagamento/salvar', [\App\Http\Controllers\ConfiguracoesController::class, 'meios_pagamento_salvar'])->name("painel.configuracoes.meios-pagamento.salvar");
        
        // ROTAS DE CURSOS
        Route::get('/sistema/cursos/api/getCurso/{curso}', [\App\Http\Controllers\CursosController::class, 'getCurso']);
        Route::match(['get', 'post'],'/sistema/cursos', [\App\Http\Controllers\CursosController::class, 'consultar'])->name("painel.cursos");
        Route::get('/sistema/curso/ativo/{curso}', [\App\Http\Controllers\CursosController::class, 'ativo'])->name("painel.curso.ativo");
        Route::get('/sistema/cursos/cadastrar', [\App\Http\Controllers\CursosController::class, 'cadastrar'])->name("painel.cursos.cadastrar");
        Route::post('/sistema/cursos/salvar', [\App\Http\Controllers\CursosController::class, 'salvar'])->name("painel.cursos.salvar");
        Route::get('/sistema/cursos/editar/{curso}', [\App\Http\Controllers\CursosController::class, 'editar'])->name("painel.cursos.editar");
        Route::post('/sistema/cursos/{curso}/modulo/salvar', [\App\Http\Controllers\ModulosController::class, 'salvar'])->name("painel.cursos.modulo.salvar");
        Route::get('/sistema/cursos/modulo/deletar/{modulo}', [\App\Http\Controllers\ModulosController::class, 'deletar'])->name("painel.cursos.modulo.deletar");
        Route::post('/sistema/cursos/{curso}/depoimento/salvar', [\App\Http\Controllers\CursoDepoimentosController::class, 'salvar'])->name("painel.cursos.depoimento.salvar");
        Route::get('/sistema/cursos/depoimento/deletar/{depoimento}', [\App\Http\Controllers\CursoDepoimentosController::class, 'deletar'])->name("painel.cursos.depoimento.deletar");
        
        // ROTAS DE CLÍNICAS
        Route::match(['get', 'post'], '/sistema/clinicas', [\App\Http\Controllers\ClinicaController::class, 'consultar'])->name("painel.clinicas");
        Route::get('/sistema/clinicas/cadastrar', [\App\Http\Controllers\ClinicaController::class, 'cadastrar'])->name("painel.clinicas.cadastrar");
        Route::get('/sistema/clinicas/editar/{evento}', [\App\Http\Controllers\ClinicaController::class, 'editar'])->name("painel.clinicas.editar");
        Route::post('/sistema/clinicas/salvar', [\App\Http\Controllers\ClinicaController::class, 'salvar'])->name("painel.clinicas.salvar");
        Route::post('/sistema/clinicas/{evento}/local/salvar', [\App\Http\Controllers\ClinicaController::class, 'salvar_local'])->name("painel.clinicas.local.salvar");
        Route::post('/sistema/clinicas/{evento}/curso/adicionar', [\App\Http\Controllers\ClinicaController::class, 'adicionar_curso'])->name("painel.clinicas.curso.adicionar");
        Route::get('/sistema/clinicas/curso/deletar/{evento_curso}', [\App\Http\Controllers\ClinicaController::class, 'deletar_curso'])->name("painel.clinicas.curso.deletar");
        Route::post('/sistema/clinicas/{evento}/participante/adicionar', [\App\Http\Controllers\ClinicaController::class, 'adicionar_participante'])->name("painel.clinicas.participante.adicionar");
        Route::get('/sistema/clinicas/participante/deletar/{participante}', [\App\Http\Controllers\ClinicaController::class, 'deletar_participante'])->name("painel.clinicas.participante.deletar");
        Route::post('/sistema/clinicas/{evento}/hotel/adicionar', [\App\Http\Controllers\ClinicaController::class, 'adicionar_hotel'])->name("painel.clinicas.hotel.adicionar");
        Route::get('/sistema/clinicas/hotel/deletar/{hotel}', [\App\Http\Controllers\ClinicaController::class, 'deletar_hotel'])->name("painel.clinicas.hotel.deletar");
        Route::post('/sistema/clinicas/{evento}/pacote/adicionar', [\App\Http\Controllers\ClinicaController::class, 'adicionar_pacote'])->name("painel.clinicas.pacote.adicionar");        
        Route::get('/sistema/clinicas/pacote/deletar/{pacote}', [\App\Http\Controllers\ClinicaController::class, 'deletar_pacote'])->name("painel.clinicas.pacote.deletar");

        // ROTAS DE EVENTOS
        Route::match(['get', 'post'], '/sistema/eventos', [\App\Http\Controllers\EventoController::class, 'consultar'])->name("painel.eventos");
        Route::get('/sistema/eventos/cadastrar', [\App\Http\Controllers\EventoController::class, 'cadastrar'])->name("painel.eventos.cadastrar");
        Route::get('/sistema/eventos/editar/{evento}', [\App\Http\Controllers\EventoController::class, 'editar'])->name("painel.eventos.editar");
        Route::post('/sistema/eventos/salvar', [\App\Http\Controllers\EventoController::class, 'salvar'])->name("painel.eventos.salvar");
        Route::post('/sistema/eventos/{evento}/local/salvar', [\App\Http\Controllers\EventoController::class, 'salvar_local'])->name("painel.eventos.local.salvar");
        Route::post('/sistema/eventos/{evento}/curso/adicionar', [\App\Http\Controllers\EventoController::class, 'adicionar_curso'])->name("painel.eventos.curso.adicionar");
        Route::get('/sistema/eventos/curso/deletar/{evento_curso}', [\App\Http\Controllers\EventoController::class, 'deletar_curso'])->name("painel.eventos.curso.deletar");
        Route::post('/sistema/eventos/{evento}/participante/adicionar', [\App\Http\Controllers\EventoController::class, 'adicionar_participante'])->name("painel.eventos.participante.adicionar");
        Route::get('/sistema/eventos/participante/deletar/{participante}', [\App\Http\Controllers\EventoController::class, 'deletar_participante'])->name("painel.eventos.participante.deletar");
        Route::post('/sistema/eventos/{evento}/hotel/adicionar', [\App\Http\Controllers\EventoController::class, 'adicionar_hotel'])->name("painel.eventos.hotel.adicionar");
        Route::get('/sistema/eventos/hotel/deletar/{hotel}', [\App\Http\Controllers\EventoController::class, 'deletar_hotel'])->name("painel.eventos.hotel.deletar");
        Route::post('/sistema/eventos/{evento}/pacote/adicionar', [\App\Http\Controllers\EventoController::class, 'adicionar_pacote'])->name("painel.eventos.pacote.adicionar");
        Route::get('/sistema/eventos/pacote/deletar/{pacote}', [\App\Http\Controllers\EventoController::class, 'deletar_pacote'])->name("painel.eventos.pacote.deletar");

        // ROTAS DE CATALOGO  
        Route::get('/sistema/catalogo/cadastrar', [\App\Http\Controllers\CatalogoController::class, 'cadastrar'])->name("painel.catalogo.cadastro");

        //ROTAS DE VENDAS
        Route::get('/sistema/vendas', [\App\Http\Controllers\PagamentosController::class, 'vendas'])->name("painel.vendas");
        
        //ROTAS DE CONFIGURAÇÕES
        Route::get('/sistema/informacoes/municipios', [\App\Http\Controllers\InformacoesController::class, 'municipios'])->name("painel.informacoes.municipios");


        //ROTAS DE MAPA
        Route::get('/sistema/mapa', [\App\Http\Controllers\PagamentosController::class, 'mapa'])->name("painel.mapa");
        
        //ROTAS DE ALUNOS
        Route::get('/sistema/alunos', [\App\Http\Controllers\AlunosController::class, 'consultar'])->name("painel.alunos");

        // ROTAS DE DESTAQUES
        Route::get('/sistema/destaques', [\App\Http\Controllers\DestaquesController::class, 'index'])->name("painel.destaques");
        Route::post('/sistema/destaques/cadastrar', [\App\Http\Controllers\DestaquesController::class, 'cadastrar'])->name("painel.destaque.cadastrar");
        Route::post('/sistema/destaques/salvar/{destaque}', [\App\Http\Controllers\DestaquesController::class, 'salvar'])->name("painel.destaque.salvar");
        Route::get('/sistema/destaques/deletar/{destaque}', [\App\Http\Controllers\DestaquesController::class, 'deletar'])->name("painel.destaque.deletar");

        
        
        Route::get('/teste', function(){
            return view("site.teste");
        });
        Route::get('/sistema/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name("painel.logs");
    });

// });
