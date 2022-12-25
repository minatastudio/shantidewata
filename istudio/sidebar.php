<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<?php
if ($_GET[pageid] == "" || $_GET[pageid] == "dashboard") {
    $open1 = "active open";
    $title_admin1 = "Dashboard";
    $title_admin2 = "Opening";
} else if ($_GET[pageid] == "general") {
    $open2 = "active open";
    $title_admin1 = "Main Home";
    $title_admin2 = "Add Data";
} else if ($_GET[pageid] == "data_property") {
    $open3 = "active open";
    $open_property1 = "active open";
    $title_admin1 = "property";
    $title_admin2 = "List Data";
} else if ($_GET[pageid] == "add_property") {
    $open3 = "active open";
    $open_property2 = "active open";
    $title_admin1 = "property";
    $title_admin2 = "Add Data";
} else if ($_GET[pageid] == "edit_property") {
    $open3 = "active open";
    $open_property3 = "active open";
    $title_admin1 = "property";
    $title_admin2 = "Edit Data";
} else if ($_GET[pageid] == "main_property") {
    $open3 = "active open";
    $open_property4 = "active open";
    $title_admin1 = "property";
    $title_admin2 = "Main Page";
} else if ($_GET[pageid] == "data_category") {
    $open4 = "active open";
    $open_category1 = "active open";
    $title_admin1 = "Category";
    $title_admin2 = "List Data";
} else if ($_GET[pageid] == "add_category") {
    $open4 = "active open";
    $open_category2 = "active open";
    $title_admin1 = "Category";
    $title_admin2 = "Add Data";
} else if ($_GET[pageid] == "edit_category") {
    $open4 = "active open";
    $open_category3 = "active open";
    $title_admin1 = "Category";
    $title_admin2 = "Edit Data";
} else if ($_GET[pageid] == "data_type") {
    $open5 = "active open";
    $open_type1 = "active open";
    $title_admin1 = "Type";
    $title_admin2 = "List Data";
} else if ($_GET[pageid] == "add_type") {
    $open5 = "active open";
    $open_type2 = "active open";
    $title_admin1 = "Type";
    $title_admin2 = "Add Data";
} else if ($_GET[pageid] == "edit_type") {
    $open5 = "active open";
    $open_type3 = "active open";
    $title_admin1 = "Type";
    $title_admin2 = "Edit Data";
} else if ($_GET[pageid] == "data_location") {
    $open8 = "active open";
    $open_location1 = "active open";
    $title_admin1 = "Location";
    $title_admin2 = "List Data";
} else if ($_GET[pageid] == "add_location") {
    $open8 = "active open";
    $open_location2 = "active open";
    $title_admin1 = "Location";
    $title_admin2 = "Add Data";
} else if ($_GET[pageid] == "edit_location") {
    $open8 = "active open";
    $open_location3 = "active open";
    $title_admin1 = "Location";
    $title_admin2 = "Edit Data";
} else if ($_GET[pageid] == "user") {
    $open6 = "active open";
    $title_admin1 = "User Password";
    $title_admin2 = "Main";
} else if ($_GET[pageid] == "about") {
    $open13 = "active open";
    $title_admin1 = "About";
    $title_admin2 = "Main";
} else if ($_GET[pageid] == "build") {
    $open9 = "active open";
    $title_admin1 = "Build";
    $title_admin2 = "Main";
} else if ($_GET[pageid] == "design") {
    $open10 = "active open";
    $title_admin1 = "Design";
    $title_admin2 = "Main";
} else if ($_GET[pageid] == "management") {
    $open11 = "active open";
    $title_admin1 = "Management";
    $title_admin2 = "Main";
} else if ($_GET[pageid] == "marketing") {
    $open12 = "active open";
    $title_admin1 = "Marketing";
    $title_admin2 = "Main";
} else {
    $open7 = "active open";
    $title_admin1 = "Contact";
    $title_admin2 = "Main Page";
}
?>
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- BEGIN SIDEBAR -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
            <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
            <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
            <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                <li class="sidebar-toggler-wrapper hide">
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <div class="sidebar-toggler"> </div>
                    <!-- END SIDEBAR TOGGLER BUTTON -->
                </li>
                <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                <li class="nav-item <?php echo "$open1"; ?>">
                    <a href="page.php?pageid=dashboard" class="nav-link nav-toggle">
                        <i class="icon-grid"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="heading">
                    <h3 class="uppercase">Main Menu</h3>
                </li>
                <li class="nav-item <?php echo "$open2"; ?>">
                    <a href="page.php?pageid=general" class="nav-link ">
                        <i class="icon-home"></i>
                        <span class="title">Home Content</span>
                    </a>
                </li>
                <li class="nav-item <?php echo "$open3"; ?>">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-grid"></i>
                        <span class="title">Property</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  <?php echo "$open_property1"; ?>">
                            <a href="page.php?pageid=data_property" class="nav-link ">
                                <i class="fa fa-circle"></i>
                                <span class="title">Data Property</span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo "$open_property2"; ?>">
                            <a href="page.php?pageid=add_property" class="nav-link ">
                                <i class="fa fa-circle"></i>
                                <span class="title">Add Property</span>
                            </a>
                        </li>
                        <?php
                        if ($_GET[pageid] == "edit_property") {
                        ?>
                            <li class="nav-item <?php echo "$open_property3"; ?>">
                                <a href="#" class="nav-link ">
                                    <i class="fa fa-circle"></i>
                                    <span class="title">Edit Property</span>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="nav-item <?php echo "$open_property4"; ?> ">
                            <a href="page.php?pageid=main_property" class="nav-link ">
                                <i class="fa fa-circle"></i>
                                <span class="title">Main Property</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?php echo "$open4"; ?>">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-handbag"></i>
                        <span class="title">Category</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  <?php echo "$open_category1"; ?>">
                            <a href="page.php?pageid=data_category" class="nav-link ">
                                <i class="fa fa-circle"></i>
                                <span class="title">Data Category</span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo "$open_category2"; ?>">
                            <a href="page.php?pageid=add_category" class="nav-link ">
                                <i class="fa fa-circle"></i>
                                <span class="title">Add Category</span>
                            </a>
                        </li>
                        <?php
                        if ($_GET[pageid] == "edit_category") {
                        ?>
                            <li class="nav-item <?php echo "$open_category3"; ?>">
                                <a href="#" class="nav-link ">
                                    <i class="fa fa-circle"></i>
                                    <span class="title">Edit Category</span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="nav-item <?php echo "$open5"; ?>">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-handbag"></i>
                        <span class="title">Type</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  <?php echo "$open_type1"; ?>">
                            <a href="page.php?pageid=data_type" class="nav-link ">
                                <i class="fa fa-circle"></i>
                                <span class="title">Data Type</span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo "$open_type2"; ?>">
                            <a href="page.php?pageid=add_type" class="nav-link ">
                                <i class="fa fa-circle"></i>
                                <span class="title">Add Type</span>
                            </a>
                        </li>
                        <?php
                        if ($_GET[pageid] == "edit_type") {
                        ?>
                            <li class="nav-item <?php echo "$open_type3"; ?>">
                                <a href="#" class="nav-link ">
                                    <i class="fa fa-circle"></i>
                                    <span class="title">Edit Type</span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="nav-item <?php echo "$open8"; ?>">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-handbag"></i>
                        <span class="title">Location</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  <?php echo "$open_location1"; ?>">
                            <a href="page.php?pageid=data_location" class="nav-link ">
                                <i class="fa fa-circle"></i>
                                <span class="title">Data Location</span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo "$open_location2"; ?>">
                            <a href="page.php?pageid=add_location" class="nav-link ">
                                <i class="fa fa-circle"></i>
                                <span class="title">Add Location</span>
                            </a>
                        </li>
                        <?php
                        if ($_GET[pageid] == "edit_location") {
                        ?>
                            <li class="nav-item <?php echo "$open_location3"; ?>">
                                <a href="#" class="nav-link ">
                                    <i class="fa fa-circle"></i>
                                    <span class="title">Edit Location</span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
                </li>
                <li class="nav-item <?php echo "$open13"; ?>">
                    <a href="page.php?pageid=about" class="nav-link nav-toggle">
                        <i class="icon-info"></i>
                        <span class="title">About</span>
                    </a>
                </li>
                <li class="nav-item <?php echo "$open9"; ?>">
                    <a href="page.php?pageid=build" class="nav-link nav-toggle">
                        <i class="icon-wrench"></i>
                        <span class="title">Build</span>
                    </a>
                </li>
                <li class="nav-item <?php echo "$open10"; ?>">
                    <a href="page.php?pageid=design" class="nav-link nav-toggle">
                        <i class="icon-pencil"></i>
                        <span class="title">Design</span>
                    </a>
                </li>
                <li class="nav-item <?php echo "$open11"; ?>">
                    <a href="page.php?pageid=management" class="nav-link nav-toggle">
                        <i class="icon-notebook"></i>
                        <span class="title">Management</span>
                    </a>
                </li>
                <li class="nav-item <?php echo "$open12"; ?>">
                    <a href="page.php?pageid=marketing" class="nav-link nav-toggle">
                        <i class="icon-compass"></i>
                        <span class="title">Marketing</span>
                    </a>
                </li>
                <li class="nav-item <?php echo "$open6"; ?>">
                    <a href="page.php?pageid=user" class="nav-link nav-toggle">
                        <i class="icon-user"></i>
                        <span class="title">User Profile</span>
                    </a>
                </li>
            </ul>
            <!-- END SIDEBAR MENU -->
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->