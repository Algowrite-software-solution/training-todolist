<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>todoAddingFeature</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <!-- Main Div -->
    <div class="d-flex justify-content-center align-items-center bg-info" style="height: 700px;">
        <!-- Main Box -->
        <div class="w-25 h-50 bg-white d-flex flex-column justify-content-center align-items-center rounded-4  ">
            <!-- Title : ADD YOUR TODO -->
            <div class="w-100 d-flex justify-content-center align-items-center ">
                <p class="title fs-2 fw-medium ">Add Your todo</p>
            </div>
            <!-- Form Section-->
            <div class="w-100 d-flex justify-content-center align-items-center ">
                <form class="w-75 ">
                    <label class="form-label d-flex " for="title">
                        <input type="text " class="form-control " id="title">
                        <span class="w-25 text-center ">Title</span>
                    </label>
                    <label class="form-label d-flex " for="date">
                        <input type="date" class="form-control " id="due_date">
                        <span class="w-25 text-center ">Due date</span>
                    </label>
                    <label class="form-label d-flex">
                        <input type="time" class="form-control " id="due_time">
                        <span class="w-25 text-center ">Due time</span>
                    </label>
                    <button type="submit" onclick="todoAdd();" class="btn bg-info text-white w-100 ">Add Task</button>
                </form>
            </div>
        </div>
    </div>


    <script src="../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js " integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe " crossorigin="anonymous "></script>
</body>

</html>