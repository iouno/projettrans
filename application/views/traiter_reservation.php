<?php require "localization.php"; ?>
<h1> <?php echo gettext("Traiter une demande de reservation"); ?></h1>
<?php if (empty($reservations)) : ?>
	<p><?php echo gettext("Aucune demande de reservation ne requiert votre attention."); ?></p>
<?php else : ?>
<table>
	<tr>
		<th><?php echo gettext("Date de reservation");?></th>
		<th><?php echo gettext("Artistes");?></th>
		<th><?php echo gettext("Pays"); ?></th>
		<th><?php echo gettext("Salle");?></th>
		<th><?php echo gettext("Jour"); ?></th>
		<th><?php echo gettext("Heure"); ?></th>
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
