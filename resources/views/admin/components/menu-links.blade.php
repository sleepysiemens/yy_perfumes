<ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item active">
        <a href="index.html" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Панель</div>
        </a>
    </li>

    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Содержимое</span>
    </li>
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-dock-top"></i>
            <div data-i18n="Account Settings">Контент сайта</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="pages-account-settings-account.html" class="menu-link">
                    <div data-i18n="Account">Меню</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('articles.index') }}" class="menu-link">
                    <div data-i18n="Notifications">Блог</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
            <div data-i18n="Authentications">Пользователи</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="auth-login-basic.html" class="menu-link" target="_blank">
                    <div data-i18n="Basic">База</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="auth-register-basic.html" class="menu-link" target="_blank">
                    <div data-i18n="Basic">Права</div>
                </a>
            </li>
        </ul>
    </li>

    <!-- Components -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Магазин</span></li>

    <!-- Cards -->
    <li class="menu-item">
        <a href="{{ route('products.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-collection"></i>
            <div data-i18n="Basic">Товары</div>
        </a>
    </li>
    <!-- User interface -->
    <li class="menu-item">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-box"></i>
            <div data-i18n="User interface">Заказы</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('orders.index') }}" class="menu-link">
                    <div data-i18n="Accordion">Все</div>
                </a>
            </li>
            @foreach(\App\Models\OrderStatus::all() as $status)
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="Accordion">{{ $status->title }}</div>
                    </a>
                </li>
            @endforeach
        </ul>
    </li>

    <!-- Extended components -->
    <li class="menu-item">
        <a href="{{ route('statuses.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-copy"></i>
            <div data-i18n="Extended UI">Статусы</div>
        </a>
    </li>

    <li class="menu-item">
        <a href="icons-boxicons.html" class="menu-link">
            <i class="menu-icon tf-icons bx bx-crown"></i>
            <div data-i18n="Boxicons">Boxicons</div>
        </a>
    </li>

    <!-- Forms & Tables -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Forms &amp; Tables</span></li>
    <!-- Forms -->
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-detail"></i>
            <div data-i18n="Form Elements">Form Elements</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="forms-basic-inputs.html" class="menu-link">
                    <div data-i18n="Basic Inputs">Basic Inputs</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="forms-input-groups.html" class="menu-link">
                    <div data-i18n="Input groups">Input groups</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-detail"></i>
            <div data-i18n="Form Layouts">Form Layouts</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="form-layouts-vertical.html" class="menu-link">
                    <div data-i18n="Vertical Form">Vertical Form</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="form-layouts-horizontal.html" class="menu-link">
                    <div data-i18n="Horizontal Form">Horizontal Form</div>
                </a>
            </li>
        </ul>
    </li>
    <!-- Tables -->
    <li class="menu-item">
        <a href="tables-basic.html" class="menu-link">
            <i class="menu-icon tf-icons bx bx-table"></i>
            <div data-i18n="Tables">Tables</div>
        </a>
    </li>
    <!-- Misc -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
    <li class="menu-item">
        <a
            href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
            target="_blank"
            class="menu-link"
        >
            <i class="menu-icon tf-icons bx bx-support"></i>
            <div data-i18n="Support">Support</div>
        </a>
    </li>
    <li class="menu-item">
        <a
            href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
            target="_blank"
            class="menu-link"
        >
            <i class="menu-icon tf-icons bx bx-file"></i>
            <div data-i18n="Documentation">Documentation</div>
        </a>
    </li>
</ul>
