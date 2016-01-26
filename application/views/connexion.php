<h1>Connexion</h1>
<form method="post" action="connexion">
	<p class="erreur"><?php echo $msg_erreur ?></p>
	<p>
		<label>Identifiant</label><br />
		<input name="login" type="text"/>
	</p>
	<p>
		<label>Mot de passe</label><br />
		<input name="pass" type="password"/>
	</p>
	<p>
		<input type="submit" value="Connexion" class="button" />
	</p>
</form>
<?php echo anchor('sessions/inscription','Pas encore inscrit ?') ?>

