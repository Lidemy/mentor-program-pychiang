export const stars = (n) => {
    var arr = [];
    var str = '';
    for (var i = 0; i < n; i++) {
        str += '*';
        arr.push(str);
    }
    return arr;
}

/*
雙迴圈的方法：
const stars = (n) => {
    var arr = [];
    for (var i = 0; i < n; i++) {
        str = getStars(i+1);
        arr.push(str);
    }
    return arr;
}

const getStars = (n) => {
    var str = '';
    for (var i = 0; i < n; i++) {
        str += '*';
    }
    return str;
}
*/

/*
進階解法：
var stars = function(n) {
    var str = "";
    return Array(n).fill().map(function(str, i) {
        return "*".repeat(i + 1);
    });
}
*/