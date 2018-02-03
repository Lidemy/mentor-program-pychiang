export const add = (a, b) => {
    var arrA = a.split('').reverse();
    var arrB = b.split('').reverse();
    var result = '';
    var length = Math.max(arrA.length, arrB.length);
    var addOne = false;

    for (var i = 0; i < length; i++) {
        var sum = 0;
        sum = parseInt(arrA[i], 10) + parseInt(arrB[i], 10);

        if (sum >= 10) {
            addOne = true;
            result += sum.toString()[1];
        } else {
            result += sum.toString();
        }

        if (addOne) {
            sum += 1;
            addOne = false;
        }
    }
    result = result.split('').reverse().join('');

    if (addOne) {
        result = '1' + output; 
    }
    return result;
}