<?php
namespace Pulp;

use Pulp\DataPipe;
use Pulp\Fs\VirtualFile as vfile;

class Less  extends DataPipe { 

	public $parser;

	public function __construct($opts) {
		$this->parser = new \Less_Parser($opts);
	}

    public function __invoke($data) { 
		echo "got invoked...\n";
    } 

	protected function _onWrite($data) {
		$cssFile = $data->getPathname();
		$cssFile = str_replace('.less', '.css', $cssFile);
		$file = new vfile( $cssFile );

		$this->parser->parseFile( $data->getPathname() );
		$file->setContents(
			$this->parser->getCss()
		);
		$this->push($file);
	}
}
