
<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');


 ?>

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Client Report</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Client Report</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
 <img src='pages/client_report.jpg' />
    

<?php include('footer.php');?>




<script type="text/javascript">

   $(document).ready(function () {
            $("ul[id*=myid] li").click(function () {
             //alert(this.id);
var client_days =  this.id;
            
                 $('#span_date').html(client_days);
                 $('#hidden_date').val(client_days);
            });
        });
     
</script>

 <!-- <script>
        $('#btn_save').click(function(){


          
var event_date = $('#reportrange span').html();
            alert(event_date);
            
            var client_event = $('#clients_type').val();
           // var event_date = $('#span_date').val();
            alert(client_event);
           //  alert(event_date);
             $.ajax({
        
                type:'POST',
                 url: 'fetch_table.php',
                data: {client_event : client_event , event_date : event_date },
                   success:function(res){

                    alert(res);
                     $("#birthdayDataTable").show();


                    /*    if(res.status = 'success'){
                            $('#count').attr('data-value',res.total);
                            $('#heading').html(res.report);
                            $('#easyStats').css('display','block');
                            $('#targetDataTable').css('display','block');

                            if(res.type == 'birthday')
                            {
                              alert();
                                $("#targetDataTable").hide();
                                $("#birthdayDataTable").show();
                                //load_birthdaydata_table(res.type,res.start_date,res.end_date);

                            }
                            else
                            {
                                $("#birthdayDataTable").hide();
                                $("#targetDataTable").show();
                                load_data_table(res.type,res.start_date,res.end_date);

                            }

                            $('.counter').counterUp();
                        }*/
                    }
            }); 
        });
    </script> -->


   <!--  <script>
        $('#save-form').click(function(){
            var dateRange = $('#reportrange span').html();
            var client = $('#clients_type').val();
            if(client ==''){
                $.showToastr('Please Select a Type','error');
            }else {
                $.easyAjax({
                    url:'https://fitsigma.froid.works/gym-admin/client-report',
                    container:'#createTargetReport',
                    type:"POST",
                    data:{date_range:dateRange,client_type:client,_token:'V3373OC6MbWmDVE7au7N4vT9zjU3Jk5Hq4pffBhf'},
                    success:function(res){
                        if(res.status = 'success'){
                            $('#count').attr('data-value',res.total);
                            $('#heading').html(res.report);
                            $('#easyStats').css('display','block');
                            $('#targetDataTable').css('display','block');

                            if(res.type == 'birthday')
                            {
                                $("#targetDataTable").hide();
                                $("#birthdayDataTable").show();
                                load_birthdaydata_table(res.type,res.start_date,res.end_date);

                            }
                            else
                            {
                                $("#birthdayDataTable").hide();
                                $("#targetDataTable").show();
                                load_data_table(res.type,res.start_date,res.end_date);

                            }

                            $('.counter').counterUp();
                        }
                    }
                });
            }

        });
    </script> -->