<?php
class model_zhineng
    {
        var $db;
        function model_zhineng()
        {
                global $db;
                $this->db = $db;
        }
        function search_ctByid($da,$tb,$dc,$dt)
        {
                $sqlStr = "select $da from $tb where $dc = $dt";
                return $this->db->select($sqlStr);
        }
        function search_sql($da, $tb, $dc) {
        $sqlStr = "select $da from $tb where $dc";
            return $this->db->select($sqlStr);
        }
    }
?>