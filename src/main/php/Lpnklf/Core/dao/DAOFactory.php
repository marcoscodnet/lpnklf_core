<?php
namespace Lpnklf\Core\dao;

/**
 * Factory de DAOs
 *  
 * @author Marcos
 *
 */

use Lpnklf\Core\dao\impl\PaisDoctrineDAO;
use Lpnklf\Core\dao\impl\MarcaProductoDoctrineDAO;
use Lpnklf\Core\dao\impl\IvaDoctrineDAO;
use Lpnklf\Core\dao\impl\TipoProductoDoctrineDAO;

use Lpnklf\Core\dao\impl\EstadoDoctrineDAO;


use Lpnklf\Core\dao\impl\ProvinciaDoctrineDAO;
use Lpnklf\Core\dao\impl\LocalidadDoctrineDAO;
use Lpnklf\Core\dao\impl\ClienteDoctrineDAO;
use Lpnklf\Core\dao\impl\ServicioTecnicoDoctrineDAO;
use Lpnklf\Core\dao\impl\HistoricoEstadoDoctrineDAO;
use Lpnklf\Core\dao\impl\ConceptoGastoDoctrineDAO;
use Lpnklf\Core\dao\impl\ConceptoMovimientoDoctrineDAO;
use Lpnklf\Core\dao\impl\ProductoDoctrineDAO;

use Lpnklf\Core\dao\impl\AnulacionDoctrineDAO;


use Lpnklf\Core\dao\impl\GastoDoctrineDAO;
use Lpnklf\Core\dao\impl\CuentaDoctrineDAO;
use Lpnklf\Core\dao\impl\MovimientoGastoDoctrineDAO;
use Lpnklf\Core\dao\impl\MovimientoCajaDoctrineDAO;
use Lpnklf\Core\dao\impl\VentaDoctrineDAO;
use Lpnklf\Core\dao\impl\MovimientoVentaDoctrineDAO;
use Lpnklf\Core\dao\impl\CuentaCorrienteDoctrineDAO;
use Lpnklf\Core\dao\impl\BancoDoctrineDAO;
use Lpnklf\Core\dao\impl\CajaDoctrineDAO;
use Lpnklf\Core\dao\impl\PagoDoctrineDAO;
use Lpnklf\Core\dao\impl\MovimientoPagoDoctrineDAO;
use Lpnklf\Core\dao\impl\TarjetaDoctrineDAO;
use Lpnklf\Core\dao\impl\MovimientoServicioTecnicoDoctrineDAO;
use Lpnklf\Core\dao\impl\ParametroDoctrineDAO;

class DAOFactory {

	

	
	
	/**
	 * DAO para Pais.
	 * 
	 * @return IPais
	 */
	public static function getPaisDAO(){
	
		return new PaisDoctrineDAO();	
	}
	
	/**
	 * DAO para MarcaProducto.
	 * 
	 * @return IMarcaProducto
	 */
	public static function getMarcaProductoDAO(){
	
		return new MarcaProductoDoctrineDAO();	
	}
	
	/**
	 * DAO para Iva.
	 * 
	 * @return IIva
	 */
	public static function getIvaDAO(){
	
		return new IvaDoctrineDAO();	
	}
	
	/**
	 * DAO para TipoProducto.
	 * 
	 * @return ITipoProducto
	 */
	public static function getTipoProductoDAO(){
	
		return new TipoProductoDoctrineDAO();	
	}
	
	
	
	/**
	 * DAO para Estado.
	 * 
	 * @return IEstado
	 */
	public static function getEstadoDAO(){
	
		return new EstadoDoctrineDAO();	
	}
	
	
	
	
	
	/**
	 * DAO para Provincia.
	 * 
	 * @return IProvincia
	 */
	public static function getProvinciaDAO(){
	
		return new ProvinciaDoctrineDAO();	
	}
	
	/**
	 * DAO para Localidad.
	 * 
	 * @return ILocalidad
	 */
	public static function getLocalidadDAO(){
	
		return new LocalidadDoctrineDAO();	
	}
	
	/**
	 * DAO para Cliente.
	 * 
	 * @return ICliente
	 */
	public static function getClienteDAO(){
	
		return new ClienteDoctrineDAO();	
	}
	
	/**
	 * DAO para ServicioTecnico.
	 * 
	 * @return IServicioTecnico
	 */
	public static function getServicioTecnicoDAO(){
	
		return new ServicioTecnicoDoctrineDAO();	
	}
	
	/**
	 * DAO para HistoricoEstado.
	 * 
	 * @return IHistoricoEstado
	 */
	public static function getHistoricoEstadoDAO(){
	
		return new HistoricoEstadoDoctrineDAO();	
	}
	
	/**
	 * DAO para ConceptoGasto.
	 * 
	 * @return IConceptoGasto
	 */
	public static function getConceptoGastoDAO(){
	
		return new ConceptoGastoDoctrineDAO();	
	}
	
	/**
	 * DAO para ConceptoMovimiento.
	 * 
	 * @return IConceptoMovimiento
	 */
	public static function getConceptoMovimientoDAO(){
	
		return new ConceptoMovimientoDoctrineDAO();	
	}
	
	/**
	 * DAO para Producto.
	 * 
	 * @return IProducto
	 */
	public static function getProductoDAO(){
	
		return new ProductoDoctrineDAO();	
	}
	
	
	
	/**
	 * DAO para Anulacion.
	 * 
	 * @return IAnulacion
	 */
	public static function getAnulacionDAO(){
	
		return new AnulacionDoctrineDAO();	
	}
	
	/**
	 * DAO para Cuenta.
	 * 
	 * @return ICuenta
	 */
	public static function getCuentaDAO(){
	
		return new CuentaDoctrineDAO();	
	}
	
	/**
	 * DAO para Gasto.
	 * 
	 * @return IGasto
	 */
	public static function getGastoDAO(){
	
		return new GastoDoctrineDAO();	
	}
	
	/**
	 * DAO para MovimientoGasto.
	 * 
	 * @return IMovimientoGasto
	 */
	public static function getMovimientoGastoDAO(){
	
		return new MovimientoGastoDoctrineDAO();	
	}
	
	/**
	 * DAO para MovimientoCaja.
	 * 
	 * @return IMovimientoCaja
	 */
	public static function getMovimientoCajaDAO(){
	
		return new MovimientoCajaDoctrineDAO();	
	}
	
	/**
	 * DAO para Venta.
	 * 
	 * @return IVenta
	 */
	public static function getVentaDAO(){
	
		return new VentaDoctrineDAO();	
	}
	
	/**
	 * DAO para MovimientoVenta.
	 * 
	 * @return IMovimientoVenta
	 */
	public static function getMovimientoVentaDAO(){
	
		return new MovimientoVentaDoctrineDAO();	
	}
	
	/**
	 * DAO para CuentaCorriente.
	 * 
	 * @return ICuentaCorriente
	 */
	public static function getCuentaCorrienteDAO(){
	
		return new CuentaCorrienteDoctrineDAO();	
	}
	
	/**
	 * DAO para Banco.
	 * 
	 * @return IBanco
	 */
	public static function getBancoDAO(){
	
		return new BancoDoctrineDAO();	
	}
	
	/**
	 * DAO para Caja.
	 * 
	 * @return ICaja
	 */
	public static function getCajaDAO(){
	
		return new CajaDoctrineDAO();	
	}
	
	/**
	 * DAO para Pago.
	 * 
	 * @return IPago
	 */
	public static function getPagoDAO(){
	
		return new PagoDoctrineDAO();	
	}
	
	/**
	 * DAO para MovimientoPago.
	 * 
	 * @return IMovimientoPago
	 */
	public static function getMovimientoPagoDAO(){
	
		return new MovimientoPagoDoctrineDAO();	
	}
	
	/**
	 * DAO para Tarjeta.
	 * 
	 * @return ITarjeta
	 */
	public static function getTarjetaDAO(){
	
		return new TarjetaDoctrineDAO();	
	}
	
	/**
	 * DAO para MovimientoServicioTecnico.
	 * 
	 * @return IMovimientoServicioTecnico
	 */
	public static function getMovimientoServicioTecnicoDAO(){
	
		return new MovimientoServicioTecnicoDoctrineDAO();	
	}
	
	/**
	 * DAO para Parametro.
	 * 
	 * @return IParametro
	 */
	public static function getParametroDAO(){
	
		return new ParametroDoctrineDAO();	
	}
}
