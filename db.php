<?php
$configs = parse_ini_file('configs/db.ini');

//echo $configs['host'];
//var_dump($configs);
class Db
{
    private static $instance = null;
    private $connection;
    public static function getInstance()
    {
        if(is_null(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }
    private function __construct(){
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
}

$db = Db::getInstance();

