<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><img src="{{ asset('Admin/images/logo.png') }}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="{{ asset('Admin/images/logo2.png') }}" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('home.index') }}"> <i class="menu-icon fa fa-dashboard"></i>Trang chủ </a>
                </li>
                <h3 class="menu-title">Danh mục</h3><!-- /.menu-title -->
                <li>
                    <a href="{{ route('category.index') }}"> <i class="menu-icon fa fa-list" aria-hidden="true"></i>Danh mục</a>
                </li>
                <li>
                    <a href="{{ route('product.index') }}"> <i class="menu-icon fa fa-scribd" aria-hidden="true"></i>Sản phẩm</a>
                </li>
                <li>
                    <a href="{{ route('news.index') }}"> <i class="menu-icon fa fa-newspaper-o" aria-hidden="true"></i>Tin tức</a>
                </li>
                <li>
                    <a href="{{ route('contact.edit', ['id' => 1]) }}"> <i class="menu-icon fa fa-phone" aria-hidden="true"></i>Thông tin liên hệ</a>
                </li>
                <li>
                    <a href="{{ route('introduce.edit', ['id' => 1]) }}"> <i class="menu-icon fa fa-book" aria-hidden="true"></i>Thông tin giới thiệu</a>
                </li>

{{--                <li class="menu-item-has-children dropdown">--}}
{{--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tables</a>--}}
{{--                    <ul class="sub-menu children dropdown-menu">--}}
{{--                        <li><i class="fa fa-table"></i><a href="tables-basic.html">Basic Table</a></li>--}}
{{--                        <li><i class="fa fa-table"></i><a href="tables-data.html">Data Table</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

                <h3 class="menu-title">Thông tin</h3><!-- /.menu-title -->
                <li>
                    <a href="{{ route('information.index') }}"> <i class="menu-icon fa fa-info-circle" aria-hidden="true"></i>Trường thông tin</a>
                </li>
                <li>
                    <a href="{{ route('editInformation') }}"> <i class="menu-icon fa fa-info" aria-hidden="true"></i>Thông tin</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->