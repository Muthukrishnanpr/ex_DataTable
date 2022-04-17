<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--data table-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/pdfmake-0.1.18/dt-1.10.12/b-1.2.2/b-colvis-1.2.2/b-html5-1.2.2/b-print-1.2.2/r-2.1.0/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/pdfmake-0.1.18/dt-1.10.12/b-1.2.2/b-colvis-1.2.2/b-html5-1.2.2/b-print-1.2.2/r-2.1.0/datatables.min.js"></script>
    <!--/.data table-->
</head>

<body>
    <div class="mt-5">
        <div class="container">
            <h2>Data Table</h2>
            <table id="table" class="table table-border table-striped">
                <thead>
                    <tr>
                        <!-- <th>Rollno</th> -->
                        <th>StudentName</th>
                        <th>Address</th>
                        <th>PhoneNumber</th>
                        <th>Age</th>
                        <th>CourseId</th>
                        <th>CourseName</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <!-- <th>Rollno</th> -->
                        <th>StudentName</th>
                        <th>Address</th>
                        <th>PhoneNumber</th>
                        <th>Age</th>
                        <th>CourseId</th>
                        <th>CourseName</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        $("#table").DataTable({
            pageLength: 5,
            ajax: {
                url: "<?= base_url('students/getData') ?>",
                method: "post",
            },
            processing: true,
            serverSide: true,
            columns: [
                null,
                {
                    orderable: false
                },
                {
                    orderable: false
                },
                null,
                {
                    orderable: false
                },
                {
                    orderable: false
                }
            ],
            order: [0, "asc"],
            searching: false
        })
    })
</script>