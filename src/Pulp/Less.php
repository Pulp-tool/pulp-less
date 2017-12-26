<?php
namespace Pulp;

use Pulp\DataPipe;

class Less  extends DataPipe { 

	public $parser;

	public function __construct($opts) {
		$this->parser = new \Less_Parser($opts);
	}

    public function __invoke($data) { 
		echo "got invoked...\n";
    } 

	public function write($data) {
		$this->parser->parseFile( $data->getPathName() );
	}

    public function end($data=null) { 
		$this->emit('data', [$this->parser->getCss()]);
    } 
}
