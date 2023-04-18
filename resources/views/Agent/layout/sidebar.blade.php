<div id="dw-s1" class="bmd-layout-drawer bg-faded" aria-expanded="true" aria-hidden="true">

    <div class="container-fluid side-bar-container">
        <header class="pb-0">
            <a class="navbar-brand">
                {{ auth('agent')->user()->name }}
            </a>
        </header>
        <p class="side-comment">أساسي</p>

        <li class="side a-collapse short ">
            <a href="{{ route('Agent.dashboard') }}" class="side-item selected"><i class="fas fa-home  mr-1"></i>الرئيسية</a>
        </li>

        <li class="side a-collapse short ">
            <a href="{{route('vistor.index')}}" class="side-item "><i class="fas fa-fan fa-spin mr-1"></i>صفحة الزيارات</a>
        </li>

        <p class="side-comment">الإعدادات</p>
        <ul class="side a-collapse short">
            <a class="ul-text"><i class="fas fa-cog mr-1"></i> الإعدادات
                <i class="fas fas fa-chevron-down arrow"></i></a>
            <div class="side-item-container hide animated">
                <li class="side-item"><a href="{{route('profile.index')}}"><i class="fas fa-angle-right mr-2"></i>الملف الشخصي</a></li>
            </div>
        </ul>

    </div>

</div>