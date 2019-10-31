	<!-- jQuery and jQuery UI -->
	<script src="js/jquery-1.6.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery-ui-1.8.13.custom.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="css/smoothness/jquery-ui-1.8.13.custom.css" type="text/css" media="screen" charset="utf-8">

	<!-- elRTE -->
	<script src="js/elrte.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="css/elrte.min.css" type="text/css" media="screen" charset="utf-8">

	<!-- elRTE translation messages -->
	<script src="js/i18n/elrte.ru.js" type="text/javascript" charset="utf-8"></script>

	<script type="text/javascript" charset="utf-8">
		$().ready(function() {
			var opts1 = {
				cssClass : 'el-rte',
				// lang     : 'ru',
				height   : 500,
				toolbar  : 'complete',
				cssfiles : ['css/elrte-inner.css']
			}
			$('#txt1').elrte(opts1);
		})
	</script>