<div class="container">
	<div class="row"><br></div>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">Detail zamestnávateľa<a href="<?php echo site_url('zamestnavatel/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
			<div class="panel-body">
				<div class="form-group">
					<label>ID:</label>
					<p><?php echo !empty($zamestnavatel['id_zamestnavatela'])?$zamestnavatel['id_zamestnavatela']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Názov:</label>
					<p><?php echo !empty($zamestnavatel['nazov_zamestnavatela'])?$zamestnavatel['nazov_zamestnavatela']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Telefónne číslo:</label>
					<p><?php echo !empty($zamestnavatel['telefonne_cislo'])?$zamestnavatel['telefonne_cislo']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Adresa:</label>
					<p><?php echo !empty($zamestnavatel['adresa'])?$zamestnavatel['adresa']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Email:</label>
					<p><?php echo !empty($zamestnavatel['email'])?$zamestnavatel['email']:''; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>

