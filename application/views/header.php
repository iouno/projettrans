<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
			<title>TransFestival | <?php echo $title ?></title>
			<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/style.css" />
		</head>

		<body>
			<div id="main">
				<header>
					<a href="http://lestrans.com/"><img id="logo_trans" src="../../assets/img/transmusicales.png" alt="Logo du festival Trans Musicales" /></a>
					
					<div id="title">
						<?php echo anchor('sessions/accueil','Les Salles') ?>
					</div>

					<div id="action">
						<?php echo anchor('sessions/'.$action,$label) ?>
					</div>
				</header>
					

				<section>
