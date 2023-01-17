<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add Image</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo e(asset('res/AddImage/AddImage.css')); ?>"  rel="stylesheet">

    <script type="text/javascript" src="<?php echo e(asset('res/AddImage/jquery-1.12.4.min.js')); ?>"></script>
    <script>
        $(document).ready(function()
        {
            $("#FileUpload1 :file").on('change', function()
            {
                var input = $(this).parents('.input-group').find(':text');
                input.val($(this).val());
            });
        });
    </script>
</head>
<body>
<div id="container" >

    <div id="wb_Form1" style="left: 30% ;">
        <form name="contact" action="<?php echo e(route('postAddImage')); ?>" method="post"   enctype="multipart/form-data" id="Form1">
            <?php echo csrf_field(); ?>
            <label for="Editbox1" id="Label1">Name:</label>
            <input type="text" id="Editbox1" name="name" spellcheck="false">
            <label for="FileUpload1" id="Label2">Image:</label>
            <input type="submit" id="Button1" name="Save" value="Save">
            <div id="FileUpload1" class="input-group">
                <input class="form-control" type="text" readonly="">
                <label class="input-group-btn">
                    <input type="file" name="Image" id="FileUpload1-file"><span class="btn">Browse...</span>
                </label>
            </div>
        </form>
    </div>
</div>


</body>
</html>
<?php /**PATH C:\xampp\htdocs\Images-laravel\resources\views/AddImage.blade.php ENDPATH**/ ?>