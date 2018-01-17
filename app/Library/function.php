<?php
function cate_parent($data,$parent=0,$str='--',$select=0){
    foreach($data as $val){
        $id=$val['id'];
        $name=$val['name'];
        $parent_cate=$val['parent_id'];
        if($parent_cate==$parent){
            if($select!=0 && $id==$select){
                echo "<option value='$id' selected='selected'>$str $name</option>";
            }else{
                echo "<option value='$id' >$str $name</option>";
            }
            cate_parent($data,$id,$str.'--');
        }
    }
}
function cate_post($data,$select=0){
    foreach($data as $val){
        $id=$val['id'];
        $name=$val['name'];


        if($select!=0 && $id==$select){
            echo "<option value='$id' selected='selected'> $name</option>";
        }else{
            echo "<option value='$id' > $name</option>";
        }
    }
}

