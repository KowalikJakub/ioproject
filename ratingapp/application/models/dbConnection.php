
<?php
    //połączenie z bazą danych
    class dbConnection
    {
        private $dbHost;
        private $dbUser;
        private $dbPassword;
        private $dbName;
        
        protected static $connection;
        public static function sendquery($queryString)
        {
            $connect = new dbConnection();
           
            return mysqli_query($connect->connect(),$queryString);
        }
        protected function connect(){
            return mysqli_query(self::$connection,$queryString);
        }
        protected static function getInfo($columnName)
        {
            return $_GET[$columnName];
        }
        protected static function postInfo($columnName)
        {
            return $_POST[$columnName];
        }

         protected function connect(){
            $this->dbHost = "localhost";
            $this->dbUser = "root";
            $this->dbPassword = "";
            $this->dbName = "aplikacja_pracodawcy"; 
            $connection = mysqli_connect($this->dbHost, $this->dbUser,$this->dbPassword, $this->dbName);
            if($connection == false){
                echo "Connection error <br />";
                exit;
            }
            $connection -> query("SET NAMES utf8");
            $connection -> query("SET CHARACTER_SET utf8_unicode_ci");
     
            return $connection;
         }
    }
?>
