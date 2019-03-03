<header>
  <div class="container-fluid p0">
    <nav class="nav-desktop">
      <?php include('nawigacja.php'); ?>
    </nav>
    <div id="xs-large-header" class="container">
      <div class="header-bg">
        <img src="../../img/logo.png" alt="">
        <h1>Parafia Rzymskokatolicka Św. Michała Archanioła w Kotulinie</h1>
      </div>
    </div>
    <div class="container">
      <div id="menu-button" onclick="openNav()">Menu</div>
      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <nav class="nav-mobile">
          <?php include('nawigacja.php'); ?>
        </nav>
      </div>
    </div>
  </div>
</header>
