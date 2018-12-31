<?php
    function menuMulti($data, $parent_id=0, $str="--", $selected=0) {
        foreach ($data as $val) {
            $id = $val['id'];
            $name = $val['name'];
            if ($val['parent_id'] == $parent_id) {
                if ($selected != 0 && $id == $selected) {
                    echo "<option value='$id' selected>$str $name</option>";
                } else {
                    echo "<option value='$id'>$str $name</option>";
                }
                menuMulti($data, $id, $str." --", $selected);
            }
        }
    }
?>