<div class="row">
	<table class="table">
		<thead>
			<th>Id</th>
			<th>Text</th>
			<th>End Time</th>
			<th>End Date</th>
		</thead>
		<tbody>
			<?php foreach($timers as $timer): ?>
			<tr>
				<td><a href="<?php echo BASE_URL; ?>view/<?php echo $timer->id; ?>"><?php echo $timer->id; ?></a></td>
				<td><a href="<?php echo BASE_URL; ?>view/<?php echo $timer->id; ?>"><?php echo $timer->Text; ?></a></td>
				<td><a href="<?php echo BASE_URL; ?>view/<?php echo $timer->id; ?>"><?php echo date('h:i:s A', $timer->EndDate); ?></a></td>
				<td><a href="<?php echo BASE_URL; ?>view/<?php echo $timer->id; ?>"><?php echo date('F j, Y', $timer->EndDate); ?></a></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
