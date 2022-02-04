<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Azzara Bootstrap 4 Admin Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

	<!-- Jquery link -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/azzara.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:wght@500;700&display=swap');
		.modal-backdrop.show{
			display: none;
			opacity: 0;
		}
		body{
			overflow-y: scroll;
		}
		    @page{
		            width: 3508px;
		            height: 2480px;
		    }
		    @media print
		    {    
		        .no-print, .no-print *
		        {
		            display: none !important;
		        }
		       
		    }
		.background_manage{
			background: #0000004d;
		}
		.bank_name {
		    font-size: 11px;
		    margin: 10px 0 0 10px;
		    font-family: Alegreya sans sc;
		    text-transform: uppercase;
		}
		.inner_table td, .inner_table th{
			font-family: Alegreya sans sc;
			font-size: 12px !important;
			padding: 10px;
			border: 1px solid #000;
			width: 50%;
		}
		.inner_table{
			width: 100%;
		}
		.print_btn{
			display: flex;
			justify-content: space-between;
		}
		.notice th{
			border: none;
		}
		.notice th span{
			font-weight: 100;
		}
	</style>
</head>
