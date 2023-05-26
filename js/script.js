function todoListLoader() {
  let ItemContainer = document.querySelector("#todoItemContainer");

  // request to the server
  let request = new XMLHttpRequest();
  request.onreadystatechange = () => {
    if (request.readyState == 4) {
      let response = request.responseText;
      let todoListItems = JSON.parse(response);

      let finalDesign = "";
      for (let index = 0; index < todoListItems.length; index++) {
        let todoItemTitle = todoListItems[index].title;
        let todoItemDueDate = todoListItems[index].due_date;

        let uiDesign = `
    <div class="col-3 p-0 my-4 d-flex justify-content-center align-items-center">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <div class="row m-0">
                    <div class="col-12 p-0 pt-1">
                        <h5 class="card-subtitle mb-2 text-body-secondary">${todoItemTitle}</h5>
                    </div>
                </div>
                <div>
                    <span class="text-primary">End Date &nbsp; : &nbsp;&nbsp; ${todoItemDueDate}</span>
                </div>
            </div>
        </div>
    </div>
    `;

        finalDesign += uiDesign;
      }

      ItemContainer.innerHTML = finalDesign;
    }
  };

  request.open(
    "GET",
    "http://localhost/training-todolist/api/ToDoViewingFeature.php",
    true
  );
  request.send();
}

todoListLoader();
