<!--navbar-->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="../main/test">DiskloopHole</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <?php  if(!isset($_SESSION['profile'])){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../login/index">login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../register/index">register</a>
                    </li>
                <?php }else{ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../login/logout">logout</a>
                    </li>
                <?php } ?>
                <?php if(isset($_SESSION['profile'])){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../profile/overview">profile</a>
                    </li>
                <?php }?>
                <?php if($_SERVER['REQUEST_URI'] != '/testFrame/main/test'){ ?>
                    <li class="nav-item">
                        <button type="button" class="btn btn-dark" onclick="history.back(-1)">back</button>
                    </li>
                <?php } ?>

            </ul>
        </div>
    </div>
</nav>




