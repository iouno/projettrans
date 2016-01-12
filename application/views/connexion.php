<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	
<?php
echo '<h1>Connexion</h1>';
if (!isset($_POST['login'])) //On est dans la page du formulaire de connexion
{
?>
	<form method="post" action="http://<?php echo $_SERVER['SERVER_NAME']; ?>/laurenti/prjweb/A25/prjweb/CodeIgniter/index.php/todo/index" accept-charset="utf-8">
		<fieldset>
			<legend>Connexion</legend>
			<p>
				<label for="login">Pseudo : </label>
				<input name="login" type="text" id="login"/>
				</br>
				<label for="password">Mot de passe : </label>
				<input name="password" type="password" id="password"/>
			</p>
		</fieldset>
		<p> <input type="submit" value="Connexion"/> </p>
	</form>
	<a href="./register.php"> Pas encore inscrit ? </a>
	</div>
<?php
}
?>
