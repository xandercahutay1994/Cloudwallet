<?php

    include('db/DBHelper.php');
    class NotifyModel extends DBHelper{
        private $table = "tbl_notify";
        private $fields = array(
            'notify_id',
            'receiver_no',
            'sender_no',
            'sendDate',
            'sendTime',
            'sendAmount',
            'status'
        );

        //constructor
        function __construct()                             { DBHelper:: __construct();}
        function addNotification($data)                    { return  DBHelper :: register($this->table,$this->fields,$data);}
        // function addUserAccount($fields,$data)          { return  DBHelper :: registerForeign($fields,$data);}
        // function getUserId()                            { return  DBHelper :: getAllRecords($this->table);}
        // function getAccountInfo($fields,$ref_id)        { return  DBHelper :: innerJoinTables($this->table,$fields,$ref_id);}
    }//end of class     

?>