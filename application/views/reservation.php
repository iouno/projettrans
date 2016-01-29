
<div class="salle">
	<p class="nomSalle"><?php echo $value['nom']?></p>
	<p class="adresseSalle"><?php echo $value['adresse']?></p>
	<p class="resp"><?php echo $value['prenom']?> <?php echo $value['nomresp']?><br /><?php echo $value['tel']?><br /><?php echo $value['mail']?></p>
	<p><?php echo $value['tarif'] ?> €</p>

	<p class="creneau">			
		<?php $creneau = $this->artiste_model->get_creneau($value['idsalle']) ?>
		<?php echo $creneau['jour'].' '.$creneau['hdebut'].' '.$creneau['hfin'] ?>
	</p>
</div>

<div id="abandon">
	<?php echo anchor('artiste/recherche',echo gettext("Abandonner la reservation")) ?>
</div>

<div id="valider">
	<?php echo anchor('artiste/reservationOk',echo gettext("Soumettre la reservation")) ?>
</div>