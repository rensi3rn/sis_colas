<?php
/**
*@package pXP
*@file gen-ACTVideo.php
*@author  (favio.figueroa)
*@date 08-08-2017 21:46:18
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTVideo extends ACTbase{    
			
	function listarVideo(){
		$this->objParam->defecto('ordenacion','id_video');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODVideo','listarVideo');
		} else{
			$this->objFunc=$this->create('MODVideo');
			
			$this->res=$this->objFunc->listarVideo($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarVideo(){
		$this->objFunc=$this->create('MODVideo');	
		if($this->objParam->insertar('id_video')){
			$this->res=$this->objFunc->insertarVideo($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarVideo($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarVideo(){
			$this->objFunc=$this->create('MODVideo');	
		$this->res=$this->objFunc->eliminarVideo($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>