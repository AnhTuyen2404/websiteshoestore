
      <!-- Footer -->
      {{-- <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <a href="https://github.com/Prajwal100" target="_blank">Admin</a> {{date('Y')}}</span>
          </div>
        </div>
      </footer> --}}
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('backend/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{asset('backend/vendor/chart.js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('backend/js/demo/chart-area-demo.js')}}"></script>
  <script src="{{asset('backend/js/demo/chart-pie-demo.js')}}"></script>

  @stack('scripts')

  <script>
    setTimeout(function(){
      $('.alert').slideUp();
    },4000);
  </script>
  <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
          <div class="copyright">
              <p>Copyright © Designed &amp; Developed by <a href="../index.htm" target="_blank">DexignLab</a> 2021</p>
          </div>
      </div>
      <!--**********************************
          Footer end
      ***********************************-->

  <!--**********************************
         Support ticket button start
      ***********************************-->
  
      <!--**********************************
         Support ticket button end
      ***********************************-->


</div>
  <!--**********************************
      Main wrapper end
  ***********************************-->

  <!--**********************************
      Scripts
  ***********************************-->
  <!-- Required vendors -->
<script src="{{('https://kit.fontawesome.com/1d46ad37f8.js')}}" crossorigin="anonymous"></script>
<script src="{{("backend/vendor/global/global.min.js")}}"></script>
<script src="{{("backend/vendor/chart.js/Chart.bundle.min.js")}}"></script>
<script src="{{("backend/vendor/jquery-nice-select/js/jquery.nice-select.min.js")}}"></script>

<!-- Apex Chart -->
<script src="{{("backend/vendor/apexchart/apexchart.js")}}"></script>

<script src="{{("backend/vendor/chart.js/Chart.bundle.min.js")}}"></script>

<!-- Chart piety plugin files -->
  <script src="{{("backend/vendor/peity/jquery.peity.min.js")}}"></script>
<!-- Dashboard 1 -->
<script src="{{("backend/js/dashboard/dashboard-1.js")}}"></script>

<script src="{{("backend/vendor/owl-carousel/owl.carousel.js")}}"></script>

<script src="{{("backend/js/custom.min.js")}}"></script>
<script src="{{("backend/js/dlabnav-init.js")}}"></script>
<script src="{{("backend/js/demo.js")}}"></script>
<script src="{{("backend/js/styleSwitcher.js")}}"></script>

  @stack('scripts')

<script>
  function cardsCenter()
  {
    
    /*  testimonial one function by = owl.carousel.js */
    

    
    jQuery('.card-slider').owlCarousel({
      loop:true,
      margin:0,
      nav:true,
      //center:true,
      slideSpeed: 3000,
      paginationSpeed: 3000,
      dots: true,
      navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
      responsive:{
        0:{
          items:1
        },
        576:{
          items:1
        },	
        800:{
          items:1
        },			
        991:{
          items:1
        },
        1200:{
          items:1
        },
        1600:{
          items:1
        }
      }
    })
  }
  
  jQuery(window).on('load',function(){
    setTimeout(function(){
      cardsCenter();
    }, 1000); 
  });
  jQuery(document).ready(function(){
    setTimeout(function(){
      dlabSettingsOptions.version = 'dark';
      new dlabSettings(dlabSettingsOptions);
    },1500)
  });
  
</script>
@stack('scripts')
<script>
  $(document).ready(function(){

    fetch_delivery();

      function fetch_delivery(){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url : '{{url('/select-feeship')}}',
                    method: 'POST',
                    data:{_token:_token},
                    success:function(data){
                      $('#load_delivery').html(data);
                    }
                });
            }
            $(document).on('click', '.delete_feeship', function(){
                var feeship_id = $(this).data("feeship_id");

                // Hiển thị hộp thoại xác nhận
                if (confirm("Bạn có chắc chắn muốn xóa không?")) {
                  
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:'{{ url('/delete-delivery') }}',
                        method:"POST",
                        data:{feeship_id:feeship_id, _token:'{{ csrf_token() }}'},
                        success:function(data){
                            fetch_delivery();
                        }
                    });
                }
            });

      $(document).on('blur','.fee_feeship_edit',function(){

                  var feeship_id = $(this).data('feeship_id');
                  var fee_value = $(this).text();
                  var _token = $('input[name="_token"]').val();
                  // alert(feeship_id);
                  // alert(fee_value);
                  $.ajax({
                      url : '{{url('/update-delivery')}}',
                      method: 'POST',
                      data:{feeship_id:feeship_id, fee_value:fee_value, _token:_token},
                      success:function(data){
                        fetch_delivery();
                      }
                  });

                  });
      $('.choose').on('change',function(){
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';

              
                // alert(action);
                //  alert(ma_id);
                //   alert(_token);

                if(action=='city'){
                    result = 'province';
                }else{
                    result = 'wards';
                }
                $.ajax({
                    url : '{{url('/select-delivery')}}',
                    method: 'POST',
                    data:{action:action,ma_id:ma_id,_token:_token},
                    success:function(data){
                      $('#'+result).html(data);     
                    }
                });
            }); 
      $('.add_delivery').click(function(){

          var city = $('.city').val();
          var province = $('.province').val();
          var wards = $('.wards').val();
          var fee_ship = $('.fee_ship').val();
          var _token = $('input[name="_token"]').val();
          // alert(city);
          // alert(province);
          // alert(wards);
          // alert(fee_ship);
          $.ajax({
              url : '{{url('/insert-delivery')}}',
              method: 'POST',
              data:{city:city, province:province, _token:_token, wards:wards, fee_ship:fee_ship},
              success:function(data){
                  fetch_delivery();
                  
              }
          });
  });
})
</script>
<script>
  document.getElementById('search-input').addEventListener('keyup', function() {
      const query = this.value.toLowerCase();
      const accountList = document.getElementById('account-list');
      const rows = accountList.getElementsByTagName('tr');
      
      for (let row of rows) {
          const name = row.cells[1].textContent.toLowerCase();
          if (name.includes(query)) {
              row.style.display = '';
          } else {
              row.style.display = 'none';
          }
      }
  });
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function updateStatus(customerId) {
            if (confirm('Are you sure you want to proceed with this action?')) {
                const newStatus = $('#status-update-' + customerId).val();
    
                // Gọi Ajax
                $.ajax({
                    type: 'POST',
                    url: `/update-account-status/${customerId}`,
                    data: {
                        status: newStatus,
                        _token: $('meta[name="csrf-token"]').attr('content'),
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            // Hiển thị thông báo thành công
                            alert(response.message);
                        } else {
                            // Xử lý lỗi
                            alert('Error: ' + response.message);
                        }
                    },
                    error: function () {
                        // Xử lý lỗi kết nối hoặc lỗi server
                        alert('Error.');
                    }
                });
            }
        }
    </script>
    <script>
      function confirmDelete(accountId) {
          var result = confirm("Are you sure you want to delete this account?");
  
          if (result) {
              // Nếu người dùng chấp nhận xóa, thực hiện hành động xóa
              window.location.href = '/account/' + accountId;
          }
      }
  </script>
