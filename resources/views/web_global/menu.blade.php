@section('menu')
<aside class="left-side sidebar-offcanvas">
    <section class="sidebar">
        <div id="menu" role="navigation">
            <div class="nav_profile">
                <div class="media profile-left">
                    <a class="float-left profile-thumb"><img src="img/authors/avatar1.jpg" class="rounded-circle" alt="User Image"></a>
                    <div class="content-profile">
                        <h4 class="media-heading">管理者名稱</h4>
                    </div>
                </div>
                <ul class="navigation">
                    <li class="menu-dropdown active">
                        <a href="{{URL::to('/template')}}"><i class="menu-icon ti-user"></i><span>功能樣板</span><span class="fa arrow"></span> </a>
                        <ul class="sub-menu">
                            <li><a href="{{URL::to('/template')}}"><i class="fa fa-fw ti-menu-alt" aria-hidden="true"></i> 清單頁樣板</a></li>
                            <li><a href="{{URL::to('/template/modify')}}"><i class="fa fa-fw ti-menu-alt" aria-hidden="true"></i> 修改頁樣板</a></li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="javascript:;"><i class="menu-icon ti-layout-list-large-image"></i><span class="mm-text ">無下拉 menu 樣板</span></a>
                    </li>
                    <?php for($i=1;$i<=2;$i++){ ?>
                    <li class="menu-dropdown">
                        <a><i class="menu-icon ti-check-box"></i><span>下拉 menu 樣板 <?=$i;?></span><span class="fa arrow"></span></a>
                        <ul class="sub-menu">
                            <?php for($j=1;$j<=5;$j++){ ?>
                            <li><a href="javascript:;"><i class="fa fa-fw ti-shield" aria-hidden="true"></i> 功能項目 <?=$j;?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </section>
</aside>
@endsection