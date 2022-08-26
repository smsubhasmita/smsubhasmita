<?php
         $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
         $actual_url=get_main_url($actual_link);
        if(isset($_GET)){
            $status=isset($_GET['status'])?$_GET['status']:'';
            if($status == 200){ 
                echo "<script>  Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Registered Successfully !',
                        timer: 5000
                    }); </script>";
                echo "<script>setTimeout(() => {
                    window.location.href='".$actual_url."';
                }, 2000);</script>";
            }
            elseif($status == 201){ 
                echo "<script>  Swal.fire({
                        icon: 'success',
                        title: 'Updated',
                        text: 'Updated Data Successfully !',
                        timer: 3000
                    }); </script>";
                echo "<script>setTimeout(() => {
                    window.location.href='".$actual_url."';
                }, 2000);</script>";
            }
            
            elseif($status == 500){
                // echo '<script src=" https://cdn.jsdelivr.net/npm/sweetalert2"></script>';
                echo "<script>  Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error Occured! Try again ..',
                    timer: 3000
                }); </script>";
            }
            
            elseif($status == 400){
                // echo '<script src=" https://cdn.jsdelivr.net/npm/sweetalert2"></script>';
                echo "<script>  Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please Enter All fields .',
                    timer: 2000
                });</script>";
             // 
            }

            elseif($status == 401){
               //$cmsg= ($_GET['cmsg'])?$_GET['cmsg']:'';
                // echo '<script src=" https://cdn.jsdelivr.net/npm/sweetalert2"></script>';
                echo "<script>  Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text:  'Already Exists !',
                    timer: 2000
                }); </script>";
            }
           
        }

        function get_main_url($string){
            $pos = strpos($string, '?');
            return substr($string,0,$pos);
        }
       
    ?>

<!-- ======= Footer ======= -->

<footer id="footer">
        <div class="container-fluid  py-4 fix-footer">
            <div class="col-12 text-center">
                <div class="copyright">
                  &copy; Copyright <?= date('Y');?> All rights reserved by Government of Odisha.
                </div>
            </div>
        </div>
    </footer>
  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <!-- <div id="preloader"></div>-->
  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="../assets/vendor/counterup/counterup.min.js"></script>
  <script src="../assets/vendor/venobox/venobox.min.js"></script>
  <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script>
      /**
    $(function() {
        $(this).bind("contextmenu", function(e) {
            e.preventDefault();
        }); 
    });
    function fire() {
        var url = "http://ipinfo.io/json?callback=func";
        var script = document.createElement('script');
        script.src = url;
        script.async = true;
        document.getElementsByTagName('head')[0].appendChild(script);
    }
    function func(response) {
        //alert(response.hostname); // for example hostname
        var ip=response.ip;
        var loc =response.loc;
        var country =response.country;
        var region=response.region;
        var city=response.city;
        var postal=response.postal;
        var hostname =response.hostname;
        var org =response.org;
        var timezone=response.timezone;
        $.ajax({
            type: 'POST',
            url:"index.php/MyController/visitor_entry_log ",
            data: {
                ip: ip,
                loc:loc,
                country:country,
                region:region,
                city:city,
                postal:postal,
                hostname:hostname,
                org:org,
                timezone:timezone
            },
            cache: false,
            success: function(dataResult) {
               // console.log(dataResult);
            },
            error: function(jqXHR, reason, ex) {
                $('.error').text(reason + "-" + jqXHR.status + " ie " + jqXHR.statusText);
                console.log(jqXHR.responseText);
            }
        });
    } 
    document.onload = fire();
    window.onload = function(){
       setTimeout("console.clear()",3000) ;
    } */
  </script>
</body>
</html> 
