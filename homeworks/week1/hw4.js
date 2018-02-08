export const isPalindromes = (str) => {
    var origin = str.split('');
    var reversed = origin.reverse().join('');

    if (str === reversed) {
        return true;
    }
    return false;
}

/*
進階解法：
var isPalindromes = function(str) {
    return str === str.split('').reverse().join('');
}
*/