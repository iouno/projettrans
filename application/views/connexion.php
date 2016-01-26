<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
	<fieldset>
		<legend>Connexion</legend>
		<p class="erreur"><?php echo $msg_erreur ?></p>
		<p>
			<label>Identifiant : </label>
			<input name="login" type="text"/>
		</p>
		<p>
			<label>Mot de passe : </label>
			<input name="pass" type="password"/>
		</p>
	</fieldset>
	<p> <input type="submit" value="Connexion"/> </p>
</form>
<?php echo anchor('sessions/inscription','Pas encore inscrit ?') ?>

