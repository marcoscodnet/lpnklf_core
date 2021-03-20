<?php
namespace Lpnklf\Core\dao\impl;

use Lpnklf\Core\utils\LpnklfUtils;

use Lpnklf\Core\model\Caja;

use Lpnklf\Core\model\CategoriaProducto;

use Lpnklf\Core\dao\IMovimientoServicioTecnicoDAO;

use Lpnklf\Core\model\MovimientoServicioTecnico;

use Lpnklf\Core\model\ConceptoMovimiento;

use Lpnklf\Core\dao\IConceptoMovimientoDAO;

use Lpnklf\Core\criteria\ConceptoMovimientoCriteria;

use Cose\Crud\dao\impl\CrudDAO;

use Cose\criteria\ICriteria;

use Cose\exception\DAOException;
use Doctrine\ORM\QueryBuilder;

use Lpnklf\Core\model\Cuenta;
use Doctrine\ORM\Query\Expr\Andx;

/**
 * dao para MovimientoServicioTecnico
 *  
 * @author Marcos
 * @since 04-04-2018
 * 
 */
class MovimientoServicioTecnicoDoctrineDAO extends CrudDAO implements IMovimientoServicioTecnicoDAO{
	
	protected function getClazz(){
		return get_class( new MovimientoServicioTecnico() );
	}
	
	protected function getQueryBuilder(ICriteria $criteria){
		
		$queryBuilder = $this->getEntityManager()->createQueryBuilder();
		
		$queryBuilder->select(array('mst', 'c', 'st'))
	   				->from( $this->getClazz(), "mst")
					->leftJoin('mst.cuenta', 'c')
					->leftJoin('mst.servicioTecnico', 'st');
		
		return $queryBuilder;
	}

	protected function getQueryCountBuilder(ICriteria $criteria){
		
		$queryBuilder = $this->getEntityManager()->createQueryBuilder();
		
		$queryBuilder->select('count(mst.oid)')
	   				->from( $this->getClazz(), "mst")
					->leftJoin('mst.cuenta', 'c')
					->leftJoin('mst.servicioTecnico', 'st');
								
		return $queryBuilder;
	}

	protected function enhanceQueryBuild(QueryBuilder $queryBuilder, ICriteria $criteria){
	
//		$oid = $criteria->getOidNotEqual();
//		if( !empty($oid) ){
//			$queryBuilder->andWhere( "mv.oid <> $oid");
//		}
		
		//TODO filtrar por cuenta y fecha.

		$fecha = $criteria->getFecha();
		if( !empty($fecha) ){
			$queryBuilder->andWhere( "mst.fecha = '" . $fecha->format("Y-m-d") . "'");
		}
		
		$fechaDesde = $criteria->getFechaDesde();
		if( !empty($fechaDesde) ){
			$queryBuilder->andWhere( "mst.fecha >= '" . $fechaDesde->format("Y-m-d") . "'");
		}
	
		$fechaHasta = $criteria->getFechaHasta();
		if( !empty($fechaHasta) ){
			$queryBuilder->andWhere( "mst.fecha <= '" . $fechaHasta->format("Y-m-d") . "'");
		}
		
		
		$servicioTecnico = $criteria->getServicioTecnico();
		if( !empty($servicioTecnico) && $servicioTecnico!=null){
			$servicioTecnicoOid = $servicioTecnico->getOid();
			if(!empty($servicioTecnicoOid))
				$queryBuilder->andWhere( "st.oid= $servicioTecnicoOid" );
		}
		
		
	}	
	
	protected function getFieldName($name){
		
		$hash = array();
		
		if( array_key_exists($name, $hash) )
			return $hash[$name];
		else{
			return "mst.$name";	
		}	
		
	}


	public function getTotales(Cuenta $cuenta=null, \Datetime $fecha = null){
	
		try {
			
			$movimientoClass = get_class( new MovimientoServicioTecnico() );
			
			
			
			$emConfig = $this->getEntityManager()->getConfiguration();
			$emConfig->addCustomDatetimeFunction('YEAR', 'DoctrineExtensions\Query\Mysql\Year');
    		$emConfig->addCustomDatetimeFunction('MONTH', 'DoctrineExtensions\Query\Mysql\Month');
    		$emConfig->addCustomDatetimeFunction('DAY', 'DoctrineExtensions\Query\Mysql\Day');

			$queryBuilder = $this->getEntityManager()->createQueryBuilder();
		
			$queryBuilder->select('SUM(mc.debe) as debe, SUM(mc.haber) as haber')
	   				->from( $movimientoClass, "mc")
					->leftJoin('mc.cuenta', 'c');
					
			if( $cuenta != null )		
				$queryBuilder->andWhere( "c.oid=" .  $cuenta->getOid() );
			
			if($fecha != null ){
				$queryBuilder->andWhere( "MONTH(mc.fecha) = " . $fecha->format("m") );
				$queryBuilder->andWhere( "YEAR(mc.fecha) = " . $fecha->format("Y") );
				$queryBuilder->andWhere( "DAY(mc.fecha) = " . $fecha->format("d") );
			}
			
			
			$q = $queryBuilder->getQuery();

			$r = $q->getScalarResult();
		
			return $r;
			
		} catch (\Doctrine\ORM\Query\QueryException $e) {
			
			throw new DAOException( $e->getMessage() );
			
		} catch (\Exception $e) {
			
			throw new DAOException( $e->getMessage() );
			
		}
	}
	


	public function getTotalesPorCategoria(Cuenta $cuenta =null, \Datetime $fecha = null){
	
		try {
			
			$movimientoClass = get_class( new MovimientoServicioTecnico() );
			
			
			
			$emConfig = $this->getEntityManager()->getConfiguration();
			$emConfig->addCustomDatetimeFunction('YEAR', 'DoctrineExtensions\Query\Mysql\Year');
    		$emConfig->addCustomDatetimeFunction('MONTH', 'DoctrineExtensions\Query\Mysql\Month');
    		$emConfig->addCustomDatetimeFunction('DAY', 'DoctrineExtensions\Query\Mysql\Day');

			$queryBuilder = $this->getEntityManager()->createQueryBuilder();
		
			$queryBuilder->select('SUM(dv.precioUnitario * dv.cantidad) as monto, cp.nombre as categoria')
	   				->from( $movimientoClass, "mc")
					->leftJoin('mc.cuenta', 'c')
					->leftJoin('mc.servicioTecnico', 'v')
					;

			if( $cuenta != null )
				$queryBuilder->andWhere( "c.oid=" .  $cuenta->getOid() );
			
			if($fecha != null ){
				$queryBuilder->andWhere( "MONTH(mc.fecha) = " . $fecha->format("m") );
				$queryBuilder->andWhere( "YEAR(mc.fecha) = " . $fecha->format("Y") );
				$queryBuilder->andWhere( "DAY(mc.fecha) = " . $fecha->format("d") );
			}
			
			$queryBuilder->groupBy( "cp.oid" );
			
			
			$q = $queryBuilder->getQuery();

			$r = $q->getResult();
		
			return $r;
			
		} catch (\Doctrine\ORM\Query\QueryException $e) {
			
			throw new DAOException( $e->getMessage() );
			
		} catch (\Exception $e) {
			
			throw new DAOException( $e->getMessage() );
			
		}
	}
	
	public function getTotalesMes(Cuenta $cuenta=null, \Datetime $fecha){
	
		try {
			
			$movimientoClass = get_class( new MovimientoServicioTecnico() );
			
			
			
			$emConfig = $this->getEntityManager()->getConfiguration();
			$emConfig->addCustomDatetimeFunction('YEAR', 'DoctrineExtensions\Query\Mysql\Year');
    		$emConfig->addCustomDatetimeFunction('MONTH', 'DoctrineExtensions\Query\Mysql\Month');
    		$emConfig->addCustomDatetimeFunction('DAY', 'DoctrineExtensions\Query\Mysql\Day');

			$queryBuilder = $this->getEntityManager()->createQueryBuilder();
		
			$queryBuilder->select('SUM(mc.haber - mc.debe) as total, DAY(mc.fecha) as dia')
	   				->from( $movimientoClass, "mc")
					->leftJoin('mc.cuenta', 'c');
					
			if( $cuenta != null )		
				$queryBuilder->andWhere( "c.oid=" .  $cuenta->getOid() );
			
			if($fecha != null ){
				$queryBuilder->andWhere( "MONTH(mc.fecha) = " . $fecha->format("m") );
				$queryBuilder->andWhere( "YEAR(mc.fecha) = " . $fecha->format("Y") );
				//$queryBuilder->andWhere( "DAY(mc.fecha) = " . $fecha->format("d") );
			}
			
			
			$queryBuilder->groupBy( "dia" );
			
			
			$q = $queryBuilder->getQuery();

			$r = $q->getResult();
		
			return $r;
						
		} catch (\Doctrine\ORM\Query\QueryException $e) {
			
			throw new DAOException( $e->getMessage() );
			
		} catch (\Exception $e) {
			
			throw new DAOException( $e->getMessage() );
			
		}
	}
	
	public function getTotalesAnioPorMes(Cuenta $cuenta=null, $anio){
	
		try {
			
			$movimientoClass = get_class( new MovimientoServicioTecnico() );
			
			
			
			$emConfig = $this->getEntityManager()->getConfiguration();
			$emConfig->addCustomDatetimeFunction('YEAR', 'DoctrineExtensions\Query\Mysql\Year');
    		$emConfig->addCustomDatetimeFunction('MONTH', 'DoctrineExtensions\Query\Mysql\Month');
    		$emConfig->addCustomDatetimeFunction('DAY', 'DoctrineExtensions\Query\Mysql\Day');

			$queryBuilder = $this->getEntityManager()->createQueryBuilder();
		
			$queryBuilder->select('SUM(mc.haber - mc.debe) as total, MONTH(mc.fecha) as mes')
	   				->from( $movimientoClass, "mc")
					->leftJoin('mc.cuenta', 'c');
					
			if( $cuenta != null )		
				$queryBuilder->andWhere( "c.oid=" .  $cuenta->getOid() );
			
			$queryBuilder->andWhere( "YEAR(mc.fecha) = " . $anio );
			
			
			$queryBuilder->groupBy( "mes" );
			
			$q = $queryBuilder->getQuery();

			$r = $q->getResult();
		
			return $r;
						
		} catch (\Doctrine\ORM\Query\QueryException $e) {
			
			throw new DAOException( $e->getMessage() );
			
		} catch (\Exception $e) {
			
			throw new DAOException( $e->getMessage() );
			
		}
	}
	
	
	
}