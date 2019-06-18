<?php include 'template/header.php' ?>
    <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <!-- Container -->
            <div class="container-fluid">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span><?php echo $title; ?></h4>
                    <button type="button" class="btn btn-success btn-wth-icon icon-wthot-bg btn-rounded icon-right pull-right" onclick="add_data()">
                        <span class="btn-text">Add New</span><span class="icon-label"><i class="ion ion-md-add-circle"></i>
                    </button>  
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title"><?php echo $subtitle; ?></h5>                            
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <table id="mydata" class="table table-hover w-100 display pb-30">
                                            <thead>
                                                <tr>
                                                    <th>Website Name</th>
                                                    <th>Bio</th>
                                                    <th>Email</th>
                                                    <th>Contact Number</th>
                                                    <th>Address</th>
                                                    <th>Description</th>
                                                    <th>Keyword</th>
                                                    <th>Favicon Web</th>
                                                    <th style="text-align:center;">Action</th>                                                    
                                                </tr>
                                            </thead>
                                            <tbody id="show_data"></tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Website Name</th>
                                                    <th>Bio</th>
                                                    <th>Email</th>
                                                    <th>Contact Number</th>
                                                    <th>Address</th>
                                                    <th>Description</th>
                                                    <th>Favicon Web</th>
                                                    <th style="text-align:center;">Action</th>     
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>                      
                    </div>
                </div>
                <!-- /Row -->                   
            </div>
            <!-- /Container -->
        
            <!-- Footer -->
            <?php include 'template/sub_footer.php'; ?>
            <!-- /Footer -->
        </div>
<div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Website Name</label>
                        <div class="col-md-10">
                            <input type="hidden" name="id" class="form-control">                              

                            <input type="text" name="title"class="form-control" placeholder="title">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Email</label>
                        <div class="col-md-10">
                            <input type="email" name="email" class="form-control" placeholder="email">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Contact Number</label>
                        <div class="col-md-10">
                            <input type="text" name="contact" class="form-control" placeholder="contact Number">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Bio</label>
                        <div class="col-md-10">
                            <textarea name="bio" rows="5" class="form-control"></textarea>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Descriptions</label>
                        <div class="col-md-10">
                            <textarea name="description" rows="2" class="form-control"></textarea>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Keyword</label>
                        <div class="col-md-10">
                            <textarea name="keyword" rows="2" class="form-control"></textarea>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Address</label>
                        <div class="col-md-10">
                            <textarea name="address" rows="3" class="form-control"></textarea>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group row" id="photo-preview">
                        <label class="control-label col-md-3">Favicon</label>
                        <div class="col-md-9">
                            (No photo)
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" id="label-photo">Upload Favicon </label>
                        <div class="col-md-4">
                            <input name="favicon" type="file">
                            <span class="help-block"></span>
                        </div>
                    </div>                      
                </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                    </div>
            </div>
        </div>
    </div>
</div>    
   <!-- /Main Content -->
<?php include 'template/footer.php' ?>
<script type="text/javascript">
    "use strict"; 
    var save_method;
    var table;
    var base_url = '<?php echo base_url();?>';

    $(document).ready( function () {
        show_data()
        // $('#mydata').DataTable();
        
        $("input").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("textarea").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("select").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
    });

    function show_data()
    {
        $.ajax({
            type  : 'get',
            url  : "<?php echo site_url('settings/ajax_list')?>",
            async : false,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    var dataStatus
                    var photo
                   if (data[i].favicon !== null) {
                        $('#label-photo').text('Change Favicon'); // label photo upload
                        $('#photo-preview div').html('<img src="'+base_url+'upload/setting/'+data[i].favicon+'" class="img-responsive" >'); // show photo
                        $('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="'+data[i].favicon+'"/> Remove photo when saving'); // remove photo

                        photo = '<a href="'+ base_url+ 'upload/setting/'+ data[i].favicon+'" target="_blank"><img src="'+ base_url +'upload/setting/'+ data[i].favicon+'"  class="img-responsive" width="75" height="77"/></a>'
                    } else {
                        $('#label-photo').text('Upload Favicon'); // label photo upload
                        $('#photo-preview div').text('(No photo)');
                        photo = "No Image"
                    }

                    $('#photo-preview').show(); 
                
                    html += '<tr>'+
                            '<td>'+data[i].title+'</td>'+
                            '<td>'+data[i].bio.substring(0,70)+'</td>'+
                            '<td>'+data[i].email+'</td>'+
                            '<td>'+data[i].contact+'</td>'+
                            '<td>'+data[i].address.substring(0,50)+'</td>'+
                            '<td>'+data[i].description.substring(0,50)+'</td>'+
                            '<td>'+data[i].keyword.substring(0,50)+'</td>'+
                            '<td>'+photo+'</td>'+
                            '<td style="text-align:center;">'+
                                '<a href="javascript:void(0);" class="btn btn-info btn-sm item_id" onclick="edit_data('+data[i].id+')">Edit</a>'
                            '</td>'+
                            '</tr>';
                }
                $('#show_data').html(html);
            },
            error: function (jqXHR, textStatus)
            {
                alert('Error get data from ajax');
            }

        });
    }

    function add_data()
    {
        save_method = 'add';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('#modal_form').modal('show'); 
        $('.modal-title').text('Add Data');

        $('#photo-preview').hide();

        $('#label-photo').text('Upload Favicon');
    }

    function edit_data(id)
    {
        save_method = 'update';
        $('#form')[0].reset(); 
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();

        $.ajax({
            url : "<?php echo site_url('settings/ajax_edit')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {

                $('[name="id"]').val(data.id);
                $('[name="title"]').val(data.title);
                $('[name="email"]').val(data.email);
                $('[name="contact"]').val(data.contact);
                $('[name="bio"]').val(data.bio);
                $('[name="address"]').val(data.address);
                $('[name="description"]').val(data.description);
                $('[name="keyword"]').val(data.keyword);
                $('#modal_form').modal('show');
                $('.modal-title').text('Edit Data');

                $('#photo-preview').show();

                if(data.favicon)
                {
                    $('#label-photo').text('Change Favicon');
                    $('#photo-preview div').html('<img src="'+base_url+'upload/setting/'+data.favicon+'" class="img-responsive" <br>');
                    $('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="'+data.favicon+'"/> Remove photo when saving');

                }
                else
                {
                    $('#label-photo').text('Upload Favicon');
                    $('#photo-preview div').text('(No photo)');
                }

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function save()
    {
        $('#btnSave').text('saving...');
        $('#btnSave').attr('disabled',true); 
        var url;

        if(save_method == 'add') {
            url = "<?php echo site_url('settings/ajax_add')?>";
        } else {
            url = "<?php echo site_url('settings/ajax_update')?>";
        }

        var formData = new FormData($('#form')[0]);
        $.ajax({
            url : url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data)
            {
                if(data.status) 
                {
                    $('#modal_form').modal('hide');
                    show_data();
                }
                else
                {
                    for (var i = 0; i < data.inputerror.length; i++) 
                    {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
                    }
                }
                $('#btnSave').text('save');
                $('#btnSave').attr('disabled',false); 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave').text('save');
                $('#btnSave').attr('disabled',false);
            }
        });
    }
    
    function delete_data(id)
    {
        if(confirm('Are you sure delete this data?'))
        {
            $.ajax({
                url : "<?php echo site_url('settings/ajax_delete')?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                    $('#modal_form').modal('hide');
                    show_data();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });

        }
    }        
</script>
        