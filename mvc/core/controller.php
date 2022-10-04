 <?php
	 class controller{
	 	public function home(){
	 	}
		
		 protected function loadView($master,$viewName,$data){
			require_once PATH_TO_VIEW.strtolower($master).'.php';
		 }

	 }
 	
 ?>