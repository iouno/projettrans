
<?php
$titre="Inscription";

if ((empty($_POST['nom']))||(empty($_POST['mail']))||(empty($_POST['pays']))||(empty($_POST['dateDeb']))||(empty($_POST['formation']))||(empty($_POST['genre']))||(empty($_POST['parentes']))||(empty($_POST['site'])))
//si la variable est vide, on peut considérer qu'on est sur la page de formulaire
{
?>

<h1> Inscription </h1>
<form method="post" action="../../index.php/user/index" enctype="multipart/form-data">
	<fieldset>
	<label for="nom">*Nom :</label> <input name="nom" type="text" id="nom"/> (le nom doit contenir entre 3 et 50 caractères) </br>
	<label for="mail">*Mail :</label> <input name="mail" type="mail" id="mail"/> </br>
	<label for="pays">*Pays :</label> <input name="pays" type="text" id="pays"/> </br>
	<label for="dateDeb">*Date de début :</label> <input name="dateDeb" type="text" id="dateDeb"/> </br>
	<label for="formation">*Formation : </label> <input name="formation" type="text" id="formation"/> </br>
	<label for="genre">*Genre : </label> <input name="genre" type="text" id="genre"/> </br>
	<label for="parentes">*Parentés : </label> <input name="parentes" type="text" id="parentes"/> </br>
	<label for="site">*Site web : </label> <input name="site" type="text" id="site"/> </br>
	</fieldset>
<p> Les champs précédés d'un * sont obligatoires. </p>
<p><input type="submit" value="S'inscrire"/></p>
</form>
</body>

<?php
}
?>
