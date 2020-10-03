function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function validateForm() {
  let full_name = document.forms["regForm"]["full_name"].value;
  let login = document.forms["regForm"]["login"].value;
  let email = document.forms["regForm"]["email"].value;
  let password = document.forms["regForm"]["password"].value;
  let password_confirm = document.forms["regForm"]["password_confirm"].value;
  
  if (full_name == "") {
    alert("Имя обязательно");
    return false;
  }

  if (login == "") {
    alert("Логин обязательный");
    return false;
  }

  if (email == "") {
    alert("Почта обязательна");
    return false;
  }

  if (password == "") {
    alert("Пароль обязательный");
    return false;
  }

  if (password_confirm == "") {
    alert("Повторите пароль");
    return false;
  }

  if (password.length <= 5){
  	alert("Пароль слишком короткий");
  	return false;
  }

  if (!validateEmail(email)){
  	alert("Правильно введите email");
  	return false;
  }

  return true;
}