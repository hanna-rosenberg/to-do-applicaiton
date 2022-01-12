function updateProfile() {
  var updateForm = document.getElementById('update-profile');
  var updateButton = document.getElementById('update-button');
  updateForm.classList.remove('hidden');
  updateButton.classList.add('hidden');
}

const showAllTasks = document.querySelector('.show-task-container');
const allTasksBtn = document.querySelector('.all-tasks');
if (showAllTasks) {
  allTasksBtn.addEventListener('click', () => {
    showAllTasks.classList.toggle('hidden');
  });
}

const showAllLists = document.querySelector('.show-list-container');
const allListsBtn = document.querySelector('.all-lists');
if (showAllLists) {
  allListsBtn.addEventListener('click', () => {
    showAllLists.classList.toggle('hidden');
  });
}

const createTasks = document.querySelector('.create-task-container');
const createTasksBtn = document.querySelector('.create-task');
if (createTasks) {
  createTasksBtn.addEventListener('click', () => {
    createTasks.classList.toggle('hidden');
  });
}

const createList = document.querySelector('.create-list-container');
const createListBtn = document.querySelector('.create-lists');
if (createList) {
  createListBtn.addEventListener('click', () => {
    createList.classList.toggle('hidden');
  });
}

const tasks = document.querySelectorAll('.taskRow');

tasks.forEach((task) => {
  task.querySelector('.editBtn').addEventListener('click', () => {
    task.querySelector('.edit-task-container').classList.toggle('hidden');
  });
});

const lists = document.querySelectorAll('.listRow');

lists.forEach((list) => {
  list.querySelector('.editListBtn').addEventListener('click', () => {
    list.querySelector('.edit-list-container').classList.toggle('hidden');
  });
  list.querySelector('.show-task').addEventListener('click', () => {
    list.querySelector('.show-list-task').classList.toggle('hidden');
  });
});

// const deleteForm = document.querySelector('.delete-user-form');

// deleteForm.addEventListener('submit', (e) => {
//   e.preventDefault();

//   const formData = new FormData(this);

//   fetch('index.php', {
//     method: 'post',
//     body: formData,
//   })
//     .then(function (response) {
//       return response.text();
//     })
//     .then(function (text) {
//       console.log(text);
//     });
// });
