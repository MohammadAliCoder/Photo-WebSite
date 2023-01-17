<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>My Images</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="MyImages.css" rel="stylesheet">
    <link href="{{ asset('res/MyImages/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('res/MyImages/MyImages.css') }}"  rel="stylesheet">
    <script src="{{asset('res/MyImages/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('res/MyImages/wb.panel.min.js')}}"></script>
    <script src="{{asset('res/MyImages/jquery-ui.min.js')}}"></script>
    <script src="{{asset('res/MyImages/wwb16.min.js')}}"></script>
    <script>
        $(document).ready(function()
        {
            $("#headerPanelMenu").panel({animate: true, animationDuration: 200, animationEasing: 'linear', dismissible: true, display: 'overlay', position: 'left', toggle: true});
            $("#headerPanelMenu_markup ul li a").click(function(event)
            {
                $.panel.hide($("#headerPanelMenu_panel"));
            });
        });
    </script>
    <script>
        // Get the elements with class="column"
        var elements = document.getElementsByClassName("column");
        var elements_img = document.getElementsByClassName("img");
        // Declare a loop variable
        var i;

        // List View
        function listView() {
            for (i = 0; i < elements.length; i++) {
                elements[i].style.width = "100%";
                elements[i].style.height="100%";
            }
            for (i = 0; i < elements_img.length; i++) {
                elements_img[i].style.width = "100%";
                elements_img[i].style.height="100%";
            }
        }

        // Grid View
        function gridView() {
            for (i = 0; i < elements.length; i++) {
                elements[i].style.width = "33%";
                elements[i].style.height="33%";
            }
            for (i = 0; i < elements_img.length; i++) {
                elements_img[i].style.width = "200px";
                elements_img[i].style.height="200px";
            }
        }
    </script>
</head>
<body>
<div id="wb_header">
    <div id="header">
        <div class="row">
            <div class="col-1">
                <div id="wb_headerPanelMenu" style="display:inline-block;width:50px;height:53px;z-index:0;">
                    <a href="#headerPanelMenu_markup" id="headerPanelMenu">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </a>
                    <div id="headerPanelMenu_markup">
                        <ul role="menu">
                            <li role="menuitem"><a href="{{route("getHome")}}" class="nav-link">Home</a></li>
                            <li role="menuitem"><a href="{{route("getAddImage")}}" class="nav-link">Add Image</a></li>
                            <li role="menuitem"><a href="{{route("getmyImages")}}" class="nav-link">My Images</a></li>

                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-2">
                <div id="wb_headerBreadcrumb" style="display:inline-block;width:100%;z-index:1;vertical-align:top;">
                    <ul id="headerBreadcrumb">
                        <li><a href="{{route("getHome")}}">Home</a></li>
                        <li><a href="{{route("getAddImage")}}">Add Image</a></li>
                        <li><a href="{{route("getmyImages")}}">My Images</a></li>
                        <br>
                        <li><button  onclick="listView()"><i class="fa fa-bars"></i> </button></li>
                        <li><button onclick="gridView()"><i class="fa fa-th-large"></i> </button></li>
                    </ul>

                </div>
            </div>
            <div class="col-3">
                <form name="SiteSearch1_form" action="{{route("getmyImages")}}" method="get" id="SiteSearch1_form" role="search" accept-charset="UTF-8" style="display:inline" >

                    <input type="text" id="searchInput" style="display:none;width:185px;height:34px;z-index:2;" name="search"  spellcheck="false" placeholder="Search Image Name">
                    <div id="wb_searchClose" style="display:none;width:33px;height:35px;text-align:center;z-index:3;">
                        <a href="/" onclick="ShowObjectWithEffect('searchInput', 0, 'slideright', 500);ShowObjectWithEffect('wb_searchClose', 0, 'fade', 1);ShowObjectWithEffect('wb_searchOpen', 1, 'fade', 1);return true;"><div id="searchClose"><i class="fa fa-times"></i></div></a>
                    </div>
                    <div id="wb_searchOpen" style="display:inline-block;width:33px;height:35px;text-align:center;z-index:4;">
                        <a href="/" onclick="ShowObjectWithEffect('searchInput', 1, 'slideright', 500);ShowObjectWithEffect('wb_searchClose', 1, 'fade', 1);ShowObjectWithEffect('wb_searchOpen', 0, 'fade', 1);return false;"><div id="searchOpen"><i class="fa fa-search"></i></div></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="container" class="row">
    @foreach( $images as $img)
    <table class="column" style="left:2px;top:93px;width:293px;height:352px;z-index:11;" id="Table3">
        <tr>
            <td class="cell0"><div id="wb_Text3">
            <span style="color:#FFFFFF;font-family:Arial;font-size:27px;">
               <img src="{{$img->image}}" class="img" style="width: 200px; height: 200px"></span>
                </div>
            </td>
        </tr>
        <tr>
            <td class="cell1"><span style="color:#FFFFFF;font-family:Arial;font-size:32px;"><strong >{{$img->name}}</strong></span></td>
        </tr>


        <tr>
            <td class="cell3">
                <form  style="display: inline-block" action="{{route('getDelete',["id"=>$img->id])}}"  method="get">
                    <input hidden="hidden" type="number" name="id" value="{{$img->id}}">
                    <input type="submit" class="Button3" name="Delete" value="Delete" style="display:inline-block;width:104px;height:35px;z-index:6;">
                </form>
            </td>
        </tr>
        <tr>
            <td class="cell3">
                <form  style="display: inline-block" action="{{route("getUpdate")}}"  method="get">
                    <input hidden="hidden" type="number" name="id" value="{{$img->id}}">
                    <input type="submit" class="Button3" name="Update" value="Update" style="display:inline-block;width:104px;height:35px;z-index:6;">
                </form>
            </td>
        </tr>
    </table>
    @endforeach
</div>

</body>
</html>
