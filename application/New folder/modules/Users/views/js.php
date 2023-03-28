<script type="text/javascript">
    jQuery(function($) {
        $('.submit_form').click(function(){
            $('#register-form').submit();
        });
        $('.division_checkbox').click(function(){

            var kabinat_id = $(this).attr('kabinat_ref');
            var kabina_id = $(this).attr('kabina_ref');
            if($(this).prop('checked') == true)
            {
                $(this).prop('checked',true);   
                $('.kabinat_id_'+kabinat_id).prop('checked',true);   
                $('.kabina_id_'+kabina_id).prop('checked',true);   

            }else
            {      
                var count_kabina_check = 0;
                $('.ace-checkbox-2').each(function(){
                    if($(this).attr('kabina_ref') == kabina_id)
                    {
                        count_kabina_check++;    
                    }
                });
                if(count_kabina_check > 0)
                {
                    $('.kabina_id_'+kabina_id).prop('checked',false);    
                }   
            } 

        }); 
		
		
		
		
        $(".search_country").change(function(){
//alert("ee");
            var json = {};
            json['country_id'] = $(this).val();
            var request = $.ajax({
                url: "<?php echo base_url('Hierarchy/get_state_byid'); ?>",
                type: "POST",
                data: json,
                dataType: "html",

                success : function(_return)
                {
                    console.log(_return);
                    $('.state').html(_return); 
                }
            });  

        });
		
		
		$("#owe").change(function()
		{
			var owe=$("#owe").val();
			var apr=$("#apr").val();
			if(apr == "")
			{
				
			}else
			{
				var final1 =owe/100 * apr;
				$("#int_rate").val(final1);
			}
			
		});

        var user_type = '<?php echo $this->session->userdata('user_type'); ?>';
        var oTable1 = $('#sample-table-2').DataTable( {
                <?php if($this->session->userdata('user_type') == 3){ ?>
                
                    "aoColumns": [
                            { "bSortable": true },
                            null,null,null,null,null,null,
                            { "bSortable": false }
                    ]
                <?php }else{ ?>
                    "aoColumns": [
                            { "bSortable": true },
                            null,null,null,null,null,null,null,null,
                            { "bSortable": false },
                            { "bSortable": false }
                    ]
            <?php } ?>
            } );

			 var oTable1 = $('#deal_form_view').DataTable( {               
                    "aoColumns": [
                            { "bSortable": true },
							null,null,null,null,null,null,	
	                        
                            
							
							{ "bSortable": false }
                    ]               
            } );
						 var oTable1 = $('#inbox_form').DataTable( {               
                    "aoColumns": [
                            { "bSortable": true },
							null,null,null,null,null,null,
							  <?php                  
					//Agent
				if($this->session->userdata('user_type') != 4)
				{
				?>   
							null,
							<?php
				}					
					if($this->session->userdata('edit_deal') != ""){
                            ?>
							null,
							<?php
							}
							?>
							<?php
							if($this->session->userdata('view_pdf') != ""){
                            ?>
							null,
							<?php
							}
							?>	
							{ "bSortable": false }
                    ]               
            } );
			
			 var oTable1 = $('#sent_form').DataTable( {               
                    "aoColumns": [
                            { "bSortable": true },
							null,null,null,null,null,null,null,	
							{ "bSortable": false }
                    ]               
            } );
			
			
			 var oTable1 = $('#saved_form_list').DataTable( {               
                    "aoColumns": [
                            { "bSortable": true },
							null,null,null,null,null,null,null,
							<?php
									
					if($this->session->userdata('edit_deal') != ""){
                            ?>
							null,
							<?php
							}
							?>
							{ "bSortable": false }
                    ]               
            } );
			
			
			 var oTable1 = $('#deal_form').DataTable( {               
                    "aoColumns": [
                            { "bSortable": true },
							null,null,null,null,null,null,null,
							
							<?php
								if($this->session->userdata('update_deal') != ""){
                              ?>
								null,	
								<?php
								}
								?>
								<?php
								if($this->session->userdata('update_fee') != ""){
                              ?>
								null,	
								<?php
								}
								?>
							
								<?php
								if($this->session->userdata('view_pdf') != ""){
                              ?>
								null,	
								<?php
								}
								?>
                            
                            
							
							{ "bSortable": false }
                    ]               
            } );
			
			 var oTable1 = $('#saved_form').DataTable( {               
                    "aoColumns": [
                            { "bSortable": true },
                           null,null,null,null,null,	
						
								<?php
								if($this->session->userdata('update_saved_deal') != ""){
                              ?>
								null,	
								<?php
								}
								?>
								<?php
								if($this->session->userdata('view_saved_pdf') != ""){
                              ?>
								null,	
								<?php
								}
								?>
                            { "bSortable": false }
                    ]               
            } );
			
			
			
        $('#name_search').on( 'keyup', function () {
            oTable1
                .columns( 2 )
                .search( this.value )
                .draw();
        } );

        $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
        function tooltip_placement(context, source) {
            var $source = $(source);
            var $parent = $source.closest('table')
            var off1 = $parent.offset();
            var w1 = $parent.width();

            var off2 = $source.offset();
            var w2 = $source.width();

            if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
            return 'left';
        }

        $(".status").change(function(){
            var _status = $(this).val();
            var ref     = $(this).attr('ref'); 
            if(_status == 0)
            { 
                $(this).val(1);
                var status_new = 1; 
                $(this).prop('checked',true); 
            }else
            {
                $(this).val(0);
                var status_new = 0;
                $(this).prop('checked',false);   
            }

            if(ref != null)
            {
                var json = {};

                json['id']       = ref;
                json['status']   = status_new;
                var request = $.ajax({
                    url: "<?php echo base_url('Users/change_user_status'); ?>",
                    type: "POST",
                    data: json,
                    dataType: "json",

                    success : function(_return)
                    {
                        if(_return['_return'] > 0)
                        {

                            $.gritter.add({
                                // (string | mandatory) the heading of the notification
                                title: 'Status Changed!',
                                // (string | mandatory) the text inside the notification
                                text: 'User Status Changed Successfully.',
                                class_name: 'gritter-success  gritter-light'
                            });

                            return false;

                        }   
                    }
                });
            } 
        });


        $(".is_print").change(function(){
            var _status = $(this).val();
            var ref     = $(this).attr('ref'); 
            if(_status == 0)
            { 
                $(this).val(1);
                var status_new = 1; 
                $(this).prop('checked',true); 
            }else
            {
                $(this).val(0);
                var status_new = 0;
                $(this).prop('checked',false);   
            }

            if(ref != null)
            {
                var json = {};

                json['id']       = ref;
                json['status']   = status_new;
                var request = $.ajax({
                    url: "<?php echo base_url('Users/change_user_is_print'); ?>",
                    type: "POST",
                    data: json,
                    dataType: "json",

                    success : function(_return)
                    {
                        if(_return['_return'] > 0)
                        {

                            $.gritter.add({
                                // (string | mandatory) the heading of the notification
                                title: 'Is print Status Changed!',
                                // (string | mandatory) the text inside the notification
                                text: 'Is print Status Changed Successfully.',
                                class_name: 'gritter-success  gritter-light'
                            });

                            return false;

                        }   
                    }
                });
            } 
        });



        $("#changepassword").change(function(){
            var change_status = $(this).val();

            if(change_status == 0)
            {
                $('input[type="password"]').prop('disabled',false); 
                $(this).val(1);
            }else
            {
                $('input[type="password"]').prop('disabled',true); 
                $(this).val(0);   
            }
        });


        $('#username').blur(function(){
            var json = {};
            json['username'] = $('#username').val();
            json['id']       = $('#id').val();
            var request = $.ajax({
                url: "<?php echo base_url('Users/check_user_exists'); ?>",
                type: "POST",
                data: json,
                dataType: "json",

                success : function(_return)
                {
                    if(_return['_return'] > 0)
                    {
                        $('input[name="username"]').rules('add', {
                            equalTo:'1',
                            messages:   {
                                equalTo: ' User Name Already Exists can not be created again.'
                            }
                        });
                        // trigger immediate validation to update message
                        $('input[name="username"]').valid();
                        $('input[name="username"]').rules('remove','equalTo');

                        var old_username = $('input[name="username"]').attr('old-username');
                        if(old_username != null)
                        {
                            $('input[name="username"]').val(old_username);  
                        }else
                        {
                            $('input[name="username"]').val(''); 
                        }

                    }  
                }
            });
        });  

        $('.form-validate').validate({

            errorElement: 'div',
            errorClass: 'help-block',
            focusInvalid: false,
            rules: {
                username: {
                    required: true
                },
                email: {
                    required: true,
                    email:true
                },
                password: {
                    required: true,
                    minlength: 5
                },
                retypepassword: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },

            },

            messages: {
                email: {
                    required: " Please provide a valid email.",
                    email: "    Please provide a valid email."
                },
                password: {
                    required: " Please specify a password.",
                    minlength: "    Please specify a secure password."
                },
                subscription: " Please choose at least one option",
                gender: "   Please choose gender",
                agree: "    Please accept our policy"
            },
            invalidHandler: function (event, validator) { //display error alert on form submit
                $('.alert-danger', $('.form-validate')).show();
            },

            highlight: function (e) {
                $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
            },

            success: function (e) {
                $(e).closest('.form-group').removeClass('has-error').addClass('has-info');
                $(e).remove();
            },
            errorPlacement: function (error, element) {
                error.insertAfter(element.parent());
            },

        });
     


   $('.form-validate1').validate({

            errorElement: 'div',
            errorClass: 'help-block',
            focusInvalid: false,
            rules: {
                deal_date: {
                    required: true
                },
				 send_status: {
                    required: true
                },

            },

            messages: {
                deal_date: " Please select deal date",
                send_status: " Please select deal status"
            },
            invalidHandler: function (event, validator) { //display error alert on form submit
                $('.alert-danger', $('.form-validate')).show();
            },

            highlight: function (e) {
                $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
            },

            success: function (e) {
                $(e).closest('.form-group').removeClass('has-error').addClass('has-info');
                $(e).remove();
            },
            errorPlacement: function (error, element) {
                error.insertAfter(element.parent());
            },

        });
     
	 // Direct change value in data base on for changing status
        setTimeout(function(){
            $('.alert-success').remove();
            }, 2000);  
        setTimeout(function(){
            $('.alert-danger').remove();
            }, 2000);
    });


</script>