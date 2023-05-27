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
        let status_id = todoListItems[index].status_id;
    // alert(status_id)
// let status_id =1;
        let uiDesign = `
    <div class="col-3 p-0 my-4 d-flex justify-content-center align-items-center">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <div class="row m-0">
                    <div class="col-10 p-0 pt-1">
                        <h5 class="card-subtitle mb-2 text-body-secondary">${todoItemTitle}</h5>
                    </div>
                    <div class="col-2">
                    <button class="cricle opacity-50" style="${status_id==1?'background-color:green;':'background-color:none'}" onclick="statusChangeId(${status_id},${todoListItems[index].id})"></button>
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

function statusChangeId(status_id,todo_id){


  
  if(status_id==1){
    status_id = 2
  }else{
    status_id = 1
  }
  // var status_id = document.getElementById("status_id");


  var statusChange ={
    status_id:status_id,
    todo_id:todo_id,

  }
  var form = new FormData();
  form.append("statusChange",JSON.stringify(statusChange));

  var request = new XMLHttpRequest();
  request.onreadystatechange = function(){
    if(request.readyState==4){
      var response = request.responseText;
      console.log(JSON.parse(response));
      // window.location.reload();
      todoListLoader();
    }
  }
  request.open("POST","http://localhost/training-todolist/api/ToDoStatusChangeFeature.php",true);
  request.send(form);
}