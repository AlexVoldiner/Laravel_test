<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tree</title>
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/jquery.js" ></script>
        <style>
            #one {
                margin-left: 20px;
            }
            option[value = '0'] {
                background-color: rgba(73, 101, 122, 0.32);
            }
            p {
                margin-top:10px;
            }
            select {
            border-radius: 8px;
            }
        </style>
        <script type="text/javascript">

            $(function(){
                $("select").slice(1).hide();
                var i;
                $(".block").on("change", "select", function(){
                    i = $(this).index();
                    if ($(this).val() == 0) {
                        $("select").slice(i+1).hide();
                    } else {
                        $.ajax({
                            type: "GET",
                            url: "{{ route('get') }}",
                            data: {id: $(this).val()}
                        })
                            .done(function(data){
                                $("select").eq(i+1).html(data);
                                $("select").eq(i+1).prop("disabled", false);
                                $("select").eq(i+1).show();
                                $("select").slice(i+2).hide();
                            if ($("select").val() == 0) {
                                $("select").slice(i+1).hide();
                            }
                        });
                    }
                });
            });
        </script>
    </head>
    <body role="document">
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-collapse collapse">
                  <ul class="nav navbar-nav">
                      <li class="active"><a href="/">Tree</a></li>
                      <li><a href="/table">Table</a></li>
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
                </div><!--/.navbar-collapse -->
            </div>
        </div>
    </div>
    <div class="jumbotron">
        <div class="table-responsive">
    <?php
    echo "<div class='block' value='$catalog->id'><p>$catalog->id" . " $catalog->position<p/>";
    echo "<select id='one' size='20'>";
    echo "<option value='0'>Выберите подчинённого</option>";

    foreach ($catalog1 as $key => $value) {
        echo "<option value='$value->id'>$value->id"." $value->position</option>";
    }
    echo "</select>";
    ?>
    <select size="20" disabled='disabled'>
        <option value='0'>Выберите подчинённого</option>
    </select>
    <select size="20" disabled='disabled'>
        <option value='0'>Выберите подчинённого</option>
    </select>
    <select size="20" disabled='disabled'>
        <option value='0'>Выберите подчинённого</option>
    </select>
    <select size="20" disabled='disabled'>
        <option value='0'>Выберите подчинённого</option>
    </select>
             </div>
         </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
