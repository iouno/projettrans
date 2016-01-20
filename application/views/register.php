<h1> Inscription </h1>

<?php if (empty($msg_valid)) : ?>
<form method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
	<fieldset>
		<label for="nom">*Nom :</label> <input name="nom" type="text" id="nom"/> (le nom doit contenir entre 3 et 50 caractères) </br>
		<label for="mail">*Mail :</label> <input name="mail" type="email" id="mail"/></br>
		<label for="pays">*Pays :</label> <input name="pays" type="text" id="pays"/></br>
		<label for="dateDeb">*Date de début :</label> <input name="dateDeb" type="text" id="dateDeb"/> </br>
		<label for="formation">*Formation : </label> <input name="formation" type="text" id="formation"/> </br>
		<label for="genre">*Genre : </label> <input name="genre" type="text" id="genre"/> </br>
		<label for="parentes">*Parentés : </label> <input name="parentes" type="text" id="parentes"/> </br>
		<label for="site">*Site web : </label> <input name="site" type="text" id="site"/> </br>
		<p> Les champs précédés d'un * sont obligatoires. </p>
		<p><input type="submit" value="S'inscrire"/></p>
	</fieldset>
</form>
<?php else : ?>
<p>
	<?php echo $msg_valid ?>
<p>
<?php endif; ?>
	<?php echo anchor('sessions/connexion','Vous possédez déjà un compte ?') ?>
</p>
</body>
