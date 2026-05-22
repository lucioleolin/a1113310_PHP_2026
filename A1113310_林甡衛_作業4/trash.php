<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Spam Email Sending System</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            border: 1px solid #ddd;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-box,
        .controls {
            display: flex;
            gap: 10px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        input,
        button {
            padding: 10px;
            font-size: 15px;
        }

        input[type="email"] {
            flex: 1;
        }

        button {
            cursor: pointer;
            border: 1px solid #999;
            border-radius: 5px;
            background: #eeeeee;
            color: #222;
        }

        button:hover {
            background: #dddddd;
        }

        .delete-btn {
            background: #f4f4f4;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 18px;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #eeeeee;
        }

        .progress-box {
            margin-top: 25px;
            background: #ddd;
            border-radius: 15px;
            overflow: hidden;
        }

        .progress-bar {
            width: 0%;
            background: #777;
            color: white;
            text-align: center;
            padding: 8px 0;
        }

        .log {
            margin-top: 20px;
            background: #f1f1f1;
            padding: 15px;
            height: 160px;
            overflow-y: auto;
            border-radius: 5px;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="container">
    <h1>Spam Email Sending System</h1>

    <div class="form-box">
        <input type="email" id="emailInput" placeholder="Enter email address">
        <button onclick="addEmail()">Add Email</button>
    </div>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody id="emailTable"></tbody>
    </table>

    <div class="controls">
        <button onclick="sendAll()">Send All</button>

        <input type="number" id="randomCount" placeholder="Random amount" min="1">

        <button onclick="sendRandom()">Send Random</button>

        <input type="number" id="intervalTime" placeholder="Interval seconds" min="1" value="1">
    </div>

    <div class="progress-box">
        <div class="progress-bar" id="progressBar">0%</div>
    </div>

    <div class="log" id="sendLog">
        Not started yet...
    </div>
</div>

<script>
let emailList = [];

function loadEmails() {
    fetch("index.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "action=get_emails"
    })
    .then(response => response.json())
    .then(data => {
        emailList = data;
        renderTable();
    });
}

function renderTable() {
    let html = "";

    emailList.forEach((item, index) => {
        html += `
            <tr>
                <td>${index + 1}</td>
                <td>${item.email}</td>
                <td>
                    <button class="delete-btn" onclick="deleteEmail(${item.id})">Delete</button>
                </td>
            </tr>
        `;
    });

    document.getElementById("emailTable").innerHTML = html;
}

function addEmail() {
    let email = document.getElementById("emailInput").value;

    fetch("index.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "action=add_email&email=" + encodeURIComponent(email)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById("emailInput").value = "";
            loadEmails();
        } else {
            alert(data.message);
        }
    });
}

function deleteEmail(id) {
    fetch("index.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "action=delete_email&id=" + id
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            loadEmails();
        }
    });
}

function sendAll() {
    startSending(emailList);
}

function sendRandom() {
    let count = parseInt(document.getElementById("randomCount").value);

    if (!count || count <= 0) {
        alert("Please enter the number of random emails");
        return;
    }

    let shuffled = [...emailList].sort(() => Math.random() - 0.5);
    let selected = shuffled.slice(0, count);

    startSending(selected);
}

function startSending(list) {
    if (list.length === 0) {
        alert("No email to send");
        return;
    }

    let interval = parseInt(document.getElementById("intervalTime").value) * 1000;
    let progressBar = document.getElementById("progressBar");
    let log = document.getElementById("sendLog");

    log.innerHTML = "";
    progressBar.style.width = "0%";
    progressBar.innerText = "0%";

    let index = 0;

    let timer = setInterval(() => {
        let email = list[index].email;
        let percent = Math.round(((index + 1) / list.length) * 100);

        log.innerHTML += "Sent successfully: " + email + "<br>";
        progressBar.style.width = percent + "%";
        progressBar.innerText = percent + "%";

        index++;

        if (index >= list.length) {
            clearInterval(timer);
            log.innerHTML += "<br><b>All emails have been sent!</b>";
        }
    }, interval);
}

loadEmails();
</script>

</body>
</html>