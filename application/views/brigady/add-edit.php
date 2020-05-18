<div class="container">
	<div class="row"><br></div>
	<div class="col-xs-12">
		<?php
		if(!empty($success_msg)){
			echo '<div class="alert alert-success">'.$success_msg.'</div>';
		}elseif(!empty($error_msg)){
			echo '<div class="alert alert-danger">'.$error_msg.'</div>';
		}
		?>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">Úprava alebo vloženie brigád <a href="<?php echo site_url('brigady/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
				<div class="panel-body">
					<form method="post" action="" class="form">
						<div class="form-group">
							<label for="title">Názov</label>
							<input type="text" class="form-control" name="nazov" id="nazov" placeholder="Vložte názov brigády" value="<?php echo !empty($post['nazov'])?$post['nazov']:''; ?>">
							<?php echo form_error('nazov','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Dátum</label>
							<input type="text" class="form-control" name="datum" id="datum" placeholder="Vložte dátum podľa vzoru 2020-04-16" value="<?php echo !empty($post['datum'])?$post['datum']:''; ?>">
							<?php echo form_error('datum','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Plat za hodinu</label>
							<input type="text" class="form-control" name="plat_za_hodinu" id="plat_za_hodinu" placeholder="Vložte plat za hodinu" value="<?php echo !empty($post['plat_za_hodinu'])?$post['plat_za_hodinu']:''; ?>">
							<?php echo form_error('plat_za_hodinu','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Aktuálne</label>
							<input type="text" class="form-control" name="aktualne" id="aktualne" placeholder="Vložte aktuálnosť (0/1)" value="<?php echo !empty($post['aktualne'])?$post['aktualne']:''; ?>">
							<?php echo form_error('aktualne','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Názov zamestnávateľa</label>
							<?php echo form_dropdown('zamestnavatel_id_zamestnavatela', $users, $users_selected, 'class="form-control"'); ?>
							<?php echo form_error('zamestnavatel_id_zamestnavatela','<p class="help-block text-danger">','</p>'); ?>
						</div>
				</div>
						<div class="form-group">
						<input type="submit" name="postSubmit" class="btn btn-primary" value="Poslať"/>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
