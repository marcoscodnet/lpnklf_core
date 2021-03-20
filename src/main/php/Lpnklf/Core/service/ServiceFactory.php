<?php
namespace Lpnklf\Core\service;

/**
 * Factory de servicios
 *  
 *  
 * @author Marcos
 * @since 27-02-2018
 *
 */

use Lpnklf\Core\service\impl\PaisServiceImpl;
use Lpnklf\Core\service\impl\MarcaProductoServiceImpl;
use Lpnklf\Core\service\impl\IvaServiceImpl;
use Lpnklf\Core\service\impl\TipoProductoServiceImpl;
use Lpnklf\Core\service\impl\EstadoServiceImpl;
use Lpnklf\Core\service\impl\ConceptoGastoServiceImpl;
use Lpnklf\Core\service\impl\ConceptoMovimientoServiceImpl;
use Lpnklf\Core\service\impl\ProvinciaServiceImpl;
use Lpnklf\Core\service\impl\LocalidadServiceImpl;
use Lpnklf\Core\service\impl\ClienteServiceImpl;
use Lpnklf\Core\service\impl\ServicioTecnicoServiceImpl;
use Lpnklf\Core\service\impl\HistoricoEstadoServiceImpl;

use Lpnklf\Core\service\impl\ProductoServiceImpl;

use Lpnklf\Core\service\impl\AnulacionServiceImpl;
use Lpnklf\Core\service\impl\CuentaServiceImpl;
use Lpnklf\Core\service\impl\GastoServiceImpl;

use Lpnklf\Core\service\impl\MovimientoGastoServiceImpl;
use Lpnklf\Core\service\impl\VentaServiceImpl;
use Lpnklf\Core\service\impl\MovimientoVentaServiceImpl;
use Lpnklf\Core\service\impl\MovimientoCajaServiceImpl;
use Lpnklf\Core\service\impl\CuentaCorrienteServiceImpl;
use Lpnklf\Core\service\impl\BancoServiceImpl;
use Lpnklf\Core\service\impl\CajaServiceImpl;
use Lpnklf\Core\service\impl\PagoServiceImpl;
use Lpnklf\Core\service\impl\MovimientoPagoServiceImpl;
use Lpnklf\Core\service\impl\TarjetaServiceImpl;
use Lpnklf\Core\service\impl\MovimientoServicioTecnicoServiceImpl;
use Lpnklf\Core\service\impl\ParametroServiceImpl;

class ServiceFactory {


	
	
	
	
	
	
	/**
	 * Service para Pais.
	 * 
	 * @return IPaisService
	 */
	public static function getPaisService(){
	
		return new PaisServiceImpl();	
	}
	
	/**
	 * Service para MarcaProducto.
	 * 
	 * @return IMarcaProductoService
	 */
	public static function getMarcaProductoService(){
	
		return new MarcaProductoServiceImpl();	
	}
	
	/**
	 * Service para Iva.
	 * 
	 * @return IIvaService
	 */
	public static function getIvaService(){
	
		return new IvaServiceImpl();	
	}
	
	/**
	 * Service para TipoProducto.
	 * 
	 * @return ITipoProductoService
	 */
	public static function getTipoProductoService(){
	
		return new TipoProductoServiceImpl();	
	}
	
	
	
	/**
	 * Service para Estado.
	 * 
	 * @return IEstadoService
	 */
	public static function getEstadoService(){
	
		return new EstadoServiceImpl();	
	}
	
	/**
	 * Service para ConceptoGasto.
	 * 
	 * @return IConceptoGastoService
	 */
	public static function getConceptoGastoService(){
	
		return new ConceptoGastoServiceImpl();	
	}
	
	/**
	 * Service para ConceptoMovimiento.
	 * 
	 * @return IConceptoMovimientoService
	 */
	public static function getConceptoMovimientoService(){
	
		return new ConceptoMovimientoServiceImpl();	
	}
	
	
	/**
	 * Service para Provincia.
	 * 
	 * @return IProvinciaService
	 */
	public static function getProvinciaService(){
	
		return new ProvinciaServiceImpl();	
	}
	
	/**
	 * Service para Localidad.
	 * 
	 * @return ILocalidadService
	 */
	public static function getLocalidadService(){
	
		return new LocalidadServiceImpl();	
	}
	
	/**
	 * Service para Cliente.
	 * 
	 * @return IClienteService
	 */
	public static function getClienteService(){
	
		return new ClienteServiceImpl();	
	}
	
	/**
	 * Service para ServicioTecnico.
	 * 
	 * @return IServicioTecnicoService
	 */
	public static function getServicioTecnicoService(){
	
		return new ServicioTecnicoServiceImpl();	
	}
	
	/**
	 * Service para HistoricoEstado.
	 * 
	 * @return IHistoricoEstadoService
	 */
	public static function getHistoricoEstadoService(){
	
		return new HistoricoEstadoServiceImpl();	
	}
	
	
	
	/**
	 * Service para Producto.
	 * 
	 * @return IProductoService
	 */
	public static function getProductoService(){
	
		return new ProductoServiceImpl();	
	}
	
	
	
	/**
	 * Service para Anulacion.
	 * 
	 * @return IAnulacionService
	 */
	public static function getAnulacionService(){
	
		return new AnulacionServiceImpl();	
	}
	
	/**
	 * Service para Cuenta.
	 * 
	 * @return ICuentaService
	 */
	public static function getCuentaService(){
	
		return new CuentaServiceImpl();	
	}
	
	/**
	 * Service para Gasto.
	 * 
	 * @return IGastoService
	 */
	public static function getGastoService(){
	
		return new GastoServiceImpl();	
	}
	
	/**
	 * Service para MovimientoGasto.
	 * 
	 * @return IMovimientoCuentaService
	 */
	public static function getMovimientoGastoService(){
	
		return new MovimientoGastoServiceImpl();	
	}
	
	/**
	 * Service para Venta.
	 * 
	 * @return IMovimientoCuentaService
	 */
	public static function getVentaService(){
	
		return new VentaServiceImpl();	
	}	
	
	/**
	 * Service para MovimientoVenta.
	 * 
	 * @return IMovimientoCuentaService
	 */
	public static function getMovimientoVentaService(){
	
		return new MovimientoVentaServiceImpl();	
	}
	
	/**
	 * Service para MovimientoCaja.
	 * 
	 * @return IMovimientoCuentaService
	 */
	public static function getMovimientoCajaService(){
	
		return new MovimientoCajaServiceImpl();	
	}
	
	/**
	 * Service para CuentaCorriente.
	 * 
	 * @return IMovimientoCuentaService
	 */
	public static function getCuentaCorrienteService(){
	
		return new CuentaCorrienteServiceImpl();	
	}
	
	/**
	 * Service para Banco.
	 * 
	 * @return IMovimientoCuentaService
	 */
	public static function getBancoService(){
	
		return new BancoServiceImpl();	
	}
	
	/**
	 * Service para Caja.
	 * 
	 * @return IMovimientoCuentaService
	 */
	public static function getCajaService(){
	
		return new CajaServiceImpl();	
	}
	
	/**
	 * Service para Pago.
	 * 
	 * @return IMovimientoCuentaService
	 */
	public static function getPagoService(){
	
		return new PagoServiceImpl();	
	}
	
	/**
	 * Service para MovimientoPago.
	 * 
	 * @return IMovimientoPagoService
	 */
	public static function getMovimientoPagoService(){
	
		return new MovimientoPagoServiceImpl();	
	}
	
	/**
	 * Service para Tarjeta.
	 * 
	 * @return ITarjetaService
	 */
	public static function getTarjetaService(){
	
		return new TarjetaServiceImpl();	
	}
	
	/**
	 * Service para MovimientoServicioTecnico.
	 * 
	 * @return IMovimientoServicioTecnicoService
	 */
	public static function getMovimientoServicioTecnicoService(){
	
		return new MovimientoServicioTecnicoServiceImpl();	
	}
	
	/**
	 * Service para Parametro.
	 * 
	 * @return IParametroService
	 */
	public static function getParametroService(){
	
		return new ParametroServiceImpl();	
	}
}