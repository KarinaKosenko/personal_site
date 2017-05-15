<?php
	namespace M;
	
	class Smiles_manager{
		use \Core\Traits\Singleton;
		
		public function smile($var){
			$symbol = array(':mellow:',
							'<_<',
							':)',
							':wub:',
							':angry:',
							':(',
							':unsure:',
							':wacko:',
							':blink:',
							'-_-',
							':rolleyes:',
							':huh:',
							'^_^',
							':o',
							';)',
							':P',
							':D',
							':lol:',
							'B)',
							':ph34r:');
			$graph = array('<img src="/smiles/mellow.png">',
							'<img src="/smiles/dry.png">',
							'<img src="/smiles/smile.png">',
							'<img src="/smiles/wub.png">',
							'<img src="/smiles/angry.png">',
							'<img src="/smiles/sad.png">',
							'<img src="/smiles/unsure.png">',
							'<img src="/smiles/wacko.png">',
							'<img src="/smiles/blink.png">',
							'<img src="/smiles/sleep.png">',
							'<img src="/smiles/rolleyes.gif">',
							'<img src="/smiles/huh.png">',
							'<img src="/smiles/happy.png">',
							'<img src="/smiles/ohmy.png">',
							'<img src="/smiles/wink.png">',
							'<img src="/smiles/tongue.png">',
							'<img src="/smiles/biggrin.png">',
							'<img src="/smiles/laugh.png">',
							'<img src="/smiles/cool.png">',
							'<img src="/smiles/ph34r.png">');
			return str_replace($symbol, $graph, $var);
		}
		
	}