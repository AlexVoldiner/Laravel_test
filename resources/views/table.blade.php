<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Table</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style>
      .pagination {
          margin-left: 150px;
      }
      .page-header {
          text-align: center;
          margin-top: 50px;
      }
    </style>
</head>
<body role="document">
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="/">Tree</a></li>
                <li class="active"><a href="/table">Table</a></li>
            </ul>
            <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
                <form  class="navbar-form navbar-right" method="get" action="{{ route('search') }}">
                    <input name="value" type="text" class="form-control" placeholder="Search...">
                </form>
        </div>
        </div>
    </div>
</div>
<h1 class="page-header">Staff records</h1>
<div class="container">
<div class="table-responsive">
    <table class="table table-hover">
    <thead>
    <tr>
        <th>id</th>
        <th>full_name</th>
        <th>position</th>
        <th>start_date</th>
        <th>salary</th>
        <th>dir_id</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($workers as $user): ?>
            <?php echo "<tr>"; ?>
    <?php echo "<td>"."$user->id"."</td>"; ?>
    <?php echo "<td>"."$user->full_name"."</td>"; ?>
    <?php echo "<td>"."$user->position"."</td>"; ?>
    <?php echo "<td>"."$user->start_date"."</td>"; ?>
    <?php echo "<td>"."$user->salary"."</td>"; ?>
    <?php echo "<td>"."$user->dir_id"."</td>"; ?>
            <?php echo "</tr>"; ?>
    <?php endforeach; ?>
    </tbody>
</table>
</div>
<div class="pagination">
    <?php echo $workers->render(); ?>
</div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
