<?php class Page extends usercontroller{
    private $pagemodel;
    function __construct()
    {
        $this->pagemodel=new PageModel;
    }
    public function showdetail($alias){
        $data=$this->pagemodel->showdetail($alias);
        $this->loadView('master2','page/postdetail',$data);
    }
    public function showall($limit=LIMIT,$offset=0){
        $data=$this->pagemodel->showall($limit,$offset);
        $this->loadView('master2','page/postall',$data);
    }
    public function showByTopic($topic,$limit=LIMIT,$offset=0){
        if($topic=='tin-cong-nghe') $topic=2;
        else $topic=1;
        //echo $topic;
        $data=$this->pagemodel->showByTopic($topic,$limit,$offset);
        $this->loadView('master2','page/postbytopic',$data);
    }
}

?>