
<?php
$titre="Inscription";

if (empty($_POST['nom']))
//si la variable est vide, on peut considérer qu'on est sur la page de formulaire
{
?>

<h1> Inscription </h1>
<form method="post" action="../../index.php/user/index" enctype="multipart/form-data">
	<fieldset>
<legend> Identifiants </legend>
	<label for="pseudo">*Pseudo :</label> <input name="pseudo" type="text" id="pseudo"/> (le pseudo doit contenir entre 3 et 15 caractères) </br>
	<label for="password">*Mot de passe :</label> <input name="password" type="password" id="password"/> (le mot de passe doit contenir entre 3 et 15 caractères) </br>
	<label for="confirm">*Confirmer le mot de passe :</label> <input name="confirm" type="password" id="confirm"/> (le mot de passe doit contenir entre 3 et 15 caractères) </br>
	</fieldset>
<p> Les champs précédés d'un * sont obligatoires. </p>
<p><input type="submit" value="S'inscrire"/></p>
</form>
</body>

<?php
}
?>
