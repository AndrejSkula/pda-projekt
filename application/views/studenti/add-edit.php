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
				<div class="panel-heading"><?php echo $action; ?> Úprava alebo vloženie študentov <a href="<?php echo site_url('studenti/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
				<div class="panel-body">
					<form method="post" action="" class="form">
						<div class="form-group">
							<label for="title">Meno</label>
							<input type="text" class="form-control" name="meno" id="meno" placeholder="Vložte meno" value="<?php echo !empty($post['meno'])?$post['meno']:''; ?>">
							<?php echo form_error('meno','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Prievisko</label>
							<input type="text" class="form-control" name="priezvisko" placeholder="Vložte priezvisko" value="<?php echo !empty($post['priezvisko'])?$post['priezvisko']:''; ?>">
							<?php echo form_error('priezvisko','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Telefónne číslo</label>
							<input type="text" class="form-control" name="telefonne_cislo" placeholder="Vložte telefónne číslo" value="<?php echo !empty($post['telefonne_cislo'])?$post['telefonne_cislo']:''; ?>">
							<?php echo form_error('telefonne_cislo','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Adresa</label>
							<input type="text" class="form-control" name="adresa" placeholder="Vložte adresu" value="<?php echo !empty($post['adresa'])?$post['adresa']:''; ?>">
							<?php echo form_error('adresa','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Email</label>
							<input type="text" class="form-control" name="email" placeholder="Vložte email" value="<?php echo !empty($post['email'])?$post['email']:''; ?>">
							<?php echo form_error('email','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<input type="submit" name="postSubmit" class="btn btn-primary" value="Poslať"/>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
