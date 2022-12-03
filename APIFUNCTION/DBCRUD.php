<?php 
    class DBCRUD{
        public $que;
        private $servername='localhost';
        private $username='root';
        private $password='';
        private $dbname='brms';
        private $result=array();
        private $mysqli='';

        public function __construct(){
            $this->mysqli = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
        }

        public function insert($table,$para=array()){
            $table_columns = implode(',', array_keys($para));
            $table_value = implode("','", $para);

            $sql="INSERT INTO $table($table_columns) VALUES('$table_value')";

            $result = $this->mysqli->query($sql);
        }

        public function update($table,$para=array(),$id){
            $args = array();

            foreach ($para as $key => $value) {
                $args[] = "$key = '$value'"; 
            }

            $sql="UPDATE  $table SET " . implode(',', $args);

            $sql .=" WHERE $id";

            $result = $this->mysqli->query($sql);
        }

        public function delete($table,$id){
            $sql="DELETE FROM $table";
            $sql .=" WHERE $id ";
            $sql;
            $result = $this->mysqli->query($sql);
        }

        public $sql;

        public function select($table,$rows="*",$where = null){
            if ($where != null) {
                $sql="SELECT $rows FROM $table WHERE $where";
            }else{
                $sql="SELECT $rows FROM $table";
            }

            $this->sql = $result = $this->mysqli->query($sql);
        }

        public function selectsss(){
            $sql ="SELECT * FROM customer_walkin ORDER BY cw_id DESC LIMIT 1";

            $this->sql = $result = $this->mysqli->query($sql);
        }


        public function selectleftjoin($table,$table1,$attributename,$attributename1,$where = null){

            if ($where != null) {
                $sql = "SELECT * FROM $table LEFT JOIN $table1 ON $table1.$attributename=$table.$attributename1 WHERE $where";
            }else{
                $sql = "SELECT * FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attributename";
            }

            $this->sql = $result = $this->mysqli->query($sql);
        }

        public function selectleftjoins($table,$table1,$table2,$attributename,$attributename1,$attributename2,$attributename3){
            $sql = "SELECT * FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attributename LEFT JOIN $table2 ON $table2.$attributename2=$table.$attributename3";

            $this->sql = $result = $this->mysqli->query($sql);
        }

        public function selectleftjoin3($myid){
            $sql = "SELECT * FROM `cart` LEFT JOIN users ON users.user_id=cart.cart_user_id LEFT JOIN products ON products.product_id = cart.cart_product_id LEFT JOIN categories ON categories.category_id = products.category_id WHERE cart_user_id=$myid";

            $this->sql = $result = $this->mysqli->query($sql);
        }

        public function __destruct(){
            $this->mysqli->close();
        }

        public function select2(){
            $sql = "SELECT * FROM `users` WHERE `permission_id`=5";

            $this->sql = $result = $this->mysqli->query($sql);
        }
    }
?>