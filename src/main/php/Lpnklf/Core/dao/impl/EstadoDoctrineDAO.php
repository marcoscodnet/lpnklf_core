<?php
namespace Lpnklf\Core\dao\impl;

use Lpnklf\Core\dao\IEstadoDAO;

use Lpnklf\Core\model\Estado;

use Cose\Crud\dao\impl\CrudDAO;

use Cose\criteria\ICriteria;

use Cose\exception\DAOException;
use Doctrine\ORM\QueryBuilder;

/**
 * dao para Estado
 *  
 * @author Marcos
 * 
 */
class EstadoDoctrineDAO extends CrudDAO implements IEstadoDAO{
	
	protected function getClazz(){
		return get_class( new Estado() );
	}
	
	protected function getQueryBuilder(ICriteria $criteria){
		
		$queryBuilder = $this->getEntityManager()->createQueryBuilder();
		
		$queryBuilder->select(array('e'))
	   				->from( $this->getClazz(), "e");
		
					
		return $queryBuilder;
	}

	protected function getQueryCountBuilder(ICriteria $criteria){
		
		$queryBuilder = $this->getEntityManager()->createQueryBuilder();
		
		$queryBuilder->select('count(e.oid)')
	   				->from( $this->getClazz(), "e");
								
		return $queryBuilder;
	}

	protected function enhanceQueryBuild(QueryBuilder $queryBuilder, ICriteria $criteria){
	
		$nombre = $criteria->getNombre();
		if( !empty($nombre) ){
			$queryBuilder->andWhere("upper(e.nombre)  like :nombre");
			$queryBuilder->setParameter( "nombre" , "%$nombre%" );
		}
		
		
		
		
		
	}	
	
	protected function getFieldName($name){
		
		$hash = array();
		
		if( array_key_exists($name, $hash) )
			return $hash[$name];
		else{
			return "e.$name";	
		}	
		
	}	
}