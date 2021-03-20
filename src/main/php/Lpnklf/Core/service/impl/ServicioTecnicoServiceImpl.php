<?php
namespace Lpnklf\Core\service\impl;


use Lpnklf\Core\dao\DAOFactory;

use Lpnklf\Core\model\Cuenta;

use Lpnklf\Core\model\HistoricoEstado;

use Lpnklf\Core\criteria\HistoricoEstadoCriteria;

use Lpnklf\Core\criteria\MovimientoServicioTecnicoCriteria;

use Lpnklf\Core\utils\LpnklfUtils;

use Lpnklf\Core\model\MovimientoServicioTecnico;

use Lpnklf\Core\service\ServiceFactory;

use Lpnklf\Core\model\Caja;

use Lpnklf\Core\model\ServicioTecnico;

use Lpnklf\Core\model\EstadoVenta;

use Lpnklf\Core\service\IServicioTecnicoService;

use Cose\Crud\service\impl\CrudService;

//use Cose\Security\service\SecurityContext;
use Rasty\security\RastySecurityContext;
use Cose\Security\model\User;
use Cose\exception\ServiceException;
use Cose\exception\ServiceNoResultException;
use Cose\exception\ServiceNonUniqueResultException;
use Cose\exception\DuplicatedEntityException;
use Cose\exception\DAOException;




/**
 * servicio para ServicioTecnico
 *  
 * @author Marcos
 * @since 27-02-2018
 *
 */
class ServicioTecnicoServiceImpl extends CrudService implements IServicioTecnicoService {

	
	protected function getDAO(){
		return DAOFactory::getServicioTecnicoDAO();
	}
	
	
	/**
	 * redefino el add para agregar funcionalidad
	 * @param $entity
	 * @throws ServiceException
	 */
	public function add($entity){

		/*
		 * Hacemos lo que queremos con la estado. 
		 * Por ejemplo, enviar un email al usuario.
		 */
	
		$entity->setMontoDebe( $entity->getMonto() );
		$entity->setEstado( EstadoVenta::Impaga );
		//agregamos la estado.
		parent::add($entity);
		
		
		$historicoEstado = new HistoricoEstado();
		$historicoEstado->setEstado($entity->getEstadoServicio());
		$historicoEstado->setServicioTecnico($entity);
		$historicoEstado->setPrioridad($entity->getPrioridad());
		//$user = SecurityContext::getUser();
	//	$user = LpnklfUtils::getUserByUsername($user->getUsername());
	
		$user = RastySecurityContext::getUser();
		$user = LpnklfUtils::getUserByUsername($user->getUsername());
		
		$historicoEstado->setUser($user);
		$historicoEstado->setFechaDesde(new \Datetime());
		$historicoEstado->setUltModificacion(new \Datetime());
		$historicoEstado->setObservaciones($entity->getObservaciones());
		$historicoEstado->setDiagnostico($entity->getDiagnostico());
		$historicoEstado->setSolucion($entity->getSolucion());
		$historicoEstado->setDiasDemora($entity->getDiasDemora());
		$historicoEstado->setMonto($entity->getMonto());
		
		ServiceFactory::getHistoricoEstadoService()->add( $historicoEstado );
		
	}	
	
	public function update($entity){

		
		//agregamos la estado.
		$entity->setMontoDebe($entity->getMonto()-$entity->getMontoPagado() );
		parent::update($entity);
		
		
		$criteria = new HistoricoEstadoCriteria();
		$criteria->setServicioTecnico($entity);
		$criteria->setFechaHastaNull(1);
		
		$historicoEstadoAnterior = ServiceFactory::getHistoricoEstadoService()->getSingleResult( $criteria );
		
		if ($historicoEstadoAnterior->getEstado()->getOid()!=$entity->getEstadoServicio()->getOid()) {
			$user = RastySecurityContext::getUser();
			$user = LpnklfUtils::getUserByUsername($user->getUsername());
			$historicoEstadoAnterior->setFechaHasta(new \Datetime());
			$historicoEstadoAnterior->setUltModificacion(new \Datetime());
			$historicoEstadoAnterior->setUser($user);
			ServiceFactory::getHistoricoEstadoService()->update( $historicoEstadoAnterior );
			
			$historicoEstado = new HistoricoEstado();
			$historicoEstado->setEstado($entity->getEstadoServicio());
			$historicoEstado->setServicioTecnico($entity);
			$historicoEstado->setPrioridad($entity->getPrioridad());
		//	$user = LpnklfUtils::getUserByUsername($user->getUsername());
			$historicoEstado->setUser($user);
			$historicoEstado->setFechaDesde(new \Datetime());
			$historicoEstado->setUltModificacion(new \Datetime());
			$historicoEstado->setObservaciones($entity->getObservaciones());
			$historicoEstado->setDiagnostico($entity->getDiagnostico());
			$historicoEstado->setSolucion($entity->getSolucion());
			$historicoEstado->setDiasDemora($entity->getDiasDemora());
			$historicoEstado->setMonto($entity->getMonto());
			
			ServiceFactory::getHistoricoEstadoService()->add( $historicoEstado );
		}
		
		
		
	}	
	
	function validateOnAdd( $entity ){
	
		/*
		 * Realizamos validaciones sobre la estado. 
		 * Por ejemplo, campos obligatorios.
		 */		
	}
	
	
	
		
	
	function validateOnUpdate( $entity ){
	
		/*
		 * Validaciones como en el add pero 
		 * las necesarias para modificar.
		 */
		
		$this->validateOnAdd($entity);
	}
	
	function validateOnDelete( $oid ){
	
		/*
		 * validaciones al borrar una estado.
		 */
	}

	/**
	 * (non-PHPdoc)
	 * @see src/main/php/Lpnklf/Core/service/Lpnklf\Core\service.IServicioTecnicoService::cobrar()
	 */
	public function cobrar(ServicioTecnico $servicioTecnico, Cuenta $cuenta, User $user, $montoPagar){
		
		$this->validateOnCobrar($servicioTecnico, $cuenta);
		
		//seteamos la servicioTecnico como pagada
		//$servicioTecnico->setEstado( EstadoVenta::Pagada );
		
		//obtenemos lo que hay que pagar.
		//$montoPagar = $servicioTecnico->getMontoDebe();
		
		//$montoPagar = $servicioTecnico->getMonto();
		
		//seteamos lo que debe en 0.
		
		$servicioTecnico->setMontoPagado($servicioTecnico->getMontoPagado()+$montoPagar);
		$servicioTecnico->setMontoDebe($servicioTecnico->getMontoDebe()-$montoPagar);
		
		if ($servicioTecnico->getMontoDebe()==0) {
			$servicioTecnico->setEstado( EstadoVenta::Pagada );
		}
		else{
			$servicioTecnico->setEstado( EstadoVenta::PagadaParcialmente );
		}
		
		//creo un movimiento de caja "haber" por el monto a pagar.
		$movimiento = new MovimientoServicioTecnico();
		$movimiento->setDebe(0);
		$movimiento->setFecha( new \Datetime() );
		$movimiento->setHaber( $montoPagar );
		$movimiento->setObservaciones("");
		$movimiento->setServicioTecnico($servicioTecnico);
		$movimiento->setCuenta($cuenta);
		
		$movimiento->setConcepto( LpnklfUtils::getConceptoMovimientoServicioTecnico() );
		$movimiento->setUser($user);
		
		ServiceFactory::getMovimientoServicioTecnicoService()->add( $movimiento );
		
	}
	
	function validateOnCobrar( ServicioTecnico $servicioTecnico, Cuenta $cuenta){
	
		//que no esté totalmente pagada, o sea, que tenga monto debe > 0
		$montoDebe = $servicioTecnico->getMontoDebe();
		if( $montoDebe <= 0 ){
			throw new ServiceException("servicioTecnico.cobrar.montoDebe.required");
		}
		
		
	}
	
	/**
	 * (non-PHPdoc)
	 * @see src/main/php/Lpnklf/Core/service/Lpnklf\Core\service.IServicioTecnicoService::anular()
	 */
	public function anular(ServicioTecnico $servicioTecnico, User $user){
	
		
		//validamos si se puede
		$this->validateOnAnular($servicioTecnico);
		
		
		//si fue pagada, hay que generar un contramovimiento.
		if( $servicioTecnico->getMonto() > $servicioTecnico->getMontoDebe() ){
		
			//generar contramovimiento.
			
			//hay que buscar el movimiento de cuenta realizado para esta servicioTecnico
			//generar uno igual con el monto en debe, fecha actual y concepto "anulación servicioTecnico"
			$criteria = new MovimientoServicioTecnicoCriteria();
			$criteria->setServicioTecnico( $servicioTecnico );
			//$movimiento = ServiceFactory::getMovimientoServicioTecnicoService()->getSingleResult( $criteria );
			$movimientos = ServiceFactory::getMovimientoServicioTecnicoService()->getList( $criteria );
			foreach ($movimientos as $movimiento) {
				$contramovimiento = $movimiento->buildContramovimiento();
				$contramovimiento->setConcepto( LpnklfUtils::getConceptoMovimientoAnulacionServicioTecnico() );
				$contramovimiento->setUser($user);
				
				ServiceFactory::getMovimientoServicioTecnicoService()->add( $contramovimiento );
			}
			
			
			
		}
		
		
		
		
		//modificamos el estado de la servicioTecnico
		$servicioTecnico->setEstado(EstadoVenta::Anulada);
		
		//persistimos los cambios.
		try {
			
			$this->getDAO()->update( $servicioTecnico );
			
		} catch (DAOException $e){
			
			throw new ServiceException( $e->getMessage() );
			
		} catch (\Exception $e) {

			throw new ServiceException( $e->getMessage() );
		
		}
	
	}
	
	function validateOnAnular( ServicioTecnico $servicioTecnico ){
	
		//que no esté anulada
		if( $servicioTecnico->getEstado() == EstadoVenta::Anulada ){
			throw new ServiceException("servicioTecnico.anular.anulada");
		}
		
	}
	
	/**
	 * (non-PHPdoc)
	 * @see src/main/php/Lpnklf/Core/service/Lpnklf\Core\service.IServicioTecnicoService::cobrarCtaCte()
	 */
	public function cobrarCtaCte(ServicioTecnico $servicioTecnico, User $user, $montoPagar){
		
		$this->validateOnCobrarCtaCte($servicioTecnico);
		
		//seteamos la servicioTecnico como pagada
		//$servicioTecnico->setEstado( EstadoVenta::Pagada );
		
		//obtenemos lo que hay que pagar.
		//$montoPagar = $servicioTecnico->getMontoDebe();
		
		//seteamos lo que debe en 0.
		//$servicioTecnico->setMontoDebe(0);
		$servicioTecnico->setMontoPagado($servicioTecnico->getMontoPagado()+$montoPagar);
		$servicioTecnico->setMontoDebe($servicioTecnico->getMontoDebe()-$montoPagar);
		
		if ($servicioTecnico->getMontoDebe()==0) {
			$servicioTecnico->setEstado( EstadoVenta::Pagada );
		}
		else{
			$servicioTecnico->setEstado( EstadoVenta::PagadaParcialmente );
		}
		
		//obtenemos la cuenta corriente del cliente.
		$cuentaCorriente = $servicioTecnico->getCliente()->getCuentaCorriente();
		
		//creo un movimiento "debe" por el monto a pagar.
		$movimiento = new MovimientoServicioTecnico();
		$movimiento->setDebe( $montoPagar );
		$movimiento->setFecha( new \Datetime() );
		$movimiento->setHaber( 0 );
		$movimiento->setObservaciones("");
		$movimiento->setServicioTecnico($servicioTecnico);
		$movimiento->setCuenta($cuentaCorriente);
		//$movimiento->setCaja($caja);
		$movimiento->setConcepto( LpnklfUtils::getConceptoMovimientoServicioTecnico() );
		$movimiento->setUser($user);
		
		ServiceFactory::getMovimientoServicioTecnicoService()->add( $movimiento );
		
	}
	
	function validateOnCobrarCtaCte( ServicioTecnico $servicioTecnico){
	
		//que no esté totalmente pagada, o sea, que tenga monto debe > 0
		$montoDebe = $servicioTecnico->getMontoDebe();
		if( $montoDebe <= 0 ){
			throw new ServiceException("servicioTecnico.cobrar.montoDebe.required");
		}
		
		//que el cliente tenga cuenta corriente
		if(!$servicioTecnico->getCliente()->hasCuentaCorriente() )
			throw new ServiceException("servicioTecnico.cobrar.ctacte.required");
		
	}
	
	
}	