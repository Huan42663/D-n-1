<?php
function add_comment($id_pro,$id_user,$content,$date){
    $sql = "INSERT INTO COMMENT (CONTENT,DATE,ID_PRO,ID_USER) VALUES ('$content','$date','$id_pro','$id_user')";
    pdo_execute($sql);
}
function load_comment($id_pro){
    $sql = "SELECT * FROM COMMENT 
    JOIN USER ON COMMENT.ID_USER = USER.ID_USER 
    WHERE ID_PRO = $id_pro";
    $cmt = pdo_query($sql);
    return $cmt;
}
function load_all_comment(){
    $sql = "SELECT * FROM COMMENT ORDER BY ID_PRO DESC";
    $cmt = pdo_query($sql);
    return $cmt;
}
function count_comment(){
    $sql = "SELECT * FROM COMMENT";
    $comment = pdo_query($sql);
    $i=0;
    foreach ($comment as $key => $value) {
        $i++;
    }
    $number =ceil($i / 5);
    return $number;
}
function load_limit_5_comment ($start,$limit){
    $sql = "SELECT * FROM COMMENT 
    ORDER BY ID_PRO DESC LIMIT $start,$limit "; 
    $comment = pdo_query($sql);
    return $comment;
}
function delete_comment($id){
    $sql = "DELETE FROM COMMENT WHERE ID_CMT = $id";
    pdo_execute($sql);
}
?>