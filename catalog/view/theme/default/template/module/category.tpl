<a href="javascrit:void(0)" class="toggle-left-menu"><i></i></a>
<div class="catalogue__title">
	Категории
</div>
<ul class="left-menu">
	<?php foreach ($categories as $category) { ?>
		<li><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a>
			<?php if($category['children']) { ?>
				<ul class="sub-menu">
					<?php foreach($category['children'] as $child) { ?>
						<li><a href="<?php echo $child['href']; ?>"><?php echo $child['name']; ?></a>
							<?php if($child['subchildren']) { ?>
								<ul class="sub-menu">
									<?php foreach($child['subchildren'] as $subchild) { ?>
										<li><a href="<?php echo $subchild['href']; ?>"><?php echo $subchild['name']; ?></a></li>
									<?php } ?>
								</ul>
							<?php } ?>
						</li>
					<?php } ?>
				</ul>
			<?php } ?>
		</li>
	<?php } ?>
</ul>
