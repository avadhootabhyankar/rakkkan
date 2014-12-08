<?php
// Start the session
session_start();
?>
<?php 
class ItemsController extends AppController{
	public $helpers = array('Html', 'Form');

	public function add(){
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
    public function wishlist(){

    }
    public function retrieve(){
        //if (!empty($this->data)) {
        //    $searchstr = $this->data['User']['uname'];
        //echo $_COOKIE;
        $searchstr = $_SESSION["selfId"];
        $this->set('items', $this->Item->query('SELECT iditem FROM items where idusers = "'.$searchstr.'"'));//'.$searchstr.'"'));
        //$this->redirect('http://localhost/rakkan/Users/uhome');
    }
}
?>