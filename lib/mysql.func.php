<?php /** @noinspection PhpParamsInspection */
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/19
 * Time: 11:22
 */

/**
 * 数据库查询
 * @param $sql
 * @param string $result_type
 * @return array
 */
function fetchOne($sql){
    $conn = new mysqli(DB_HOST, DB_USER, DB_PWD, DB_DBNAME);
    if ($conn->errno) {
        die("Connection failed: " . $conn->error);
    }else{
        $conn->set_charset(DB_CHARSET);
    }
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}

/**
 * 查询所有数据
 * @param $sql
 * @return array
 */
function fetchAll($sql){
    $conn = new mysqli(DB_HOST, DB_USER, DB_PWD, DB_DBNAME);
    if ($conn->errno) {
        die("Connection failed: " . $conn->error);
    }else{
        $conn->set_charset(DB_CHARSET);
    }
    $mysqli_result=$conn->query($sql);
    if($mysqli_result&& $mysqli_result->num_rows>0){
        while($row=$mysqli_result->fetch_assoc()){
            $rows[] = $row;
        }
    }
    return $rows;
}
/**
 * 数据库插入
 * @param $table表名
 * @param $array接受数组
 * @return int|string
 */
function insert($table,$array){
    $conn =new mysqli(DB_HOST, DB_USER, DB_PWD, DB_DBNAME);
    if ($conn->errno) {
        die("Connection failed: " . $conn->error);
    }else{
       $conn->set_charset(DB_CHARSET);
    }
    $keys=join(",",array_keys($array));
    $vals="'".join("','",array_values($array))."'";
    $sql="insert {$table}($keys) values({$vals})";
    $res = $conn->query($sql);
    return $res;
}

function update($sql){
    $conn =new mysqli(DB_HOST, DB_USER, DB_PWD, DB_DBNAME);
    if ($conn->errno) {
        die("Connection failed: " . $conn->error);
    }else{
        $conn->set_charset(DB_CHARSET);
    }
    $res = $conn->query($sql);
    $conn->close();
    return $res;
}

/**删除操作
 * @param $table
 * @param $where
 * @return bool|mysqli_result
 */
function delete($table,$where){
    $conn =new mysqli(DB_HOST, DB_USER, DB_PWD, DB_DBNAME);
    if ($conn->errno) {
        die("Connection failed: " . $conn->error);
    }else{
        $conn->set_charset(DB_CHARSET);
    }
    $sql="delete from {$table} where {$where}";
    $res = $conn->query($sql);
    return $res;
}

function query($sql){
    $conn =new mysqli(DB_HOST, DB_USER, DB_PWD, DB_DBNAME);
    if ($conn->errno) {
    die("Connection failed: " . $conn->error);
    }else{
    $conn->set_charset(DB_CHARSET);
    }
    $res = $conn->query($sql);
    return $res;
}







