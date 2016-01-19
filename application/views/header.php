<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
			<title>TransFestival | <?php echo $title ?></title>
			<link rel="stylesheet" type="text/css" href="<? echo base_url();?>/assets/css/style.css" media="all" />
		</head>

		<body>
			<div id="entete">
				<div id="title">
					<?php echo anchor('artiste/accueil','Web Platform de Projet Trans') ?>
				</div>

				<p class="sous-titre">
					<strong>Caractéristiques:</strong>
				platform web de réservation de salle
				</p>
			</div>

			<div id="action">
				<?php echo anchor('artiste/'.$action,$label) ?>
			</div>

			<div id="contenu">
