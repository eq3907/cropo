@section('header')
<nav class="navbar navbar-static-top" role="navigation">
    <a href="index.php" class="logo">
        <img src="img/logo_white.png" alt="logo"/>
    </a>
    <div class="mr-auto">
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"><i class="fa fa-fw ti-menu"></i></a>
    </div>
    <div class="navbar-right">
        <ul class="nav navbar-nav">
            <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-fw ti-email black"></i>
                    <span class="badge badge-pill badge-success">2</span>
                </a>
                <ul class="dropdown-menu dropdown-messages table-striped">
                    <li class="dropdown-title">New Messages</li>
                    <?php for($j=1;$j<=5;$j++){ ?>
                    <li>
                        <a href="javescript:;" class="message striped-col dropdown-item">
                            <img class="message-image rounded-circle" src="img/authors/avatar7.jpg" alt="avatar-image">
                            <div class="message-body">
                                <strong>寄件人</strong><br>
                                訊息訊息<br>
                                訊息訊息訊息<br>
                                訊息<br>
                                <small>寄件時間</small>
                                <span class="badge badge-success label-mini msg-lable">New</span>
                            </div>
                        </a>
                    </li>
                    <?php } ?>
                    <li class="dropdown-footer"><a href="#"> View All messages</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-toggle toggle-right" data-toggle="dropdown">
                    <i class="fa fa-fw ti-view-list black"></i>
                    <span class="badge badge-pill badge-danger">9</span>
                </a>
            </li>
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle padding-user d-block" data-toggle="dropdown">
                    <img src="img/authors/avatar1.jpg" width="35" class="rounded-circle img-fluid float-left" height="35" alt="登入者圖片">
                    <div class="riot">
                        <div>
                            登入者名稱
                            <span><i class="fa fa-sort-down"></i></span>
                        </div>
                    </div>
                </a>
                <ul class="dropdown-menu">
                    <li class="user-header">
                        <img src="img/authors/avatar1.jpg" class="rounded-circle" alt="登入者圖片">
                        <p>登入者名稱</p>
                    </li>
                    <li class="p-t-3"><a href="javescript:;" class="dropdown-item"> <i class="fa fa-fw ti-user"></i>編輯我的檔案</a></li>
                    <li role="presentation"></li>
                    <li><a href="javescript:;" class="dropdown-item"><i class="fa fa-fw ti-settings"></i>帳號設定</a></li>
                    <li role="presentation" class="dropdown-divider"></li>
                    <li class="user-footer">
                        <div class="float-right">
                            <a href="javescript:;"><i class="fa fa-fw ti-shift-right"></i>登出</a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
@endsection