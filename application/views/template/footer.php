      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2019 <div class="bullet"></div> Created By <a href="sanedu.id">Sanedu</a>
        </div>
        <div class="footer-right">
          Version 1.0.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?=base_url()?>/assets_stisla/js/stisla.js"></script>
  

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?=base_url()?>/assets_stisla/js/scripts.js"></script>
  <script src="<?=base_url()?>/assets_stisla/js/custom.js"></script>
  <script type="text/javascript">
    window.goBack = function (e){
        var defaultLocation = "http://www.mysite.com";
        var oldHash = window.location.hash;

        history.back(); // Try to go back

        var newHash = window.location.hash;

        /* If the previous page hasn't been loaded in a given time (in this case
        * 1000ms) the user is redirected to the default location given above.
        * This enables you to redirect the user to another page.
        *
        * However, you should check whether there was a referrer to the current
        * site. This is a good indicator for a previous entry in the history
        * session.
        *
        * Also you should check whether the old location differs only in the hash,
        * e.g. /index.html#top --> /index.html# shouldn't redirect to the default
        * location.
        */

        if(
            newHash === oldHash &&
            (typeof(document.referrer) !== "string" || document.referrer  === "")
        ){
            window.setTimeout(function(){
                // redirect to default location
                window.location.href = defaultLocation;
            },1000); // set timeout in ms
        }
        if(e){
            if(e.preventDefault)
                e.preventDefault();
            if(e.preventPropagation)
                e.preventPropagation();
        }
        return false; // stop event propagation and browser default event
    }
  </script>

  <!-- Page Specific JS File -->
  <?php 
  if(!empty($script)){
      $this->load->view($script);
  }
  ?>
</body>
</html>
