<?php 
class Author extends Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('author');
    }
    public function index()
    {
       $data=$this->author->all();
       $this->load->view('author.index',compact('data'));
    }
    public function create()
    {
        // echo "this is create controller";
        $this->load->view("author.create");
    }
    public function store()
    {
        $error=[];
        $username=request('username');
        if(!(trim($username) and preg_match('/^[a-z0-9]{5,50}/',$username) and $username==strtolower($username))){
            $error[]="Please enter valid username and password";
        }else{
            $error[]="This username already exist ";
        }
        if(count($error)==0){
            $info=[
                'username'=>$username,
                'password'=>request('cpassword'),
                'fullname'=>request('fullname'),
                'email'=>request('email'),
                'mobile'=>request('mobile'),
                'gender'=>request('gender'),
            ];
          
            $this->author->insert($info);
        }else{
            Session::set('error',$error);
            redirect('author/create');
        }
        
        
    }
    public function edit($id)
    {
        $id = decode_url($id);
        $info = $this->author->find($id);
       // print_r($info);
    }
    public function checkeduser(){
       echo ($this->author->is_author(request('name')))?'<span style="color:red" id="na"> Already available </span>':'<span style="color:green"> Successfull </span>';
        
    }
}

?>