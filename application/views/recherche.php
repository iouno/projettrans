<?php
	$time = array(
		0 => "00:00",
		1 => "01:00",
		2 => "02:00",
		3 => "03:00",
		4 => "04:00",
		5 => "05:00",
		6 => "06:00",
		7 => "07:00",
		8 => "08:00",
		9 => "09:00",
		10 => "10:00",
		11 => "11:00",
		12 => "12:00",
		13 => "13:00",
		14 => "14:00",
		15 => "15:00",
		16 => "16:00",
		17 => "17:00",
		18 => "18:00",
		19 => "19:00",
		20 => "20:00",
		21 => "21:00",
		22 => "22:00",
		23 => "23:00"
	);
?>

<h1>Rechercher une salle</h1>
<form method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
	<fieldset>
		<p>
			<label for="nom">Nom de la salle</label> : 
			<input name="nom" type="text" />
		</p>
		<p>			
			<label for="date">Date</label> :
			<?php foreach ($journees as $journee): ?>
			<input type="checkbox" name="date" value="<?php echo key($journees) ?>"><?php $date = new DateTime($journee['jour']); echo $date->format('l j F') ?>
			<?php endforeach; ?>
		</p>
		<p>			
			<label for="creneau">Créneau horaire</label> :
			de
			<select name="capacite">
			<?php foreach ($time as $hour): ?>
				<option value="<?php echo key($time) ?>"><?php echo $hour ?></option>
			<?php endforeach; ?>
			</select> 
			à
			<select name="capacite">
			<?php foreach ($time as $hour): ?>
				<option value="<?php echo key($time) ?>"><?php echo $hour ?></option>
			<?php endforeach; ?>
			</select> 
		</p>
		<p>			
			<label for="capacite">Capacité de la salle</label> :
			<!-- A AUTOMATISER -->
			<select name="capacite">
				<option value="1">&lt 100</option>
				<option value="2">&gt 100 et &lt 200</option>
				<option value="3">&gt 200 et &lt 500</option>
				<option value="4">&gt 500 et &lt 1000</option>
				<option value="5">&gt 1000</option>
			</select> 
		</p>
		<p>			
			<label for="accessibilite">Accessible aux personnes à mobilité réduite</label> :
			<input type="checkbox" name="accessibilite" value="ok"> Oui
		</p>
		<p><input type="submit" value="Rechercher"/></p>
	</fieldset>
</form>