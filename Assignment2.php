
<!-- NAV BAR WITH DROPDOWN WITHIN DROPDOWN (Code based on answer from stackoverflow) -->
<style>
.dropdown-submenu {
    position:relative;
}
.dropdown-submenu>.dropdown-menu {
    top:0;
    left:100%;
    margin-top:-6px;
    margin-left:-1px;
    -webkit-border-radius:0 6px 6px 6px;
    -moz-border-radius:0 6px 6px 6px;
    border-radius:0 6px 6px 6px;
}
.dropdown-submenu:hover>.dropdown-menu {
    display:block;
}
.dropdown-submenu>a:after {
    display:block;
    content:" ";
    float:right;
    width:0;
    height:0;
    border-color:transparent;
    border-style:solid;
    border-width:5px 0 5px 5px;
    border-left-color:#cccccc;
    margin-top:5px;
    margin-right:-10px;
}
.dropdown-submenu:hover>a:after {
    border-left-color:#ffffff;
}
.dropdown-submenu.pull-left {
    float:none;
}
.dropdown-submenu.pull-left>.dropdown-menu {
    left:-100%;
    margin-left:10px;
    -webkit-border-radius:6px 0 6px 6px;
    -moz-border-radius:6px 0 6px 6px;
    border-radius:6px 0 6px 6px;
}
</style>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">  
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="menu-item dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Drop Down<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="menu-item dropdown dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Level 1</a>
                            <ul class="dropdown-menu">
                                                <?php
				$query = mysql_query("SELECT * FROM colleges");
				while ($row = mysql_fetch_assoc($query)){
					$id = $row['collegeID'];
					$query2 = mysql_query("SELECT * FROM bars WHERE collegeID = '$id'");
					$name = $row['name'];
					echo "<li class='menu-item'><a href='results.php?collegeID=$id'>$name</a></li>";
					
				
			?>
                                <li class="menu-item dropdown dropdown-submenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Level 2</a>
                                    <ul class="dropdown-menu">
                                        <?php
				while ($row2 = mysql_fetch_assoc($query2)){
					$id = $row2['barID'];
					$name = $row2['name'];
					echo "<li><a href='ownPage.php?id=$id'>$name</a></li>";
				}
				}
			?>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- NAV BAR END-->

<!-- Jumbotron centered-->
<style>
 .centerfy img{
                margin: 0 auto;
            }
            .centerfy{
                text-align: center;
            }
       </style>
 <div class="jumbotron">
      <div class="container">
        <div class="row well well-lg">
            <div class="col-md-6 col-md-offset-3 centerfy">

                <div class="">
                    <img  src="images/logo.jpeg" class="img-responsive text-center" />
                </div>
            </div>
        </div>
      </div>
<!-- END Jumbotron -->

<!-- Popover -->
<script>$(document).on('click', function(e) {
		$('.userInfo').popover('hide');
	});
	
	$(".userInfo").popover({trigger: 'manual', placement: "bottom", html: true}).click(function(e){
		var a = $(this).attr("name");
		var b = $(this);
		$.post("get_user_rating.php",{'userID': a}, function(response) {
				$(b).attr('data-content',response).popover('show');
		});
		 e.preventDefault();
	})
	</script>
<span class='userInfo' style='cursor:pointer; color:blue;' name='$postUserID'> <u>$username</u> </span><span style='font-size:.5em;'>$time</span>   
<!-- Popover END-->

<!-- Alert -->
<script>
$(".alert").alert()
</script>
<span class='alert'>Review Posted Successfully</span>
<!-- END Alert -->
