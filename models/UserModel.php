<?php

    include('db/DBHelper.php');
    class UserModel extends DBHelper{
        private $table = "tbl_user";
        private $fields = array(
            'user_id',
            'user_lastname',
            'user_firstname',
            'user_username',
            'user_password',
        );

        //constructor
        function __construct()                          { DBHelper:: __construct();}
        function addUser($data)                         { return  DBHelper :: register($this->table,$this->fields,$data);}
        function addUserAccount($fields,$data)          { return  DBHelper :: registerForeign($fields,$data);}
        function getUserId()                            { return  DBHelper :: getAllRecords($this->table);}
        function getAccountInfo($fields,$ref_id)        { return  DBHelper :: innerJoinTables($this->table,$fields,$ref_id);}
        function getUserInfo($fields,$ref_id)           { return  DBHelper :: innerJoinTableUser($this->table,$fields,$ref_id);}
        // function getAccountUsernameInfo($ref_id)        { return  DBHelper :: getRecordAccount($ref_id);}
        function getAccountUsernameInfo($ref_id)        { return  DBHelper :: getRecordUsername($ref_id);}
        function getAccountUsernameId($ref_id)          { return  DBHelper :: getRecordID($ref_id);}
        function edit($fields,$data,$field_id,$ref_id)  { return DBHelper :: updateRecord($this->table,$fields,$data,$field_id,$ref_id);}
        function getTransactId()                        { return  DBHelper :: getRecordTransaction();}
        function addTransaction($fields,$data)          { return  DBHelper :: registerForeignTransaction($fields,$data);}
        function getAccountId()                         { return  DBHelper :: getMyIDAccount();}
        function getMaxID($fields)                      { return  DBHelper :: getMaxId($fields);}
        function receiveNotification($field,$ref_id)    { return  DBHelper :: getNotification($field,$ref_id);}
        function updateClickNotification($fields,$data,$field_id,$ref_id)  { return DBHelper :: updateNotification($fields,$data,$field_id,
                                                                            $ref_id);}
        function getUserNotifyInfo($fields,$ref_id)     { return  DBHelper :: getRecord($this->table,$fields,$ref_id);}

    }//end of class     

?>