<?php 
    class DBController {
        protected $connection=NULL;
        protected $host='localhost';
        protected $user='root';
        protected $password='';
        protected $database='e-shoppingzonedb';

        function __construct(){
            $this->connectDB();
            $this->selectDB();
        }
        function connectDB() {
            $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database);
            if(mysqli_connect_error()) {
                die("Sorry!,Failed to connect to Database: ".mysqli_connect_error());
            }
        }
        function selectDB(){
            if(!empty($this->connection)){
                $this->connection->select_db($this->database);
            }
            else{
                echo"Database connection not available".$this->connection->error();
            }
        }
        function closeDB_connection(){
            if(!empty($this->connection)){
                $this->connection->close();
            }
            else{
                echo"Database connection not available".$this->connection->error();
            }
        }
        function runQuery($query){
            if(!empty($this->connection)){
                $result=$this->connection->query($query);
                return $result;
            }
            else{
                echo"Database connection not available".$this->connection->error();
            }
        }
        function numOfRows($query){
            if(!empty($this->connection)){
                $result=$this->connection->query($query);
                $rowcount=$result->num_rows;
                return $rowcount;
            }
        }
    }
?>