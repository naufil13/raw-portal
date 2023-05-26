
	<!--begin::Aside-->
    <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" style=" background: #009688; color: #fff; padding-bottom: 14px; padding-top: 4px; " id="kt_aside">
        <!--begin::Brand-->
        <a href="" class="flex-column-auto" id="kt_brand">
            <!--begin::Logo-->
            <h3 class="text-light font-weight-boldest pt-5 pl-7">
               API Solutions
            </h3>
            <!--end::Logo-->

        </a>
        <!--end::Brand-->
        <!--begin::Aside Menu-->
        <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
            <!--begin::Menu Container-->
            <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
                <!--begin::Menu Nav-->
                <ul class="menu-nav">

                    @php
                    $_M = new Multilevel();
                    $_M->id_Column = 'id';
                    $_M->title_Column = 'title';
                    $_M->link_Column = 'module';
                    $_M->type = 'menu';
                    $_M->level_spacing = 5;
                    $_M->selected = $row->parent_id;
                    $_M->has_child_html = '<i class="menu-arrow"></i>';

                    $_M->parent_li_start = '<li class="menu-item menu-item-submenu {active_class}" aria-haspopup="true">
                                            <a  href="{href}" class="menu-link menu-toggle" title="{title}">
                                            <span class="menu-icon">
                                                {icon}
                                            </span>
                                            <span class="menu-text">{title}</span>

                                                {has_child}
                                            </a>';

                    $_M->parent_li_end =         '</li>';


                    $_M->child_ul_start = '<div class="menu-submenu">
                        <i class="menu-arrow"></i>
                                            <ul class="menu-subnav">';

                    $_M->child_ul_end = '</ul></div>';

                    $_M->child_li_start = '<li class="menu-item {active_class}" aria-haspopup="true" >
                                <a  href="{href}" class="menu-link" title="{title}">
                                    <span class="menu-icon">{icon}</span>
                                    <span class="menu-text">{title}</span>
                                </a>';

                    $_M->child_li_end =         '</li>';


                    $_M->active_class = 'menu-item-here';
                    $_M->active_link = getUri(2);
                    $_M->url = admin_url('') . "/";

                    $_M->query = "SELECT *,
                    IF(TRIM(module) = '#', 'javascript:;', module) as module,
                    IF(FIND_IN_SET(SUBSTRING_INDEX(image, '.', -1), 'png,jpg,jpeg') > 0,
                    CONCAT('<img width=28 src=\"" . asset_url('media/icons', true) . "/', image , '\" alt=\"',title,'\">'),
                    CONCAT('<i class=\"kt-menu__link-icon',icon,'\"></i>')) as icon
                    FROM `modules`
                    WHERE `status`='Active' AND `show_on_menu`=1
                    AND id IN (SELECT `module_id` FROM `user_type_module_rel` WHERE user_type_id='" . intval(Auth::user()->user_type_id) . "')
                    ORDER BY ordering ASC";
                    echo $_M->build();
                @endphp


                </ul>
                <!--end::Menu Nav-->
            </div>
            <!--end::Menu Container-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside-->

