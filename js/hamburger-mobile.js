 //Hamburger mobile script
 jssor_1_slider_init();
 const menu = window.matchMedia("(max-width: 1199px)");
 const mq = window.matchMedia("(max-width: 767px)");
 if (mq.matches) {
   var h = document.getElementById("menu-button");
   h.className = "container-fluid p0";
 }

 function openNav() {
   document.getElementById("mySidenav").style.width = "100%";
 }

 function closeNav() {
   document.getElementById("mySidenav").style.width = "0";
 }
