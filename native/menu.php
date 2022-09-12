
<!-- Header top area start-->
<div class="header-top-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="admin-logo">
					<a href="#"><img src="img/logo/log.png" alt="" />
					</a>
				</div>
			</div>
			<div class="col-lg-5 col-md-5 col-sm-0 col-xs-12">
				<div class="header-top-menu">
					<ul class="nav navbar-nav mai-top-nav">
						
					</ul>
				</div>
			</div>
			<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
				<div class="header-right-info">
					<ul class="nav navbar-nav mai-top-nav header-right-menu">
						<li class="nav-item">
							<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
								<span class="adminpro-icon adminpro-user-rounded header-riht-inf"></span>
								<span class="admin-name"><?php echo $user_login['fullname']; ?></span>
								<span class="author-project-icon adminpro-icon adminpro-down-arrow"></span>
							</a>
							<ul role="menu" class="dropdown-header-top author-log dropdown-menu animated flipInX">                                    
								<li><a href="settings.php"><span class="adminpro-icon adminpro-settings author-log-ic"></span>Settings</a>
								</li>
								<li><a href="logout.php"><span class="adminpro-icon adminpro-locked author-log-ic"></span>Log Out</a>
								</li>
							</ul>
						</li>                            
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Header top area end-->



<!-- Mobile Menu start -->
<div class="mobile-menu-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="mobile-menu">
					<nav id="dropdown">
						<ul class="mobile-menu-nav">
							<li><a href="index.php">Home </a></li>
							<li><a href="master.php">Master Barang</a>
							<li><a href="masuk.php">Barang Masuk</a>
							<li><a href="keluar.php">Barang Keluar</a>
							<li><a href="riwayat.php">Riwayat Keluar Masuk</a>
							<li><a href="reportgr.php">Report per Gol</a>
							<li><a href="report.php">Report All</a>
							<li><a href="logout.php">Logout</a></li>
							<?php
                            $role= $user_login['role'];
                            if ($role=='admin'){
	                        ?>
	                        <li><a href="user.php">Admin</a>    
	                        </li>
	                        <?php } ?>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Mobile Menu end -->
    
<!-- Main Menu area start-->
<div class="main-menu-area mg-tb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs custom-menu-wrap">
                    <li><a href="index.php">Home</a></li>                        
                    <li><a href="master.php">Master Barang</a></li>
                    <li><a href="masuk.php">Barang Masuk</a></li>
                    <li><a href="keluar.php">Barang Keluar</a></li>
                    <li><a href="riwayat.php">Riwayat Keluar Masuk</a></li>
                    <li><a href="reportgr.php">Report per Gol</a></li>
                    <li><a href="report.php">Report All</a></li>
                    <?php
                        $role= $user_login['role'];
                        if ($role=='admin'){
                    ?>
                    <li><a href="user.php">Admin</a>
                    <?php } ?>              
                    </li>
                </ul>
                
            </div>
        </div>
    </div>
</div>
<!-- Main Menu area End-->