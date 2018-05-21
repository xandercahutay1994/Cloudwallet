<?php
    //abstraction
    class DBHelper{
        //properties
        private $hostname = '127.0.0.1';
        private $username = 'root';
        private $password = "";
        private $dbname = 'cloudwallet';
        private $conn;

        //constructor
        function __construct(){
            try{            
                $this->conn=new PDO("mysql:host=$this->hostname;dbname=$this->dbname",$this->username,$this->password);
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
        }
        function register($table,$fields,$data){
            $ok = false;
            $flds = implode(',',$fields);
            $q = array();
            foreach($data as $d)$q[]="?"; 
            $plc = implode(',',$q);
            if(count($fields) == count($data)){
                try{
                    $stmt=$this->conn-> prepare("INSERT INTO $table($flds) VALUES($plc)");
                    $ok=$stmt->execute($data);
                }catch(PDOException $e){
                   echo $e->getMessage();
                } 
            }else echo "Fields and data didn't match1"; 
            return $ok;
        }

        function registerForeign($fields,$data){
            $oka = false;
            $flds = implode(',',$fields);
            $q = array();
            foreach($data as $d)$q[]="?"; 
            $plc = implode(',',$q);
            if(count($fields) == count($data)){
                try{
                    $stmt=$this->conn-> prepare("INSERT INTO tbl_account($flds) VALUES($plc)");
                    $oka=$stmt->execute($data);
                }catch(PDOException $e){
                   echo $e->getMessage();
                } 
            }else echo "Fields and data didn't match2"; 
            return $oka;
        }

        function notification($fields,$data){
            $oka = false;
            $flds = implode(',',$fields);
            $q = array();
            foreach($data as $d)$q[]="?"; 
            $plc = implode(',',$q);
            if(count($fields) == count($data)){
                try{
                    $stmt=$this->conn-> prepare("INSERT INTO tbl_notify($flds) VALUES($plc)");
                    $oka=$stmt->execute($data);
                }catch(PDOException $e){
                   echo $e->getMessage();
                } 
            }else echo "Fields and data didn't match2"; 
            return $oka;
        }

        function registerForeignTransaction($fields,$data){
            $oka = false;
            $flds = implode(',',$fields);
            $q = array();
            foreach($data as $d)$q[]="?"; 
            $plc = implode(',',$q);
            if(count($fields) == count($data)){
                try{
                    $stmt=$this->conn-> prepare("INSERT INTO tbl_transaction($flds) VALUES($plc)");
                    $oka=$stmt->execute($data);
                }catch(PDOException $e){
                   echo $e->getMessage();
                } 
            }else echo "Fields and data didn't match3"; 
            return $oka;
        }
        
        function getAllRecords($table){
            $rows;
            $sql = "SELECT * FROM $table";
            try{    
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
            return $rows;
        }

        function getNotification($field,$ref_id){
            $rows;
            $sql = "SELECT * FROM tbl_notify WHERE $field = $ref_id AND status = 0 ORDER BY sendTime asc";
            try{    
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(array($ref_id));
                $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
            return $rows;
        }

        function getMaxId($field){
            $rows;
            $sql = "SELECT max($field)+1 as max_id FROM tbl_account";
            try{   
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(array($field));
                $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
            return $rows;
        }

        function getMyIDAccount(){
            $rows;
            $sql = "SELECT * FROM tbl_account";
            try{    
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
            return $rows;
        }

        function getRecordTransaction(){
            $rows;
            $sql = "SELECT * FROM tbl_transaction";
            try{    
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
            return $rows;
        }

        function innerJoinTables($table,$field_id,$ref_id){
            $rows;
            $sql = "SELECT * FROM tbl_account JOIN $table ON tbl_account.user_id = $table.$field_id WHERE tbl_account.user_id = $ref_id";
            try{    
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(array($ref_id));
                $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
            return $rows;
        }    

        function innerJoinTableUser($table,$field_id,$ref_id){
            $rows;
            $sql = "SELECT tbl_user.user_firstname,tbl_user.user_lastname,tbl_user.user_password,tbl_user.user_username,tbl_user.user_id FROM tbl_user JOIN $table ON tbl_user.user_id = $table.$field_id WHERE tbl_user.user_id = $ref_id";
            try{    
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(array($ref_id));
                $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
            return $rows;
        }   

        function updateRecord($table,$fields,$data,$field_id,$ref_id){
            $ok= false;
            $fld=implode("=?,",$fields)."=?";
            $sql="UPDATE $table SET $fld WHERE $field_id=$ref_id";
            try{
                $stmt=$this->conn->prepare($sql);
                $oka=$stmt->execute($data);
            }catch(PDOException $e){ echo $e->getMessage();}
                return $ok;
        }

        function updateNotification($fields,$data,$field_id,$ref_id){
            $ok= false;
            $fld=implode("=?,",$fields)."=?";
            $sql="UPDATE tbl_notify SET $fld WHERE $field_id=$ref_id";
            try{
                $stmt=$this->conn->prepare($sql);
                $oka=$stmt->execute($data);
            }catch(PDOException $e){ echo $e->getMessage();}
                return $ok;
        }

        function getRecord($table,$field,$ref_id){
            $rows;
            $sql = "SELECT * FROM $table WHERE $field = $ref_id";
            try{    
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(array($ref_id));
                $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
            return $rows;
        }

        function getFilterRecord($table,$field_id,$fd,$fields,$ref_id,$id){
            $rows;
            $sql = "SELECT * FROM $table WHERE $field_id=$fd AND $fields BETWEEN '$ref_id' AND  '$id'";
            try{    
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(array($fd,$ref_id,$id));
                $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo $e -> getMessage(); 
            }
            return $rows;
        }

        function getFilterRecordType($table,$field_id,$fd,$fields,$ref_id,$id,$fieldtwo,$type){
            $rows;
            $sql = "SELECT * FROM $table WHERE $field_id=$fd AND $fields BETWEEN '$ref_id' AND '$id' AND $fieldtwo = '$type'";
            try{    
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(array($fd,$ref_id,$id));
                $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
            return $rows;
        }
        // SELECT * FROM `tbl_transaction` WHERE `transactDate` BETWEEN '02/24/2018' AND '02/26/2018' AND `transactType` = 'D'
        //ALL //SELECT *,concat('D','','W')  FROM `tbl_transaction` WHERE account_id = '1' AND `transactDate` BETWEEN '02/24/2018' AND '02/27/2018' 

        function getFilterAllType($table,$field_id,$fd,$fields,$ref_id,$id){
            $rows;
            $sql = "SELECT *,concat('D','','W') FROM $table WHERE $field_id=$fd AND $fields BETWEEN '$ref_id' AND '$id'";
            try{    
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(array($fd,$ref_id,$id));
                $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
            return $rows;
        }

        function getRecordUsername($ref_id){
              $rows;
            $sql = "SELECT * FROM tbl_user WHERE user_username = $ref_id";
            try{    
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(array($ref_id));
                $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
            return $rows;
        }

        function getRecordAccount($ref_id){
              $rows;
            $sql = "SELECT * FROM tbl_account WHERE user_id = $ref_id";
            try{    
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(array($ref_id));
                $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
            return $rows;
        }

        function getRecordID($ref_id){
              $rows;
            $sql = "SELECT * FROM tbl_user WHERE user_username= $ref_id";
            try{    
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(array($ref_id));
                $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
            return $rows;
        }

       function displayAllAccount($table,$field,$ref_id){
              $rows;
            $sql = "SELECT * FROM $table WHERE $field= $ref_id";
            try{    
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(array($ref_id));
                $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
            return $rows;
        }
       
    }
?>
