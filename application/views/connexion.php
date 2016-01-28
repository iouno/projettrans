<?php require "localization.php"; ?>

<h1>Connexion</h1>
<form method="post" action="connexion">
	<p class="erreur"><?php echo gettext($msg_erreur); ?></p>
	<p>
		<label><?php echo gettext("Identifiant") ; ?></label><br />
		<input name="login" type="text"/>
	</p>
	<p>
		<label><?php echo gettext("Mot de passe"); ?></label><br />
		<input name="pass" type="password"/>
	</p>
	<p>
		<input type="submit" value="Connexion" class="button" />
	</p>
</form>
<?php echo anchor('sessions/inscription',echo gettext("Pas encore inscrit ?")) ?>

