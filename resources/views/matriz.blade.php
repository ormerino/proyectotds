<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Resultados</title>
	<!-- Styles -->
	<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
        <style>
            html, body {
				background-color: #4b5970;
                color: #000;
                font-family: sans-serif;
                font-weight: 100;
                margin: 0;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref{
                position: relative;
            }

            .top {
                position: relative;
                margin-bottom: 10px;
            }

            .content {
                margin-top: 50px;
                text-align: left;
                background: #fff;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

        </style>
</head>
<body>
	<div class="flex-center position-ref full-height">
		<div class="content">
			<table class="table table-bordered">
				<thead>
					<tr class="info">
						<td colspan="8">Etapa 1</td>
						<td colspan="6">Etapa 2</td>
					</tr>
					<tr>
						<td>Paso</td>
						<td>MC</td>
						<td>AT</td>
						<td>Clientes</td>
						<td>DT1</td>
						<td>BR1</td>
						<td>OP1</td>
						<td>Servidor</td>
						<td>Clientes</td>
						<td>DT2</td>
						<td>BR2</td>
						<td>OP2</td>
						<td>Servidor</td>
						<td>AT rand</td>
					</tr>
				</thead>
				<tbody>
				@foreach ($resultados as $res )
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>{{$res[0]}}</td>
						<td>{{$res[1]}}</td>
						<td>{{$res[2]}}</td>
						<td>{{$res[3]}}</td>
						<td>{{$res[4]}}</td>
						<td>{{$res[5]}}</td>
						<td>{{$res[6]}}</td>
						<td>{{$res[7]}}</td>
						<td>{{$res[8]}}</td>
						<td>{{$res[9]}}</td>
						<td>{{$res[10]}}</td>
						<td>{{$res[11]}}</td>
						<td>{{$res[12]}}</td>
					</tr>	
				@endforeach
				</tbody>
			</table>
			<a href="/">
				<h2>Regresar</h2>
			</a>
		</div>
	</div>
	<br><br><br>
</body>
</html>