<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php require ('../../localization.php'); ?>

	<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
			<?php if (isset($redirect)) : ?>
				<?php if ($redirect == 1) : ?>
					<META HTTP-EQUIV=REFRESH CONTENT="1; URL=<?php echo base_url(); ?>index.php/artiste/recherche">
				<?php elseif ($redirect ==2) : ?>
					<META HTTP-EQUIV=REFRESH CONTENT="1; URL=<?php echo base_url(); ?>index.php/atm/traiter_reservation">
				<?php endif; ?>
			<?php endif; ?>
			<title>TransFestival | <?php echo_($title); ?></title>
			<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/style.css" />
		</head>

		<body>
			<div id="main">
				<header>
					<a href="http://lestrans.com/"><img id="logo_trans" src="<?php echo base_url(); ?>/assets/img/transmusicales.png" alt="Logo du festival Trans Musicales" /></a>
					
					<div id="title">
						<?php echo anchor('sessions/accueil',echo_("Les Salles")) ?>
					</div>

					<div id="action">
						<?php echo anchor('sessions/'.$action,$label) ?>
					</div>
				</header>
					

				<section>
