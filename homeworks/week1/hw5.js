export const add = (a, b) => {
    //將字串變成陣列再翻轉，因為從個位數開始加
    var arrA = a.split('').reverse();
    var arrB = b.split('').reverse();
    //把最後的結果設一個空字串
    var result = '';
    //取較長數字的長度
    var length = Math.max(arrA.length, arrB.length);
    //判斷是否進位
    var addOne = false; 

    for (var i = 0; i < length; i++) {
        var sum = 0;
        //判斷兩個數字陣列中的兩個元素是否都存在，兩者存在則相加，只存在一個則取那個為和數
        if (arrA[i] && arrB[i]) {
            sum = parseInt(arrA[i], 10) + parseInt(arrB[i], 10);
        } else if (arrA[i] && !arrB[i]) {
            sum = parseInt(arrA[i], 10);
        } else if (!arrA[i] && arrB[i]) {
            sum = parseInt(arrB[i], 10);
        }
        
        //如果要進位則加一
        if (addOne) {
            sum += 1;
            addOne = false;
        }

        //判斷兩數相加是否大於10，大於10的話只印出個位數而已
        if (sum >= 10) {
            addOne = true;
            result += sum.toString()[1];
        } else {
            result += sum.toString();
        }

    }
    //將結果變成陣列、翻轉、再變回字串
    result = result.split('').reverse().join('');

    //如果最大位數需要進位則再加一
    if (addOne) {
        result = '1' + result; 
    }

    return result;
}