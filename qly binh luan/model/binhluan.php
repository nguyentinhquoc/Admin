<?php
    function list_bl($kyw) {
        $sql = "SELECT * from binhluan where 1";
        if ($kyw != '') {
            $sql.= " AND id LIKE '%".$kyw."%' or noidung like '%".$kyw."%' or iduser like '%".$kyw."%' or idpro LIKE '%".$kyw."%' or ngaybinhluan like '%".$kyw."%'";
        }
        $sql.= " order by id desc";
        return pdo_query($sql);
    }

    function list_bl_5($id) {
        $sql = "SELECT * FROM binhluan where 1 and idpro = '$id' order by id desc limit 0,5";
        return pdo_query($sql);
    }

    function add_bl($idpro,$iduser,$noidung,$time) {
        $sql = "INSERT INTO binhluan (id, noidung, iduser, idpro, ngaybinhluan) VALUES (NULL, '$noidung', '$iduser', '$idpro', '$time')";
        pdo_execute($sql);
    }

    function get_bl($id) {
        $sql = "SELECT * from binhluan where 1 and idpro = $id";
        return pdo_query($sql);
    }

    function delete_bl($id) {
        $sql = "DELETE from binhluan where id = '$id'";
        pdo_execute($sql);
    }

    function delete_checkbox_bl($checkbox = []) {
        foreach ($checkbox as $box) {
            $sql = "DELETE from binhluan where id=" . $box;
            pdo_execute($sql);
        }
    }
