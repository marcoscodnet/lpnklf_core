<?php
namespace Lpnklf\Core\service\impl;


use Lpnklf\Core\criteria\CajaCriteria;

use Lpnklf\Core\service\ICajaService;

use Lpnklf\Core\dao\DAOFactory;

use Cose\Crud\service\impl\CrudService;

use Cose\Security\service\SecurityContext;
use Cose\exception\ServiceException;
use Cose\exception\ServiceNoResultException;
use Cose\exception\ServiceNonUniqueResultException;
use Cose\exception\DuplicatedEntityException;
use Cose\exception\DAOException;

/**
 * servicio para cajachica
 *  
 * @author Marcos
 * @since 21-03-2018
 *
 */
class CajaServiceImpl extends CrudService implements ICajaService {

	
	protected function getDAO(){
		return DAOFactory::getCajaDAO();
	}
	
	function add( $entity ){
		
		$entity->setSaldo( $entity->getSaldoInicial() );
		
		parent::add( $entity );

	}
	
	function validateOnAdd( $entity ){
	
		//TODO que tenga cliente?
			
		//TODO unicidad (cliente )
		
	}
		
	
	function validateOnUpdate( $entity ){
	
		$this->validateOnAdd($entity);
	}
	
	function validateOnDelete( $oid ){}

	
}	