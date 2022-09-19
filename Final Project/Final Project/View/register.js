function validateRegistration(form)
{
    const name = form.name.value;
    const email = form.email.value;
    const username = form.username.value;
    const password = form.password.value;
    const department = form.department.value;
    const phoneNo = form.phoneNo.value;
    const hiredate = form.hiredate.value;
    const gender = form.gender.value;

    let register_info = 
    {
        "name": name,
        "email": email,
        "username": username,
        "password": password,
        "department": department,
        "phoneNo": phoneNo,
        "hiredate": hiredate,
        "gender": gender,
    }

    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../Controller/regCheck.php');
    xhttp.onreadystatechange = function() { if (xhr.readyState === 4 && xhr.status === 200) { console.log(xhr.responseText); } }
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
    xhttp.send(new URLSearchParams(register_info).toString());
}

function checkName() {
    if (document.getElementById("name").value == "") {
          document.getElementById("nameErr").innerHTML = "Name can't be blank";
          document.getElementById("name").style.borderColor = "red";
    }
else{
          document.getElementById("nameErr").innerHTML = "";
          document.getElementById("name").style.borderColor = "black";

    }
    
}