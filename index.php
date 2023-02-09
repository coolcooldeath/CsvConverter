<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CsvConverter</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="wrapper">
    <section class="form upload">
        <div class='message-div message-div_hidden' id='message-div'></div>
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="error-text"></div>
            <div class="field image">
                <label>Choose .csv file</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="5000000">
            <input type='file' name='file[]' class='file-drop' id='file-drop' multiple required><br>
                <div class="field button">
                    <input type="submit" name="submit" value="Upload">
                </div>
            </div>
            <div class="success-text"></div>
            <label>All uploaded files</label>
            <div class="all-files">
            </div>
        </form>


    </section>
</div>

<div class="table-wrapper">
        <div class='message-div message-div_hidden' id='message-div'></div>
    <section class="form">
    <div class="department-table">
    </div>
    </section>

</div>

<div class="table-wrapper">
    <div class='message-div message-div_hidden' id='message-div'></div>
    <section class="form">
        <div class="user-table">
        </div>
    </section>

</div>

<script src="javascript/file.js"></script>
<script src="javascript/refresh.js"></script>
<script src="javascript/department_table_display.js"></script>
<script src="javascript/user_table_display.js"></script>



</body>
</html>