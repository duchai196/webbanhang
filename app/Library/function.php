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

function showCategories($categories, $parent_id = 0, $char = '')
{
    // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
    $cate_child = array();
    foreach ($categories as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item->parent_id == $parent_id)
        {
            $cate_child[] = $item;
            unset($categories[$key]);
        }
    }

    // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
    if ($cate_child)
    {
        echo '<div class='."panel-body".'>';
        echo '<ul>';
        foreach ($cate_child as $key => $item)
        {
            // Hiển thị tiêu đề chuyên mục
            echo '<li>'.$item->name;

            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($categories, $item->id, $char.'|---');
            echo '</li>';
        }
        echo '</ul>';
        echo "</div>";
    }
}


function testCate($data)
{
    if($data->subCategory)
    {
        foreach ($data->subCategory as $item)
        {
            foreach ($item->product as $i)
            {
                echo $i->name."<br>";

            }
            testCate($item);
        }
    }


}