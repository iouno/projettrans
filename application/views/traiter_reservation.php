<h1>Traiter une demande de réservation</h1>
<?php if (empty($reservations)) : ?>
	<p>Aucune demande de réservation ne requiert votre attention.</p>
<?php else : ?>
<table>
	<tr>
		<th>Date de réservation</th>
		<th>Artistes</th>
		<th>Pays</th>
		<th>Salle</th>
		<th>Jour</th>
		<th>Heure</th>
	</tr>
<?php foreach ($reservations as $reserv) : ?>
	<tr>
		<td><?php echo $reserv['datereserv'] ?></td>
		<td><?php echo $reserv['artiste'] ?></td>
		<td><?php echo $reserv['pays'] ?></td>
		<td><?php echo $reserv['salle'] ?></td>
		<td><?php echo $reserv['jour'] ?></td>
		<td><?php echo $reserv['heure'] ?></td>
		<td><a href="<?php echo base_url(); ?>index.php/atm/valide_reserv/<?php echo $reserv['idreserv']?>"><img class="check" src="<?php echo base_url(); ?>/assets/img/checked.png" /></a> <a href="<?php echo base_url(); ?>index.php/atm/annul_reserv/<?php echo $reserv['idreserv']?>"><img class="check" src="<?php echo base_url(); ?>/assets/img/cross.png" /></a></td>
	</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>
