<?php
    class AdsModel {
        private $db;
        private $id;
        private $userid;
        private $title;
        private $username;
        public function __construct() {
            $this->db = new Database;

        }

    //Finds all user in our database, returns them in  User object
    public function ListAllAdds()
    {
        $this->db->query("SELECT * FROM advertisements");
        $adds=$this->db->resultSet();
        if($this->db->rowcount()<1)
        {
            return false;
        }
        else
        {
            return $adds;
        }


    }
    //Returns users name by their id
    public function getCustomerNameFromUsers($id)
    {
        $this->db->query('SELECT * FROM users WHERE id=:userid');
        $this->db->bind(':userid',$id);
        if($result=$this->db->single())
        {
            return $result->name;
        }

    }


    

    }
