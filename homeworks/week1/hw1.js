export const stars = (n) => {
    var arr = [];
    var str = '';
    for (var i = 0; i < n; i++) {
        str += '*';
        arr.push(str);
    }
    return arr;
}