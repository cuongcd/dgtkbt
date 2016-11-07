<html>
	<head>
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 50px;
				margin-bottom: 40px;
			}
                        .label-a {
				font-size: 60px;
                                text-decoration:none !important;
			}
		</style>
	</head>
	<body>
		<div class="container">
                        <div class="title">Server connected error</div>
			<div class="content">
                            <div class="title">Please click <a class='label-a' href="{{ URL::route($error_reload_page) }}">reload</a> for reload page.</div>
			</div>
		</div>
	</body>
</html>
