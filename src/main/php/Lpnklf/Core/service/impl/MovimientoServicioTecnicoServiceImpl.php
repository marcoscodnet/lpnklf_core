<?php
namespace Lpnklf\Core\service\impl;




use Lpnklf\Core\model\Cuenta;

use Lpnklf\Core\service\IMovimientoCuentaService;

use Lpnklf\Core\model\MovimientoServicioTecnico;

use Lpnklf\Core\service\ServiceFactory;

use Lpnklf\Core\model\Caja;

use Lpnklf\Core\model\ServicioTecnico;

use Lpnklf\Core\model\EstadoVenta;

use Lpnklf\Core\service\IServicioTecnicoService;

use Lpnklf\Core\dao\DAOFactory;

use Cose\Crud\service\impl\CrudService;

use Cose\Security\service\SecurityContext;
use Cose\Security\model\User;

use Cose\exception\ServiceException;
use Cose\exception\ServiceNoResultException;
use Cose\exception\ServiceNonUniqueResultException;
use Cose\exception\DuplicatedEntityException;
use Cose\exception\DAOException;

/**
 * servicio para MovimientoServicioTecnico
 *  
 * @author Marcos
 * @since 04-04-2018
 *
 */
class MovimientoServicioTecnicoServiceImpl extends MovimientoCajaServiceImpl {

	
	protected function getDAO(){
		return DAOFactory::getMovimientoServicioTecnicoDAO();
	}
		
	
	
	function getTotales( Cuenta $cuenta=null, \Datetime $fecha = null){
		
		$result = $this->getDAO()->getTotales($cuenta, $fecha);
		$totales = $result[0];
		return $totales["haber"] - $totales["debe"];
		
	}
	
	
	
	function getTotalesPorCategoria( Cuenta $cuenta=null, \Datetime $fecha = null){
		
		$result = $this->getDAO()->getTotalesPorCategoria($cuenta, $fecha);
		return $result;
		
	}
	
	function getTotalesMes( Cuenta $cuenta=null, \Datetime $fecha = null){
		
		$result = $this->getDAO()->getTotalesMes($cuenta, $fecha);
		return $result;
		
	}
	
	function getTotalesAnioPorMes( Cuenta $cuenta=null, $anio){
		
		$result = $this->getDAO()->getTotalesAnioPorMes($cuenta, $anio);
		return $result;
		
	}
	
}	