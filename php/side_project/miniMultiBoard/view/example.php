<?php
// 데이터베이스 연결 정보
$host = 'localhost';
$username = '사용자명';
$password = '비밀번호';
$database = '데이터베이스명';

// MySQL 데이터베이스에 연결
$conn = new mysqli($host, $username, $password, $database);

// 연결 확인
if ($conn->connect_error) {
    die("데이터베이스 연결 실패: " . $conn->connect_error);
}

// 이름을 가져오는 쿼리 작성
$sql = "SELECT name FROM your_table_name";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 결과에서 첫 번째 행을 가져와 이름 추출
    $row = $result->fetch_assoc();
    $name = $row["name"];
} else {
    $name = ""; // 이름이 없을 경우 공백으로 설정
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>이름 입력</title>
</head>
<body>
    <form action="process.php" method="POST">
        <label for="name">이름:</label>
        <!-- PHP를 사용하여 이름을 기본값으로 설정 -->
        <input type="text" id="name" name="name" value="<?php echo $name; ?>">
        <input type="submit" value="저장">
    </form>
</body>
</html>
