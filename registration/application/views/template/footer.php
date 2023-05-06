<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <!-- For me the problem was: I was using the slim build of jQuery, which had some things removed, ajax being one of them. You have to add the "uncompressed" version of J-query, a little bit tricky ! -->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> <!-- new -->
    <script>
      $(document).ready( function() {
        $('#usertable').DataTable({
        "order" : [[ 0, 'desc' ]]
      })
      });
    </script>

    <script>
      $(document).ready(function(){

        $('.confirm-delete').click(function(e){
            e.preventDefault();

            confirmDialog = confirm("Do you want to delete this user?");
            if(confirmDialog){
              var id = $(this).val();
              //alert(id);
              $.ajax({
                type: "POST",
                url: "users/confirmdelete/"+id, 
                success: function(response){
                    alert("User deleted successfully. Please reload the page");
                    window.location.reload();
                }
              });
            } 
        });

      });
    </script>
    
  </body>
</html>
<script>  
 $(document).ready(function(){  
    $('#email').change(function(){  
        var email = $('#email').val();  
        if(email != '')  
        {  
            $.ajax({  
                url:"<?php echo base_url(); ?>Frontend/UserController/check_email_avalibility",  
                method:"POST",  
                data:{email:email},  
                success:function(data){ 
                    $('#email_result').html(data);
                    if (data.trim() === '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Email Already register</label>') 
                    {
                        $('#submitBtn').prop('disabled', true);
                    } else { 
                         console.log(data); 
                        $('#submitBtn').prop('disabled', false);
                    }
                }  
            });  
        }  
    });  
});
  
 </script>

<script>  
 $(document).ready(function(){  
      $('#mobile').change(function(){  
           var mobile = $('#mobile').val();  
           if(mobile != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>Frontend/UserController/check_mobile_avalibility",  
                     method:"POST",  
                     data:{mobile:mobile},  
                     success:function(data){  
                         $('#mobile_result').html(data);  
                         if (data.trim() === '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Mobile Number is already register</label>') 
                         {
                              $('#submitBtn').prop('disabled', true);
                         } else 
                         {
                              $('#submitBtn').prop('disabled', false);
                         }
                     }  
                });  
           }  
      });  
 });
 </script>

 