<?php
namespace Lpnklf\Core\dao\impl;

use Lpnklf\Core\dao\IHistoricoEstadoDAO;

use Lpnklf\Core\model\HistoricoEstado;

use Cose\Crud\dao\impl\CrudDAO;

use Cose\criteria\ICriteria;

use Cose\exception\DAOException;
use Doctrine\ORM\QueryBuilder;

/**
 * dao para HistoricoEstado
 *  
 * @author Marcos
 * 
 */
class HistoricoEstadoDoctrineDAO extends CrudDAO implements IHistoricoEstadoDAO{
	
	protected function getClazz(){
		return get_class( new HistoricoEstado() );
	}
	
	protected function getQueryBuilder(ICriteria $criteria){
		
		$queryBuilder = $this->getEntityManager()->createQueryBuilder();
		
		$queryBuilder->select(array('he', 'st', 'e', 'u'))
	   				->from( $this->getClazz(), "he")
	   				->leftJoin('he.servicioTecnico', 'st')
					->leftJoin('he.estado', 'e')
					->leftJoin('he.user', 'u')
					
					;
		
					
		return $queryBuilder;
	}

	protected function getQueryCountBuilder(ICriteria $criteria){
		
		$queryBuilder = $this->getEntityManager()->createQueryBuilder();
		
		$queryBuilder->select('count(he.oid)')
	   				->from( $this->getClazz(), "he")
	   				->leftJoin('he.servicioTecnico', 'st')
					->leftJoin('he.estado', 'e')
					->leftJoin('he.user', 'u');
	   				
								
		return $queryBuilder;
	}

	protected function enhanceQueryBuild(QueryBuilder $queryBuilder, ICriteria $criteria){
	
		
		$servicioTecnico = $criteria->getServicioTecnico();
		if( !empty($servicioTecnico) && $servicioTecnico!=null){
		
				$servicioTecnicoOid = $servicioTecnico->getOid();
				if(!empty($servicioTecnicoOid))
					$queryBuilder->andWhere( "st.oid= $servicioTecnicoOid" );
			
			
			
		}
		
		
		$estado = $criteria->getEstado();
		if( !empty($estado) && $estado!=null){
			if (is_object($estado)) {
				$estadoOid = $estado->getOid();
				if(!empty($estadoOid))
					$queryBuilder->andWhere( "e.oid= $estadoOid" );
			}
			else $queryBuilder->andWhere( "e.nombre like '%$estado%'");
			
		}
		
		$user = $criteria->getUser();
		if( !empty($user) && $user!=null){
			if (is_object($user)) {
				$userOid = $user->getOid();
				if(!empty($userOid))
					$queryBuilder->andWhere( "u.oid= $userOid" );
			}
			else $queryBuilder->andWhere( "u.username like '%$user%'");
			
		}
		
		
		
	
		$fechaDesdeDesde = $criteria->getFechaDesdeDesde();
		if( !empty($fechaDesdeDesde) ){
			$queryBuilder->andWhere("upper(he.fecha)  >= :fechaDesdeDesde");
			$desde = $fechaDesdeDesde->format("Y-m-d");
			$queryBuilder->setParameter( "fechaDesdeDesde" , "$desde" );
		}
	
		$fechaDesdeHasta = $criteria->getFechaDesdeHasta();
		if( !empty($fechaDesdeHasta) ){
			$queryBuilder->andWhere("upper(he.fecha)  <= :fechaDesdeHasta");
			$hasta = $fechaDesdeHasta->format("Y-m-d");
			$queryBuilder->setParameter( "fechaDesdeHasta" , "$hasta" );
		}
		
		$fechaHastaDesde = $criteria->getFechaHastaDesde();
		if( !empty($fechaHastaDesde) ){
			$queryBuilder->andWhere("upper(he.fecha)  >= :fechaHastaDesde");
			$desde = $fechaHastaDesde->format("Y-m-d");
			$queryBuilder->setParameter( "fechaHastaDesde" , "$desde" );
		}
		
	
		$fechaHastaHasta = $criteria->getFechaHastaHasta();
		if( !empty($fechaHastaHasta) ){
			$queryBuilder->andWhere("upper(he.fecha)  <= :fechaHastaHasta");
			$hasta = $fechaHastaHasta->format("Y-m-d");
			$queryBuilder->setParameter( "fechaHastaHasta" , "$hasta" );
		}
		$fechaHastaNull = $criteria->getFechaHastaNull();
		if( !empty($fechaHastaNull) ){
			$queryBuilder->andWhere($queryBuilder->expr()->isNull('he.fechaHasta'));
		}
	}	
	
	protected function getFieldName($name){
		
		$hash = array();
		
		if( array_key_exists($name, $hash) )
			return $hash[$name];
		else{
			return "he.$name";	
		}	
		
	}	
}