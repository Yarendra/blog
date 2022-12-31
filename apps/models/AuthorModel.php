<?php
class AuthorModel extends Model{
    function is_author($name){
        $sql="select username from $this->table where username=?";
        $pobj=$this->prepare($sql);
        $pobj->bindValue(1,$name);
        $pobj->execute();
        if($pobj->fetch(PDO::FETCH_ASSOC)){
            return true;
        }
        return false;
        
    }
}