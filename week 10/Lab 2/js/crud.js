//?/////////////// add user section ////////////////

let NameInput = $("#name")
let AgeInput = $("#age")
let addButton = $("#add-person")
let tbodyContainer = $("tbody")
let userArr = getUsers();

addButton.on("click", function () {
    let nameVal = NameInput.val();
    let ageVal = AgeInput.val();
    if (nameVal !== "" && ageVal !== "") {
        let userId = Date.now();
        let userData = {
            id: userId,
            name: nameVal,
            age: parseInt(ageVal)
        };
        addUser(userData);
        NameInput.val("");
        AgeInput.val("");
    }
    console.log(userArr);
});

function addUser(user) {
    const userData = {
        id: user.id,
        name: user.name,
        age: user.age
    }
    userArr.push(userData)
    createUserElement([userData])
    storeUser()
}

function createUserElement(users) {
    console.log(users);
    if (!Array.isArray(users) || users.length === 0) return;

    for (let u of users) {
        const tr = $("<tr></tr>").attr("data-id", u.id);
        const tdName = $("<td></td>").text(u.name);
        const tdAge = $("<td></td>").text(u.age);
        const tdDelete = $("<td></td>");
        const deleteButton = $("<button></button>").text("Delete");

        deleteButton.on("click", function () {
            deleteUser(u.id);
        });

        tdDelete.append(deleteButton);
        tr.append(tdName, tdAge, tdDelete);
        tbodyContainer.append(tr);
    }
}

function storeUser() {
    localStorage.setItem("user", JSON.stringify(userArr))
}

function deleteUser(userId) {
    const userElement = $(`tr[data-id='${userId}']`)
    userElement.remove()
    userArr = userArr.filter(user => user.id !== userId)
    storeUser()
}

function getUsers(search = []) {
    let users = localStorage.getItem('user');
    let parsedUsers = users ? JSON.parse(users) : [];

    tbodyContainer.empty();

    if (search.length > 0) {
        createUserElement(search);
        return search;
    } else {
        createUserElement(parsedUsers);
        return parsedUsers;
    }
}

//?/////////////// search section ////////////////
let searchInput = $("#search-item")
let searchButton = $("#search")


searchButton.on("click", function () {
    let searchValue = searchInput.val().toLowerCase()
    let searchArr = []
    if (searchValue !== "") {
        if (isNaN(searchValue)) {
            searchArr = userArr.filter(user => user.name.toLowerCase() === searchValue)
        } else {
            searchArr = userArr.filter(user => parseInt(user.age) === parseInt(searchValue));
        }
        getUsers(searchArr)
    }
})