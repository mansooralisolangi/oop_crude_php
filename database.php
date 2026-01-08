<?php

class Database
{

    private $db_host = "localhost";
    private $db_user = "root";
    private $db_password = "";
    private $db_name = "students_db";





    private $mysqli = "";
    private $conn = false;
    private $result = array(); // this is a result array for shown messages

    public function __construct()
    {
        // agr connction false aa rahe to connection banao do 
// new mysqli()] this is oop bulite funtion or method like myssqli_connect() procedural function

        if (!$this->conn) {
            $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_password, $this->db_name);
            $this->conn = true;
            // echo "connection successful";


            // age connectio main koi error aya to iss wali condion main aa jai ga
            // array_push() php ka builten method h jo array main value add karne k liye use hota h
            // first value worki like a variable and secand valure jo ham stor karna chahte hn 

            if ($this->mysqli->connect_error) {
                array_push($this->result, $this->mysqli->connect_error);
                return false;            // return false if there is a connection error
            }
        } else {     // connection already established
            return true;

        }
    }







    //insert 
// database data inser k lia 2 cheez chahiye akh hota table and 2 value, (two parameters)
// user phle table detga konsi table main data insert karna chata h or user valure 
// abh ham table k check karnege k user ne jo table name dia h wo database main exits kartna h k nhi  .... nechi banaya h 
// tabele_exits() is method ko ham ne niche call kiya h 
// insert kane k time array main data aa rhe h to ham key and value k lia lag lag string banein g or pass kardenge 
  
// implode() function use karnege array to string main convert karega 

// array_keys() function use karnege array k sirf keys lene k lia
        


public function insert($table, $params = array())
    {
        if($this->tabele_exits($table)){ // yahan p table exits main argument ($table) pass kar rahe h take function jake parameters ko  de or database se check karke ai
            // print_r($params);// yahan p array main data show ho rahe jo hamne arguments mwain pass kiye h
        $table_columns =  implode(",", array_keys($params));
        $table_values = implode("','", $params);
         $sql = "INSERT INTO $table ($table_columns) VALUES ('$table_values')";


         if($this->mysqli->query($sql)){
            // agar query run hui to yahan p success message show karne k lia
            array_push($this->result, $this->mysqli->insert_id . "Data inserted successfully in $table table");
                
            return true;

         }else{
            // agar query run nhi hui to error message show karne k lia
            array_push($this->result, $this->mysqli->error);
            return false;
         }

        }else{
            return false;
            // array_push($this->result, "Table $table does not exits in database");   

        }
    }

    //select

    public function select()
    {
        // Select functionality to be implemented
    }
    //update

    public function update()
    {
        // Update functionality to be implemented
    }

    //delete

    public function delete()
    {
        // Delete functionality to be implemented
    }











    // table ka name check karne k lia hame akh h method bana ho ga jo update delete , insert sabhe main call
    // karenge table ka hame chack karne k lia 
    // age ese nhi karte to har kese lia alg lag se banana parega 
    // or issko private banana  user isse bhar direct call na kar sake 

    // or yahan main phle sql query k madad se database se check karonga k ye table exits karta h k nhi
    // abh sql query ko bhe run karna k take check karke ai database se table h ya nhi
    // Query() it is a built-in method of mysqli class to execute queries for run queries
     //query run huew k nhi huew to ham kia karen g condtion lagain g 
     // ham condition main check karne g agr isse table mill raha h 

    public function tabele_exits($table){
        $sql = "SHOW TABLES FROM $this->db_name LIKE '$table'";
        $database_table = $this->mysqli->query($sql);  
        if($database_table) {
            if($database_table->num_rows == 1){
             return true;
            }else{
                // yan p message denge k table nhi mila
                array_push($this->result, "Table $table does not exits in database");
                return false;
            }

        }

    }





// result wala array h na uske k messages ko show karne k lia bhe to method bana ho ga na 
//   $val = $this->result; || result arrar ka data val variable main store kar lenge 

public function getresult(){
    $val = $this->result; 
    $this->result = array(); // abhe result array ko empty kardenge ta k ager dubara call kiya to purana data na ai
    return $val; // ne value yan hogi  ||  this is also array 

}













    // destructor method - this will be called when the object is destroyed
    public function __destruct()
    {
        if ($this->conn) {
            if ($this->mysqli->close()) {
                $this->conn = false;
                echo "connection closed";
                return true;
            } else {
                return false;
            }

        }


    }

}

?>