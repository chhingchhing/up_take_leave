<div id="feedback_bar"></div>
<!-- Load JavaScript
    ================================================== -->
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script-->
    <?php
    foreach($assetsObj->get_js_files() as $js_file)
    {
    ?>
    <script type="text/javascript" src="<?php echo $js_file['path'].'?';?>"></script>
    <?php
    }
    ?>

    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>