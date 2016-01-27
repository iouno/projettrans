<h1>Connexion</h1>
<form method="post" action="connexion">
	<p class="erreur"><?php echo $msg_erreur ?></p>
	<p>
		<label><?php echo "Identifiant" ; ?></label><br />
		<input name="login" type="text"/>
	</p>
	<p>
		<label><?php echo "Mot de passe"; ?></label><br />
		<input name="pass" type="password"/>
	</p>
	<p>
		<input type="submit" value="Connexion" class="button" />
	</p>
</form>
<?php echo anchor('sessions/inscription',<?php echo "Pas encore inscrit ?";?>) ?>

