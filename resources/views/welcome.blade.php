<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
        <style>
            html, body {
                background-color: #4b5970;
                color: #d6cbaf;
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
            .footer{
                width: 100%;
                position: relative;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref">
            

            <div class="content">
                <div class="top links">
                    <h2>Tecnicas de Simulación (TDS-115)</h2><br>
                    <span>Proyecto de Ciclo</span><br>
                    <span>Merino Aquino, Oscar René - MA09040</span><br>
                    <span>Guillen Leon, Isaac Stanley - GL08004</span><br>
                    <span>Segovia Romero, Rodrigo Daniel - SR11038</span><br>
                </div>
                <div>
                    <br>
                    <span>
                        Clínica Dental<br><br>
                        Etapa 1 Servidor de cola infinita<br>
                        Etapa 2 Servidor de cola limitada<br>
                    </span><br>
                    <form action="/simular" method="post">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label># de Iteraciones</label>
                            <input type="text" name="num" value="31" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Tamaño limite de la cola en la Etapa 2:</label>
                            <input type="text" name="cl2" value="10" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Tiempo entre llegadas de los clientes a la cola 1 (AT) de forma aleatoria:</label><br>

                            <div class="form-group col-sm-4">
                                <label>Indique un limite inferior de tiempo en minutos:</label>
                                <input type="number" name="limitei" value="10" class="form-control" min="0">
                            </div>

                            <div class="form-group col-sm-4">
                                <label>Indique un limite superior de tiempo en minutos:</label>
                                <input type="number" name="limites" value="20" class="form-control" max="100">
                            </div>

                        </div>

                        <div class="form-group">                        
                            <label>Llegada del primer cliente a la cola (AT0):</label>
                            <input type="text" name="atinicial" value="5" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Tiempo de Servicio en el servidor 1 (DT1):</label>
                            <input type="text" name="dt1" value="10" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Tiempo de Servicio en el servidor 2 (DT2): Tiempo en que el doctor se tarda en atender un paciente.</label><br>

                            <div class="form-group col-sm-4">
                                <label>Indique un limite inferior de tiempo en minutos:</label>
                                <input type="number" name="limitei2" value="20" class="form-control" min="0">
                            </div>

                            <div class="form-group col-sm-4">
                                <label>Indique un limite superior de tiempo en minutos:</label>
                                <input type="number" name="limites2" value="45" class="form-control" max="100">
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <label>Intervalo en que se arruina el server 1 (BR1):</label>
                            <input type="text" name="br1" value="120" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Intervalo en que se arruina el server 2 (BR2):</label>
                            <input type="text" name="br2" value="120" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Tiempo operacional del server 1 (TOP1):</label>
                            <input type="text" name="top1" value="130" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Tiempo operacional del server 2 (TOP2):</label>
                            <input type="text" name="top2" value="150" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Tiempo de reparación del server 1 (OP1):</label>
                            <input type="text" name="op1" value="15" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Tiempo de reparación del server 2 (OP2):</label>
                            <input type="text" name="op2" value="10" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Simular" class="btn btn-primary">
                        </div>

                    </form>
                    <div>
                    <h2>Universidad de El Salvador</h2>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
