<?php require ('../../localization.php'); ?>


<p><?php echo anchor('artiste/inscription',echo_("Inscrivez-vous")) ?></p>
<p><?php echo anchor('artiste/recherche',echo_("Faire une recherche")) ?>(temp)</p>

=======
<?php echo_("Vous êtes déconnecté.");?>

<p><?php echo anchor('sessions/inscription',echo_("Inscrivez-vous")) ?></p>

=======
<h1><?php echo_("Réserver vos salles maintenant");?></h1>
<p>
<?php echo_("Trouver les scènes qui répondent au mieux à vos critères et les réserver ? Rien de plus facile ! Artiste ou groupe des Trans Musicales, inscrivez-vous et choisissez !");?>
</p>
<div id="inscription">
	<?php echo anchor('sessions/inscription',echo_("Inscrivez-vous")) ?>
</div>


