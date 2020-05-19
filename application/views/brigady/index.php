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
		<h1>Zoznam brigád</h1>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default ">
				<div class="panel-heading">Brigády <a href="<?php echo site_url('brigady/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
				<table class="table striped">
					<thead>
					<tr>
						<th width="5%">ID</th>
						<th width="20%">Názov</th>
						<th width="15%">Dátum</th>
						<th width="10%">Plat za hodinu</th>
						<th width="10%">Aktuálne</th>
						<th width="10%">Akcia</th>
					</tr>
					</thead>
					<tbody id="userData">
					<?php if(!empty($brigady)): foreach($brigady as $brigad): ?>
						<tr>
							<td><?php echo '#'.$brigad['id_brigady']; ?></td>
							<td><?php echo $brigad['nazov']; ?></td>
							<td><?php echo $brigad['datum']; ?></td>
							<td><?php echo $brigad['plat_za_hodinu']; ?></td>
							<td><?php echo $brigad['aktualne']; ?></td>
							<td>
								<a href="<?php echo site_url('brigady/view/'.$brigad['id_brigady']); ?>"class="glyphicon glyphicon-eye-open"></a>
								<a href="<?php echo site_url('brigady/edit/'.$brigad['id_brigady']); ?>"class="glyphicon glyphicon-edit"></a>
								<a href="<?php echo site_url('brigady/delete/'.$brigad['id_brigady']); ?>"class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
							</td>
						</tr>
					<?php endforeach; else: ?>
						<tr><td colspan="4">Žiadne brigady ......</td></tr>
					<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
