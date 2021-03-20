<?php
namespace Lpnklf\Core\dao\impl;

use Lpnklf\Core\dao\ITipoProductoDAO;

use Lpnklf\Core\model\TipoProducto;

use Cose\Crud\dao\impl\CrudDAO;

use Cose\criteria\ICriteria;

use Cose\exception\DAOException;
use Doctrine\ORM\QueryBuilder;

/**
 * dao para TipoProducto
 *  
 * @author Marcos
 * 
 */
class TipoProductoDoctrineDAO extends CrudDAO implements ITipoProductoDAO{
	
	protected function getClazz(){
		return get_class( new TipoProducto() );
	}
	
	protected function getQueryBuilder(ICriteria $criteria){
		
		$queryBuilder = $this->getEntityManager()->createQueryBuilder();
		
		$queryBuilder->select(array('tp'))
	   				->from( $this->getClazz(), "tp");
		
					
		return $queryBuilder;
	}

	protected function getQueryCountBuilder(ICriteria $criteria){
		
		$queryBuilder = $this->getEntityManager()->createQueryBuilder();
		
		$queryBuilder->select('count(tp.oid)')
	   				->from( $this->getClazz(), "tp");
								
		return $queryBuilder;
	}

	protected function enhanceQueryBuild(QueryBuilder $queryBuilder, ICriteria $criteria){
	
		$nombre = $criteria->getNombre();
		if( !empty($nombre) ){
			$queryBuilder->andWhere("upper(tp.nombre)  like :nombre");
			$queryBuilder->setParameter( "nombre" , "%$nombre%" );
		}
		
		
		$servicioTecnico = $criteria->getServicioTecnico();
		if( !empty($servicioTecnico) ){
			if ($servicioTecnico == 2) {
				$queryBuilder->andWhere("upper(tp.servicioTecnico)  = 1");
			}
			else 
				$queryBuilder->andWhere("upper(tp.servicioTecnico)  = 0");
		}
		
		
	}	
	
	protected function getFieldName($name){
		
		$hash = array();
		
		if( array_key_exists($name, $hash) )
			return $hash[$name];
		else{
			return "tp.$name";	
		}	
		
	}	
}