export const capitalize = (str) => {
    //make the string into an array with split('')
    str = str.split(''); 

    if (str[0] === str[0].toUpperCase()) {
        //make the array back to the string with join('')
        return str.join(''); 
    } else if (str[0] !== str[0].toUpperCase()) {
        str[0] = str[0].toUpperCase();
        return str.join('');
    }
}