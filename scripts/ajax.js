function addTask() {

    var form = document.getElementById('form');

    form.onsubmit = function(e) {
        e.preventDefault();
    }

    let description = document.getElementById('description').value;
    let priority = document.getElementById('priority').value;
    let done = document.getElementById('done').value;

    if(description.trim() === '') {
        return;
    }

    fetch('../controller/TaskController.php', {
        body: 'q=add&description='+description+'&priority='+priority+'&done='+done,
        method: 'POST',
        headers: {
            'Accept': 'application/json, text/plain, */*',
            'Content-Type': 'application/x-www-form-urlencoded',
        }
    })
    .then((res) => res.json())
    .then((data) => {
        if(data > 0) {
            window.location.href = "index.php";
        }
    })

}

function getTasks() {

    let table = document.getElementById('table')
    let progress = document.getElementById('progress')

    fetch('../controller/TaskController.php', {
        body: 'q=read',
        method: 'POST',
        headers: {
            'Accept': 'application/json, text/plain, */*',
            'Content-Type': 'application/x-www-form-urlencoded'
        }
    })
    .then((res) => res.json())
    .then((data) => {
        if(data !== null) {
            let size = data.length;
            let finished = 0;
            data.forEach(function(task, index) {
                table.innerHTML +=
                    `<tr class='${task['done'] === 'YES' ? 'table-primary' : 'table-secondary'}'>`+
                        `<td>${task['id']}</td>`+
                        `<td>${task['description']}</td>`+
                        `<td>${task['priority']}</td>`+
                        `<td>${task['done']}</td>`+
                        `<td colspan="2">`+
                            `<a class="btn btn-sm btn-warning ms-1" onclick="edit(${task['id']});"><i class="bi bi-pencil-square"></i></a>`+
                            `<a class="btn btn-sm btn-danger ms-1" onclick="deleteTask(${task['id']});"><i class="bi bi-trash3-fill"></i></a>`+
                        `</td>`+
                    `</tr>`;
                if(task['done'] == 'YES') {
                    finished++
                }
            })
            let p = parseInt((finished / size) * 100) + '%';
            progress.innerHTML = p;
            progress.style.width = p;
        }

    })

}

function editTask() {

    var form = document.getElementById('form');

    form.onsubmit = function(e) {
        e.preventDefault();
    }

    let id = document.getElementById('id').value;
    let description = document.getElementById('description').value;
    let priority = document.getElementById('priority').value;
    let done = document.getElementById('done').value;

    if(description.trim() === '') {
        return;
    }

    fetch('../controller/TaskController.php', {
        body: 'q=edit&id='+id+'&description='+description+'&priority='+priority+'&done='+done,
        method: 'POST',
        headers: {
            'Accept': 'application/json, text/plain, */*',
            'Content-Type': 'application/x-www-form-urlencoded',
        }
    })
    .then((res) => res.json())
    .then((data) => {
        if(data > 0) {
            window.location.href = "index.php";
        }
    })

}

function deleteTask(id) {
    
    var confirm = window.confirm('Delete task?');

    if(confirm) {
           
        fetch('../controller/TaskController.php', {
            body: 'q=del&id='+id,
            method: 'POST',
            headers: {
                'Accept': 'application/json, text/plain, */*',
                'Content-Type': 'application/x-www-form-urlencoded',
            }
        })
        .then((res) => res.json())
        .then((data) => {
            if(data > 0) {
                window.location.href = "index.php";
            }
            else {
                alert('Error deleting task');
            }
        })

    }

}

function edit(id) {
    window.location.href = "edit.php?id=" + id;
}

function getTask(id) {

    fetch('../controller/TaskController.php', {
        body: 'q=get&id='+id,
        method: 'POST',
        headers: {
            'Accept': 'application/json, text/plain, */*',
            'Content-Type': 'application/x-www-form-urlencoded'
        }
    })
    .then((res) => res.json())
    .then((data) => {
        if(data !== null) {
            document.getElementById("description").value = data["description"];
            document.getElementById("priority").value = data["priority"];
            document.getElementById("done").value = data["done"];
        }
        else {
            window.location.href = "index.php";
        }
    })       

}
