<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Update Image</title>

     <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{ asset('res/UpdateImage/UpdateImage.css') }}"  rel="stylesheet">

    <script type="text/javascript" src="{{asset('res/UpdateImage/jquery-1.12.4.min.js')}}"></script>
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
<div id="container">

    <div id="wb_Form1" style="left: 30% ;">
        <form name="contact" method="post" action="{{route('postUpdate')}}" enctype="multipart/form-data" id="Form1">
            @csrf
            <input hidden="hidden" type="number" name="id" value="{{$img->id}}">
            <input hidden="hidden" type="number" name="userId" value="{{$img->userId}}">
            <label for="Editbox1" id="Label1">Name:</label>
            <input type="text" id="Editbox1" name="name" value=" {{$img->name}}" spellcheck="false">

            <label for="FileUpload1" id="Label2">Image:</label>
            <div id="FileUpload1" class="input-group">
                <input class="form-control" type="text" readonly="">
                <label class="input-group-btn">
                    <input type="file" name="Image" id="FileUpload1-file"><span class="btn">Browse...</span>
                </label>
            </div>

            <input type="submit" id="Button1" name="Update" value="Update">
            <label for="" id="Label3">Image Name : {{$img->name}}</label>
            <div id="wb_Image1">
                <img src="{{$img->image}}" id="Image1" name="Image1" alt=""></div>
        </form>
    </div>
</div>
</body>
</html>
