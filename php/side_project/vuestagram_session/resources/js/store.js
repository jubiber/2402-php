import { createStore } from 'vuex';
import router from './router';

const store = createStore({
    state() {
        return {
            // 'authFlg'는 'auth=' 쿠키가 있는지 여부를 확인하여 true 또는 false 값을 가집니다.
            authFlg: document.cookie.indexOf('auth=') >= 0 ? true : false,
            // 'userInfo'는 로컬 스토리지에 저장된 'userInfo' 값을 JSON으로 파싱하여 가져오며, 없으면 null을 가집니다. 
            userInfo: localStorage.getItem('userInfo') ? JSON.parse(localStorage.getItem('userInfo')) : null,
            // 'boardData'는 게시판 데이터를 저장할 배열입니다.
            boardData: [],
            // 'moerBoardFlg'는 더 많은 게시판 데이터를 로드할 수 있는지 여부를 나타내는 플래그이다. 기본값은 true입니다.
            moreBoardFlg: true, 

        }
    },
    mutations: {
        // 인증 플레그 저장
        setAuthFlg(state, flg) {
            state.authFlg = flg;
        },
        // 유저 정보 저장
        setUserInfo(state, userInfo) {
            state.userInfo = userInfo;
        },
        // 게시글 초기 삽입
        setBoardData(state, data) {
            state.boardData = data;
        },
        // 더보기 버튼 플래그
        setMoreBoardFlg(state, flg) {
            state.moreBoardFlg = flg;
        },
        // 게시글 추가
        setMoreBoardFlg(state, flg) {
            state.moreBoardFlg = flg;
        },
        // 작성 게시글을 가장 앞에 추가
        setMoreBoardData(state, data) {
            state.boardData.unshift(data);
        },
        // 유저 작성글 수 + 1
        setAddUserBoardCount(state) {
            state.userInfo.boards_count++;
            localStorage.setItem('userInfo', state.userInfo);
        },
    },
    actions: {
        /**
         * 로그인 처리
         * 
         * @param {store} context
         */
        login(context) {
            const url = '/api/login';
            const form = document.querySelector('#loginForm');
            const data = new FormData(form);
            axios.post(url, data)
            // 요청 성공 시
            .then(response => {
                console.log(response.data); // 응답 데이터 출력
                localStorage.setItem('userInfo', JSON.stringify(response.data.data)); // 응답으로 받은 사용자 정보를 로컬 스토리지에 저장
                context.commit('setUserInfo', response.data.data);
                context.commit('setAuthFlg', true); 

                router.replace('/board'); // 게시판 페이지로 이동
            })
            .catch(error => {
                console.log(error.response);
                alert('로그인에 실패했습니다. (' + error.response.data.code +  ')');
            });
        },

        /**
         * 로그아웃
         * @param {*} context
         */
        logout(context) {
            const url = '/api/logout';

            axios.post(url)
            .then(response => {
                console.log(response.data)
            })
            .catch(error => {
                console.log(error.response);
                alert('문제가 발생해 강제 로그아웃합니다. (' + error.response.data + ')');
            })
            .finally(() => {
                localStorage.clear();

                context.commit('setAuthFlg', false);
                context.commit('setUserInfo', null);

                router.replace('/login');
            });
        },

        /**
         * 최초 게시글 획득
         * @param {*} context
         */
        getBoardData(context) {
            const url = '/api/board';
            axios.get(url)
            .then(response => {
                console.log(response.data);
                context.commit('setBoardData', response.data.data);
            })
            .catch(error => {
                console.log(error.response);
                alert('게시글 습득에 실패했습니다. (' + error.response.data.code + ')');
            });
        },

        /**
         * 추가 게시글 획득
         * 
         * @param {*} context
         */
        getMoreBoardData(context) {

            const lastItem = context.state.boardData[context.state.boardData.length - 1];
            const url = '/api/board' + lastItem.id;

            axios.get(url)
            .then(response => {
                console.log(response.data);
                context.commit('setMoreBoardData', response.data.data);
                // 더보기 버튼 플래그 갱신
                if(response.data.data.length < 20) {
                    context.commit('setMoreBoardFlg', false);
                }
            })
            .catch(error => {
                console.log(error.response);
                alert('추가 게시글 획득에 실패했습니다. (' + error.response.data.code + ')')
            });
        },
        registration(context) {
            const url = '/api/registration';
            const data = new FormData(documtne.querySelector('#registrationForm'));

            axios.post(url, data)
            .then(response => {
                console.log(response.data);
                router.replace('/login');
            })
            .catch(error => {
                console.log(error.response.data);
                alert('회원가입에 실패했습니다. (' + error.response.data.code + ')')
            });
        },
        // 게시글 작성
        boardStore(context) {
            const url = '/api/board';
            const data = new FormData(document,querySelector('#boardCreateForm'));

            axios.post(url, data)
            .then(response => {
                context.commit('setUnshiftBoardData', response.data.data);
                context.commit('setAddUserBoardsCount');
                router.replace('/board');
            })
            .catch(error => {
                console.log(error.response.data);
                alert('글 작성에 실패했습니다. (' + error.response.data.code + ')');
            });
        },
        // 삭제 메서드 추가
        deleteBoard(context, id) {
            const url = `/api/board${id}`; //삭제할 게시물의 ID를 포함한 URL
            axios.delete(url)
            .then(response => {
                console.log(response.data) // 성공 응답 데이터 출력
            })
            .catch(error => {
                console.error(error.response); // 에러 응답 데이터 출력
                alert('게시물 삭제에 실패했습니다.(' + error.response.data.code + ')');
            })
        },

    }

});

export default store;
