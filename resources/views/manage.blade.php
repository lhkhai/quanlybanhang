
<!DOCTYPE HTML>
<html lang='en'>
<head>
    <meta charset="UTF-8" />
    @section('title') Administrator @endsection
    <title>@yield('title')</title>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="GallerySoft.info" />   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!--Boostrap 3 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>     
    <script type="text/javascript" src="{{asset('/js/jssupplier.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/cssAdmin.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/cssNcc.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/cssGeneral.css')}}">
    <!-- <script type="module" src="{{asset('/js/jssupplier.js')}}"></script>   -->
</head>
<body style="background-color:#F5F8FD"> 
    
    <div class='container'>
       <div class='navigation'> 
            <ul>
                <li class="list" >
                    <a href="{{asset('/manage')}}">
                        <span class="icon" title='Trang chủ'><img src="{{asset('/icons/icon_home.png' )}}" /></span>
                        <span class="title">Trang chủ</span>
                    </a>
                </li>
                <li class="list">
                    <a href="#">
                        <span class="icon" title='Đơn hàng' ><img src="{{asset('/icons/icon_order.png' )}}" /></span>
                        <span class="title">Đơn hàng</span>
                    </a>
                </li>
                <li class="list">
                    <a href="#">
                        <span class="icon" title='Bán hàng'><img src="{{asset('/icons/icon_sell.png' )}}" /></span>
                        <span class="title">Bán hàng</span>
                    </a>
                </li>
                <li class="list">
                    <a href="#">
                        <span class="icon" title='Danh mục'><img src="{{asset('/icons/icon_list.png' )}}"  /></span>
                        <span class="title">Danh mục</span>
                    </a>
                    <ul>
                        <li><a href="{{asset('supplier')}}">Nhà cung cấp</a></li>
                        <li><a href="#">Khách hàng</a></li>
                        <li><a href="#">Nhóm Sản phẩm</a></li>
                        <li><a href="#">Sản phẩm</a></li>
                    </ul>
                </li>
                <li class="list">
                    <a href="#">
                        <span class="icon" title='Nhập hàng'><img src="{{asset('/icons/icon_buy.png' )}}"   /></span>
                        <span class="title">Nhập hàng</span>
                    </a>
                </li>
                <li class="list">
                    <a href="#">
                        <span class="icon" title='Báo cáo'><img src="{{asset('/icons/icon_chart.png' )}}"   /></span>
                        <span class="title">Thống kê</span>
                    </a>
                </li>
                <li class="list">
                    <a href="#">
                        <span class="icon" title='Đăng xuất'><img src="{{asset('/icons/icon_logout.png' )}}"  /></span>
                        <span class="title">Đăng xuất</span>
                    </a>
                </li>
            </ul>

        </div>
        <div class="toggle">
            <img class="open" src="{{asset('/icons/icon_menu.png')}}" />
            <img class="close" src="{{asset('/icons/icon_close.png')}}" />
        </div>
        <div class='content'>
        @hasSection('content')
            @yield('content')
        @endif

        @sectionMissing('content')
        <div class="imgbackground"><img src="{{asset('/icons/background-admin.jpg')}}" /></div>
        @endif
        </div> <!--content -->
        <div id='footer'>
            
        </div> <!--footer -->

    </div>
    
</body>
@include('Notification') <!--Include notification page -->
<script>
    let menuToggle = document.querySelector('.toggle');
    let divContent = document.querySelector('.content');
    let divNavigation = document.querySelector('.navigation');    
    menuToggle.onclick = function(){
        menuToggle.classList.toggle('active');
        divNavigation.classList.toggle('active');
        divContent.classList.toggle('active');
    }
    </script>
    
</html>