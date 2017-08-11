<?php
$configs = parse_ini_file('configs/db.ini');

//echo $configs['host'];
//var_dump($configs);
class Db
{
    private static $instance = null;
    private $salt = 'b0a07a245afb48a3a';
    private $connection;
    public static function getInstance()
    {
        if(is_null(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }
    protected function __construct(){
//        $this->connection =  new mysqli($configs['host'], $configs["username"], $configs["password"], $configs["dbname"]);
        $this->connection =  new mysqli('localhost', 'root','','jsstore');
    }
    private function __clone(){}
    
    public function query($sql)
    {
        
        return $this->connection->query($sql);
        
        
    }
    
    public function delete($table, $id)
    {
        $sql = "DELETE FROM {$table} WHERE id = {$id}";
        return $this->connection->query($sql);
    }
    
    public function select($table, $id, $page, $offset, $num)
    {
        if($page !=null){
             $sql = "SELECT id, title, description, price FROM {$table}";
            if(!empty($id)){
                $sql .= " WHERE id = $id";
            }
            if(!empty($page)){
                $sql .= " LIMIT {$offset} , {$num}";
            }
        }else{
              $sql = "SELECT count(id) FROM {$table}";
        }
        return $this->connection->query($sql);
    }
    
    public function update($table, $id, $title, $description, $price)
    {
        if(!empty($id)){
            $sql = "UPDATE {$table} SET title='{$title}', description = '{$description}', price = '{$price}' WHERE id = {$id};";
            
           
        }else{
            $sql = "INSERT INTO {$table} VALUES (LAST_INSERT_ID(), '{$title}', '{$description}', '{$price}')";
        }
        return $this->connection->query($sql);
    }
    
    public function auth($email, $password)
        {
            $hash = $this->hashing($password);
        
            $q = $this->connection->query("SELECT * FROM users WHERE email = '{$email}' AND hash = '{$hash}';");
            $userInfo = $q->fetch_assoc();
            return $userInfo;
        }
    
    public function reg($name, $lastname, $email, $password, $age)
    {
          
        $hash = $this->hashing($password);
        return $this->connection->query("INSERT INTO users (firstname,lastname,email,password,hash,age) VALUES ('{$name}','{$lastname}','{$email}','{$password}','{$hash}','{$age}')");
    
    }
    
    private function hashing($password)  
    {
        $password .= $this->salt;
        
        return md5($password);
    }
    
}

$db = Db::getInstance();

