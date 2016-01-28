
<h1><?php echo gettext("Resultat de la recherche");?></h1>

<?php if (empty($lesSalles)) : ?>
	<p><?php echo gettext("Desole, votre recherche n'a donne aucun resultat"); ?></p>
<?php else : ?>
	<form method="post" action="reserver" id="lesSalles">
	<?php foreach ($lesSalles as $key => $value) : ?>
		
		<div class="salle">
			<p class="nomSalle"><?php echo $value['nom']?></p>
			<p class="adresseSalle"><?php echo $value['adresse']?></p>
			<p class="resp"><?php echo $value['prenom']?> <?php echo $value['nomresp']?><br /><?php echo $value['tel']?><br /><?php echo $value['mail']?></p>
			<p><?php echo $value['tarif'] ?> €</p>

			<p class="creneau">			
				<?php $lesCreneaux = $this->artiste_model->get_creneau($value['idsalle']) ?>
				<select name="creneau" class="mselect">
					<?php foreach ($lesCreneaux as $creneau): ?>
						<option value="<?php echo $creneau['idcreneau'] ?>"><?php echo $creneau['jour'].' '.$creneau['hdebut'].' '.$creneau['hfin'] ?></option>
					<?php endforeach; ?>
				</select>
			</p>

			<input type="submit" value=<?php echo gettext("Reserver");?> name="<?php echo $value['idsalle']?>" />
		</div>

	<?php endforeach; ?>
	</form>
<?php endif; ?>

<div id="inscription">
	<?php echo anchor('artiste/recherche',echo gettext("Nouvelle recherche")) ?>
</div>
