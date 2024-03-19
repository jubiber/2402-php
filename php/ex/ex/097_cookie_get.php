<?php
// 쿠키는 슈퍼 글로벌 변수 $_COOKIE에서 확인 가능
// 1. D드라이브에서 works > 2402-php > php > ex파일에서 97_cookie를 찾음
// 2. C드라이브 > Apache24 > htdocs파일안에 복붙해줌
// 3. 구글창에 localhost/097_cookie_set.php 먼저 입력한 후
// get으로 가줌. -> F12클릭 -> 화살표2개부분 클릭 -> Application -> Cookies > 파일 클릭하면
//쿠키가 생성됐는지 활용할 수 있음. 
// +) 동일한 방식으로 진행하면 delete도 확인 가능함.
print_r($_COOKIE["my_cookie2"]);

