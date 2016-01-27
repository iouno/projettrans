<?php require "localization.php"; ?>


<p><?php echo anchor('artiste/inscription',echo gettext("Inscrivez-vous")) ?></p>
<p><?php echo anchor('artiste/recherche',echo gettext("Faire une recherche")) ?>(temp)</p>

=======
<?php echo gettext("Vous êtes déconnecté.");?>

<p><?php echo anchor('sessions/inscription',echo gettext("Inscrivez-vous")) ?></p>

=======
<h1><?php echo gettext("Réserver vos salles maintenant");?></h1>
<p>
<?php echo gettext("Trouver les scènes qui répondent au mieux à vos critères et les réserver ? Rien de plus facile ! Artiste ou groupe des Trans Musicales, inscrivez-vous et choisissez !");?>
</p>
<div id="inscription">
	<?php echo anchor('sessions/inscription',echo gettext("Inscrivez-vous")) ?>
</div>


