<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/_define.php');//carrega definições básicas
require_once(SIS_DIRETORIO_IFL.'/ifl1uteis.php');

$head="<meta charset='utf-8'>
	<title>".PAGINA_TITULO."</title>
	<link rel='canonical' href='".PAGINA_URL."'>
	<meta name='keywords' content='".SIS_KEYWORDS."'>
	<meta name='robots' content='index,follow' />
	<meta property='og:title' content='".PAGINA_TITULO."'>
	<meta property='og:site_name' content='".PAGINA_TITULO."'>
	<meta name='twitter:title' content='".PAGINA_TITULO."'>
	<meta property='og:url' content='".PAGINA_URL."'>
	<meta name='description' content='".PAGINA_DESCRICAO."'>
	<meta property='og:description' content='".PAGINA_DESCRICAO."'>
	<meta name='twitter:description' content='".PAGINA_DESCRICAO."'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<meta name='mobile-web-app-capable' content='yes'>
	<meta name='apple-mobile-web-app-capable' content='yes'>
	<meta name='theme-color' content='".SIS_COR_THEME."'>
	<meta name='msapplication-navbutton-color' content='".SIS_COR_THEME."'>
	<meta name='apple-mobile-web-app-status-bar-style' content='".SIS_COR_THEME."'>
	<meta property='og:type' content='website'>
	<meta name='twitter:image' content='".PAGINA_IMG."'>
	<meta property='og:image' content='".PAGINA_IMG."'>
	<meta property='og:image:secure_url' content='".PAGINA_IMG."'>
	<meta name='twitter:image:alt' content='".PAGINA_IMG_ALT."'>
	<meta property='og:image:alt' content='".PAGINA_IMG_ALT."'>
	<meta property='og:image:width' content='".PAGINA_IMG_WIDTH."'>
	<meta property='og:image:height' content='".PAGINA_IMG_HEIGHT."'>
	<meta property='og:image:type' content='".PAGINA_IMG_TYPE."'>
	<meta name='twitter:card' content='summary'>
	<link rel='icon' type='image/ico' sizes='16x16 32x32 48x48 64x64 96x96 128x128 144x144 180x180 192x192 256x256' href='/favicon.ico'>
	<link rel='apple-touch-icon' sizes='180x180' href='/img/logo180.png'>
	<link rel='manifest' href='/_ifl1/manifest.php' type='application/x-web-app-manifest+json'>
	<link rel='preload' type='text/css' as='style' href='".CDN_GOOGLE_FONT."' crossorigin='anonymous'/>
	<link rel='preload' type='text/css' as='style' href='/css/cartao.css'/>
	<link rel='preload' type='application/javascript' as='script' href='".CDN_JQUERY."' integrity='".CDN_JQUERY_INTEGRITY."' crossorigin='anonymous'/>
	<link rel='preload' type='application/javascript' as='script' href='/script.js'>
	<link rel='preload' type='text/css' as='style' href='".CDN_FONT_AWESOME."' crossorigin='anonymous'/><link rel='stylesheet' href='".CDN_FONT_AWESOME."' crossorigin='anonymous'>
	<link rel='stylesheet' href='".CDN_GOOGLE_FONT."' crossorigin='anonymous'>
	<link rel='stylesheet' href='/css/cartao.css'>
	<script src='".CDN_JQUERY."' integrity='".CDN_JQUERY_INTEGRITY."' crossorigin='anonymous'></script>
";
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php echo $head; ?>
	</head>
	<body class="cartao">
		<main>
			<div>
				<h1><?php echo PAGINA_TITULO; ?></h1>
				<h2><?php echo PAGINA_DESCRICAO; ?></h2>
				<img src="<?php echo PAGINA_LOGO; ?>" width="<?php echo PAGINA_IMG_WIDTH; ?>" height="<?php echo PAGINA_IMG_HEIGHT; ?>" alt="<?php echo PAGINA_IMG_ALT; ?>">
				<address class="social">
					<a target="_blank" rel="noopener" title="Site" href="<?php echo WIFIRE; ?>">
						<i class="fa fa-fw fa-map"></i>
						<div>
							<span>Cardápio Digital</span>
							<span><?php echo substr(WIFIRE,8); ?></span>
						</div>
					</a>
					<a target="_blank" rel="noopener" title="Site" href="<?php echo SIS_URL; ?>">
						<i class="fas fa-fw fa-globe"></i>
						<div>
							<span>Site</span>
							<span><?php echo SIS_DOMINIO; ?></span>
						</div>
					</a>
					<a target="_blank" rel="noopener" title="Telefone" href="tel:+55<?php echo CONTATO_TELEFONE; ?>">
						<i class="fas fa-fw fa-phone"></i>
						<div>
							<span>Telefone</span>
							<span><?php echo ifl1formatar::telefone(CONTATO_TELEFONE); ?></span>
						</div>
					</a>
					<a class="whatsapp" target="_blank" rel="noopener" title="WhatsApp" href="https://api.whatsapp.com/send?phone=55<?php echo CONTATO_WHATSAPP; ?>">
						<i class="fab fa-fw fa-whatsapp"></i>
						<div>
							<span>WhatsApp</span>
							<span><?php echo ifl1formatar::telefone(CONTATO_WHATSAPP); ?></span>
						</div>
					</a>
					<a target="_blank" rel="noopener" title="Email" href="mailto:<?php echo CONTATO_EMAIL; ?>">
						<i class="fas fa-fw fa-envelope"></i>
						<div>
							<span>E-mail</span>
							<span><?php echo CONTATO_EMAIL; ?></span>
						</div>
					</a>
					<a target="_blank" rel="noopener" title="Instagram" href="<?php echo CONTATO_INSTAGRAM; ?>">
						<i class="fab fa-fw fa-instagram"></i>
						<div>
							<span>Instagram</span>
							<span><?php echo substr(CONTATO_INSTAGRAM,25); ?></span>
						</div>
					</a>
					<a target="_blank" rel="noopener" title="Facebook" href="<?php echo CONTATO_FACEBOOK; ?>">
						<i class="fab fa-fw fa-facebook"></i>
						<div>
							<span>Facebook</span>
							<span><?php echo substr(CONTATO_FACEBOOK,24); ?></span>
						</div>
					</a>
					<a target="_blank" rel="noopener" title="Ver mapa" href="<?php echo CONTATO_GMAPS; ?>">
						<i class="fas fa-fw fa-map-marked"></i>
						<div>
							<span>Endereço</span>
							<span><?php echo ENDERECO_RUANUM."<BR>".ENDERECO_BAIRRO." / ".ENDERECO_CIDADE." - ".ENDERECO_UF; ?></span>
						</div>
					</a>
				</address>
			</div>
		</main>
		<script src="/script.js"></script>
	</body>
</html>