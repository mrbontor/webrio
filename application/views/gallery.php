<?php include 'template/header.php' ?>
	<!-- Main Content -->
        <div class="hk-pg-wrapper">
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="#"><?php echo $title; ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $subtitle; ?></li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container-fluid">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="layers"></i></span></span><?php echo $title; ?></h4>
                    <a href="<?php echo base_url(); ?>gallery/upload" type="button" class="btn btn-success btn-wth-icon icon-wthot-bg btn-rounded icon-right pull-right">
                        <span class="btn-text">Add New</span><span class="icon-label"><i class="ion ion-md-add-circle"></i>
                    </a>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper hk-gallery-wrap">
                            <ul class="nav nav-light nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabBanner" role="tab">Banner Gallery</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabCorousel" role="tab">Corousel</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabProject" role="tab">Project Gallery</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" role="tabpanel" id="tabBanner">
                                    <button type="button" class="btn btn-success btn-wth-icon icon-wthot-bg btn-rounded icon-right" onclick="add_data()">
                                    <span class="btn-text">Add New</span><span class="icon-label"><i class="ion ion-md-add-circle"></i>
                                    </button>  
                                    <div class="row hk-gallery" id="show_banner">
                                    </div>
                                </div>
                                <div class="tab-pane fade show" role="tabpanel" id="tabCorousel">
                                    <button type="button" class="btn btn-success btn-wth-icon icon-wthot-bg btn-rounded icon-right" onclick="add_data()">
                                    <span class="btn-text">Add New</span><span class="icon-label"><i class="ion ion-md-add-circle"></i>
                                    </button>  
                                    <div class="row hk-gallery" id="show_corousel">
                                    </div>
                                </div>
                                <div class="tab-pane fade show" role="tabpanel" id="tabProject">
                                    <button type="button" class="btn btn-success btn-wth-icon icon-wthot-bg btn-rounded icon-right" onclick="add_data()">
                                    <span class="btn-text">Add New</span><span class="icon-label"><i class="ion ion-md-add-circle"></i>
                                    </button>  
                                    <div class="row hk-gallery" id="show_project">
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
        <!-- /Main Content -->
<!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>

     <!-- Gallery JavaScript -->
    <script src="<?php echo base_url();?>assets/vendors/lightgallery/dist/js/lightgallery-all.min.js"></script>
    <script src="<?php echo base_url();?>assets/dist/js/froogaloop2.min.js"></script>
    <script src="<?php echo base_url();?>assets/dist/js/gallery-data.js"></script>
<?php include 'template/footer.php' ?>
<script type="text/javascript">
    "use strict"; 
    var base_url = '<?php echo base_url();?>';

    $(document).ready( function () {
        show_banner()
        show_corousel()
        show_project()
        
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

    function show_banner()
    {
        $.ajax({
            type  : 'get',
            url  : "<?php echo site_url('gallery/ajax_list_banner')?>",
            async : false,
            dataType : 'json',
            success : function(data){
                var html = '';
                for(let i in data){
                    var bg = base_url+'upload/gallery/banner/'+data[i].image

                    html += '<div class="col-lg-2 col-md-4 col-sm-4 col-6 mb-10" data-src="'+ base_url+ 'upload/gallery/banner/'+ data[i].image+'">'+
                                '<a href="#" class="">'+
                                    '<div class="gallery-img" style="background-image:url('+bg+')">'+
                                    '</div>'+
                                '</a>'+
                                // '<p>'+ data[i].image+'</p>'
                            '</div>';
                }
                $('#show_banner').html(html);
            },
            error: function (jqXHR, textStatus)
            {
                alert('Error get data from ajax');
            }

        });
    }

    function show_project()
    {
        $.ajax({
            type  : 'get',
            url  : "<?php echo site_url('gallery/ajax_list_project')?>",
            // async : false,
            dataType : 'json',
            success : function(data){
                var html = '';
                for(let i in data){
                    var bg = base_url+'upload/gallery/project/'+data[i].image

                    html += '<div class="col-lg-2 col-md-4 col-sm-4 col-6 mb-10" data-src="'+ base_url+ 'upload/gallery/project/'+ data[i].image+'">'+
                                '<a href="#" class="">'+
                                    '<div class="gallery-img" style="background-image:url('+bg+')">'+
                                    '</div>'+
                                '</a>'+
                                // '<p>'+ data[i].image+'</p>'
                            '</div>';
                }
                $('#show_project').html(html);
            },
            error: function (jqXHR, textStatus)
            {
                alert('Error get data from ajax');
            }

        });
    }

    function show_corousel()
    {
        $.ajax({
            type  : 'get',
            url  : "<?php echo site_url('gallery/ajax_list_corousel')?>",
            // async : false,
            dataType : 'json',
            success : function(data){
                var html = '';
                for(let i in data){
                    var bg = base_url+'upload/gallery/corousel/'+data[i].image

                    html += '<div class="col-lg-2 col-md-4 col-sm-4 col-6 mb-10" data-src="'+ base_url+ 'upload/gallery/corousel/'+ data[i].image+'">'+
                                '<a href="#" class="">'+
                                    '<div class="gallery-img" style="background-image:url('+bg+')">'+
                                    '</div>'+
                                '</a>'+
                                // '<p>'+ data[i].image+'</p>'
                            '</div>';
                }
                $('#show_corousel').html(html);
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

    
    function delete_data(id)
    {
        if(confirm('Are you sure delete this data?'))
        {
            $.ajax({
                url : "<?php echo site_url('gallery/ajax_delete')?>/"+id,
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
        