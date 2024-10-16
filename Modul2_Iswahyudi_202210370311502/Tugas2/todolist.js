let todoList = [];

function addTodo() {
    const todoInput = document.getElementById('todo-input').value;
    if (todoInput.trim() !== '') {
        todoList.push({ text: todoInput, isEditing: false });
        document.getElementById('todo-input').value = '';
        renderTodoList();
    }
}

function renderTodoList() {
    const todoUl = document.getElementById('todo-list');
    todoUl.innerHTML = '';
    todoList.forEach((todo, index) => {
        const li = document.createElement('li');
        
        const todoText = document.createElement('span');
        todoText.textContent = todo.text;
        li.appendChild(todoText);

        const deleteBtn = document.createElement('button');
        deleteBtn.textContent = 'Delete';
        deleteBtn.className = 'delete-btn';
        deleteBtn.onclick = () => deleteTodo(index);
        li.appendChild(deleteBtn);

        todoUl.appendChild(li);
    });
}

function deleteTodo(index) {
    todoList.splice(index, 1);
    renderTodoList();
}
