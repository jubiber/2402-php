<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join</title>
    <link rel="stylesheet" href="../css/Join.css">
    <style>
      body, html {
    margin: 0;
    padding: 0;
    height: 100%;
    }
    
body {
    display: flex;
    justify-content: center;
    align-items: center;
    }
        
h3 {
    margin: 50px;
    margin-right: 380px;
}
.join-box {
   
    flex-direction: row;
    align-items: center;
    margin-bottom: 20px;
}
.main {
    max-width: 1444px;
    width: 100%;
    padding: 20px;
    box-sizing: border-box;
}
/* 라벨부분 css 주기 */
.custom-label {
    display: inline-block;
    position: relative;
    border-top: none;
    border-right: none;
    border-left: none;
}

.custom-label::before {
    content: " ";
    display: block;
    width: 100%;
    border-bottom: 1px solid black; /* Black underline */
    position: absolute;
    bottom: 0;
    left: 0;
}

.custom-label::after {
    content: "*";
    color: red; /* Red asterisk */
    position: absolute;
    right: 5px; /* Adjust position as needed */
    top: 50%;
    transform: translateY(-50%);
}

/* 공통 입력 요소 스타일 */
input[type="text"],
.common-property,
.unique-property1,
.unique-property2-1,
.unique-property2-2,
.unique-property2-3,
.unique-property3
 {
    display: inline-block;
    padding: 10px;
    background-color: rgb(240, 240, 240);
    border: none;
}
.unique-property1 {
    margin-left: 30px;
}
.nickname {
    margin-left: -2px;
}
/* 휴대전화 */
.phone-code {
    padding: 9px 15px;
    font-size: 13px;
    border: 1px solid #ccc;
    border: none;
    background-color: #f0f0f0;
    margin-right: 10px; /* 주변 요소와 간격을 맞추기 위해 우측 마진 추가 */
}

.phone-code:focus {
    outline: none; /* 포커스 시 기본 포커스 스타일 제거 */
    border-color: #007BFF; /* 포커스 시 테두리 색상 변경 */
    box-shadow: 0 0 8px rgba(0, 123, 255, 0.6); /* 포커스 시 그림자 효과 추가 */
}

/* 주소 입력 요소 */
.unique-property3
{
    padding-top: 14px;
    width: 130px;
}
/* 주소 검색 */
/* 모달 스타일 */
.modal {
    display: none; /* 초기에는 숨김 */
    position: fixed; /* 고정 위치 */
    z-index: 1; /* 최상위 */
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto; /* 스크롤 가능하게 */
    background-color: rgba(0,0,0,0.4); /* 배경색과 투명도 */
  }
  
  /* 모달 내용 스타일 */
  .modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
  }
  
  /* 모달 닫기 버튼 스타일 */
  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }
  
  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }
  

/* 휴대전화 입력 요소 */
.unique-property2-1,
.unique-property2-2,
.unique-property2-3 {
    padding: 7px;
    width: 50px;
    margin-left: 15px;
}
.unique-property2-1 {
    margin-left: -1px;
}
/* 취소, 다음단계 버튼 */
.address-btn,
.double-chk {
    padding: 7px 20px;
    font-size: 13px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
}
.cancel-button,
.submit-button {
    padding: 3px 18px;
    font-size: 13px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
}


.cancel-button,
.submit-button {
    border: 1px solid black;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.submit-button {
    background-color: black;
    color: white;
}
.address-btn:hover,
.double-chk:hover {
    transform: translateY(-2px);
    width: 100px;
    height: 34px;
    font-size: 15px;
    border: 0;
    border-radius: 2px;
    outline: none;
    background-color: #007BFF;
    color: white;
    border: 700;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.submit-button:hover {
    width: 100px;
    height: 25px;
    font-size: 15px;
    border: 0;
    border-radius: 2px;
    outline: none;
    background-color: #007BFF;
    color: white;
    border: 700;
    transition: background-color 0.3s ease, transform 0.3s ease;
}
.cancel-button:hover {
    width: 90px;
    height: 25px;
    font-size: 15px;
    border: 0;
    border-radius: 2px;
    outline: none;
    background-color: #fd5781;
    color: white;
    border: 700;
    transition: background-color 0.3s ease, transform 0.3s ease;
}



.cancel-button:active,
.submit-button:active,
.address-btn:active,
.double-chk:active {
    transform: translateY(0);
}

.address-btn,
.double-chk {
    margin-left: 10px;
}

/* 중복확인, 주소검색 버튼 */
.address-btn,
.double-chk {
    background-color: white;
    color: #333;
    border: 1px solid #000000;
    transition: background-color 0.3s ease;
}

.address-btn:hover,
.double-chk:hover {
    width: 100px;
    height: 34px;
    font-size: 15px;
    border: 0;
    border-radius: 2px;
    outline: none;
    background-color: #007BFF;
    color: white;
    border: 700;
    transition: background-color 0.3s ease, transform 0.3s ease;
}


/* .join-box {
    margin:  20px;
} */
 /* 추가 */
label {
    display: inline-block;
    width: 130px;
    padding: 10px;
    font-size: 13px;
    font-weight: 700;
    border-radius: 3px;
    margin-right: 30px;
}


input:focus {
    border-color: #007BFF; /* 포커스 시 테두리 색상 변경 */
    box-shadow: 0 0 8px rgba(0, 123, 255, 0.6); /* 포커스 시 그림자 효과 추가 */
    outline: none; /* 기본 포커스 스타일 제거 */
}
.grid-container {
    display: grid;
    grid-template-columns: 1fr; /* 1열로 정렬 */
    gap: 10px; /* 그리드 아이템 간의 간격 */
    margin: 10px;
    margin-left: 156px;
}
main {
    align-items: center;
    display: flex;
    flex-direction: column;
    max-width: 600px;       /* 최대 너비를 설정하여 화면에 꽉 차지 않도록 함 */
    padding: 20px;
    box-sizing: border-box;
}
.page-btn {
    text-align: center;
    margin-top: 70px;
}
.cancel-button {
    margin-right: 30px;
    padding-left: 30px;
    padding-right: 30px;
}
.foot {
    text-align: right; /* 텍스트 우측 정렬 */
    margin-top: 20px; /* 버튼과 내용 사이의 간격 */
    display: flex; /* Flexbox 레이아웃 사용 */
    justify-content: flex-end; /* 자식 요소를 우측으로 정렬 */
}
@media (max-width: 600px) {
    h3 {
        width: 100%;
        text-align: center; /* 중앙 정렬 유지 */
        margin: 20px 0; /* 상하 여백 설정 */
    }
    .join-box {
        flex-direction: column;
        align-items: flex-start;
    }

    .custom-label {
        /* width: 100%; */
        margin-bottom: 5px;
        text-align: left; /* 중앙 정렬 해제 */
    }
    input[type="text"],
    .common-property,
    .unique-property1,
    .unique-property2-1,
    .unique-property2-2,
    .unique-property2-3,
    .unique-property3
    {
        /* width: 100%; */
        margin-left: 0;
        margin-bottom: 10px;
    }

    .unique-property2-1,
    .unique-property2-2,
    .unique-property2-3 {
        margin-left: 0; /* margin-left 속성 제거 */
    }

    .address-btn,
    .double-chk {
        /* width: 100%; */
        margin-top: 10px;
        padding: 8px 12px;
    }
}
@media (min-width: 601px) {
    .common-property
    {
        width: 450px; /* 너비를 원하는 값으로 설정 */
        height: 23px;
    }
    .unique-property1 {
        width: 320px;
        height: 23px;
    }
}


    </style>
</head>
<body>
    <div>
        <h3>개인정보 입력</h3>
        <div class="main">
            <div class="join-box">
                <label for="" class="custom-label">이름</label>
                <input type="" class="common-property" placeholder="이름을 입력해주세요." required>
            </div>
            <div class="join-box">
                    <label for="" class="custom-label">아이디</label>
                    <input type="" class="common-property"placeholder="아이디를 입력해주세요." required>
                    <button class="double-chk">중복확인</button>
            </div>
            <div class="join-box">
                <label for="" class="custom-label">비밀번호</label>
                <input type="" class="common-property" placeholder="비밀번호를 입력해주세요." required>
                
            </div>
            <div class="join-box">
                <label for="" class="custom-label">비밀번호확인</label>
                <input type="" class="common-property" placeholder="비밀번호를 확인주세요." required>

            </div>
            <div class="join-box">
                <label for="zipp_btn" class="custom-label">주소</label>
                <input type="text" maxlength="10" id="zipp_code_id" class="unique-property3">
                <input type="button" id="zipp_btn" class="address-btn" onclick="execDaumPostcode()" value="주소검색" required>               
                <!-- <button class="address-btn">주소검색</button> -->
                <div class="grid-container">
                    <input type="text" id="UserAdd1" class="unique-property1" placeholder="기본주소" required>
                    <input type="text" id="UserAdd2" class="unique-property1" placeholder="나머지 주소" required>
                </div>
            </div>
            <div class="join-box">
                <label for="" class="custom-label">휴대전화</label>
                <select id="phone-code" class="phone-code">
                    <option value="010">010</option>
                    <option value="011">011</option>
                    <option value="012">012</option>
                    <!-- 필요한 국가 코드 옵션들을 추가하세요 -->
                </select>
                <input type="text" id="phone2" class="unique-property2-2" maxlength="4" required>
                <input type="text" id="phone3" class="unique-property2-3" maxlength="4" required>
            </div>
            <div class="join-box">
                <label for="" class="custom-label">닉네임</label>
                <input type="" class="unique-property1 nickname" placeholder="닉네임을 확인해주세요." required>
                <button class="double-chk">중복확인</button>
            </div>
        </div>
        <div class="page-btn">
            <button type="reset" class="cancel-button" onclick="cancelRegistration()">취소</button>
            <button type="submit" class="submit-button">다음단계</button>
        </div>
    </div>
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script>
        // 휴대전화 국가 코드 선택란
    const phoneCodeSelect = document.getElementById("phone-code");

    // 휴대전화 국가 코드 선택 시 이벤트 핸들러
    phoneCodeSelect.addEventListener("change", function() {
        // 선택한 국가 코드 값
        const selectedCode = phoneCodeSelect.value;
        
        // 국가 코드에 따라 휴대전화 입력란의 placeholder 변경
        const phone2Input = document.getElementById("phone2");
        const phone3Input = document.getElementById("phone3");
        
        switch(selectedCode) {
            case "010":
                phone2Input.placeholder = "1234";
                phone3Input.placeholder = "5678";
                break;
            case "011":
                phone2Input.placeholder = "9876";
                phone3Input.placeholder = "5432";
                break;
            case "012":
                phone2Input.placeholder = "4567";
                phone3Input.placeholder = "8901";
                break;
            // 필요한 국가 코드에 대한 case 추가
            default:
                break;
        }
});
function execDaumPostcode() {
	        new daum.Postcode({
	            oncomplete: function(data) {
	                // 팝업을 통한 검색 결과 항목 클릭 시 실행
	                var addr = ''; // 주소_결과값이 없을 경우 공백 
	                var extraAddr = ''; // 참고항목
	
	                //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
	                if (data.userSelectedType === 'R') { // 도로명 주소를 선택
	                    addr = data.roadAddress;
	                } else { // 지번 주소를 선택
	                    addr = data.jibunAddress;
	                }
	
	                if(data.userSelectedType === 'R'){
	                    if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
	                        extraAddr += data.bname;
	                    }
	                    if(data.buildingName !== '' && data.apartment === 'Y'){
	                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
	                    }
	                    if(extraAddr !== ''){
	                        extraAddr = ' (' + extraAddr + ')';
	                    }
	                } else {
	                    document.getElementById("UserAdd1").value = '';
	                }
	
	                // 선택된 우편번호와 주소 정보를 input 박스에 넣는다.
	                document.getElementById('zipp_code_id').value = data.zonecode;
	                document.getElementById("UserAdd1").value = addr;
	                document.getElementById("UserAdd1").value += extraAddr;
	                document.getElementById("UserAdd2").focus(); // 우편번호 + 주소 입력이 완료되었음으로 상세주소로 포커스 이동
	            }
	        }).open();
	    }
      function cancelRegistration() {
           window.location.href = "/login"; // 로그인 페이지로 리디렉션
     }

</script>
</body>
</html>