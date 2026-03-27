</section>
      </section>
      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2019 &copy; PuriDev - <a href="http://dgsign.id">Dgsign.id</a>.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?=base_url('public/backend/')?>js/jquery.js"></script>
    <script src="<?=base_url('public/backend/')?>js/bootstrap.bundle.min.js"></script>
    <script class="include" type="text/javascript" src="<?=base_url('public/backend/')?>js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?=base_url('public/backend/')?>js/jquery.scrollTo.min.js"></script>
    <script src="<?=base_url('public/backend/')?>js/slidebars.min.js"></script>
    <script src="<?=base_url('public/backend/')?>js/jquery.nicescroll.js" type="text/javascript"></script>

    <?php
    if(isset($js) && is_array($js)){
      foreach($js as $s){
        ?>
    <script src="<?=$s?>" type="text/javascript"></script>
        <?php
      }
    }
    ?>

    <script src="<?=base_url('public/backend/')?>js/respond.min.js" ></script>

    <!--common script for all pages-->
    <script src="<?=base_url('public/backend/')?>js/common-scripts.js"></script>
    <script src="<?=base_url('public/backend/')?>js/jquery.validate.min.js"></script>
    <?php
    if(isset($scripts)){
      $this->load->view('backend/'.$scripts);
    }
    ?>
  </body>
</html>
