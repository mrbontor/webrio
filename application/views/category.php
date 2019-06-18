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
                                                    <th>No</th>
                                                    <th>Category</th>
                                                    <th>Status</th>
                                                    <th style="text-align:center;">Action</th>                                                    
                                                </tr>
                                            </thead>
                                            <tbody id="show_data"></tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Category</th>
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
                        <label class="col-md-2 col-form-label">Category Name</label>
                        <div class="col-md-10">
                            <input type="hidden" name="id"class="form-control">                              

                            <input type="text" name="category_name" class="form-control" placeholder="category name">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Status</label>
                        <div class="col-md-4">
                            <select class="form-control" name="status">

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
        $("select").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
    });

    function show_data()
    {
        $.ajax({
            type  : 'get',
            url  : "<?php echo site_url('category/ajax_list')?>",
            async : false,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    var dataStatus
                    if (data[i].status === '1') {
                        dataStatus = 'Active'
                    } else {
                        dataStatus = 'Non Active'
                    }
                
                    html += '<tr>'+
                            '<td>'+data[i].id+'</td>'+
                            '<td>'+data[i].category_name+'</td>'+
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
    }

    function edit_data(id)
    {
        save_method = 'update';
        $('#form')[0].reset(); 
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();

        $.ajax({
            url : "<?php echo site_url('category/ajax_edit')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id"]').val(data.id);
                $('[name="category_name"]').val(data.category_name);
                $('[name="status"]').val(data.status);
                $('#modal_form').modal('show');
                $('.modal-title').text('Edit Data');

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
            url = "<?php echo site_url('category/ajax_add')?>";
        } else {
            url = "<?php echo site_url('category/ajax_update')?>";
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
                url : "<?php echo site_url('category/ajax_delete')?>/"+id,
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
        