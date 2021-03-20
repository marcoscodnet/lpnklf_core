<?php

namespace lpnklf\Core\Proxies\__CG__\Lpnklf\Core\model;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class ServicioTecnico extends \Lpnklf\Core\model\ServicioTecnico implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'fecha', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'prioridad', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'cliente', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'tipoProducto', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'marcaProducto', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'modelo', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'detalleFalla', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'fuente', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'bateria', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'clave', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'observaciones', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'diasDemora', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'reparaHasta', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'monto', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'montoPagado', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'montoDebe', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'diagnostico', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'solucion', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'estado', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'estadoServicio'];
        }

        return ['__isInitialized__', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'fecha', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'prioridad', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'cliente', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'tipoProducto', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'marcaProducto', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'modelo', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'detalleFalla', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'fuente', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'bateria', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'clave', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'observaciones', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'diasDemora', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'reparaHasta', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'monto', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'montoPagado', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'montoDebe', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'diagnostico', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'solucion', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'estado', '' . "\0" . 'Lpnklf\\Core\\model\\ServicioTecnico' . "\0" . 'estadoServicio'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (ServicioTecnico $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function __toString()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, '__toString', []);

        return parent::__toString();
    }

    /**
     * {@inheritDoc}
     */
    public function getFecha()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFecha', []);

        return parent::getFecha();
    }

    /**
     * {@inheritDoc}
     */
    public function setFecha($fecha)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFecha', [$fecha]);

        return parent::setFecha($fecha);
    }

    /**
     * {@inheritDoc}
     */
    public function getPrioridad()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPrioridad', []);

        return parent::getPrioridad();
    }

    /**
     * {@inheritDoc}
     */
    public function setPrioridad($prioridad)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPrioridad', [$prioridad]);

        return parent::setPrioridad($prioridad);
    }

    /**
     * {@inheritDoc}
     */
    public function getCliente()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCliente', []);

        return parent::getCliente();
    }

    /**
     * {@inheritDoc}
     */
    public function setCliente($cliente)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCliente', [$cliente]);

        return parent::setCliente($cliente);
    }

    /**
     * {@inheritDoc}
     */
    public function getTipoProducto()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTipoProducto', []);

        return parent::getTipoProducto();
    }

    /**
     * {@inheritDoc}
     */
    public function setTipoProducto($tipoProducto)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTipoProducto', [$tipoProducto]);

        return parent::setTipoProducto($tipoProducto);
    }

    /**
     * {@inheritDoc}
     */
    public function getMarcaProducto()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMarcaProducto', []);

        return parent::getMarcaProducto();
    }

    /**
     * {@inheritDoc}
     */
    public function setMarcaProducto($marcaProducto)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMarcaProducto', [$marcaProducto]);

        return parent::setMarcaProducto($marcaProducto);
    }

    /**
     * {@inheritDoc}
     */
    public function getModelo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getModelo', []);

        return parent::getModelo();
    }

    /**
     * {@inheritDoc}
     */
    public function setModelo($modelo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setModelo', [$modelo]);

        return parent::setModelo($modelo);
    }

    /**
     * {@inheritDoc}
     */
    public function getDetalleFalla()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDetalleFalla', []);

        return parent::getDetalleFalla();
    }

    /**
     * {@inheritDoc}
     */
    public function setDetalleFalla($detalleFalla)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDetalleFalla', [$detalleFalla]);

        return parent::setDetalleFalla($detalleFalla);
    }

    /**
     * {@inheritDoc}
     */
    public function getFuente()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFuente', []);

        return parent::getFuente();
    }

    /**
     * {@inheritDoc}
     */
    public function setFuente($fuente)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFuente', [$fuente]);

        return parent::setFuente($fuente);
    }

    /**
     * {@inheritDoc}
     */
    public function getBateria()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBateria', []);

        return parent::getBateria();
    }

    /**
     * {@inheritDoc}
     */
    public function setBateria($bateria)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBateria', [$bateria]);

        return parent::setBateria($bateria);
    }

    /**
     * {@inheritDoc}
     */
    public function getClave()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getClave', []);

        return parent::getClave();
    }

    /**
     * {@inheritDoc}
     */
    public function setClave($clave)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setClave', [$clave]);

        return parent::setClave($clave);
    }

    /**
     * {@inheritDoc}
     */
    public function getObservaciones()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getObservaciones', []);

        return parent::getObservaciones();
    }

    /**
     * {@inheritDoc}
     */
    public function setObservaciones($observaciones)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setObservaciones', [$observaciones]);

        return parent::setObservaciones($observaciones);
    }

    /**
     * {@inheritDoc}
     */
    public function getDiasDemora()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDiasDemora', []);

        return parent::getDiasDemora();
    }

    /**
     * {@inheritDoc}
     */
    public function setDiasDemora($diasDemora)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDiasDemora', [$diasDemora]);

        return parent::setDiasDemora($diasDemora);
    }

    /**
     * {@inheritDoc}
     */
    public function getReparaHasta()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getReparaHasta', []);

        return parent::getReparaHasta();
    }

    /**
     * {@inheritDoc}
     */
    public function setReparaHasta($reparaHasta)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setReparaHasta', [$reparaHasta]);

        return parent::setReparaHasta($reparaHasta);
    }

    /**
     * {@inheritDoc}
     */
    public function getDiagnostico()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDiagnostico', []);

        return parent::getDiagnostico();
    }

    /**
     * {@inheritDoc}
     */
    public function setDiagnostico($diagnostico)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDiagnostico', [$diagnostico]);

        return parent::setDiagnostico($diagnostico);
    }

    /**
     * {@inheritDoc}
     */
    public function getSolucion()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSolucion', []);

        return parent::getSolucion();
    }

    /**
     * {@inheritDoc}
     */
    public function setSolucion($solucion)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSolucion', [$solucion]);

        return parent::setSolucion($solucion);
    }

    /**
     * {@inheritDoc}
     */
    public function podesAnularte()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'podesAnularte', []);

        return parent::podesAnularte();
    }

    /**
     * {@inheritDoc}
     */
    public function podesCobrarte()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'podesCobrarte', []);

        return parent::podesCobrarte();
    }

    /**
     * {@inheritDoc}
     */
    public function getEstado()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEstado', []);

        return parent::getEstado();
    }

    /**
     * {@inheritDoc}
     */
    public function setEstado($estado)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEstado', [$estado]);

        return parent::setEstado($estado);
    }

    /**
     * {@inheritDoc}
     */
    public function getMonto()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMonto', []);

        return parent::getMonto();
    }

    /**
     * {@inheritDoc}
     */
    public function setMonto($monto)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMonto', [$monto]);

        return parent::setMonto($monto);
    }

    /**
     * {@inheritDoc}
     */
    public function getMontoPagado()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMontoPagado', []);

        return parent::getMontoPagado();
    }

    /**
     * {@inheritDoc}
     */
    public function setMontoPagado($montoPagado)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMontoPagado', [$montoPagado]);

        return parent::setMontoPagado($montoPagado);
    }

    /**
     * {@inheritDoc}
     */
    public function getMontoDebe()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMontoDebe', []);

        return parent::getMontoDebe();
    }

    /**
     * {@inheritDoc}
     */
    public function setMontoDebe($montoDebe)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMontoDebe', [$montoDebe]);

        return parent::setMontoDebe($montoDebe);
    }

    /**
     * {@inheritDoc}
     */
    public function getEstadoServicio()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEstadoServicio', []);

        return parent::getEstadoServicio();
    }

    /**
     * {@inheritDoc}
     */
    public function setEstadoServicio($estadoServicio)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEstadoServicio', [$estadoServicio]);

        return parent::setEstadoServicio($estadoServicio);
    }

    /**
     * {@inheritDoc}
     */
    public function getOid()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getOid();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOid', []);

        return parent::getOid();
    }

    /**
     * {@inheritDoc}
     */
    public function setOid($oid)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOid', [$oid]);

        return parent::setOid($oid);
    }

    /**
     * {@inheritDoc}
     */
    public function getVersion()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVersion', []);

        return parent::getVersion();
    }

    /**
     * {@inheritDoc}
     */
    public function setVersion($version)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVersion', [$version]);

        return parent::setVersion($version);
    }

    /**
     * {@inheritDoc}
     */
    public function getEncrypted()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEncrypted', []);

        return parent::getEncrypted();
    }

    /**
     * {@inheritDoc}
     */
    public function setEncrypted($encrypted)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEncrypted', [$encrypted]);

        return parent::setEncrypted($encrypted);
    }

    /**
     * {@inheritDoc}
     */
    public function encrypt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'encrypt', []);

        return parent::encrypt();
    }

    /**
     * {@inheritDoc}
     */
    public function decrypt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'decrypt', []);

        return parent::decrypt();
    }

    /**
     * {@inheritDoc}
     */
    public function getManagedEntities()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getManagedEntities', []);

        return parent::getManagedEntities();
    }

}
