document.getElementById("taskForm").addEventListener("submit", function(e) {
    e.preventDefault();

    const taskInput = document.getElementById("taskInput").value;
    if (taskInput) {
        addTask(taskInput); // Call function to add task
    }
});

function addTask(task) {
    const formData = new FormData();
    formData.append('task', task);

    fetch('php/add_task.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log('Task added:', data); // Log the response for debugging
        loadTasks(); // Reload the task list after adding a task
        document.getElementById("taskInput").value = ''; // Clear input field
    })
    .catch(error => console.error('Error:', error));
}

function loadTasks() {
    fetch('php/load_tasks.php')
    .then(response => response.json())
    .then(data => {
        const taskList = document.getElementById("taskList");
        taskList.innerHTML = ''; // Clear the existing task list
        data.forEach(task => {
            const li = document.createElement("li");
            li.innerHTML = `${task.name} <button onclick="deleteTask(${task.id})">Delete</button>`; // Add delete button
            taskList.appendChild(li); // Append new task to the list
        });
    });
}

function deleteTask(id) {
    const formData = new FormData();
    formData.append('id', id);

    fetch('php/delete_task.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log('Task deleted:', data); // Log the response for debugging
        loadTasks(); // Reload the task list after deleting a task
    });
}

// Load tasks when the page is loaded
document.addEventListener("DOMContentLoaded", loadTasks);
