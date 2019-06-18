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
							    <li class="breadcrumb-item active" aria-current="page"><?php echo $article['slug']; ?></li>
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
						<div class="single-news">
							<div class="media-box">
								<img src="images/dummy-img-900x600.jpg" alt="" class="img-fluid">
								<div class="meta-date"><span>30</span>May</div>
							</div>
							<h2 class="title"><?php echo $article['title'] ?></h2>
							<div class="meta-author">Posted by Rome Doel</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							<blockquote>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							<footer>Carol Mongol</footer></blockquote>
							<div class="margin-bottom-50"></div>
							<p><strong>Ut enim ad minim veniam</strong></p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
						<!-- end single blog -->

						<div class="author-box">
							<div class="media">
								<img src="images/dummy-img-400x400.jpg" alt="" class="img-fluid">
							</div>
							<div class="body">
	                            <h4 class="media-heading"><span>Author :</span>John Doel</h4>
	                            We are also create and designing template for categories Graphic template and Game asset. in November 2014, we have won big contest Envato most wanted for categories game assets.
	                      	</div>
	                      	<div class="clearfix"></div>
						</div>
						<!-- end author box -->
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
		show_category();

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
	                    html += '<li><a class="" href="'+data[i].id+'" title="Planting & Removal">'+data[i].category_name+'</a></li>';
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

								