<?php
class Cpi{

	public $data;
	public $datamin;
	public $bobot;
	public $datatren;

	public $kriteria;
	public $transformasi;
	public $transformasipositif;
	public $transformasinegatif;
	public $minval;
	public $terbobot;
	public $terbobottp;
	// public $concordance;
	// public $discordance;
	// public $m_concordance;
	// public $m_discordance;
	// public $t_concordance;
	// public $t_discordance;
	// public $md_concordance;
	// public $md_discordance;
	// public $agregate;
	public $nilaicpi;

	function __construct($data, $datamin, $datatren, $datatp, $datatn, $bobot){
		error_reporting(0);
		$this->data = $data;
		$this->datamin = $datamin;
		$this->datatren = $datatren;
		$this->datatn = $datatn;
		$this->datatp = $datatp;
		$this->bobot = $bobot;
		// $this->minval = $minval;
		// $this->terbobot = $terbobot;
		// $this->terbobottp = $terbobottp;
		// $this->transformasi = $transformasi;
		// $this->transformasipositif = $transformasipositif;
		// $this->transformasinegatif = $transformasinegatif;

		$this->transformasi();
		$this->minval();
		$this->transformasinegatif();
		$this->transformasipositif();
		$this->terbobot();
		$this->terbobottp();
		$this->terbobottn();
		$this->nilaicpitp();
		$this->nilaicpitn();
		$this->nilaicpi();
	}	
	
	function minval(){		
		foreach($this->data as $key => $val){
			foreach($this->datamin as $k => $v){
				$this->minval[$k] = $v;
			}
		}
	}

	function transformasi(){				
		foreach($this->data as $key => $val){
			foreach($val as $k => $v){
				$this->transformasi[$key][$k] = $this->datamin[$k] / $v * 100;
				// foreach($this->datatren as $a => $b){
				// 	if($val[$a] = "positif")
				// 		$this->transformasi[$key][$k][] = $this->datamin[$k] / $v * 100;
				// }
			}
		}			
	}
	
	function transformasipositif(){		
		foreach($this->datatp as $key => $val){
			foreach($val as $k => $v){
				$this->transformasipositif[$key][$k] = $v / $this->datamin[$k] * 100;
			}
		}			
	}
	
	function transformasinegatif(){		
		foreach($this->datatn as $key => $val){
			foreach($val as $k => $v){
				$this->transformasinegatif[$key][$k] = $this->datamin[$k] / $v * 100;
			}
		}
	}
	
	function terbobot(){		
		foreach($this->transformasinegatif as $key => $val){
			foreach($val as $k => $v){				
				$this->terbobot[$key][$k] = $v * $this->bobot[$k];
			}
		}		
	}

	function terbobottp(){		
		foreach($this->transformasipositif as $key => $val){
			foreach($val as $k => $v){				
				$this->terbobottp[$key][$k] = $v * $this->bobot[$k];
			}
		}		
	}

	function terbobottn(){		
		foreach($this->transformasinegatif as $key => $val){
			foreach($val as $k => $v){				
				$this->terbobottn[$key][$k] = $v * $this->bobot[$k];
			}
		}		
	}

	function nilaicpitp(){		
		foreach($this->terbobottp as $key => $val){
			$this->nilaicpitp[$key] = array_sum($val);
		}
	}

	function nilaicpitn(){		
		foreach($this->terbobottn as $key => $val){
			$this->nilaicpitn[$key] = array_sum($val);
		}
	}

	function nilaicpi(){		
		foreach($this->data as $key => $val){
			$this->nilaicpi[$key] = $this->nilaicpitn[$key] + $this->nilaicpitp[$key];
		}
	}
	
}