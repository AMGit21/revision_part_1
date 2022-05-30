<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-5">
        <form class="row g-3 needs-validation" id="userData" novalidate>
            <div class="col-3"></div>
            <div class="col-md-2">
                <label for="firstName" class="form-label">First name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="first Name" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-2">
                <label for="lastName" class="form-label">Last name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-2">
                <label for="userType" class="form-label">Type</label>
                <select class="form-select" id="userType" name="userType" required>
                    <option selected disabled value="">Choose...</option>
                    <option value="superAdmin">Super Admin</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>
            <div class="col-3"></div>
            <div class="col-4"></div>
            <div class="col-2">
                <input class="btn btn-warning mt-2" type="button" name="addUser" id="addUser" value="Add User">
            </div>
            <div class="col-2">
                <input class="btn btn-info mt-2" type="button" name="userDetails" id="userDetails" value="Users Details">
            </div>
            <div class="col-4"></div>
        </form>
        <div id="resInfo"></div>
        <!-- table -->
        <table class="table table-bordered border-warning mt-5 w-50 m-auto text-center">
            <thead>
                <th>First Name</th>
                <th>last Name</th>
                <th>Type</th>
                <th>Action</th>
            </thead>
            <tbody id="details"></tbody>
            <!-- <tfoot>
                <th colspan="2">Total</th>
                <th colspan="2"></th>
            </tfoot> -->
        </table>
    </div>
    <script src="../js/app.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script>
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>

</html>