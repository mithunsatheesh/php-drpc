<?php

function __autoload($classname) {    
    
    $filename = str_replace("\\", "/", "lib/".$classname . ".php");
	
	$filename =  dirname(__FILE__)."/".$filename;
    if(file_exists( $filename )) {	
		require_once($filename);
    }
    
}

include_once(dirname(__FILE__)."/lib/DistributedRPC.php");

Class  DRPC {

	var $hostName;
	var $portNo;
	var $timeout;
	var $socket;
	var $transport;
	var $protocol;
	
	var $drpcClient;

	function __construct($hostName,$portNo,$timeout) {		
		
		$this->hostName = $hostName;		
		$this->portNo = $portNo;		
		$this->timeout = $timeout;		
		
		try {
		
			$this->socket = new Thrift\Transport\TSocket($hostName, $portNo);
			
			if($timeout!=null) {
				$this->socket->setSendTimeout($timeout);
				$this->socket->setRecvTimeout($timeout);
			}
			
			$this->transport = new Thrift\Transport\TFramedTransport($this->socket);
			
			$this->drpcClient = new DistributedRPCClient(new Thrift\Protocol\TBinaryProtocol($this->transport));
							
			
		} catch (Exception $tx) {
			
			echo $tx->xdebug_message;
			print 'TException: '.$tx->why. ' Error: '.$tx->getMessage() . "\n";
		
		}		
		
	}
	
	function execute($func,$params) {
		
		$this->transport->open();
		$result = $this->drpcClient->execute($func,$params);		
		$this->transport->close();
		return $result;
		
	}

}

?>
