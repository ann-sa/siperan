
$(document).ready(function(){

 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"<?php echo base_url(); ?>index.php/TU/notif",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    // $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }

 load_unseen_notification();


 $(document).on('click', '.notif', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });

 setInterval(function(){
  load_unseen_notification();
 }, 5000);

});
