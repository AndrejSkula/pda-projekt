<div class="container">
	<div class="row"><br></div>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">Detail brigády <a href="<?php echo site_url('brigady/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
			<div class="panel-body">
				<div class="form-group">
					<label>ID:</label>
					<p><?php echo !empty($brigady['id_brigady'])?$brigady['id_brigady']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Nazov:</label>
					<p><?php echo !empty($brigady['nazov'])?$brigady['nazov']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Dátum:</label>
					<p><?php echo !empty($brigady['datum'])?$brigady['datum']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Plat za hodinu:</label>
					<p><?php echo !empty($brigady['plat_za_hodinu'])?$brigady['plat_za_hodinu']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Aktuálne:</label>
					<p><?php echo !empty($brigady['aktualne'])?$brigady['aktualne']:''; ?></p>
				</div>
				<div class="form-group">
					<label>ID zamestnavatela:</label>
					<p><?php echo !empty($brigady['zamestnavatel_id_zamestnavatela'])?$brigady['zamestnavatel_id_zamestnavatela']:''; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
