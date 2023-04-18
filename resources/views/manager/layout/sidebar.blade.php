<div id="dw-s1" class="bmd-layout-drawer bg-faded" aria-expanded="true" aria-hidden="true">

    <div class="container-fluid side-bar-container">
        <header class="pb-0">
            <a class="navbar-brand">
                {{ auth('manager')->user()->name }}
            </a>
        </header>
        <p class="side-comment">أساسي</p>
        <li class="side a-collapse short ">
            <a href="{{ route('manager.dashboard') }}" class="side-item selected"><i class="fas fa-home  mr-1"></i>الرئيسية</a>
        </li>
        <ul class="side a-collapse short">
            <a class="ul-text"><i class="fas fa-tachometer-alt mr-1"></i> الفريق
                <!-- <span class="badge badge-info">4</span> -->
                <i class="fas fa-chevron-down arrow"></i></a>
            <div class="side-item-container ">
                <li class="side-item"><a href="{{ route('manager.agent.index') }}"><i class="fas fa-angle-right mr-2"></i>مطورين المبيعات
                        </a></li>
                <li class="side-item"><a href="{{ route('manager.agent.create') }}"><i class="fas fa-angle-right mr-2"></i>إضافة مطور مبيعات
                        </a></li>
            </div>
        </ul>
        
        <li class="side a-collapse short ">
            <a href="{{route('manager.vistor.index')}}" class="side-item "><i class="fas fa-fan fa-spin mr-1"></i>صفحة الزيارات</a>
        </li>

        <p class="side-comment">الإعدادات</p>
        <ul class="side a-collapse short">
            <a class="ul-text"><i class="fas fa-cog mr-1"></i> الإعدادات
                <i class="fas fas fa-chevron-down arrow"></i></a>
            <div class="side-item-container hide animated">
                <li class="side-item"><a href="{{route('manager.profile.index')}}"><i class="fas fa-angle-right mr-2"></i>الملف الشخصي</a></li>
            </div>
        </ul>

    </div>

</div>