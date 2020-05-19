<div class="container">
	<?php if(!empty($success_msg)){ ?>
		<div class="col-xs-12">
			<div class="alert alert-success"><?php echo $success_msg; ?></div>
		</div>
	<?php }elseif(!empty($error_msg)){ ?>
		<div class="col-xs-12">
			<div class="alert alert-danger"><?php echo $error_msg; ?></div>
		</div>
	<?php } ?>
	<div class="row">
		<h1>Zoznam zamestnávateľov</h1>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default ">
				<div class="panel-heading">Zamestnávatelia<a href="<?php echo site_url('zamestnavatel/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
				<table class="table striped">
					<thead>
					<tr>
						<th width="5%">ID</th>
						<th width="25%">Názov</th>
						<th width="10%">Telefónne číslo</th>
						<th width="15%">Adresa</th>
						<th width="20%">Email</th>
						<th width="10%">Akcia</th>
					</tr>
					</thead>
					<tbody id="userData">
					<?php if(!empty($zamestnavatel)): foreach($zamestnavatel as $zamest): ?>
						<tr>
							<td><?php echo '#'.$zamest['id_zamestnavatela']; ?></td>
							<td><?php echo $zamest['nazov_zamestnavatela']; ?></td>
							<td><?php echo $zamest['telefonne_cislo']; ?></td>
							<td><?php echo $zamest['adresa']; ?></td>
							<td><?php echo $zamest['email']; ?></td>
							<td>
								<a href="<?php echo site_url('zamestnavatel/view/'.$zamest['id_zamestnavatela']); ?>"class="glyphicon glyphicon-eye-open"></a>
								<a href="<?php echo site_url('zamestnavatel/edit/'.$zamest['id_zamestnavatela']); ?>"class="glyphicon glyphicon-edit"></a>
								<a href="<?php echo site_url('zamestnavatel/delete/'.$zamest['id_zamestnavatela']); ?>"class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
							</td>
						</tr>
					<?php endforeach; else: ?>
						<tr><td colspan="4">Žiadny zamestnávatelia ......</td></tr>
					<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

