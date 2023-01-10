<button onclick="topFunction()" id="myBtn" title="Go to top"><img style="height: 50px;"
        src="<?= base_url()?>/assets/img/top.png" alt=""></button>
<!-- Footer Start-->

<div style="height: 80px; background-image: linear-gradient(310deg, #141727 0%, #3A416F 100%);color:#fff;">
    <p style="display:block;margin-left:auto;margin-right:auto;text-align: center;padding-top:20px"> Copyright
        &#169;
        <?php echo date("Y") ?>
        All rights reserved. Designed by <i>IT Dept INDOSAR</p>
</div>


<script>
// Get the button
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;

}
</script>
</body>
<!-- Footer End-->

<!-- Chat Box End-->
<!-- jquery
		============================================ -->
<script src="<?= base_url() ?>assets/js/vendor/jquery-1.11.3.min.js"></script>
<!-- bootstrap JS
		============================================ -->
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
<!-- meanmenu JS
		============================================ -->
<script src="<?= base_url() ?>assets/js/jquery.meanmenu.js"></script>
<!-- mCustomScrollbar JS
		============================================ -->
<script src="<?= base_url() ?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- sticky JS
		============================================ -->
<script src="<?= base_url() ?>assets/js/jquery.sticky.js"></script>
<!-- scrollUp JS
		============================================ -->
<script src="<?= base_url() ?>assets/js/jquery.scrollUp.min.js"></script>
<!-- counterup JS
		============================================ -->
<script src="<?= base_url() ?>assets/js/counterup/jquery.counterup.min.js"></script>
<script src="<?= base_url() ?>assets/js/counterup/waypoints.min.js"></script>
<script src="<?= base_url() ?>assets/js/counterup/counterup-active.js"></script>
<!-- peity JS
		============================================ -->
<script src="<?= base_url() ?>assets/js/peity/jquery.peity.min.js"></script>
<script src="<?= base_url() ?>assets/js/peity/peity-active.js"></script>
<!-- sparkline JS
		============================================ -->
<script src="<?= base_url() ?>assets/js/sparkline/jquery.sparkline.min.js"></script>
<script src="<?= base_url() ?>assets/js/sparkline/sparkline-active.js"></script>
<!-- flot JS
		============================================ -->
<script src="<?= base_url() ?>assets/js/flot/jquery.flot.js"></script>
<script src="<?= base_url() ?>assets/js/flot/jquery.flot.tooltip.min.js"></script>
<script src="<?= base_url() ?>assets/js/flot/jquery.flot.spline.js"></script>
<script src="<?= base_url() ?>assets/js/flot/jquery.flot.resize.js"></script>
<script src="<?= base_url() ?>assets/js/flot/jquery.flot.pie.js"></script>
<script src="<?= base_url() ?>assets/js/flot/Chart.min.js"></script>
<script src="<?= base_url() ?>assets/js/flot/flot-active.js"></script>
<!-- map JS
		============================================ -->
<script src="<?= base_url() ?>assets/js/map/raphael.min.js"></script>
<script src="<?= base_url() ?>assets/js/map/jquery.mapael.js"></script>
<script src="<?= base_url() ?>assets/js/map/france_departments.js"></script>
<script src="<?= base_url() ?>assets/js/map/world_countries.js"></script>
<script src="<?= base_url() ?>assets/js/map/usa_states.js"></script>
<script src="<?= base_url() ?>assets/js/map/map-active.js"></script>
<!-- data table JS
		============================================ -->
<script src="<?= base_url() ?>assets/js/data-table/bootstrap-table.js"></script>
<script src="<?= base_url() ?>assets/js/data-table/tableExport.js"></script>
<script src="<?= base_url() ?>assets/js/data-table/data-table-active.js"></script>
<script src="<?= base_url() ?>assets/js/data-table/bootstrap-table-editable.js"></script>
<script src="<?= base_url() ?>assets/js/data-table/bootstrap-editable.js"></script>
<script src="<?= base_url() ?>assets/js/data-table/bootstrap-table-resizable.js"></script>
<script src="<?= base_url() ?>assets/js/data-table/colResizable-1.5.source.js"></script>
<script src="<?= base_url() ?>assets/js/data-table/bootstrap-table-export.js"></script>
<!-- switcher JS
		============================================ -->
<script src="<?= base_url() ?>assets/js/switcher/styleswitch.js"></script>
<script src="<?= base_url() ?>assets/js/switcher/switch-active.js"></script>
<!-- main JS
		============================================ -->
<script src="<?= base_url() ?>assets/js/main.js"></script>
<!-- jquery JS -->
<script src="<?= base_url() ?>assets/js/jquery-3.2.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/counterup/jquery.waypoints.min.js"></script>
<script src="<?= base_url() ?>assets/js/counterup/jquery.counterup.min.js"></script>
<!-- select2 -->
<script src="<?= base_url() ?>assets/select2-master/dist/js/select2.min.js"></script>
<!-- sweetalert2 -->
<script src="<?= base_url() ?>assets/sweetalert2/swal2.js"></script>

</body>

</html>
<style>
.select2-container--open {
    z-index: 9999999
}

.swal2-container {
    z-index: 20000 !important;
}

#myBtn {
    display: none;
    position: fixed;
    bottom: 10px;
    right: 30px;
    z-index: 99;
    font-size: 18px;
    border: none;
    outline: none;
    background-color: transparent;
    color: white;
    cursor: pointer;
    padding: 10px;
    border-radius: 4px;
    filter: drop-shadow(5px 10px 5px #000);
}

#myBtn:hover {
    background-color: transparent;
}

.text-white {
    color: #fff !important;
}

a:hover {
    color: var(--bs-link-hover-color);
    text-decoration: none;
}

.nav-tabs {
    --bs-nav-tabs-border-width: 1px;
    --bs-nav-tabs-border-color: #dee2e6;
    --bs-nav-tabs-border-radius: 0.5rem;
    --bs-nav-tabs-link-hover-border-color: #e9ecef #e9ecef #dee2e6;
    --bs-nav-tabs-link-active-color: #495057;
    --bs-nav-tabs-link-active-bg: #fff;
    --bs-nav-tabs-link-active-border-color: #dee2e6 #dee2e6 #fff;
    border-bottom: var(--bs-nav-tabs-border-width) solid var(--bs-nav-tabs-border-color);
}

.nav-tabs .nav-link {
    margin-bottom: calc(var(--bs-nav-tabs-border-width) * -1);
    background: none;
    border: var(--bs-nav-tabs-border-width) solid transparent;
    border-top-left-radius: var(--bs-nav-tabs-border-radius);
    border-top-right-radius: var(--bs-nav-tabs-border-radius);
}

.nav-tabs .nav-link:hover,
.nav-tabs .nav-link:focus {
    isolation: isolate;
    border-color: var(--bs-nav-tabs-link-hover-border-color);
}

.nav-tabs .nav-link.disabled,
.nav-tabs .nav-link:disabled {
    color: var(--bs-nav-link-disabled-color);
    background-color: transparent;
    border-color: transparent;
}

.nav-tabs .nav-link.active,
.nav-tabs .nav-item.show .nav-link {
    color: var(--bs-nav-tabs-link-active-color);
    background-color: var(--bs-nav-tabs-link-active-bg);
    border-color: var(--bs-nav-tabs-link-active-border-color);
}

.nav-tabs .dropdown-menu {
    margin-top: calc(var(--bs-nav-tabs-border-width) * -1);
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}

.dropdown.nav-item .dropdown-menu-animation {
    display: block;
    height: 0;
    transition: all .35s ease;
    padding-top: 0 !important;
    padding-bottom: 0 !important;
    opacity: 0;
}

.dropdown.nav-item .dropdown-menu-animation.show {
    height: 250px;
    opacity: 1;
}

.bg-gradient-dark {
    background-image: linear-gradient(310deg, #141727 0%, #3A416F 100%);
}

.btn-dark:hover,
.btn.bg-gradient-dark:hover {
    background-color: #344767;
    border-color: #344767;
}

.btn-dark .btn.bg-outline-dark,
.btn.bg-gradient-dark .btn.bg-outline-dark {
    border: 1px solid #344767;
}

.btn-dark:not(:disabled):not(.disabled).active,
.btn-dark:not(:disabled):not(.disabled):active,
.show>.btn-dark.dropdown-toggle,
.btn.bg-gradient-dark:not(:disabled):not(.disabled).active,
.btn.bg-gradient-dark:not(:disabled):not(.disabled):active,
.show>.btn.bg-gradient-dark.dropdown-toggle {
    color: color-yiq(#344767);
    background-color: #344767;
}

.btn-dark.focus,
.btn-dark:focus,
.btn.bg-gradient-dark.focus,
.btn.bg-gradient-dark:focus {
    color: #fff;
}

.btn-dark,
.btn.bg-gradient-dark {
    color: #fff;
}

.btn-dark:hover,
.btn.bg-gradient-dark:hover {
    color: #fff;
}

.center {
    display: block;
    margin-top: 100px;
    margin-left: auto;
    margin-right: auto;
    width: 80%;
}

a.tekan:hover,
a.tekan:active {
    background-color: #353535;
}

.position-absolute {
    position: absolute !important;
}

.w-100 {
    width: 100% !important;
}

.z-index-1 {
    z-index: 1 !important;
}

@keyframes placeholder-glow {
    50% {
        opacity: 0.2;
    }
}

.placeholder-wave {
    mask-image: linear-gradient(130deg, #000 55%, rgba(0, 0, 0, 0.8) 75%, #000 95%);
    mask-size: 200% 100%;
    animation: placeholder-wave 2s linear infinite;
}

@keyframes placeholder-wave {
    100% {
        mask-position: -200% 0%;
    }
}

.waves {
    position: relative;
    width: 100%;
    height: 16vh;
    margin-bottom: -7px;
    /*Fix for safari gap*/
    min-height: 100px;
    max-height: 150px;
}

.waves.waves-sm {
    height: 50px;
    min-height: 50px;
}

.waves.no-animation .moving-waves>use {
    animation: none;
}

.wave-rotate {
    transform: rotate(180deg);
}

/* Animation for the waves */
.moving-waves>use {
    animation: move-forever 40s cubic-bezier(0.55, 0.5, 0.45, 0.5) infinite;
}

.moving-waves>use:nth-child(1) {
    animation-delay: -2s;
    animation-duration: 11s;
}

.moving-waves>use:nth-child(2) {
    animation-delay: -4s;
    animation-duration: 13s;
}

.moving-waves>use:nth-child(3) {
    animation-delay: -3s;
    animation-duration: 15s;
}

.moving-waves>use:nth-child(4) {
    animation-delay: -4s;
    animation-duration: 20s;
}

.moving-waves>use:nth-child(5) {
    animation-delay: -4s;
    animation-duration: 25s;
}

.moving-waves>use:nth-child(6) {
    animation-delay: -3s;
    animation-duration: 30s;
}

@keyframes move-forever {
    0% {
        transform: translate3d(-90px, 0, 0);
    }

    100% {
        transform: translate3d(85px, 0, 0);
    }
}

.bottom-0 {
    bottom: 0 !important;
}

.z-index-sticky {
    z-index: 1020;
}

.position-sticky {
    position: sticky !important;
}

@media (min-width: 992px) {
    .navbar-expand-lg {
        flex-wrap: nowrap;
        justify-content: flex-start;
    }

    .navbar-expand-lg .navbar-nav {
        flex-direction: row;
    }

    .navbar-expand-lg .navbar-nav .dropdown-menu {
        position: absolute;
    }

    .navbar-expand-lg .navbar-nav .nav-link {
        padding-right: var(--bs-navbar-nav-link-padding-x);
        padding-left: var(--bs-navbar-nav-link-padding-x);
    }

    .navbar-expand-lg .navbar-nav-scroll {
        overflow: visible;
    }

    .navbar-expand-lg .navbar-collapse {
        display: flex !important;
        flex-basis: auto;
    }

    .navbar-expand-lg .navbar-toggler {
        display: none;
    }

    .navbar-expand-lg .offcanvas {
        position: static;
        z-index: auto;
        flex-grow: 1;
        width: auto !important;
        height: auto !important;
        visibility: visible !important;
        background-color: transparent !important;
        border: 0 !important;
        transform: none !important;
        transition: none;
    }

    .navbar-expand-lg .offcanvas .offcanvas-header {
        display: none;
    }

    .navbar-expand-lg .offcanvas .offcanvas-body {
        display: flex;
        flex-grow: 0;
        padding: 0;
        overflow-y: visible;
    }
}

@media (min-width: 992px) {
    .navbar-vertical.navbar-expand-lg {
        display: block;
        position: fixed;
        top: 0;
        bottom: 0;
        width: 100%;
        max-width: 15.625rem !important;
        overflow-y: auto;
        padding: 0;
        box-shadow: none;
    }

    .navbar-vertical.navbar-expand-lg .navbar-collapse {
        display: block;
        overflow: auto;
        height: calc(100vh - 360px);
    }

    .navbar-vertical.navbar-expand-lg>[class*="contentt"] {
        flex-direction: column;
        align-items: stretch;
        min-height: 100%;
        padding-left: 0;
        padding-right: 0;
    }
}

@media all and (min-width: 992px) and (-ms-high-contrast: none),
(min-width: 992px) and (-ms-high-contrast: active) {
    .navbar-vertical.navbar-expand-lg>[class*="contentt"] {
        min-height: none;
        height: 100%;
    }
}

@media (min-width: 992px) {
    .navbar-vertical.navbar-expand-lg.fixed-start {
        left: 0;
    }

    .navbar-vertical.navbar-expand-lg.fixed-end {
        right: 0;
    }

    .navbar-vertical.navbar-expand-lg .navbar-nav .nav-link {
        padding-top: 0.675rem;
        padding-bottom: 0.675rem;
        margin: 0 1rem;
    }

    .navbar-vertical.navbar-expand-lg .navbar-nav .nav-link .nav-link-text,
    .navbar-vertical.navbar-expand-lg .navbar-nav .nav-link .sidenav-mini-icon,
    .navbar-vertical.navbar-expand-lg .navbar-nav .nav-link .sidenav-normal,
    .navbar-vertical.navbar-expand-lg .navbar-nav .nav-link i {
        pointer-events: none;
    }

    .navbar-vertical.navbar-expand-lg .navbar-nav .nav-item {
        width: 100%;
    }

    .navbar-vertical.navbar-expand-lg .navbar-nav>.nav-item {
        margin-top: 0.125rem;
    }

    .navbar-vertical.navbar-expand-lg .navbar-nav>.nav-item .icon .ni {
        top: 0;
    }

    .navbar-vertical.navbar-expand-lg .navbar-nav>.nav-item>.nav-link .icon svg .color-background {
        fill: #3A416F;
    }

    .navbar-vertical.navbar-expand-lg .navbar-nav>.nav-item>.nav-link .icon svg .color-foreground {
        fill: #141727;
    }

    .navbar-vertical.navbar-expand-lg .lavalamp-object {
        width: calc(100% - 1rem) !important;
        background: theme-color("primary");
        color: color-yiq(#cb0c9f);
        margin-right: 0.5rem;
        margin-left: 0.5rem;
        padding-left: 1rem;
        padding-right: 1rem;
        border-radius: 0.25rem;
    }

    .navbar-vertical.navbar-expand-lg .navbar-nav .nav .nav-link {
        padding-top: 0.417rem;
        padding-bottom: 0.417rem;
        padding-left: 15px;
    }

    .navbar-vertical.navbar-expand-lg .navbar-nav .nav .nav-link>span.sidenav-normal {
        transition: all 0.1s ease 0s;
    }
}

.nav {
    --bs-nav-link-padding-x: 1rem;
    --bs-nav-link-padding-y: 0.5rem;
    --bs-nav-link-font-weight: ;
    --bs-nav-link-color: var(--bs-link-color);
    --bs-nav-link-hover-color: var(--bs-link-hover-color);
    --bs-nav-link-disabled-color: #6c757d;
    display: flex;
    flex-wrap: wrap;
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
}

.navbar {
    --bs-navbar-padding-x: 1rem;
    --bs-navbar-padding-y: 0.5rem;
    --bs-navbar-color: #344767;
    --bs-navbar-hover-color: rgba(52, 71, 103, 0.7);
    --bs-navbar-disabled-color: rgba(52, 71, 103, 0.3);
    --bs-navbar-active-color: rgba(52, 71, 103, 0.9);
    --bs-navbar-brand-padding-y: 0.59375rem;
    --bs-navbar-brand-margin-end: 1rem;
    --bs-navbar-brand-font-size: 0.875rem;
    --bs-navbar-brand-color: rgba(52, 71, 103, 0.9);
    --bs-navbar-brand-hover-color: rgba(52, 71, 103, 0.9);
    --bs-navbar-nav-link-padding-x: 0.5rem;
    --bs-navbar-toggler-padding-y: 0.25rem;
    --bs-navbar-toggler-padding-x: 0.75rem;
    --bs-navbar-toggler-font-size: 1.125rem;
    --bs-navbar-toggler-icon-bg: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%23344767' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    --bs-navbar-toggler-border-color: rgba(52, 71, 103, 0.1);
    --bs-navbar-toggler-border-radius: 0.5rem;
    --bs-navbar-toggler-focus-width: 0.2rem;
    --bs-navbar-toggler-transition: box-shadow 0.15s ease-in-out;
    position: relative;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    padding: var(--bs-navbar-padding-y) var(--bs-navbar-padding-x);
}

.navbar>.contentt,
.navbar>.contentt-fluid,
.navbar>.contentt-sm,
.navbar>.contentt-md,
.navbar>.contentt-lg,
.navbar>.contentt-xl,
.navbar>.contentt-xxl {
    display: flex;
    flex-wrap: inherit;
    align-items: center;
    justify-content: space-between;
}

.page-header {
    padding: 0;
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    background-size: cover;
    background-position: 50%;
}

.shadow {
    box-shadow: 0 0.3125rem 0.625rem 0 rgba(0, 0, 0, 0.12) !important;
}

.blur {
    box-shadow: inset 0px 0px 2px #fefefed1;
    -webkit-backdrop-filter: saturate(200%) blur(30px);
    backdrop-filter: saturate(200%) blur(30px);
    background-color: rgba(255, 255, 255, 0.8) !important;
}

.blur.blur-rounded {
    border-radius: 40px;
}

.navbar-brand {
    padding-top: var(--bs-navbar-brand-padding-y);
    padding-bottom: var(--bs-navbar-brand-padding-y);
    margin-right: var(--bs-navbar-brand-margin-end);
    font-size: var(--bs-navbar-brand-font-size);
    color: var(--bs-navbar-brand-color);
    white-space: nowrap;
}

.navbar-brand:hover,
.navbar-brand:focus {
    color: var(--bs-navbar-brand-hover-color);
}

.min-vh-80 {
    min-height: 80vh !important;
}

.contentt,
.contentt-fluid,
.contentt-sm,
.contentt-md,
.contentt-lg,
.contentt-xl,
.contentt-xxl {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    width: 100%;
    padding-right: calc(var(--bs-gutter-x) * 1);
    padding-left: calc(var(--bs-gutter-x) * 1);
    margin-right: auto;
    margin-left: auto;
    margin-bottom: 50px;
}

@media (min-width: 576px) {

    .contentt,
    .contentt-sm {
        max-width: 540px;
    }
}

.bg-gradient-light {
    background-image: linear-gradient(310deg, #CED4DA 0%, #EBEFF4 100%);
}

@media (min-width: 768px) {

    .contentt,
    .contentt-sm,
    .contentt-md {
        max-width: 720px;
    }
}

@media (min-width: 992px) {

    .contentt,
    .contentt-sm,
    .contentt-md,
    .contentt-lg {
        max-width: 960px;
    }
}

@media (min-width: 1200px) {

    .contentt,
    .contentt-sm,
    .contentt-md,
    .contentt-lg,
    .contentt-xl {
        max-width: 1140px;
    }
}

@media (min-width: 1400px) {

    .contentt,
    .contentt-sm,
    .contentt-md,
    .contentt-lg,
    .contentt-xl,
    .contentt-xxl {
        max-width: 1320px;
    }
}

.justify-content-between {
    justify-content: space-between !important;
}

.position-relative {
    position: relative !important;
}

@media screen and (max-width:1200px) {
    .layarlebar {
        display: none
    }

}

@media screen and (min-width:1200px),
(max-width:765px) {
    .layarkecil {
        display: none
    }
}

@media screen and (min-width:1200px) {
    .layarsedangmengecil {
        display: none;
    }
}

@media screen and (min-width:765px) {
    .layarkuecil {
        display: none
    }
}

@media (min-width: 1920px) {
    .container {
        width: 1700px;
        margin-top: -190px;
        padding-bottom: 100px
    }

    .contentt {
        width: 1700px;
        position: absolute;
        top: -100px;
    }
}
</style>