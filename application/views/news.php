<?php include 'template/header.php' ?>
	
	<!-- BANNER -->
	<div class="section banner-page" data-background="<?php echo base_url() ?>assets/images/dummy-img-1920x300.jpg">
		<div class="content-wrap pos-relative">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="d-flex bd-highlight mb-3">
							<div class="title-page">News</div>
						</div>
						<div class="d-flex bd-highlight mb-3">
						    <nav aria-label="breadcrumb">
							  <ol class="breadcrumb ">
							    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
							    <li class="breadcrumb-item active" aria-current="page">News</li>
							  </ol>
							</nav>
					  	</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- CONTENT -->
	<div class="section">
		<div class="content-wrap">
			<div class="container">

				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-8">
						<div class="row" >						
							<div class="col-12 col-md-12 mb-5" id="show_data">
								<!-- <div class="rs-news-1"> -->
									<!-- <div class="media-box">
										<a href="page-news-single.html">
											<img src="<?php echo base_url()?>assets/images/dummy-img-900x600.jpg" alt="" class="img-fluid">
										</a>
									</div>
									<div class="body-box">
										<div class="meta-date"><span>30</span>May</div>
										<div class="title"><a href="page-news-single.html">Why you have difficult to clean your lawn</a></div>
										<p>We provide high quality design at vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores...</p>
									</div> -->
								<!-- </div> -->
							</div>
						</div>


						<div class="row">
							<div class="col-sm-12 col-md-12">
								
								<nav aria-label="Page navigation">
								  <ul class="pagination" id="pagination">
								    <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li>
								    <li class="page-item active"><a class="page-link" href="#">1</a></li>
								    <li class="page-item"><a class="page-link" href="#">2</a></li>
								    <li class="page-item"><a class="page-link" href="#">3</a></li>
								    <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
								  </ul>
								</nav>

							</div>
						</div>


					</div>
					<div class="col-sm-12 col-md-12 col-lg-4">
						<div class="widget categories">
							<div class="widget-title">
								Kategori
							</div>
							<ul class="category-nav" id="show_category">
								<!-- <li class="active"><a href="#" title="Landscape Design">Landscape Design</a></li>
								<li><a href="#" title="Planting & Removal">Planting & Removal</a></li>
								<li><a href="#" title="Garden Care">Garden Care</a></li>
								<li><a href="#" title="Irrigation & Drainage">Irrigation & Drainage</a></li>
								<li><a href="#" title="Stone and Hardscaping">Stone and Hardscaping</a></li>
								<li><a href="#" title="Rubbish Removal">Rubbish Removal</a></li> -->
							</ul>
						</div>

						<div class="widget tags">
							<div class="widget-title">
								Tags
							</div>
							<div class="tagcloud">
								<a href="#" title="3 topics">business</a>
								<a href="#" title="1 topic" >advocate</a>
								<a href="#" title="1 topic" >attorney</a>
								<a href="#" title="4 topics" >consult</a>
								<a href="#" title="2 topics" >consultant</a>
								<a href="#" title="1 topic" >corporate</a>
								<a href="#" title="2 topics" >consulting</a>
								<a href="#" title="1 topic" >government</a>
								<a href="#" title="2 topics" >justice</a>
								<a href="#" title="5 topics">law</a>
								<a href="#" title="2 topics">lawyers</a>
								<a href="#" title="1 topic" >legal</a>
							</div>
						</div>

					</div>
					<!-- end sidebar -->
				</div>

			</div>
		</div>
	</div>

<?php include 'template/footer.php' ?>
<script type='text/javascript'>
	$(document).ready(function(){
		loadPagination(0);
		show_category();
		// show_news_lastest();
		
		$('#pagination').on('click','a',function(e)
		{
			e.preventDefault(); 
			var pageno = $(this).attr('data-ci-pagination-page');
			loadPagination(pageno);
		});

		// Load pagination
		function loadPagination(pagno)
		{
			$.ajax({
				url: '<?php echo base_url()?>News/loadRecord/'+pagno,
				type: 'get',
				dataType: 'json',
				success: function(response){
				$('#pagination').html(response.pagination);
					createView(response.result);
				}
			});
		}

		function createView(result)
		{
			var html = '';
			$('#show_data').empty();
			console.log(result)
			for(i in result)
			{
				html += '<div class="rs-news-1">' +
							'<div class="media-box">'+
								'<a href="<?php echo base_url() ?>news/detail/"'+result[i].slug+'">'+
									'<img src="<?php echo base_url()?>assets/images/dummy-img-900x600.jpg" alt="" class="img-fluid">'+
								'</a>'+
							'</div">'+
							'<div class="body-box">'+
								'<div class="meta-date"><span>'+result[i].category_name+'</span></div>'+
								'<div class="title"><a href="<?php echo base_url() ?>news/detail/'+result[i].slug+'">'+result[i].title+'</a></div>'+
								'<p>'+result[i].description.substr(0, 80) + " ..."+'</p>'+
							'</div>'+
						'</div>';
			}
			$('#show_data').html(html);
		}

		function show_category()
	    {
	        $.ajax({
	            url  : "<?php echo base_url()?>News/load_category",
	            type : 'get',
	            dataType : 'json',
	            success : function(data){
	                var html = '';
	                var i;
	                for(i=0; i<data.length; i++){
	                    html += '<li><a class="" href="'+data[i].id+'" title="'+data[i].category_name+'">'+data[i].category_name+'</a></li>';
	                }
	                $('#show_category').html(html);
	            },
	            error: function (jqXHR, textStatus)
	            {
	                alert('Error get data from ajax');
	            }

	        });
	    }

	    // function show_news_lastest()
	    // {
	    //     $.ajax({
	    //         url  : "<?php echo base_url()?>News/load_news_lastest",
	    //         type : 'get',
	    //         dataType : 'json',
	    //         success : function(data){
	    //             var html = '';
	    //             var i;
	    //             for(i=0; i<data.length; i++){
	    //                 html += '<div class="latest-post-item">'+
	    //                 			'<div class="meta-date"><span>30</span>May</div>'
		   //                  		// '<div class="meta-date"><span>'+data[i].category_name+'</span></div>'+
					// 				'<div class="title"><a href="'+ data[i].category_name +'">'+data[i].title+'</a></div>'+
					// 				'<p class="meta-author">'+ data[i].category_name +'</p>'+
					// 			'</div>';
								
	    //             }
	    //             $('#show_news_lastest').html(html);
	    //         },
	    //         error: function (jqXHR, textStatus)
	    //         {
	    //             alert('Error get data from ajax');
	    //         }

	    //     });
	    // }

	});
</script>

								