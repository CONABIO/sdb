<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-MX" lang="es-MX">
<head>

	<?php $descripcion = "La riqueza natural y cultural de México es extraordinaria y queremos promover las acciones para valorar y conservar nuestro patrimonio biocultural. Celebra acciones dirigidas a conservar el conocimiento y prácticas ecológicas locales, la riqueza biológica asociada, los paisajes culturales, la herencia, memoria y prácticas vivas que nos hacen parte de la naturaleza mexicana."; ?>
	<?php $img_redes = Yii::app()->getBaseUrl(true) . "/imagenes/pagina/redes.png"; ?>

	<meta http-equiv="content-type" content="text/html; charset=utf-8">	
	<meta name="description" content=<?php echo $descripcion; ?>>
	<meta name="keywords" content="naturaleza, mes, mayo, biodiversidad">

	<!-- OpenGraph-->
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?php echo Yii::app()->name; ?>">
	<meta property="og:description" content="<?php echo $descripcion; ?>">
	<meta property="og:image" content="<?php echo $img_redes; ?>">
	<meta property="og:image:url" content="<?php echo $img_redes; ?>">
	<meta property="og:image:secure_url" content="<?php echo $img_redes; ?>">
	<meta property="og:image:type" content="image/png">
	<meta property="og:image:width" content="600">
	<meta property="og:image:height" content="400">
	<meta property="og:url" content="<?php echo Yii::app()->getBaseUrl(true) . str_replace("mesnaturaleza/", "", Yii::app()->request->url); ?>">
	<meta property="og:site_name" content="<?php echo Yii::app()->name; ?>">
	<meta property="og:locale" content="es_MX">

	<!-- Twitter -->
	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content="<?php echo Yii::app()->name; ?>">
	<meta name="twitter:description" content="<?php echo $descripcion; ?>">
	<meta name="twitter:site" content="@CONABIO">
	<meta name="twitter:image" content="<?php echo $img_redes; ?>">
	<meta name="twitter:creator" content="@CONABIO">

	<!--[if lte IE 8]><script src="<?php echo Yii::app()->request->baseUrl; ?>/css/ie/html5shiv.js"></script><![endif]-->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jquery.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jquery.poptrox.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/skel.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/init.js"></script>
	<script type="text/javascript">
		function MM_preloadImages() { //v3.0
			var d = document;
			if (d.images) {
				if (!d.MM_p) d.MM_p = new Array();
				var i, j = d.MM_p.length,
					a = MM_preloadImages.arguments;
				for (i = 0; i < a.length; i++)
					if (a[i].indexOf("#") != 0) {
						d.MM_p[j] = new Image;
						d.MM_p[j++].src = a[i];
					}
			}
		}

		function MM_swapImgRestore() { //v3.0
			var i, x, a = document.MM_sr;
			for (i = 0; a && i < a.length && (x = a[i]) && x.oSrc; i++) x.src = x.oSrc;
		}

		function MM_findObj(n, d) { //v4.01
			var p, i, x;
			if (!d) d = document;
			if ((p = n.indexOf("?")) > 0 && parent.frames.length) {
				d = parent.frames[n.substring(p + 1)].document;
				n = n.substring(0, p);
			}
			if (!(x = d[n]) && d.all) x = d.all[n];
			for (i = 0; !x && i < d.forms.length; i++) x = d.forms[i][n];
			for (i = 0; !x && d.layers && i < d.layers.length; i++) x = MM_findObj(n, d.layers[i].document);
			if (!x && d.getElementById) x = d.getElementById(n);
			return x;
		}

		function MM_swapImage() { //v3.0
			var i, j = 0,
				x, a = MM_swapImage.arguments;
			document.MM_sr = new Array;
			for (i = 0; i < (a.length - 2); i += 3)
				if ((x = MM_findObj(a[i])) != null) {
					document.MM_sr[j++] = x;
					if (!x.oSrc) x.oSrc = x.src;
					x.src = a[i + 2];
				}
		}
	</script>

	<!--[if lte IE 8]><link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie/v8.css" /><![endif]-->

	<!-- blueprint CSS framework -->


	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>

	<title><?php echo Yii::app()->name; ?></title>
	<link rel="shortcut icon" href="https://www.biodiversidad.gob.mx/media/1/favicon.ico">
	<meta property="og:image" content="<?php echo Yii::app()->request->baseUrl; ?>/imagenes/pagina/<?php echo Yii::app()->params->imagen_principal; ?>" />

	<noscript>
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/skel.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style-xlarge.css" />
	</noscript>

	<!-- Google Analytics tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-7GSRKLE6X5"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'G-7GSRKLE6X5');
	</script>

</head>

<body>
	<!-- Header -->
	<header id="header">
		<!--<a href="<?php echo Yii::app()->request->baseUrl; ?>" class="image avatar"><img src="<?php echo Yii::app()->request->baseUrl; ?>/imagenes/pagina/imgCirculo.png" alt="" /></a>
	<a href="<?php echo Yii::app()->request->baseUrl; ?>" class="image avatar"><img src="<?php echo Yii::app()->request->baseUrl; ?>/imagenes/pagina/btn_transparente.png" alt="" /></a>-->
	</header>

	<!-- Main -->
	<div id="main">

		<!-- One -->
		<section id="one">
			<header class="major">
				<a href="<?php echo Yii::app()->request->baseUrl; ?>" class="image avatar">
					<h3 class="verde">Inicio</h3>
				</a>
				<!--<h2>&nbsp;</h2>
			<a href="<?php echo Yii::app()->request->baseUrl; ?>" class="image avatar"><h2 class="verde">9a. Semana de la Diversidad Biol&oacute;gica</h2></a><br>
			<span class="slogan">Nuestra biodiversidad, nuestra alimentaci&oacute;n, nuestra salud</span>
			<h3 style="font-variant: small-caps"> </h3>-->
			</header>
			<p style="text-align:center"><br>
				<?php if (Yii::app()->user->isGuest) { ?>
					<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=usuarios/create"><img src="<?php echo Yii::app()->request->baseUrl; ?>/imagenes/pagina/btn_sumate.png" name="registro" width="90" height="127" id="registro" onMouseOver="MM_swapImage('registro','','<?php echo Yii::app()->request->baseUrl; ?>/imagenes/pagina/btn2_sumate.png',1)" onMouseOut="MM_swapImgRestore()"></a>
				<?php } ?>
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=semana/create"><img src="<?php echo Yii::app()->request->baseUrl; ?>/imagenes/pagina/btn_publica.png" name="publica" width="90" height="127" id="publica" onMouseOver="MM_swapImage('publica','','<?php echo Yii::app()->request->baseUrl; ?>/imagenes/pagina/btn2_publica.png',1)" onMouseOut="MM_swapImgRestore()"></a>

				<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=semana/admin"><img src="<?php echo Yii::app()->request->baseUrl; ?>/imagenes/pagina/btn_consulta.png" name="eventos" width="90" height="127" id="eventos" onMouseOver="MM_swapImage('eventos','','<?php echo Yii::app()->request->baseUrl; ?>/imagenes/pagina/btn2_consulta.png',1)" onMouseOut="MM_swapImgRestore()"></a>

				<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=semana/materiales"><img src="<?php echo Yii::app()->request->baseUrl; ?>/imagenes/pagina/btn_materiales.png" name="materiales" width="90" height="127" id="materiales" onMouseOver="MM_swapImage('materiales','','<?php echo Yii::app()->request->baseUrl; ?>/imagenes/pagina/btn2_materiales.png',1)" onMouseOut="MM_swapImgRestore()"></a>

				<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=semana/mat_ninos"><img src="<?php echo Yii::app()->request->baseUrl; ?>/imagenes/pagina/btn_mninos.png" name="ninos" width="90" height="127" id="ninos" onMouseOver="MM_swapImage('ninos','','<?php echo Yii::app()->request->baseUrl; ?>/imagenes/pagina/btn2_mninos.png',1)" onMouseOut="MM_swapImgRestore()"></a>

				<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=semana/estadisticas"><img src="<?php echo Yii::app()->request->baseUrl; ?>/imagenes/pagina/btn_estadisticas.png" name="estadisticas" width="90" height="127" id="estadisticas" onMouseOver="MM_swapImage('estadisticas &lt;img&gt;','','/Imagenes/titEstadisticas_03.png','estadisticas','','<?php echo Yii::app()->request->baseUrl; ?>/imagenes/pagina/btn2_estadisticas.png',1)" onMouseOut="MM_swapImgRestore()"></a>

				<!--<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=semana/aliados"><img src="<?php echo Yii::app()->request->baseUrl; ?>/imagenes/pagina/btn_aliados.png" name="aliados" width="90" height="127" id="aliados" onMouseOver="MM_swapImage('aliados &lt;img&gt;','','/Imagenes/titEstadisticas_03.png','aliados','','<?php echo Yii::app()->request->baseUrl; ?>/imagenes/pagina/btn2_aliados.png',1)" onMouseOut="MM_swapImgRestore()"></a>-->

				<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=semana/ponentes"><img src="<?php echo Yii::app()->request->baseUrl; ?>/imagenes/pagina/btn_ponentes.png" name="ponentes" width="90" height="127" id="ponentes" onMouseOver="MM_swapImage('ponentes &lt;img&gt;','','/Imagenes/titEstadisticas_03.png','ponentes','','<?php echo Yii::app()->request->baseUrl; ?>/imagenes/pagina/btn2_ponentes.png',1)" onMouseOut="MM_swapImgRestore()"></a>

			</p>
			<?php if (!Yii::app()->user->isGuest) { ?>
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=semana/index">Ver tus eventos</a>
				| <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/logout">Cerrar sesiÃ³n</a>
			<?php } ?>
			<?php echo $content; ?>
			<?php echo Yii::app()->getBaseUrl(true); ?>
	</div>

	<!-- Footer -->

</body>

</html>
