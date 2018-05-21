<?php

    include('db/DBHelper.php');
    class TransactionModel extends DBHelper{
        private $table = "tbl_transaction";
        private $fields = array(
            'transact_id', 
            'account_id',
            'recipient_no',
            'transactType',
            'transactDate',
            'transactTime',
            'transactAmt',
            'transactBalance'
        );

        //constructor
        function __construct()                                { DBHelper:: __construct();}
        function getAccountId()                               { return  DBHelper :: getAllRecords($this->table);}
        function getTransactionRecord($fields,$ref_id)        { return  DBHelper :: getRecord($this->table,$fields,$ref_id);}
       // function getTransactionFilterRecord($ref_id) { return  DBHelper :: getFilterRecord($this->table,$ref_id);}
        function getTransactionFilterRecord($field_id,$fd,$fields,$ref_id,$id)  { return  DBHelper :: getFilterRecord($this->table,$field_id,$fd,$fields,$ref_id,$id);}
        function getTransactionFilterRecordType($field_id,$fd,$fields,$ref_id,$id,$fieldtwo,$type)  { return  DBHelper :: getFilterRecordType($this->table,$field_id,$fd,$fields,$ref_id,$id,$fieldtwo,$type);}

        function getFilterAllRecordType($field_id,$fd,$fields,$ref_id,$id)  { return  DBHelper :: getFilterAllType($this->table,$field_id,$fd,$fields,$ref_id,$id);}
        function displayAccount($fields,$ref_id)        { return  DBHelper :: displayAllAccount($this->table,$fields,$ref_id);}
       
    }//end of class     

?>