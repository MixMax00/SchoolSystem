@php
    $sec_url = url()->current();;
@endphp
<ul class="nav nav-tabs">
    @foreach ($classes as $nav_class)
        <li class="nav-item">
          <a
            href="{{ route('admin.section',['id'=>$nav_class->id])  }}"
            class="nav-link
            {{ $sec_url == asset('/').('admin/section/index/').$nav_class->id ? 'active' : '' }}
            {{ $nav_class->id == $class->id ? "active" : "" }}
            "
            aria-current="page">
                <span class="
                    {{ $sec_url == asset('/').('admin/section/index/').$nav_class->id ? 'text-warning' : '' }}
                    {{ $nav_class->id == $class->id ? 'text-warning' : '' }}">{{ $nav_class->class_name  }}</span>
            </a>
        </li>
    @endforeach
</ul>
