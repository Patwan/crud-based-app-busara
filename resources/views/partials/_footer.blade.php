 <!-- copyright -->
    <div class="copyw3-agile">
        <p> © {{date('M j, Y') }}. All rights reserved </a></p>
    </div>
    <!-- //copyright --> 
    <!-- js -->
    <script src="{{ asset('js/jquery-1.12.3.js') }}"> </script>
    <script src="{{ asset('js/parsley.js') }}"> </script>
    <script>
        $(".info-w3lsitem .btn").click(function() {
              $(".main-agileinfo").toggleClass("log-in");
        });
        $(".container-form .btn").click(function() {
              $(".main-agileinfo").addClass("active");
        });
    </script>
    <!-- //js --> 
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
    </script>
  <!-- END COPYRIGHT-->