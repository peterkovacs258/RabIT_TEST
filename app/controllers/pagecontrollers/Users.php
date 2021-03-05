 <?php
 class Users extends Controller{

    public function __construct()
    {
        $this->userModel = $this->model('UsersModel');
    }


    //gets called when the users page is loaded
    public function users() {
        $data = $this->getUserList();

        $this->view('users', $data);
    }

    //Returns a table <td></td> elements with user data
    public function getUserList()
    {
        $users=$this->userModel->ListAllUser();

        if($users!=false)
        {
            $returnTD="";
           foreach($users as $user)
            {
                $returnTD.= "<tr><td>".$user->id."</td>".
                "<td>".$user->name."</td>".
                //Not the safest solution to remove user, but I did not wanted to use AJAX request in this small project
               "<td><a href=".URLROOT."/users/removeUser?id=".$user->id.">remove</a></td>".
               "</tr>";
            }
            return $returnTD;
        
        }
        else 
        {return false;}
    }

    //Adds a User with the name added
    public function addUser(){
        $data = [
            'title' => 'UserAdded',
            'id' => '',
            'name' => '' 
        ];
        if($_SERVER['REQUEST_METHOD']=='POST'&&
        isset($_POST['name']))
        {
            $data['name']=trim($_POST['name']);
            $data['id']=$this->userModel->getSmallestAvailableID();
            
           
       if(!empty($data['name'])&&strlen($data['name'])<30)
       {
           
            if($this->userModel->insert($data['id'],$data['name'])==true)
            {
                header('Location:'.URLROOT.'/users/users');
            }
            else
            {
                header('Location:'.URLROOT.'/users/users');
            }
        }
        else{
            header('Location:'.URLROOT.'/users/users');
        }
        }
    }

    public function removeUser()
    {
        if(isset($_GET['id']))
        { if($this->userModel->deleteUserAdds($_GET['id']))
            {
                if($this->userModel->delete($_GET['id']))
                {
                    header('Location:'.URLROOT.'/users/users');
                }
                else
                {
                    header('Location:'.URLROOT.'/users/users');
                }
            }
      
        }
    }


 }





?>