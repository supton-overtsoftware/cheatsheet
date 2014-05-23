<!DOCTYPE html>
<html>
  <head>
    <title>Cheat Sheet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo site_url('/res/css/bootstrap.min.css') ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo site_url('/res/prettify/prettify.css') ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo site_url('/res/prettify/doxy.css') ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo site_url('/res/font-awesome-4.1.0/css/font-awesome.min.css') ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo site_url('/res/css/custom.css') ?>" type="text/css"/>
    <script type="text/javascript" src="<?php echo site_url('res/js/jquery-2.1.1.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('res/js/bootstrap.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('res/prettify/prettify.js') ?>"></script>
    <script>
	    !function ($) {
	        $(function(){
	      		window.prettyPrint && prettyPrint()
				//filter results based on query
				function filter(selector, query) {
				  query =   $.trim(query); //trim white space
				  query = query.replace(/ /gi, '|'); //add OR for regex query
				 
				  $(selector).each(function() {
				    ($(this).text().search(new RegExp(query, "i")) < 0) ? $(this).hide().removeClass('visible') : $(this).show().addClass('visible');
				  });
				}
				
	      		$('input[name=filter]').keyup(function() {
		      		filter('.entry', this.value);
	      		});
			})
		}(window.jQuery)
	  

	</script>
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-static-top test-navbar-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand test-navbar-brand" href="<?php echo site_url('/')?>">Cheat Sheet</a>
        </div>
        <div class="collapse navbar-collapse">
        	<ul class="nav navbar-nav test-navbar-nav">
        		<li><a href="<?php echo site_url('/entries/add'); ?>" style="color: #228822;">Add</a></li>
        		<li><a href="<?php echo site_url('/entries/index/git'); ?>">Git</a></li>
        		<li><a href="<?php echo site_url('/entries/index/bash'); ?>">Bash</a></li>
        	</ul>
			<div class="navbar-form navbar-right" role="form">
				<div class="form-group">
					<input class="form-control" name="filter" type="text" placeholder="filter">
				</div>
			</div>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <div class="container">
        <div class="content">
        	<?php $this->load->view($view, $data); ?>
        </div>
    </div>
    <p class="footer"></p>
  </body>
</html>
 