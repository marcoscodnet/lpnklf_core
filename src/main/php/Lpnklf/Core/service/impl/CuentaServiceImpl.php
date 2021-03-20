<?php
namespace Lpnklf\Core\service\impl;


use Lpnklf\Core\model\MovimientoCuenta;

use Lpnklf\Core\model\Cuenta;

use Lpnklf\Core\criteria\CuentaCriteria;

use Lpnklf\Core\model\Empleado;

use Lpnklf\Core\service\ICuentaService;

use Lpnklf\Core\dao\DAOFactory;

use Cose\Crud\service\impl\CrudService;

use Cose\Security\service\SecurityContext;
use Cose\exception\ServiceException;
use Cose\exception\ServiceNoResultException;
use Cose\exception\ServiceNonUniqueResultException;
use Cose\exception\DuplicatedEntityException;
use Cose\exception\DAOException;

/**
 * servicio para cuenta
 *  
 * @author Marcos
 * @since 09-03-2018
 *
 */
class CuentaServiceImpl extends CrudService implements ICuentaService {

	
	protected function getDAO(){
		return DAOFactory::getCuentaDAO();
	}
	
	function validateOnAdd( $entity ){
	
		//unicidad (numero + fecha + horaApertura )
		
	}
		
	
	function validateOnUpdate( $entity ){
	
		$this->validateOnAdd($entity);
	}
	
	function validateOnDelete( $oid ){}


	
	
}	