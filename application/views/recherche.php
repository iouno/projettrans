<h1>Rechercher une salle</h1>
<form method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
	<fieldset>
		<p>
			<label for="nom">Nom de la salle</label> : 
			<input name="nom" type="text" />
		</p>
		<p>			
			<label for="date">Date</label> :
			<!-- A AUTOMATISER -->
			<input type="checkbox" name="date" value="1"> 1
  			<input type="checkbox" name="date" value="2"> 2
  			<input type="checkbox" name="date" value="3"> 3
		</p>
		<p>			
			<label for="creneau">Créneau horaire</label> :
			<!-- A AUTOMATISER -->
			de
			<select name="capacite">
				<option value="volvo">00:00</option>
				<option value="saab">01:00</option>
				<option value="mercedes">02:00</option>
			</select> 
			à
			<select name="capacite">
				<option value="volvo">21:00</option>
				<option value="saab">22:00</option>
				<option value="mercedes">23:00</option>
			</select> 
		</p>
		<p>			
			<label for="capacite">Capacité de la salle</label> :
			<!-- A AUTOMATISER -->
			<select name="capacite">
				<option value="volvo">&lt 100</option>
				<option value="saab">&gt 100 et &lt 200</option>
				<option value="mercedes">&gt 200 et &lt 500</option>
			</select> 
		</p>
		<p>			
			<label for="accessibilite">Accessible aux personnes à mobilité réduite</label> :
			<input type="checkbox" name="accessibilite" value="ok"> Oui
		</p>
		<p><input type="submit" value="Rechercher"/></p>
	</fieldset>
</form>
