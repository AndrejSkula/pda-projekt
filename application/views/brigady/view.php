<div class="container">
	<div class="row"><br></div>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">Detail záznamu <a href="<?php echo site_url('brigady/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
			<div class="panel-body">
				<div class="form-group">
					<label>ID:</label>
					<p><?php echo !empty($brigady['id_brigady'])?$brigady['id_brigady']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Nazov:</label>
					<p><?php echo !empty($brigady['nazov'])?$brigady['nazov']:''; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
