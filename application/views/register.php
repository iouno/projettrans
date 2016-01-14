
<?php
$titre="Inscription";

if (empty($_POST['nom']))
//si la variable est vide, on peut considérer qu'on est sur la page de formulaire
{
?>

<h1> Inscription </h1>
<form method="post" action="../../index.php/user/index" enctype="multipart/form-data">
	<fieldset>
	<label for="nom">*Nom :</label> <input name="nom" type="text" id="nom"/> (le nom doit contenir entre 3 et 50 caractères) </br>
	<label for="mail">*Mail :</label> <input name="mail" type="mail" id="mail"/> </br>
	<label for="pays">*Pays :</label> <input name="pays" type="text" id="pays"/> </br>
	<label for="dateDeb">*Date de début :</label> <input name="dateDeb" type="date" id="dateDeb"/> </br>
	
	</fieldset>
<p> Les champs précédés d'un * sont obligatoires. </p>
<p><input type="submit" value="S'inscrire"/></p>
</form>
</body>

<?php
}
?>
