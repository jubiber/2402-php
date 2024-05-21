import axios from 'axios';

const axiosInstance = axios.create({
    // 기본 URL 설정
    // baseURL: 'http://112.222.157.156.6006',

    // 기본 헤더 설정
    headers: {
        'Content-Type': 'application/json'
    }
});
//이렇게 요청보내면 위의 http이게 /api 앞에 붙어 전송됨

// axios.get('/api')

export default axiosInstance;