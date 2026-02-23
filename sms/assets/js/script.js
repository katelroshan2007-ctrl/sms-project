/* =====================================
   School ERP - Main JavaScript File
===================================== */

document.addEventListener("DOMContentLoaded", function () {
    console.log("School ERP Loaded Successfully");
});


/* =====================================
   Confirm Delete Dialog
===================================== */
function confirmDelete() {
    return confirm("Are you sure you want to delete this record?");
}


/* =====================================
   Table Search Filter
===================================== */
function searchTable(inputId, tableId) {

    let input = document.getElementById(inputId);
    let filter = input.value.toLowerCase();
    let table = document.getElementById(tableId);
    let tr = table.getElementsByTagName("tr");

    for (let i = 1; i < tr.length; i++) {
        let rowText = tr[i].textContent.toLowerCase();
        tr[i].style.display = rowText.includes(filter) ? "" : "none";
    }
}


/* =====================================
   Sidebar Toggle (Responsive)
===================================== */
function toggleSidebar() {
    let sidebar = document.getElementById("sidebar");

    if (sidebar.style.display === "none") {
        sidebar.style.display = "block";
    } else {
        sidebar.style.display = "none";
    }
}


/* =====================================
   Show Alert Messages
===================================== */
function showAlert(message, type = "success") {

    let alertBox = document.createElement("div");
    alertBox.className = "alert alert-" + type;
    alertBox.innerText = message;

    document.body.prepend(alertBox);

    setTimeout(() => {
        alertBox.remove();
    }, 3000);
}


/* =====================================
   Basic Form Validation
===================================== */
function validateForm(formId) {

    let form = document.getElementById(formId);
    let inputs = form.querySelectorAll("input[required], select[required]");

    for (let input of inputs) {
        if (input.value.trim() === "") {
            alert("Please fill all required fields.");
            input.focus();
            return false;
        }
    }
    return true;
}


/* =====================================
   Dashboard Chart Loader (Chart.js)
===================================== */
function loadChart(canvasId, labels, data, labelName) {

    if (typeof Chart === "undefined") {
        console.log("Chart.js not loaded");
        return;
    }

    const ctx = document.getElementById(canvasId);

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: labelName,
                data: data
            }]
        }
    });
}


/* =====================================
   Attendance Quick Toggle
===================================== */
function markAttendance(selectElement) {

    if (selectElement.value === "Present") {
        selectElement.style.backgroundColor = "#d4edda";
    } 
    else if (selectElement.value === "Absent") {
        selectElement.style.backgroundColor = "#f8d7da";
    } 
    else {
        selectElement.style.backgroundColor = "";
    }
}


/* =====================================
   Auto Close Bootstrap Alerts
===================================== */
setTimeout(function () {
    let alerts = document.querySelectorAll(".alert");
    alerts.forEach(alert => {
        alert.style.display = "none";
    });
}, 4000);


/* =====================================
   Dark Mode Toggle (Optional Feature)
===================================== */
function toggleDarkMode() {

    document.body.classList.toggle("dark-mode");

    if (document.body.classList.contains("dark-mode")) {
        localStorage.setItem("theme", "dark");
    } else {
        localStorage.setItem("theme", "light");
    }
}


/* Apply saved theme */
window.onload = function () {
    if (localStorage.getItem("theme") === "dark") {
        document.body.classList.add("dark-mode");
    }
};


/* =====================================
   Simple Live Clock (Dashboard)
===================================== */
function startClock(elementId) {
    setInterval(() => {
        let now = new Date();
        document.getElementById(elementId).innerText =
            now.toLocaleTimeString();
    }, 1000);
}
