<!-- Main sidebar -->
<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="#" class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
                    <div class="media-body">
                        <span class="media-heading text-semibold">محمد جمال</span>
                        <div class="text-size-mini text-muted">
                            <i class="icon-pin text-size-small"></i> &nbsp;السعودية,الرياض
                        </div>
                    </div>

                    <div class="media-right media-middle">
                        <ul class="icons-list">
                            <li>
                                <a href="#"><i class="icon-cog3"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <!-- /user menu -->

    <!-- Main navigation -->
    <div class="sidebar-category sidebar-category-visible">
        <div class="category-content no-padding">
            <ul class="navigation navigation-main navigation-accordion">
                <!-- Main -->
                <li>
                    <a href="{{route('services.index')}}">
                        <i class="icon-home4"></i> 
                        <span>الرئيسية</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('services.index')}}">
                        <i class="icon-stack-empty"></i> 
                        <span>الخدمات</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('services.index')}}" id="layout1">
                                <span>استعراض الخدمات</span>
                            </a>
                        </li>
                        <li>
                            <a href="/public/sub_services" id="layout1">
                                <span>أقسام الخدمات</span>
                            </a>
                        </li>
                        <li>
                            <a href="/public/free_services">
                                <span>الخدمات الأضافيه</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/public/clients"> 
                        <i class="icon-users4"></i>
                        <span>العملاء</span>
                    </a>
                    <ul>
                        <li>
                            <a href="/public/clients">
                                <span>استعراض العملاء</span>
                            </a>
                        </li>
                        <li>
                            <a href="/public/requests">
                                <span>طلبات العملاء</span>
                            </a>
                        </li>
                        <li>
                            <a href="/public/discount_requests">
                                <span>طلبات الخصم</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/public/colors">
                        <i class=" icon-droplet2"></i>
                        <span>الألوان</span>
                    </a>
                </li>
                <li>
                    <a href="/public/images">
                        <i class="icon-image2"></i>
                        <span>الصور</span>
                    </a>
                </li>
                <!-- /page kits -->
            </ul>
        </div>
    </div>
<!-- /main navigation -->

</div>
</div>
<!-- /main sidebar -->