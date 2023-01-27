


@php
    $sec_url = url()->current();
@endphp
<ul class="nav nav-tabs">
    @foreach ($classes as $nav_class)
        <li class="nav-item {{ $nav_class->id == $class->id ? "rs-active" : "" }}">
          <a
            href="{{ route('admin.classRoutine',['id'=>$nav_class->id])  }}"
            class="nav-link
            {{ $sec_url == asset('/').('admin/class-routine/index/').$nav_class->id ? 'rs-active' : '' }}
            {{ $nav_class->id == $class->id ? "rs-active" : "" }}
            "
            aria-current="page">
                <span class="
                    {{ $sec_url == asset('/').('admin/class-routine/index/').$nav_class->id ? 'text-white' : '' }}
                    {{ $nav_class->id == $class->id ? 'text-white' : '' }}">{{ $nav_class->class_name  }}</span>
            </a>
        </li>
    @endforeach
</ul>

