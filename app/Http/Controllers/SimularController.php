<?php

namespace proyectotds\Http\Controllers;

use Illuminate\Http\Request;

class SimularController extends Controller
{
    //
    public function simular(Request $request){
    	$data['resultados']= $this->calcular($request);
    	return view('matriz',$data);
    	//return json_encode($data['resultados']);
    }

    public function calcular($request){
    	for ($i=0; $i < $request['num']; $i++) { //Bucle que controla los pasos a evaluar en la simulacion

    		if ($i==0) { //Si i=0 se establecen las condiciones iniciales de la simulación
    			$mc = 0; 						//valor de Master Clock
    			$cl1=0;							//Clientes en la cola 1
    			$at = $request['atinicial'];	//Tiempo de la primera llegada
    			$dt1 = '';
    			$br1 = $request['br1'];
    			$op1 = '';
    			$server1 = 'Vacio';
    			$cl2 = 0;
    			$dt2 = '';
    			$br2 = $request['br2'];
    			$op2 = '';
    			$server2 = 'Vacio';
    			$cl1pendiente=0;
                $li = $request['limitei'];
                $ls = $request['limites'];
    		}

            //Calculando el tiempo aleatorio de la siguiente llegada
            $random = rand($li,$ls);

    		$resultado[] = array($mc,$at,$cl1,$dt1,$br1,$op1,$server1,$cl2,$dt2,$br2,$op2,$server2,$random); 		

    		//Si las siguientes variables no estan vacias se agregaran al array $menor
    		$menor = array($at);
    		if (!($dt1 == '')) {
    			$menor[] = $dt1;
    		}
    		if (!($br1 == '')) {
    			$menor[] = $br1;
    		}
    		if (!($op1 == '')) {
    			$menor[] = $op1;
    		}
    		if (!($dt2 == '')) {
    			$menor[] = $dt2;
    		}
    		if (!($br2 == '')) {
    			$menor[] = $br2;
    		}
    		if (!($op2 == '')) {
    			$menor[] = $op2;
    		}

    		//encontrando el menor del array
    		$mc = min($menor);

    		switch ($mc) {
    			

    			case ($mc==$br2):
    					$op2=$mc+$request['op2'];
    					$br2='';
    					if ($server2=='Ocupado')
    						$dt2=$dt2+$request['op2'];

    					if(!($op2==''))
    						$server2 = 'En reparacion';
    				break;

    			case ($mc==$op2):
    					$br2=$mc+$request['top2'];
    					$op2='';
    					if ($cl2>0)
    						$server2='Ocupado';
    					else
    						$server2='Vacio';
    				break;

    			case ($mc==$at):
    					$cl1++;


	    					if ($server1=='En reparacion'){
	    						$dt1=$op1+$request['dt1'];
	    					}
	    					elseif($server1=='Vacio'){
	    						$dt1=$at+$request['dt1'];
	    						if ($cl1>0)
	    							$server1 = 'Ocupado';
	    					}

    					$at=$at+$random;				
    				break;

    			case ($mc==$dt2):
    					$cl2--;
    					if ($cl2>0) 
    						$dt2 =$mc+$request['dt2'];

    					if ($cl2==0){
    						$server2 = 'Vacio';
    						$dt2 ='';
    					}

    					if ($cl1pendiente>0) {
    						$cl2++;
    						$dt2=$mc+$request['dt2'];
    						$cl1--;    						
    						if ($cl1>0){
    							$dt1=$mc+$request['dt1'];
    							$server1='Ocupado';
    						}
    						else
    							$server1='Vacio';
    						$cl1pendiente--;
    					}
    				break;

    			case ($mc==$dt1):
    					$cl2counter= $cl2+1;
    					if ($cl2counter<=$request['cl2']) {    				
	    					$cl1--;
	    					if($cl1>0){ //Si la cola aun tiene clientes asigna el siguiente tiempo de servicio para el nuevo cliente
	    						$dt1=$dt1+$request['dt1'];
	    						$server1 = 'Ocupado';
	    					}
	    					else{
	    						$dt1 ='';

	    						if ($cl1==0)
	    						$server1 = 'Vacio';
	    					}
	    					

	    					$cl2++;
	    					if(!($server2=='En reparacion')){
		    					$dt2=$mc+$request['dt2'];

		    					if ($cl2>0)
		    						$server2 = 'Ocupado';
	    					}
	    				}
	    				else{
	    					$dt1='';
	    					$server1 = 'Bloqueado';
	    					$cl1pendiente++;
	    				}
    				break;

    			case ($mc==$br1):
    					$op1=$mc+$request['op1'];
    					$br1='';
    					if(!($op1==''))
    						$server1 = 'En reparacion';
    					if (!($dt1==''))
    						$dt1=$dt1+$request['op1'];
    				break;

    			case ($mc==$op1):
    					$br1=$mc+$request['top1'];
    					$op1='';
    					if ($cl1>0)
    						$server1='Ocupado';
    					else
    						$server1='Vacio';
    				break;
    			
    			default:
    				break;
    		}

    	}
    	return $resultado;
    }
}
