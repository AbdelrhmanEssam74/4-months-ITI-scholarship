//? Point a
// let APILink = "https://reqres.in/api/users/1";
// let xhr = new XMLHttpRequest();
//
// let data = {}
// let form = document.forms[0]
// form.addEventListener("submit", (e) => {
//     e.preventDefault();
//     let id = form.children[1].value
//     if (id.length > 0) {
//         APILink = `https://reqres.in/api/users/${id}`;
//         xhr.open("GET", APILink, true);
//         xhr.onreadystatechange = () => {
//             if (xhr.readyState === 4 && xhr.status === 200) {
//                 data = JSON.parse(xhr.responseText).data;
//                 document.getElementById("fname").textContent = data.first_name + " " + data.last_name;
//                 document.getElementById("avatar").setAttribute("src", data.avatar)
//             }
//         }
//         xhr.send();
//     }
// })

//? Point b

let API = "https://reqres.in/api/users"
let ul = document.getElementById("dropdown-menu");

let xhr = new XMLHttpRequest();
xhr.open("GET", API, true);
let data = {}
xhr.onreadystatechange = () =>{
    if (xhr.readyState === 4 && xhr.status === 200){
        data = JSON.parse((xhr.responseText)).data
        for (let i = 0; i <data.length ; i++) {
            let li = document.createElement("li");
            li.innerHTML = `<a href="#" onclick="displayUserData(${data[i].id})">${data[i].first_name} ${data[i].last_name}</a>`;
            ul.appendChild(li);
        }
    }
}
function displayUserData(id){
    API = `https://reqres.in/api/users/${id}`;
    xhr.open("GET", API, true);
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            data = JSON.parse(xhr.responseText).data;
            document.getElementById("fname").textContent = data.first_name + " " + data.last_name;
            document.getElementById("avatar").setAttribute("src", data.avatar)
        }
    }
    xhr.send()
}

xhr.send()
