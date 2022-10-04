<?php
	class Product extends usercontroller{
		private $productmodel;
		function __construct()
		{
			$this->productmodel=new ProductModel;
		}


		public function home($limit=LIMIT,$offset=0){
			$data=$this->productmodel->home($limit,$offset);
			$this->loadView('master2','product/home',$data);
		}
		public function productByCat($catAlias,$limit=LIMIT,$offset=0){
			$data=$this->productmodel->productByCat($catAlias,$limit,$offset);
			$this->loadView('master1','product/productbycat',$data);
		}
		public function productDetail($productAlias){
			$data=$this->productmodel->productDetail($productAlias);
			$this->loadView('master1','product/productdetail',$data);
		}
		public function productSearch($limit=LIMIT,$offset=0){
			//xac dinh searchKey
			if(isset($_POST['searchKey']))
			$searchKey=$_POST['searchKey'];
			else
			$searchKey='';
			//goi model chuan bi du lieu
			$data=$this->productmodel->productSearch($searchKey,$limit,$offset);

			$this->loadView('master2','product/productsearch',$data);
		}
		public function productByBrand($brandAlias,$limit=LIMIT,$offset=0){
			$data=$this->productmodel->productByBrand($brandAlias,$limit,$offset);
			$this->loadView('master1','product/productbybrand',$data);
		}

	}

?>