<div class="nav-side-menu">
    <div class="brand">Menú</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

    <div class="menu-list">

        <ul id="menu-content" class="menu-content collapse out">
            <li>
                <a :href="menus.dash.link">
                    <i class="fa fa-dashboard fa-lg"></i> @{{ menus.dash.name }}
                </a>
            </li>
            <li  data-toggle="collapse" data-target="#test">
                <a href="#"><i class="fa fa-gift fa-lg"></i> Tests <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="test">
                <li v-for="menu in menus.tests"><a :href="menu.link">@{{ menu.name }}</a></li>
            </ul>
            <li>
                <a :href="menus.report.link"><i class="fa fa-gift fa-lg"></i>@{{ menus.report.name }}</a>
            </li>
        </ul>
    </div>
</div>