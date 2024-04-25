// Promise 객체
// JS의 비동기 프로그래밍에서 근간이 되는 기법
// 콜백지옥을 개선하기 위해서 등장한 기법

// 콜백지옥
// setTimeout(() => {
//     console.log('A');
//     setTimeout(() => {
//         console.log('B');
//         setTimeout(() => {
//             console.log('C');
//         }, 1000);
//     }, 2000);
// }, 3000);
//프로미스객체 이론
//RESOLVE -> 작업 성공시 실행 (정상처리)
//REJECT 작업 실패했을 때 실패임 알려줌 (예외처리)
//재사용성, 가독성,확장성 이유로 함수로 등록하고 사용

//함수 표현식, 선언식 다 ㄱㅊ

//파라미터 (strm ,s)를 받음
// Promise를 사용하여 비동기 작업 수행하는 함수를 정의하는거
// 여기서 'PRO' 함수는 두 개의 매개변수를 받음
// 1. str -> 비교할 문자열
// 2. ms -> 지연 시간을 나타내는 밀리초
const PRO = (str, ms) => {
    //pro 함수는 새로운 promise 객체 생성함.
    // resolve와 reject 두개의 콜백 함수를 인자로 받음
	return new Promise((resolve, reject) => {
        // setTimeout() 함수로 지정시간 ms 경과 후 promise가 이행되거나
        // 거부됩니다.
		setTimeout(()=>{
            if(str === 'A') {
                resolve('성공 : A임'); // 작업 성공 resolve() 호출
            } else {
                reject('실패 : A아님'); // 작업 실패 reject() 호출
            }
		}, ms);
	});
}
// 이렇게 정의된 pro 함수는 promise를 반환하며, 이후에 primise를 이용하여
//비동기 작업의 성공or 실패를 처리할 수 있음.


// Promise 호출
PRO('B', 1000)
.then(result => console.log('then : ' + result)) // resolve가 호출됐을 때
.catch(error => console.log('catch : ' + error )) // reject가 호출 됐을 때

// 위에 콜백 지옥 개선
// str -> 문자열
const PRO2 = (str, ms) => {
    // 이 promise 객체는 resolve 콜백 함수만을 인자로 받음
    return new Promise((resolve) => {
        // setTimeout 함수를 사용하여 지정된 시간경과 후 promise가 resolve(이행)됨.
        setTimeout(() => {
            console.log(str);
            resolve();
        }, ms);
    }); 
}
// then catch finally 이거 3개 언제 쓰는지 어케쓰는지 알면 됨
// PRO2('A', 3000)
// // 성공일 때 pattern
// .then(() => PRO2('B', 2000))
// .then(() => PRO2('C', 1000));
// // 실패일 때 pattern
// .catch(() => console.log('ERROR'))
// // 성공여부 관련x 무조건 실행
// .finally(() => console.log('파이널리'));

// 병렬 처리 방법 (Promise.all())
// 매개변수 cnt를 받음 (CNT -> 루프의 반복 횟수 나타냄)
const myLoop = cnt => {
    for(let i = 0; i < cnt; i++) {
    
    }
    console.log('myLoop 종료 : ' + cnt);
}

// myLoop(10000000);
// myLoop(1000000);
// myLoop(100000);

//PROMISE.ALL 쓰면 병렬처리하게 됨. (이정도로 알고 넘어가면 됨)
// 10 5 1 초이지만 1초일때 결과 5초일때 결과 10초일때 결과 그래서 한번에
// 출력하게 됨
Promise.all([myLoop(10000000),myLoop(1000000), myLoop(100000)]);
