<?php include 'template/header.php' ?>
	<!-- Main Content -->
        <div class="hk-pg-wrapper">
			<!-- Container -->
            <div class="container-fluid mt-xl-50 mt-sm-30 mt-15">
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
                                                    <th>No</th>
                                                    <th>Category</th>
                                                    <th>Product Name</th>
                                                    <th>Description</th>
                                                    <th>Image</th>
                                                    <th>Status</th>
                                                    <th style="text-align:center;">Action</th>                                                    
                                                </tr>
                                            </thead>
                                            <tbody id="show_data"></tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Category</th>
                                                    <th>Product Name</th>
                                                    <th>Description</th>
                                                    <th>Image</th>
                                                    <th>Status</th>
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
                        <label class="col-md-2 col-form-label">Category</label>
                        <div class="col-md-4">
                            <select class="form-control" name="category" id="category">
                                <option value=""></option>
                                <?php foreach($categories as $c){?>
                                    <option value="<?php echo $c->id;?>"><?php echo $c->category_name;?></option>
                                <?php } ?>                                    
                            </select>         
                            <span class="help-block"></span>                   
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Title</label>
                        <div class="col-md-10">
                            <input type="hidden" name="id" id="id" class="form-control">                              

                            <input type="text" name="title" id="title" class="form-control" placeholder="title">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Description Name</label>
                        <div class="col-md-10 tinymce-wrap">
                            <textarea name="description" id="description" rows="5" class="tinymce form-control "></textarea>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group row" id="photo-preview">
                        <label class="control-label col-md-3">Photo</label>
                        <div class="col-md-9">
                            (No photo)
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" id="label-photo">Upload Photo </label>
                        <div class="col-md-4">
                            <input name="image" type="file">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Status</label>
                        <div class="col-md-4">
                            <select class="form-control" name="status" id="status">

                                <option value="1">Active</option>
                                <option value="2">Non Active</option>
                            <span class="help-block"></span>
                            </select>                            
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
        $('#mydata').DataTable();
        
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
            url  : "<?php echo site_url('news/ajax_list')?>",
            async : false,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    var dataStatus
                    var photo
                    if (data[i].status === '1') {
                        dataStatus = 'Active'
                    } else {
                        dataStatus = 'Non Active'
                    }

                    if (data[i].image !== null) {
                        $('#label-photo').text('Change Photo'); // label photo upload
                        $('#photo-preview div').html('<img src="'+base_url+'upload/news/'+data[i].image+'" class="img-responsive" width="150" height="150">'); // show photo
                        $('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="'+data[i].image+'"/> Remove photo when saving'); // remove photo

                        photo = '<a href="'+ base_url+ 'upload/news/'+ data[i].image+'" target="_blank"><img src="'+ base_url +'upload/news/'+ data[i].image+'"  class="img-responsive" width="75" height="77"/></a>'
                    } else {
                        $('#label-photo').text('Upload Photo'); // label photo upload
                        $('#photo-preview div').text('(No photo)');
                        photo = "No Image"
                    }

                    $('#photo-preview').show(); 
                
                    html += '<tr>'+
                            '<td>'+data[i].id+'</td>'+
                            '<td>'+data[i].category_name+'</td>'+
                            '<td>'+data[i].title+'</td>'+
                            '<td>'+data[i].description.substring(0,70)+'</td>'+
                            '<td>'+photo+'</td>'+
                            '<td>'+dataStatus+'</td>'+
                            '<td style="text-align:center;">'+
                                '<a href="javascript:void(0);" class="btn btn-info btn-sm item_id" onclick="edit_data('+data[i].id+')">Edit</a>'+' '+
                                '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" onclick="delete_data('+data[i].id+')">Delete</a>'+
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

        $('#label-photo').text('Upload Photo');
    }

    function edit_data(id)
    {
        save_method = 'update';
        $('#form')[0].reset(); 
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();

        $.ajax({
            url : "<?php echo site_url('news/ajax_edit')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {

                $('[name="id"]').val(data.id);
                $('[name="category"]').val(data.category);
                $('[name="title"]').val(data.title);
                $('[name="description"]').val(data.description);
                $('[name="status"]').val(data.status);
                $('#modal_form').modal('show');
                $('.modal-title').text('Edit Data');

                $('#photo-preview').show();

                if(data.image)
                {
                    $('#label-photo').text('Change Photo');
                    $('#photo-preview div').html('<img src="'+base_url+'upload/news/'+data.image+'" class="img-responsive" width="250" height="250"> <br>');
                    $('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="'+data.image+'"/> Remove photo when saving');

                }
                else
                {
                    $('#label-photo').text('Upload Photo');
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
            url = "<?php echo site_url('news/ajax_add')?>";
        } else {
            url = "<?php echo site_url('news/ajax_update')?>";
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
                url : "<?php echo site_url('news/ajax_delete')?>/"+id,
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
        