<?php
namespace vasco;

use Rain\Tpl;

class Page{

	private $Tpl;
	private $options =[];
	private $defaults= [
		"data"=>[]
	];

	public function __construct($opts=array(), $tpl_dir="/ecommerce/views/"){

		$this->options =array_merge($this->defaults, $opts);

		$config = array(
					"base_url"      => null,
					"tpl_dir"       => $_SERVER["DOCUMENT_ROOT"].$tpl_dir,
					"cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/ecommerce/views-cache/",
					"debug"         => false // set to false to improve the speed
		);

		Tpl::configure( $config );

		$this->tpl = new Tpl;

		$this->setData($this->options["data"]);

		$this->tpl->draw("header");
	}

	private function setData($data=array()){
		foreach ($data as $key => $value) {
			$this->tpl->assign($key,$value);
		}
	}

	public function setTpl($name, $data= array(), $returnHTML=false){
			$this->setData();

			return $this->tpl->draw($name, $returnHTML);
	}



	public function __destruct(){

		$this->tpl->draw("footer");

	}
}
?>