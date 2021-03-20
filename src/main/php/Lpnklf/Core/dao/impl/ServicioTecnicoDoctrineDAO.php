<?php
namespace Lpnklf\Core\dao\impl;

use Lpnklf\Core\dao\IServicioTecnicoDAO;

use Lpnklf\Core\model\ServicioTecnico;

use Cose\Crud\dao\impl\CrudDAO;

use Cose\criteria\ICriteria;

use Cose\exception\DAOException;
use Doctrine\ORM\QueryBuilder;

/**
 * dao para ServicioTecnico
 *  
 * @author Marcos
 * 
 */
class ServicioTecnicoDoctrineDAO extends CrudDAO implements IServicioTecnicoDAO{
	
	protected function getClazz(){
		return get_class( new ServicioTecnico() );
	}
	
	protected function getQueryBuilder(ICriteria $criteria){
		
		$queryBuilder = $this->getEntityManager()->createQueryBuilder();
		
		$queryBuilder->select(array('st', 'c', 'td', 'md'))
	   				->from( $this->getClazz(), "st")
					->leftJoin('st.cliente', 'c')
					->leftJoin('st.tipoProducto', 'td')
					->leftJoin('st.marcaProducto', 'md')
					
					;
		
					
		return $queryBuilder;
	}

	protected function getQueryCountBuilder(ICriteria $criteria){
		
		$queryBuilder = $this->getEntityManager()->createQueryBuilder();
		
		$queryBuilder->select('count(st.oid)')
	   				->from( $this->getClazz(), "st")
					->leftJoin('st.cliente', 'c')
					->leftJoin('st.tipoProducto', 'td')
					->leftJoin('st.marcaProducto', 'md')
					;
	   				
								
		return $queryBuilder;
	}

	protected function enhanceQueryBuild(QueryBuilder $queryBuilder, ICriteria $criteria){
	
		$fecha = $criteria->getFecha();
		if( !empty($fecha) ){
			$fecha->setTime(0,0,0);
			$queryBuilder->andWhere( "st.fecha >= '" . $fecha->format("Y-m-d") . "'");
			$fecha->modify("+1 day");
			$queryBuilder->andWhere( "st.fecha < '" . $fecha->format("Y-m-d") . "'");
		}
		
		$modelo = $criteria->getModelo();
		if( !empty($modelo) ){
			$queryBuilder->andWhere("upper(st.modelo)  like :modelo");
			$queryBuilder->setParameter( "modelo" , "%$modelo%" );
		}
		
		
		
		$cliente = $criteria->getCliente();
		if( !empty($cliente) && $cliente!=null){
			if (is_object($cliente)) {
				$clienteOid = $cliente->getOid();
				if(!empty($clienteOid))
					$queryBuilder->andWhere( "c.oid= $clienteOid" );
			}
			else $queryBuilder->andWhere( "c.nombre like '%$cliente%'");
			
		}
		
		$tipoProducto = $criteria->getTipoProducto();
		if( !empty($tipoProducto) && $tipoProducto!=null){
			if (is_object($tipoProducto)) {
				$tipoProductoOid = $tipoProducto->getOid();
				if(!empty($tipoProductoOid))
					$queryBuilder->andWhere( "td.oid= $tipoProductoOid" );
			}
			else $queryBuilder->andWhere( "td.nombre like '%$tipoProducto%'");
			
		}
		
		$marcaProducto = $criteria->getMarcaProducto();
		if( !empty($marcaProducto) && $marcaProducto!=null){
			if (is_object($marcaProducto)) {
				$marcaProductoOid = $marcaProducto->getOid();
				if(!empty($marcaProductoOid))
					$queryBuilder->andWhere( "md.oid= $marcaProductoOid" );
			}
			else $queryBuilder->andWhere( "md.nombre like '%$marcaProducto%'");
			
		}
		
		$fechaDesde = $criteria->getFechaDesde();
		if( !empty($fechaDesde) ){
			$queryBuilder->andWhere("upper(st.fecha)  >= :fechaDesde");
			$desde = $fechaDesde->format("Y-m-d");
			$queryBuilder->setParameter( "fechaDesde" , "$desde" );
		}
	
		$fechaHasta = $criteria->getFechaHasta();
		if( !empty($fechaHasta) ){
			$queryBuilder->andWhere("upper(st.fecha)  <= :fechaHasta");
			$hasta = $fechaHasta->format("Y-m-d");
			$queryBuilder->setParameter( "fechaHasta" , "$hasta" );
		}
		
		$estadoNot = $criteria->getEstadoNotEqual();
		if( !empty($estadoNot) ){
			$queryBuilder->andWhere( "st.estado != " . $estadoNot );
		}
		
		$estado = $criteria->getEstado();
		if( !empty($estado) ){
			$queryBuilder->andWhere( "st.estado = " . $estado );
		}
		
		$estados = $criteria->getEstados();
		if( !empty($estados) && count( $estados>0) ){
			
			$strEstados = implode(",", $estados );
			
			$queryBuilder->andWhere( $queryBuilder->expr()->in("st.estado", $strEstados) );
		}
		
	}	
	
	protected function getFieldName($name){
		
		$hash = array();
		
		if( array_key_exists($name, $hash) )
			return $hash[$name];
		else{
			return "st.$name";	
		}	
		
	}	
}