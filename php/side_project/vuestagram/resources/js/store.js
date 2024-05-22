import { createStore } from 'vuex';
import axios from './axios';
import router from './router';

const store = createStore({
    state() {
        return {
             authFlg: localStorage.getItem('accessToken') ? true : false,
             userInfo: localStorage.getItem('userInfo') ? JSON.parse(localStorage.getItem('userInfo')) : {},
             boardList: [],
             lastID: localStorage.getItem('lastID') ? localStorage.getItem('lastID') : 0,
        }
    },
    mutations: {
        // ---------
        // 인증 관련
        // ---------
        setAuthFlg(state, boo) {
            state.authFlg = boo;
        },
        setUserInfo(state, userInfo) {
            //앞의 userInfo는 state의 userInfo이고, 뒤는 바로위의 ㅇㅇ
            state.userInfo = userInfo;
        },

        // -------------
        // 게시글 관련
        // -------------
        setBoardList(state, data) {
            state.boardList = data;
        },
        setLastID(state, id) {
            state.lastID = id;
        }
    },
    actions: {
        // ---------
        // 인증 관련
        // ---------
        /** 
         * 로그인
         * 
         * @param {*} context
         * @param {*} userInfo
        */
        login(context, userInfo) {
            const url = '/api/login';
            axios.post(url, JSON.stringify(userInfo))
            .then(response => {
                // console.log(response.data);
                localStorage.setItem('accessToken', response.data.accessToken);
                //access refreshToken은 사라지지x때문에 Stroage에 저장해줌.
                localStorage.setItem('refreshToken', response.data.refreshToken);
                localStorage.setItem('userInfo', JSON.stringify(response.data.data));

                // state 갱신
                context.commit('setAuthFlg', true);
                context.commit('setUserInfo', response.data.data);
                router.replace('/board');
            })
            .catch(error => {
                console.log(error.response);
                const errorCode = error.response.data.code ? error.response.data.code : 'E99';
                alert('로그인 실패 : ' + errorCode);
            })
        },
        /**
         * 로그아웃 처리
         * 
         * @param {*} context 
         */
        logout(context) {
            const url = '/api/logout';
            const config = {
                headers: {
                    //인증 방식으로 Bearer(디폴트)를 쓰겠다고 지정한거임.
                    //Authorization 이건 인증과 관련된 설정임
                    // 라라벨은 자동으로 뒤의 토큰만 가져와줌.
                    'Authorization': 'Bearer ' + localStorage.getItem('accessToken'),
                }
            }
            axios.post(url, null, config)
            .then(response => {
                console.log(response);
                alert('로그아웃 완료');
             
            })
            .catch(error => {
                console.log(error);
                console.log(error.response);
                alert('문제가 생겨 로그아웃 처리');
            })
            .finally(() => {
                // 로컬 스토리지 비우기
                localStorage.clear();

                // store state 초기화
                context.commit('setAuthFlg', false);
                context.commit('setUserInfo', {});

                // 로그인로 이동
                router.replace('/login');
            });
        },
        /**
         * 보드 리스트 정보 획득
         * 
         * @param {*} context 
         */
        getBoardList(context) {
            const url = '/api/board/' + context.state.lastID + '/list';
            const config = {
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('accessToken'),
                }
            }

            axios.get(url, config)
            .then(response => {
                const data = response.data.data;
                context.commit('setBoardList', data);

                const id = data[data.length -1].id;
                localStorage.setItem('lastID', id);
                context.commit('setLastID', id);
            })
            .catch(error => {
                console.log(error);
                console.log(error.response);
                const code = error.response ? error.response.data.code : '';
                alert('게시글 습득에 실패하였습니다.(' + code + ')');
            });
        }
    }
});

export default store;