<?php
 class Ads extends Controller{

    //constructor
    public function __construct()
    {
        $this->addsModel = $this->model('AdsModel');
    }

    //gets called when the advertisements page is loaded
    public function advertisements() {
        $data = $this->getAllAds();

        $this->view('advertisements', $data);
    }
   
    //Returns all advertisements in <td></td> table elements
    public function getAllAds()
    {
        $adds=$this->addsModel->ListAllAdds();

        if($adds!=false)
        {
            $returnTD="";
           foreach($adds as $add)
            {
                $add->username=$this->addsModel->getCustomerNameFromUsers($add->userid);
                $returnTD.= "<tr><td>".$add->id."</td>".
                "<td>".$add->userid."</td>".
                "<td>".$add->username."</td>".
                "<td>".$add->title."</td></tr>";
            }
            return $returnTD;
        
        }
        else 
        {return false;}
    }


 }

