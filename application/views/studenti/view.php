<div class="container">
	<div class="row"><br></div>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">Detail študenta<a href="<?php echo site_url('studenti/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
			<div class="panel-body">
				<div class="form-group">
					<label>ID:</label>
					<p><?php echo !empty($studenti['id_studenta'])?$studenti['id_studenta']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Meno:</label>
					<p><?php echo !empty($studenti['meno'])?$studenti['meno']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Priezvisko:</label>
					<p><?php echo !empty($studenti['priezvisko'])?$studenti['priezvisko']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Telefónne číslo:</label>
					<p><?php echo !empty($studenti['telefonne_cislo'])?$studenti['telefonne_cislo']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Adresa:</label>
					<p><?php echo !empty($studenti['adresa'])?$studenti['adresa']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Email:</label>
					<p><?php echo !empty($studenti['email'])?$studenti['email']:''; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
