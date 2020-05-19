<div class="container">
	<div class="row"><br></div>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">Detail brigády študenta<a href="<?php echo site_url('studenti_has_brigady/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
			<div class="panel-body">
				<div class="form-group">
					<label>ID:</label>
					<p><?php echo !empty($studenti_has_brigady['id_studenti_has_brigady'])?$studenti_has_brigady['id_studenti_has_brigady']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Odkedy:</label>
					<p><?php echo !empty($studenti_has_brigady['odkedy'])?$studenti_has_brigady['odkedy']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Dokedy:</label>
					<p><?php echo !empty($studenti_has_brigady['dokedy'])?$studenti_has_brigady['dokedy']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Počet hodín:</label>
					<p><?php echo !empty($studenti_has_brigady['pocet_hodin'])?$studenti_has_brigady['pocet_hodin']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Plat za hodinu:</label>
					<p><?php echo !empty($studenti_has_brigady['plat_za_hod'])?$studenti_has_brigady['plat_za_hod']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Meno študenta:</label>
					<p><?php echo !empty($studenti_has_brigady['cele_meno'])?$studenti_has_brigady['cele_meno']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Názov brigády:</label>
					<p><?php echo !empty($studenti_has_brigady['nazov_b'])?$studenti_has_brigady['nazov_b']:''; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
