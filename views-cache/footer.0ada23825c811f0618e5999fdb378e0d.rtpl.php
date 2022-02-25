<?php if(!class_exists('Rain\Tpl')){exit;}?>  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    
  </footer>

  <!-- Control Sidebar -->
  <!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="/ecommerce/res/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/ecommerce/res/admin/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="/ecommerce/res/admin/dist/js/app.min.js"></script>
<script type="text/javascript">
  $('textarea').keyup(function() {  
    
    var characterCount = $(this).val().length,
        current = $('#current'),
        maximum = $('#maximum'),
        theCount = $('#the-count');
      
    current.text(characterCount);
      maximum.css('color','#666');
      theCount.css('font-weight','normal')
  });

</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
