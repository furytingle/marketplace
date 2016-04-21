<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Mplace</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active">
                {{ link_to_route('dashboard', 'Dashboard', [], []) }}
            </li>
            <li>
                {{ link_to_route('admin.user.index', 'Users', [], []) }}
            </li>
            <li>
                {{ link_to_route('admin.category.index', 'Categories', [], []) }}
            </li>
            <li><a href="#">Another link</a></li>
        </ul>
    </div>
</nav>
