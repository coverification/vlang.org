<?php
include "header.php";
?>
<body>
	<!-- Docs -->
	<?php if ($options['daux_repo']) { ?>
	<a href="https://github.com/<?php echo $options['daux_repo']; ?>" target="_blank" id="github-ribbon"><img src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png" alt="Fork me on GitHub"></a>
	<?php } ?>
	<div class="container-fluid fluid-height wrapper">
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<a class="brand pull-left" href="<?php echo $base_url;?>"><?php echo $options['title']; ?></a>
				<p class="navbar-text pull-right">
					Generated by <a href="http://daux.io">Daux.io</a>
				</p>
			</div>
		</div>

		<div class="row-fluid columns content">
			<div class="left-column article-tree span3">
				<!-- For Mobile -->
				<div class="responsive-collapse">
					<button type="button" class="btn btn-sidebar" id="menu-spinner-button">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div id="sub-nav-collapse" class="sub-nav-collapse">
					<!-- Navigation -->
					<?php echo build_nav($tree, $url_params); ?>

					<?php if (!empty($options['daux_links']) || !empty($options['twitter'])) { ?>
					<div class="well well-sidebar">
						<!-- Links -->
						<?php foreach($options['daux_links'] as $name => $url) { ?>
						<a href="<?php echo $url;?>" target="_blank"><?php echo $name;?></a><br>
						<?php } ?>
						<!-- Twitter -->
						<?php foreach($options['twitter'] as $handle) { ?>
						<div class="twitter">
							<hr/>
							<iframe allowtransparency="true" frameborder="0" scrolling="no" style="width:162px; height:20px;" src="https://platform.twitter.com/widgets/follow_button.html?screen_name=<?php echo $handle;?>&amp;show_count=false"></iframe>
						</div>
						<?php } ?>
					</div>
					<?php } ?>
				</div>
			</div>
			<div class="right-column <?php echo ($options['float']?'float-view':''); ?> content-area span9">
				<div class="content-page">
					<article>
						<?php if($options['date_modified'] && isset($page['modified'])) { ?>
						<div class="page-header sub-header clearfix">
							<h1><?php echo $page['title'];?></h1>
							<span style="float: left; font-size: 10px; color: gray;">
								<?php echo date("l, F j, Y", $page['modified']);?>
							</span>
							<span style="float: right; font-size: 10px; color: gray;">
								<?php echo date ("g:i A", $page['modified']);?>
							</span>
						</div>
						<?php } else { ?>
						<div class="page-header">
							<h1><?php echo $page['title'];?></h1>
						</div>

						<?php } ?>
						<?php echo $page['html'];?>
					</article>
				</div>
			</div>
		</div>
	</div>
<?php
include "footer.php";
?>