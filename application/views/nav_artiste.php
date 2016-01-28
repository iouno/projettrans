<?php require "localization.php"; ?>

<nav>
	<ul>
		<li><?php echo anchor('artiste/recherche', echo gettext("Rechercher")) ?></li>
		<li><a><?php echo gettext("Voir ses reservations"); ?></a></li>
		<li><a><?php echo gettext("Modifier son profil"); ?></a></li>
	</ul>
</nav>
