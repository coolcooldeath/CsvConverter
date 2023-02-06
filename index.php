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


    <section class="form signup">
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
        </form>
        <div class="all-files">

        </div>

    </section>
</div>

<script src="javascript/file.js"></script>

</body>
</html>