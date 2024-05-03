<?php
namespace model;

class UsersModel extends Model {
    //특정 유저를 조회하는 메소드
    public function getUserInfo($paramArr) {
            // $paramArr - [
            //     "u_id" => 1
            //     ,"u_email" => "asda@asd.com"
            //     ,"u_pw" => "aklsjflkwejflk"
            // ];
        try {
            // u_id = 1 and u_email = 'asd' and u_pw = 'asdasd';
            // [
            //     "u_id = :u_id", "u_email = :u_email", "u_pw = :u_pw"

            // ];
            $sql = " SELECT * "
                ." FROM users "
                ." WHERE ";
            // WHERE절 동적 생성
            $arrWhere = [];
            foreach($paramArr as $key => $val) {
                $arrWhere[] = $key." = :".$key;

            }
            // WHERE절 추가
            $sql .= implode(" and ", $arrWhere);
        
            // 데이터 획득
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($paramArr);
            $result = $stmt->fetchAll();
// 0번 이하면 $result 빈배열을 return 해줌
            return count($result) > 0 ? $result[0] : $result;
        } catch (\Throwable $th) {
            echo "UsersModel -> getUserInfo(),".$th->getMessage();
            exit;
        }
    }

        // 세션에 u_id 저장

        // 로케이션 처리

        // 회원 정보 insert
        public function addUserInfo($paramArr) {
            try {
                $sql =
                " INSERT INTO users( "
                ." u_name "
                ." ,u_email "
                ." ,u_pw "                
                ." ) "
                ." VALUES( "
                ." ,:u_name "
                ." ,:u_email "
                ." ,:u_pw "                
                ." ) "
                ;

                $stmt = $this->conn->prepare($sql);
                $stmt->execute($paramArr);

                return $stmt->rowCount();
            } catch (\Throwable $th) {
               echo "UserModel -> addUserInfo(, ".$th->getMessage();
               exit;
            }
    }
}
