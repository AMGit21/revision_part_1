const firstName = document.getElementById('firstName');
const lastName = document.getElementById('lastName');
const userType = document.getElementById('userType');
let details = document.getElementById('details');
const resInfo = document.getElementById('resInfo');
const userData = document.getElementById('userData');

const addUser = () => { // function addUser(){}
    // console.log(firstName.value + " " + lastName.value + " " + userType.value);
    fetch('../php/addUser.php', {
        method: 'POST',
        body: JSON.stringify({
            firstName: firstName.value,
            lastName: lastName.value,
            userType: userType.value
        }),
        headers: {
            'Content-type': 'application/json; charset=UTF-8'
        }
    }).then((response) => {
        return response.json();
    }).then((res) => {
        console.log(res);
        // const info = `
        // <div class="alert alert-info w-50 m-auto mt-5" role="alert">
        //   ${res['message']}
        // </div>`;
        // resInfo.innerHTML = info;
        // if (res.firstName) {
        //     const dtl = `<tr>
        // <td>${res.firstName}</td>
        // <td>${res['lastName']}</td>
        // <td>${res['userType']}</td>
        // <td>
        // <input class="btn btn-warning" type="button" name="editUser" id="editUser" value="Edit">
        // <input class="btn btn-danger" type="button" name="deleteUser" id="deleteUser" value="Delete">
        // </td>
        // </tr>`;
        //     details.innerHTML += dtl;
        // }
    }).catch(function(error) {
        console.log('Something went wrong.', error);
    });
    userData.reset();
}
const userDetails = async() => {
    const res = await fetch('../php/userDetails.php');
    const received_data = await res.json();
    details.innerHTML = '';
    console.log(received_data);
    received_data.forEach(user => {
        details.innerHTML += `<tr class='table'>
            <td id="fn${user.id}">${user.firstName}</td>
            <td id="ln${user.id}">${user.lastName}</td>
            <td id="type${user.id}">${user.userType}</td>
            <td>
            <button class='btn btn-warning' id='dataUser${user.id}' onclick='dataUser(${user.id})'>Edit</button>
            <button class='btn btn-danger d-none' id='editUser${user.id}' onclick='editUser(${user.id})'>Save</button>
            <button class='btn btn-warning' onclick='del(${user.id})'>Delete</button>
            </td>
            </tr>`;
    });
}


function del(id) {
    fetch('../php/delete.php', {
        method: 'POST',
        body: JSON.stringify({
            id: id
        }),
        headers: {
            'Content-type': 'application/json; charset=UTF-8'
        }
    }).then((response) => {
        return response.json();
    }).then((res) => {
        console.log(res);
        userDetails();
    }).catch(error => {
        console.log(error);
    });
}

// update
const dataUser = (id) => {
    firstName.value = document.getElementById(`fn${id}`).innerHTML;
    lastName.value = document.getElementById(`ln${id}`).innerHTML;
    userType.value = document.getElementById(`type${id}`).innerHTML;
    document.getElementById(`dataUser${id}`).classList.add('d-none');
    document.getElementById(`editUser${id}`).classList.remove('d-none');
}
const editUser = (id) => {
    fetch('../php/editUser.php', {
        method: 'POST',
        body: JSON.stringify({
            id: id,
            firstName: firstName.value,
            lastName: lastName.value,
            userType: userType.value
        }),
        headers: {
            'Content-type': 'application/json; charset=UTF-8'
        }
    }).then((response) => {
        return response.json();
    }).then((res) => {
        console.log(res);
        userDetails();
    }).catch(function(error) {
        console.log('Something went wrong.', error);
    });
    userData.reset();
}
document.getElementById('addUser').addEventListener('click', addUser);
document.getElementById('userDetails').addEventListener('click', userDetails);