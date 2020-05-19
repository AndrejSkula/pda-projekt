<div class="panel panel-default ">
	<ul class="sidebar-menu" data-widget="tree">
		<li><a href="/pda-projekt/index.php/zamestnavatel"><i class="fa fa-circle-o"></i>Zamestnávatelia</a></li>
		<li><a href="/pda-projekt/index.php/studenti"><i class="fa fa-circle-o"></i>Študenti</a></li>
		<li><a href="/pda-projekt/index.php/brigady"><i class="fa fa-circle-o"></i>Brigády</a></li>
		<li><a href="/pda-projekt/index.php/studenti_has_brigady"><i class="fa fa-circle-o"></i>Brigády študentov</a></li>
		<li><a href="/pda-projekt/index.php/grafy"><i class="fa fa-circle-o"></i>Grafy</a></li>
	</ul>
</div>

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
		<h1>Zoznam študentov</h1>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default ">
				<div class="panel-heading">Študenti <a href="<?php echo site_url('studenti/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
				<table class="table striped">
					<thead>
					<tr>
						<th width="5%">ID</th>
						<th width="15%">Meno</th>
						<th width="20%">Priezvisko</th>
						<th width="20%">Telefónne číslo</th>
						<th width="15%">Adresa</th>
						<th width="15%">Email</th>
						<th width="10%">Akcia</th>
					</tr>
					</thead>
					<tbody id="userData">
					<?php if(!empty($studenti)): foreach($studenti as $student): ?>
						<tr>
							<td><?php echo '#'.$student['id_studenta']; ?></td>
							<td><?php echo $student['meno']; ?></td>
							<td><?php echo $student['priezvisko']; ?></td>
							<td><?php echo $student['telefonne_cislo']; ?></td>
							<td><?php echo $student['adresa']; ?></td>
							<td><?php echo $student['email']; ?></td>
							<td>
								<a href="<?php echo site_url('studenti/view/'.$student['id_studenta']); ?>"class="glyphicon glyphicon-eye-open"></a>
								<a href="<?php echo site_url('studenti/edit/'.$student['id_studenta']); ?>"class="glyphicon glyphicon-edit"></a>
								<a href="<?php echo site_url('studenti/delete/'.$student['id_studenta']); ?>"class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
							</td>
						</tr>
					<?php endforeach; else: ?>
						<tr><td colspan="4">Žiadni študenti ......</td></tr>
					<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
