export const isPrime = (n) => {
    //1 is not a prime number
    if (n === 1) {  
        return false; 
    }
    //test if the number can be divided by any numbers smaller than itself
    for (var i = 2; i < n; i++) {
        if (n % i === 0) {  
            return false;
        }
    }
  return true;
}