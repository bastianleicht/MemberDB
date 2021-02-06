<?php
/*
 *   Copyright (c) 2021 Bastian Leicht
 *   All rights reserved.
 *   https://github.com/routerabfrage/License
 */
?>
<footer class="footer">
    <div class="w-100 clearfix">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2021 <a href="https://bastianleicht.com" target="_blank">Bastian Leicht</a>. All rights reserved. Made with <i class="mdi mdi-heart-outline text-danger"></i>.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a href="<?= $helper->url()?>impressum">Impressum</a> | <a href="<?= $helper->url()?>datenschutz">Datenschutz</a> | <a href="<?= $helper->url()?>agb">AGB</a></span>
    </div>
</footer>
</div>
</div>
</div>

<!-- base:js -->
<script src="<?= $helper->cdnUrl() ?>vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="<?= $helper->cdnUrl() ?>js/off-canvas.js"></script>
<script src="<?= $helper->cdnUrl() ?>js/hoverable-collapse.js"></script>
<script src="<?= $helper->cdnUrl() ?>js/template.js"></script>
<script src="<?= $helper->cdnUrl() ?>js/settings.js"></script>
<script src="<?= $helper->cdnUrl() ?>js/todolist.js"></script>
<!-- endinject -->
<!-- plugin js for this page -->
<script src="<?= $helper->cdnUrl() ?>vendors/chart.js/Chart.min.js"></script>
<!-- End plugin js for this page -->
<!-- Custom js for this page-->
<script src="<?= $helper->cdnUrl() ?>js/dashboard.js"></script>
<script src="<?= $helper->cdnUrl() ?>js/todolist.js"></script>
<!-- End custom js for this page-->
</body>

</html>