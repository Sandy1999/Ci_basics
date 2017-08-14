<!Doctype html>
<html>
    <head>
        <title>Upload Images</title>
    </head>
    <body>
        <h1>Upload Images for admin here </h1>
        <form action="img_cont/img_up" enctype="multipart/form-data" method="POST">
        <fieldset>
            <legend>Images</legend>
            <p>Image file:
                <input type="hidden" name="MAX_FILE_INPUT" value="10000000"><br/>
                <input type="file" name="file_upload"><br/><br/>
                <button type="submit" name="upload" value="img_up">Upload</button>
            </p>
        </fieldset>
        </form>
