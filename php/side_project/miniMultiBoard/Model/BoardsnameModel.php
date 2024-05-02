<?php
namespace model;

class BoardsnameModel extends Model {
    public function getBoardsnameList() {
        try {
            $sql = 
                " SELECT "
                ." b_type "
                ." ,bn_name "
                ." FROM "
                ." boardsname"
                ." ORDER BY "
                //오름차순
                ."  b_type ASC "
                ;
                $stmt = $this->conn->query($sql);
                $result = $stmt->fetchAll();

                return $result;
        } catch (\Throwable $th) {
            echo "BoarsdsnameModel -> getBoardsnameList(), ".$th->getMessage();
            exit;
        }
    }
}