<ul class="nav nav-pills page-tabs">
  <li class="nav-item">
    <a class="nav-link {{ (request()->is('*/blogs')) ? 'active' : '' }}" href="{{ route('blogs') }}">Блог</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ (request()->is('*/videos')) ? 'active' : '' }}" href="{{ route('videos.index') }}">Видеоролики</a>
  </li>
</ul>
