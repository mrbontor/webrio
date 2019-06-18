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
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Dropzone</h5>
                            <p class="mb-40">A lightweight open source library that provides drag’n’drop file uploads with image previews.</p>
                            <div  class="row">
                                <div class="col-sm">
                                    <form>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" id="label-photo">Category Foto </label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="category" id="category" required>
                                                    <option value="banner">For Banner</option>
                                                    <option value="corousel">For Corousel</option>
                                                    <option value="project">For Project</option>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        
                                    <div class="dropzone">
                                        
                                        <div class="dz-message">
                                            <p class="mb-40">A lightweight open source library that provides drag’n’drop file uploads with image previews.</p>
                                        </div>
                                    </div>
                                    </form>
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
<?php include 'template/footer.php' ?>

<script type="text/javascript">
    "use strict"; 

    Dropzone.autoDiscover = false;

    var foto_upload= new Dropzone(".dropzone",{
        url: "<?php echo site_url('gallery/do_upload_banner') ?>",
        maxFiles: 5,
        maxFilesize: 2,
        method:"post",
        acceptedFiles:"image/*",
        paramName:"image",
        dictInvalidFileType:"Type file ini tidak dizinkan",
        addRemoveLinks:true,
    });

    foto_upload.on("maxfilesexceeded", function (image) {
        this.removedfile(image)
    })
        //Event ketika Memulai mengupload
    foto_upload.on("sending",function(a,b,c){
        var x = document.getElementById("category").value
        a.category= x
       
        c.append("category",a.category); 
        alert('Photo uploaded')
    });
    foto_upload.on("removedfile",function(a){
        var name=a.name;
        $.ajax({
            type:"post",
            data:{name:name},
            url:"<?php echo site_url('gallery/remove_foto') ?>",
            cache:false,
            dataType: 'json',
            success: function(){
                alert("Foto terhapus");
            },
            error: function(){
                console.log("Error");

            }
        });
    });


</script>