<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item @if (Request::segment(1) == 'article') active @endif">
        <a class="nav-link active" href="{{ route('article.index') }}">
          <i class="ti-book mr-3 mb-1"></i>
          <span class="menu-title">Article</span>
        </a>
      </li>
      <li class="nav-item @if (Request::segment(1) == 'category') active @endif">
        <a class="nav-link active" href="{{ route('category.index') }}">
          <i class="ti-book mr-3 mb-1"></i>
          <span class="menu-title">Category</span>
        </a>
      </li>
    </ul>
  </nav>