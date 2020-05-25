</div>
<!-- Morris.js -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>/assets/theme/bower_components/jquery/dist/jquery.min.js"></script>

<script>
	new Morris.Bar({
		element: 'prvyGraf',
		data: <?php echo $graf1; ?>,
		xkey: 'nazov_zamestnavatela',
		ykeys: ['plat_za_hodinu'],
		barColors: ['#438add', '#3c7cc6', '#356eb0', '#2e609a', '#285284'],
		labels: ['Plat za hodinu'],
		resize: true
	});
</script>
<script>
	Morris.Donut({
		element: 'druhyGraf',
		data: <?php echo $graf2; ?>,
		colors: ['#438add', '#3c7cc6', '#356eb0', '#2e609a', '#285284']
	});
</script>
<script>
	new Morris.Bar({
		element: 'tretiGraf',
		data: <?php echo $graf3; ?>,
		xkey: 'datum',
		ykeys: ['plat_za_hodinu'],
		barColors: ['#438add', '#3c7cc6', '#356eb0', '#2e609a', '#285284'],
		labels: ['pocet'],
		resize: true
	});
</script>
</body>
</html>
