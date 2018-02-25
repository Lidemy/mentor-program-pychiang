function result() {
  let email = document.getElementById('email');
  let name = document.getElementById('name');
  let type1 = document.getElementById('type1');
  let type2 = document.getElementById('type2');
  let coding = document.getElementById('coding');
  let other = document.getElementById('other');

  if(email.value === '') {
    document.querySelector('.form__email').style.background = '#ffd6d6';
    email.style.background = '#ffd6d6';
    email.style.borderBottom = '1px solid #ea3535';
    document.getElementById('reminder1').style.color = '#ea3535';
    return false;
  } else if(name.value === '') {
    document.querySelector('.form__name').style.background = '#ffd6d6';
    name.style.background = '#ffd6d6';
    name.style.borderBottom = '1px solid #ea3535';
    document.getElementById('reminder2').style.color = '#ea3535';
    return false;
  } else if(!type1.checked && !type2.checked) {
    document.querySelector('.form__type').style.background = '#ffd6d6';
    document.getElementById('reminder3').style.color = '#ea3535';
    return false;
  } else if(coding.value === '') {
    document.querySelector('.form__coding').style.background = '#ffd6d6';
    coding.style.background = '#ffd6d6';
    coding.style.borderBottom = '1px solid #ea3535';
    document.getElementById('reminder4').style.color = '#ea3535';
    return false;
  } else {
    console.log(email.value);
    console.log(name.value);
    console.log('type1: ' + type1.checked);
    console.log('type2: ' + type2.checked);
    console.log(coding.value);
    console.log(other.value);
    alert('Submitted!')
    return true;
  } 
}  