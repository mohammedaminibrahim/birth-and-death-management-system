<?php


function delete_record_by_id($table, $id){
    try{
        global $conn;
        $sql = 'DELETE FROM '.$table.' where id = :id';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }catch(Exception $e){
        return false;
    }
}
function get_user_by_id($id)
{
    try{
        global $conn;
        $sql = 'SELECT * FROM birth where id = :id';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }catch(Exception $e){
        return null;
    }

}