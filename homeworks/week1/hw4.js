export const isPalindromes = (str) => {
    var origin = str.split('');
    var reversed = origin.reverse().join('');

    if (str === reversed) {
        return true;
    }
    return false;
}