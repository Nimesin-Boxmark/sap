<?php
namespace Sap\Infrastructure;

use Sap\Domain\RemoteServiceInterface;
use Sap\Domain\RemoteRequestInterface;

class SapService implements RemoteServiceInterface
{
	/** @var AdapterInterface */
	private $adapter;
	public function __construct(
			AdapterInterface $adapter
	){
		$this->adapter = $adapter;
	}
	
	/**
	 * 
	 * {@inheritDoc}
	 * @see \Sap\Domain\RemoteServiceInterface::execute()
	 */
	public function execute(RemoteRequestInterface $request) 
	{
	    $response = new $request->getMethodName() . 'Response' ( $this->adapter->getResponse($request->getMethodName(), $request->getParams()) );
	    return $response;
	}

}