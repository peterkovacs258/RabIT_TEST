<?php
    class UsersModel {
        private $db;
        private $id;
        private $name;

        public function __construct() {
            $this->db = new Database;

        }

    //Finds all user in our database, returns them in array
    public function ListAllUser()
    {
        $this->db->query("SELECT * FROM users");
        $users=$this->db->resultSet();
        if($this->db->rowcount()<1)
        {
            return false;
        }
        else
        {
            return $users;
        }


    }

    //Returns the smallest available id in the users table
    public function getSmallestAvailableID(){
        $sql="SELECT DISTINCT id +1 as newid FROM users WHERE id + 1 NOT IN (SELECT DISTINCT id FROM users) LIMIT 1";
         $this->db->query($sql);
         $smallestid=$this->db->single();
        return $smallestid->newid;
    }

    //inserts user to the database with id and name
    public function insert($id,$name)
    {
        $sql="INSERT INTO users VALUES (:id,:name)";
        $this->db->query($sql);
        $this->db->bind(':id',$id);
        $this->db->bind(':name',$name);
        
        try{
            if($this->db->execute())
            {
                return true;
            }
        }
        catch(PDOException $ex){
         return 'Something went wrong. '.$ex->getMessage();
        }

     }

     //Deletes all the advertisements linked with the user
     public function deleteUserAdds($userid)
     {
        $sql="DELETE FROM `advertisements` WHERE userid=:userid";
        $this->db->query($sql);
         $this->db->bind(':userid',$userid);
         if($this->db->execute())
         {
             return true;
        }
         else
         {
             return false;
         }
     }
     
    
     //Deletes user from the database by id
     public function delete($id)
     {
         $sql="DELETE FROM users WHERE id=:id";
         $this->db->query($sql);
         $this->db->bind(':id',$id);
         if($this->db->execute())
         {
             return true;
        }
         else
         {
             return false;
         }
     }

     //Modifies name of the user by id
     public function modify($id,$name)
     {
         $sql="UPDATE users SET name=:name WHERE id=:id";
         $this->db->query($sql);
         $this->db->bind(':id',$id);
         $this->db->bind(':name',$name);
         if($this->db->execute())
         {
             return true;
        }
         else
         {
             return false;
         }
     }


}


