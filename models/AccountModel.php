<?php

    include('db/DBHelper.php');
    class AccountModel extends DBHelper{
        private $table = "tbl_account";
        private $fields = array(
            'account_id',
            'user_id',
            'account_no',
            'date_registered',
            'total_current_bal',
            'total_sent_amt',
            'status'
        );

        //constructor
        function __construct()                             { DBHelper:: __construct();}
        function edit($fields,$data,$field_id,$ref_id)     { return DBHelper :: updateRecord($this->table,$fields,$data,$field_id,$ref_id);}
        function getAccountInfo($fields,$ref_id)           { return  DBHelper :: getRecord($this->table,$fields,$ref_id);}
        function searchAccountInfo()                       { return  DBHelper :: getAllRecords($this->table);}
        function getUserInfo($fields,$ref_id)              { return  DBHelper :: innerJoinTableUser($this->table,$fields,$ref_id)                                               ;}
        function getAccountUsernameInfo($ref_id)           { return  DBHelper :: getRecordUsername($ref_id);}
        function addUserTransaction($fields,$data)         { return  DBHelper :: registerForeignTransaction($fields,$data);}
        function getAccountId()                            { return  DBHelper :: getAllRecords($this->table);}
        function addNotification($fields,$data)                    { return  DBHelper :: notification($fields,$data);}
        // function addUserAccount($fields,$data)          { return  DBHelper :: registerForeign($fields,$data);}
        // function getUserId()                            { return  DBHelper :: getAllRecords($this->table);}
        // function getAccountInfo($fields,$ref_id)        { return  DBHelper :: innerJoinTables($this->table,$fields,$ref_id);}
    }//end of class     

?>