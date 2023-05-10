<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>CKEditor 5 Quick start guide</title>
    </head>
    <body>
        <div id="editor"></div>

        <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
    </body>
</html>
