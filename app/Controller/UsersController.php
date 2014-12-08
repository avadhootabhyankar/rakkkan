<?php
// Start the session
session_start();
?>
<?php
$profidarr=array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Rakkan</title>
    <link rel="icon" type="image/ico" href="/../../webroot/img/favicon.ico">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,400italic,600italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <script src="/theme/js/jquery/jquery-1.8.3.min.js"></script>
    <script src="/theme/js/main.js?v=2012-11-17a"></script>
    <!--<script src="/theme/js/advertising.js?v=2012-11-17a"></script>-->
    <script src="/theme/js/jquery/qtip/jquery.qtip.js?v=2.0.0rc1_2012-11-16"></script>
    <link rel="stylesheet" type="text/css" media="all" href="/theme/css/style.css?v=2012-12-04ab" />
</head>
<?php
error_reporting(0);
class UsersController extends AppController
{
    var $uses = array('Item');
    	public $helpers = array('Html', 'Form');
    public $userId;
    public function index_bck() {
        $this->set('users', $this->User->find('all'));
    }
    public function index()
    {
        require_once ('../Lib/login.php');
        $permisson_array=array('user_likes','user_friends','read_friendlists');
        $login_tag='';
        $ret_val=login_script('352984878216561', '1c7c8eb2131c187699712a572bed0c45','http://localhost/rakkan/Users/uhome',$permisson_array,$login_tag);
        $this->set('login_ret',$ret_val);
    }
    public function profiletry()
    {
            $flag=0;
            $resp1=array();
            $respIndex1=0;
            
            App::uses('HttpSocket', 'Network/Http');
            $HttpSocket1 = new HttpSocket();
            $response1 = $HttpSocket1->post('https://app.rakuten.co.jp/services/api/IchibaItem/Search/20140222',    'format=json&keyword=card&applicationId=1066920239571509113');
            $response=json_decode($response1);
             //print_r($response);
            for($c=0;$c<20;$c++){//count($response);$c++){
                 if($c%2==0)
                     usleep(250000);
                 if($response->Items[$c]->Item->itemName!=null){
                       $resp1[$respIndex1++]=$response->Items[$c];            
                 }
            }
             $this->set('response',$resp1);
             //$this->redirect('http://localhost/rakkan/Users/profiletry');
    }
    public function uhome()
    {

            $flag=0;
            require_once('../Lib/fetch.php');
            require_once('../Lib/login.php');

            $fetcher=new fetch('352984878216561','1c7c8eb2131c187699712a572bed0c45','http://localhost/rakkan/Users/uhome');

            $session=$fetcher->fetch_session();
            $this->set('session',$session);
            $graph_user=$fetcher->fetch_profile('me');
            $graph_user_pic=$fetcher->fetch_profile_pic('me');
            
            $this->set('graph_user',$graph_user);
            $this->set('graph_user_pic',$graph_user_pic);
            $_SESSION["selfId"] = $graph_user->getId();
            $friends=$fetcher->fetch_friends('me');
            //print_r($friends);
            $profidarr=$friends;
            $this->set('friends',$friends); 
            $resp1=array();
            $respIndex1=0;
            $fetchedIds=$this->Item->query('SELECT iditem FROM items where idusers = "'.$graph_user->getId().'"');
            //print_r();
            //$items[$index]['items']['iditem']
            for($i=1;$i<count($fetchedIds);$i++)
            {
                App::uses('HttpSocket', 'Network/Http');
                 $HttpSocket1 = new HttpSocket();
                 $response1 = $HttpSocket1->post('https://app.rakuten.co.jp/services/api/IchibaItem/Search/20140222',    'format=json&itemCode='.$fetchedIds[$i]['items']['iditem'].'&applicationId=1066920239571509113');
                 $response=json_decode($response1);
                 //print_r($response);
                for($c=0;$c<1;$c++){//count($response);$c++){
                     if($c%2==0)
                         usleep(250000);
                     if($response->Items[$c]->Item->itemName!=null){
                           $resp1[$respIndex1++]=$response->Items[$c];            
                     }
                }
                $this->set('response', $resp1);

              //print_r($resp1);


             }
            






             


           //print_r($_COOKIE['psearch']);
        if ($_COOKIE['psearch']) {
            $flag=1;
            //print_r("asfasdfsd");

            $resp=array();
            $respIndex=0;
             $searchstr=$_COOKIE['psearch'];
             App::uses('HttpSocket', 'Network/Http');
             $HttpSocket = new HttpSocket();
            unset($_COOKIE['psearch']);
            $res = setcookie('psearch', '', time() - 3600);
             $response1 = $HttpSocket->post('https://app.rakuten.co.jp/services/api/IchibaItem/Search/20140222',    'format=json&keyword='.$searchstr.'&applicationId=1066920239571509113');
             $response=json_decode($response1);
             //print_r($response);
                for($c=0;$c<8;$c++){//count($response);$c++){
                     if($c%3==0)
                         usleep(250000);
                     if($response->Items[$c]->Item->itemName!=null){
                           $resp[$respIndex++]=$response->Items[$c];            
                     }
                }
                $this->set('resp1', $resp);

               $this->set('flag',$flag);
               $logout_ret=logout_script('http://localhost/rakkan/Users/uhome','http://localhost/rakkan/Users/logout',$session,'<img height="30" width="150" src="'.$this->webroot.'/img/logout.png">');
                $this->set('logout_ret',$logout_ret);
                //$this->redirect('http://localhost/rakkan/Users/uhome');
                //header('Location: http://localhost/rakkan/Users/uhome');

            }
            else
            {
            
            //print_r("asfasdfsdElse");
            $buckets=$fetcher->fetch_likes('/me');
            //$resp=array();
            //$respIndex=0;
            $categories = $buckets->keys();
            //print_r($categories);
            $acceptedCategories = array(
                    array("Movie",101240,200162), //CD-DVD, Books
                    array("Tv show",101240),      //CD-DVD
                    array("Fictional character",101240,200162,100371,551177) //CD-DVD ,Books ,Womens clothing ,Mens clothing
                );
             App::uses('HttpSocket', 'Network/Http');
             $HttpSocket = new HttpSocket();
             $this->set('buckets', $buckets);
             $this->set('categories', $categories);
             $this->set('acceptedCategories',$acceptedCategories);
             $this->set('fetcher',$fetcher);
            for($index=1;$index<$buckets->length();$index++)
            {
                $buck=$buckets->get_bucket($categories[$index]);
                for($index4=0;$index4<=count($acceptedCategories);$index4++){
                    if($categories[$index] == $acceptedCategories[$index4][0]){
                        for($index2=1;$index2<=$buck->length();$index2++){
                            for($index3=1;$index3<count($acceptedCategories[$index4]);$index3++){
                                try{
                                    $response1 = $HttpSocket->post('https://app.rakuten.co.jp/services/api/IchibaItem/Search/20140222',    'format=json&keyword='.$buck->get_item($index2).'    &applicationId=1066920239571509113');
                                    $response=json_decode($response1);
                                    //print_r($response);
                                    for($c=0;$c<2;$c++){//count($response);$c++){
                                         if($c%3==0)
                                             usleep(250000);
                                         if($response->Items[$c]->Item->itemName!=null){
                                               $resp[$respIndex++]=$response->Items[$c];            
                                         }
                                    }
                                }catch(Exception $e){}
                            }
                        }
                    }
                }
            }
             //echo $resp[0]->Item->itemName."hiiii";
             
                $this->set('resp', $resp);
                $this->set('flag',$flag);
            //$this->set('resp', $resp);

        $logout_ret=logout_script('http://localhost/rakkan/Users/uhome','http://localhost/rakkan/Users/logout',$session,'<img height="30" width="150" align="right" src="'.$this->webroot.'/img/logout.png">');
            $this->set('logout_ret',$logout_ret);


            
        }
        
        
    }
        public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $user = $this->User->findById($id);
        if (!$user) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('user', $user);
    }
    public function search(){
        if (!empty($this->data)) {
            $searchstr = $this->data['User']['uname'];
            $this->set('users', $this->User->query('SELECT iditem FROM items where items.users_idusers = (select users.idusers from users where uname = "'.$searchstr.'")'));        
        }
    }
    public function add(){
        print_r($this->request->data);
        if ($this->User->save($this->request->data)){
            $this->Session->setFlash('Recipe Saved!');
        }
    }
    public function login() {
      
    }
    public function logout()
    {

    }
    public function wishlist(){
        
    }
    public function index4()
    {
        
    }
    public function profile()
    {
        require_once('../Lib/fetch.php');
            require_once('../Lib/login.php');

            $fetcher=new fetch('352984878216561','1c7c8eb2131c187699712a572bed0c45','http://localhost/rakkan/Users/profile');

            $session=$fetcher->fetch_session();
            $this->set('session',$session);
            //$graph_user=$fetcher->fetch_profile('me');
            //$graph_user_pic=$fetcher->fetch_profile_pic('me');
            
            //$this->set('graph_user',$graph_user);
            //$this->set('graph_user_pic',$graph_user_pic);
            //$_SESSION["selfId"] = $graph_user->getId();
            $friends=$fetcher->fetch_friends('me');


        $resp=array();
        $respIndex=0;


       // $fetcher=new fetch('352984878216561','1c7c8eb2131c187699712a572bed0c45','http://localhost/rakkan/Users/profile');

        //$session=$fetcher->fetch_session();
        //$this->set('session',$session);
       // $friends=$fetcher->fetch_friends('me');
        $this->set('friends',$friends);
        $friend_pic="";
        $buckets=$fetcher->fetch_likes($_COOKIE['profileId']);
        //print_r($profidarr);//."asdfasdfasdfasdfasdf");
        for($ind=0;$ind<$friends->length();$ind++){
            $friend=$friends->get_friend($ind); //fetch 1 friend    
            if($friend->get_id()==$_COOKIE['profileId'])
            {
                $friend_pic=$friend->get_pic();
                $break;        
            }
        }
        $this->set('friendImg',$friend_pic);
        $categories = $buckets->keys();
        $acceptedCategories = array(
                array("Movie",101240,200162), //CD-DVD, Books
                array("Tv show",101240),      //CD-DVD
                array("Fictional character",101240,200162,100371,551177) //CD-DVD ,Books ,Womens clothing ,Mens clothing
            );
         App::uses('HttpSocket', 'Network/Http');
         $HttpSocket = new HttpSocket();
         $this->set('buckets', $buckets);
         $this->set('categories', $categories);
         $this->set('acceptedCategories',$acceptedCategories);
         $this->set('fetcher',$fetcher);
        for($index=0;$index<$buckets->length();$index++)
        {
            $buck=$buckets->get_bucket($categories[$index]);
            for($index4=0;$index4<=count($acceptedCategories);$index4++){

                if($categories[$index] == $acceptedCategories[$index4][0]){
                    for($index2=1;$index2<=$buck->length();$index2++){
                        for($index3=1;$index3<count($acceptedCategories[$index4]);$index3++){
                            try{
                                $response1 = $HttpSocket->post('https://app.rakuten.co.jp/services/api/IchibaItem/Search/20140222',    'format=json&keyword='.$buck->get_item($index2).'&genreId='.$acceptedCategories[$index4][$index3].'&applicationId=1066920239571509113');
                                $response=json_decode($response1);
                                for($c=0;$c<2;$c++){//count($response);$c++){
                                     if($c%3==0)
                                         usleep(250000);
                                     if($response->Items[$c]->Item->itemName!=null){
                                           $resp[$respIndex++]=$response->Items[$c];            
                                     }
                                }
                            }catch(Exception $e){}
                        }
                    }
                }
            }
        }

        $this->set('response', $resp);
        $logout_ret=logout_script('http://localhost/rakkan/Users/profile','http://localhost/rakkan/Users/logout',$session,'<img height="30" width="150" align="right" src="'.$this->webroot.'/img/logout.png">');
        $this->set('logout_ret',$logout_ret);
    }
    public function profile2()
    {

    }
    public function getData(){
        
    }
    public function retrieve(){
        $searchstr = $_SESSION["selfId"];
        //$this->set('items', $this->Item->query('SELECT iditem FROM items where idusers = "'.$searchstr.'"'));
        //$items=$this->Item->query('SELECT iditem FROM items where idusers = "'.$searchstr.'"');
        //$this->set('items',$items);
        // /print_r($items);
        //return $items;
        //if (!empty($this->data)) {
        //    $searchstr = $this->data['User']['uname'];
        //echo $_COOKIE;
        //'.$searchstr.'"'));
        //print_r($this->Item->query('SELECT iditem FROM items where idusers = "'.$searchstr.'"'));
        //$this->redirect('http://localhost/rakkan/Users/uhome');
    }
    public function addWishlist(){
        echo "hi";
        print_r($this->request->data);
        if ($this->Item->save($this->request->data)){
            // Set a session flash message and redirect.
           //echo debug($this->Model->validationErrors); //show validationErrors
            echo "Success";
            $this->redirect('http://localhost/rakkan/Users/uhome');
           //echo debug($this->Model->getDataSource()->getLog(false, false)); //show last sql query
            //$this->Session->setFlash('Recipe Saved!');
        }
        else{
            //pr(errors);
            echo "Not work";
        }
    }
  
}
