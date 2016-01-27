<?php require ('../../localization.php'); ?>
<h1> <?php echo_("Traiter une demande de réservation"); ?></h1>
<?php if (empty($reservations)) : ?>
	<p><?php echo_("Aucune demande de réservation ne requiert votre attention."); ?></p>
<?php else : ?>
<table>
	<tr>
		<th><?php echo_("Date de réservation");?></th>
		<th><?php echo_("Artistes");?></th>
		<th><?php echo_("Pays"); ?></th>
		<th><?php echo_("Salle");?></th>
		<th><?php echo_("Jour"); ?></th>
		<th><?php echo_("Heure"); ?></th>
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
