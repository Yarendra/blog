<?php
class AuthorModel extends Model{
    function is_author($name,$isadmin='',$data=''){
        $q = '';
        if ($isadmin && ($isadmin == 'yes' || $isadmin == 'no')) {
            $q = " and is_admin='$isadmin'";
        }
        $cols = (is_array($data)) ? implode(',', $data) : (($data) ? $data : 'username');
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