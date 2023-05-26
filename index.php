<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Todo List</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />


    <script defer src="js/bootstrap.bundle.js"></script>
    <script defer src="js/script.js"></script>
</head>

<body>
    <div class="container" style="background:linear-gradient(135deg,#153677,#4e085f);">
        <div class="row m-0">
            <!-- Main Div -->
            <div class="p-0 col-lg-6 offset-lg-3 col-12">
                <div class="row p-3 m-0">

                    <!-- Main Box -->
                    <div class="h-50 bg-white d-flex flex-column justify-content-center align-items-center rounded-4">
                        <!-- Title : ADD YOUR TODO -->
                        <div class="w-100 d-flex justify-content-center align-items-center ">
                            <p class="title fs-2 fw-bold ">Add Your todo</p>
                        </div>
                        <!-- Form Section-->
                        <div class="w-100 d-flex justify-content-center align-items-center my-3">
                            <form class="w-100">
                                <label class="form-label d-flex " for="title">
                                    <span class="w-25 fw-bold ">Title</span>
                                    <input type="text " class="form-control " id="title">
                                </label>
                                <label class="form-label d-flex " for="date">
                                    <span class="w-25 fw-bold ">Due date</span>
                                    <input type="date" class="form-control " id="due_date">
                                </label>
                                <label class="form-label d-flex">
                                    <span class="w-25 fw-bold ">Due time</span>
                                    <input type="time" class="form-control " id="due_time">
                                </label>
                                <button type="submit" onclick="todoAdd();" class="btn bg-info text-white w-100 ">Add Task</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 p-0">
                <div class="row m-0">
                    <div class="col-12 text-center mt-5">
                        <h1 class="text-white">Todo List</h1>
                    </div>
                </div>
            </div>


            <div class="col-12 p-0">
                <div class="row m-0" id="todoItemContainer">

                </div>

            </div>
        </div>

</body>

</html>