<?php


class CreateDb
{
        public $servername;
        public $username;
        public $password;
        public $dbname;
        public $tablename;
        public $con;



    public function __construct(
        $dbname = "icecream",
        $tablename = "cart",
        $servername = "localhost",
        $username = "E.Njuguna",
        $password = "Kinjo1852"
    )
    {
      $this->dbname = $dbname;
      $this->tablename = $tablename;
      $this->servername = $servername;
      $this->username = $username;
      $this->password = $password;


        $this->con = mysqli_connect($servername, $username, $password);


        if (!$this->con){
            die("Connection failed : " . mysqli_connect_error());
        }


        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";


        if(mysqli_query($this->con, $sql)){

            $this->con = mysqli_connect($servername, $username, $password,
             $dbname);



            $sql = "
              CREATE TABLE IF NOT EXISTS `images` (
              `image` varchar(200) NOT NULL,
              `flavor` varchar(40) NOT NULL,
              `price` varchar(50) NOT NULL,
              `flavorID` int(15) NOT NULL
            )
            ;";

            if (!mysqli_query($this->con, $sql)){
                echo "Error creating table : " . mysqli_error($this->con);
            }

        }else{
            return false;
        }
    }



    public function getData(){
        $sql = "SELECT * FROM $this->tablename";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }
}
