import { createStore } from 'vuex';
import router from './router';

const store = createStore({
    state() {
        return {
            // ---------------------- 주은혜 ----------------------------
            seasonRecommendInfo: [],
            //-----------------------끝-------------------------------
        }
    },
    mutations: {
          // ---------------------- 주은혜 ----------------------------
          setSeasonRecommendInfo(state, data) {
            state.seasonRecommendInfo = data;
        }
        //-----------------------끝-------------------------------
    },
    actions: {
         // ------------------- 주은혜 --------------------
         getSeasonRecommendInfo(context) {
            const url = '/api/recommend/season';

            axios.get(url)
            .then( response => {
                context.commit('setSeasonRecommendInfo', response.data.data);
            })
            .catch( error => {
                console.log(error);
            });
        },
        // ------------------- 끝 -------------------------
    }
});

export default store;