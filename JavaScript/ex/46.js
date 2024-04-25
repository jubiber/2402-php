//async/await



// setTimeout(() => {
//     console.log('A');
//     setTimeout(() => {
//         console.log('B');
//         setTimeout(() => {
//             console.log('C');
//         }, 1000);
//     }, 2000);
// }, 3000);

//  PRO2('A', 3000)
//  // 성공일 때 pattern
//  .then(() => PRO2('B', 2000))
//  .then(() => PRO2('C', 1000));
//  // 실패일 때 pattern
//  .catch(() => console.log('ERROR'))
//  // 성공여부 관련x 무조건 실행
//  .finally(() => console.log('파이널리'));

// async -> 비동기함수임을 알 수o
 const myAsync = async () => {
    try {
    await PRO2('A', 3000);
    await PRO2('B', 2000);
    await PRO2('C', 1000);
    } catch(err) {
        console.log(err);
    }
 }

 // html css db php javascript 시판 site하나 제작할거임. -> 객체지향으로 만들거.

 
