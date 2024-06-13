<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join</title>
    <link rel="stylesheet" href="{{ asset('css/register.css')}}">
</head>
<body>
    <div class="join_final_main_container">
        <h3>개인정보 입력</h3>
         <form action="registerend.html" method="get">
           <div class="join_final_content">
               <div class="join-box">
                   <label for="" class="custom-label">이름</label>
                   <input type="" class="join_input_content_unique" placeholder="이름을 입력해주세요." required>
               </div>
               <div class="join-box">
                       <label for="user_id" class="custom-label">아이디</label>
                       <input type="text" id="user_id" class="join_input_content_unique id-property" placeholder="아이디를 입력해주세요." required>
                       <button type="button" class="double-chk">중복확인</button>
               </div>
               <div class="join-box">
                   <label for="password" class="custom-label">비밀번호</label>
                   <input type="password" id="password" class="join_input_content_unique" placeholder="비밀번호를 입력해주세요." required>
                   
               </div>
               <div class="join-box">
                   <label for="confirm_password" class="custom-label">비밀번호확인</label>
                   <input type="password" id="confirm_password" class="join_input_content_unique" placeholder="비밀번호를 확인주세요." required>
               </div>
               <div class="join-box">
                   <span id="error_message" class="error">비밀번호가 일치하지 않습니다.</span>
               </div>
               <div class="join-box">
                   <label for="zipp_btn" class="custom-label">주소</label>
                   <input type="text" maxlength="10" id="zipp_code_id" class="join_zipp_code">
                   <input type="button" id="zipp_btn" class="join_address_search_btn" onclick="execDaumPostcode()" value="주소검색" required>               
                   <!-- <button class="address-btn">주소검색</button> -->
                   <div class="grid-container">
                       <input type="text" id="UserAdd1" class="join_address_text" placeholder="기본주소" required readonly>
                       <input type="text" id="UserAdd2" class="join_address_text" placeholder="나머지 주소" required>
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
                   <input type="text" id="phone2" class="phone_num_text2" maxlength="4" required>
                   <input type="text" id="phone3" class="phone_num_text3" maxlength="4" required>
               </div>
               <div class="join-box">
                   <label for="" class="custom-label">닉네임</label>
                   <input type="" class="join_input_content_unique nickname" placeholder="닉네임을 확인해주세요." required>
                   <button type="button" class="double-chk">중복확인</button>
               </div>
           </div>
           <div class="page-btn">
               <button type="reset" class="cancel-button" onclick="location.href=''">취소</button>
               <button type="submit" class="submit-button">다음단계</button>
           </div>
         </form>
       </div>
       <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
       <script src="{{ asset('js/register.js') }}"></script>
</body>
</html>