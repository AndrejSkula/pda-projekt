<div class="container">
	<div class="panel panel-default " align="center">
		<button type="button" class="btn btn-succes btn-lg"><a href="/pda-projekt/index.php/zamestnavatel">Zamestnávatelia</a></button>
		<button type="button" class="btn btn-succes btn-lg"><a href="/pda-projekt/index.php/studenti">Študenti</a></button>
		<button type="button" class="btn btn-succes btn-lg"><a href="/pda-projekt/index.php/brigady">Brigády</a></button>
		<button type="button" class="btn btn-succes btn-lg"><a href="/pda-projekt/index.php/studenti_has_brigady">Brigády študentov</a></button>
		<button type="button" class="btn btn-succes btn-lg"><a href="/pda-projekt/index.php/grafy">Grafy</a></button>
	</div>
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
		<h1>Brigády študentov</h1>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default ">
				<div class="panel-heading">Brigády<a href="<?php echo site_url('studenti_has_brigady/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
				<table class="table striped">
					<thead>
					<tr>
						<th width="5%">ID</th>
						<th width="10%">Odkedy</th>
						<th width="10%">Dokedy</th>
						<th width="10%">Počet hodín</th>
						<th width="5%">Plat za hodinu</th>
						<th width="15%">Meno študenta</th>
						<th width="20%">Názov brigády</th>
						<th width="10%">Akcia</th>
					</tr>
					</thead>
					<tbody id="userData">
					<?php if(!empty($studenti_has_brigady)): foreach($studenti_has_brigady as $studenti_has_brig): ?>
						<tr>
							<td><?php echo '#'.$studenti_has_brig['id_studenti_has_brigady']; ?></td>
							<td><?php echo $studenti_has_brig['odkedy']; ?></td>
							<td><?php echo $studenti_has_brig['dokedy']; ?></td>
							<td><?php echo $studenti_has_brig['pocet_hodin']; ?></td>
							<td><?php echo $studenti_has_brig['plat_za_hod']; ?></td>
							<td><?php echo $studenti_has_brig['cele_meno']; ?></td>
							<td><?php echo $studenti_has_brig['nazov_b']; ?></td>
							<td>
								<a href="<?php echo site_url('studenti_has_brigady/view/'.$studenti_has_brig['id_studenti_has_brigady']); ?>"class="glyphicon glyphicon-eye-open"></a>
								<a href="<?php echo site_url('studenti_has_brigady/edit/'.$studenti_has_brig['id_studenti_has_brigady']); ?>"class="glyphicon glyphicon-edit"></a>
								<a href="<?php echo site_url('studenti_has_brigady/delete/'.$studenti_has_brig['id_studenti_has_brigady']); ?>"class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
							</td>
						</tr>
					<?php endforeach; else: ?>
						<tr><td colspan="4">Žiadne brigády pre študentov ......</td></tr>
					<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


