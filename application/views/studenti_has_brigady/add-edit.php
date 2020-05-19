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
				<div class="panel-heading">Úprava/vloženie brigády pre študenta<a href="<?php echo site_url('studenti_has_brigady/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
				<div class="panel-body">
					<form method="post" action="" class="form">
						<div class="form-group">
							<label for="title">Odkedy</label>
							<input type="text" class="form-control" name="odkedy" id="odkedy" placeholder="Vložte dátum nástupu do brigády napr. 2020-01-01" value="<?php echo !empty($post['odkedy'])?$post['odkedy']:''; ?>">
							<?php echo form_error('odkedy','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Dokedy</label>
							<input type="text" class="form-control" name="dokedy" id="dokedy" placeholder="Vložte dátum ukončenia brigády napr. 2020-01-02" value="<?php echo !empty($post['dokedy'])?$post['dokedy']:''; ?>">
							<?php echo form_error('dokedy','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Počet hodín</label>
							<input type="text" class="form-control" name="pocet_hodin" id="pocet_hodin" placeholder="Vložte počet odpracovaných hodín" value="<?php echo !empty($post['pocet_hodin'])?$post['pocet_hodin']:''; ?>">
							<?php echo form_error('pocet_hodin','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Plat za hodinu</label>
							<input type="text" class="form-control" name="plat_za_hod" id="plat_za_hod" placeholder="Vložte plat za hodinu" value="<?php echo !empty($post['plat_za_hod'])?$post['plat_za_hod']:''; ?>">
							<?php echo form_error('plat_za_hod','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<?php echo form_label('Meno študenta'); ?>
							<div class="input-group">
								<?php echo form_dropdown('studenti_id_studenta', $users, $users_selected, 'class="form-control"'); ?>
							</div>
						</div>
						<div class="form-group">
							<?php echo form_label('Názov brigády'); ?>
							<div class="input-group">
								<?php echo form_dropdown('brigady_id_brigady', $brigady, $brigady_vybrane, 'class="form-control"'); ?>
							</div>
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


