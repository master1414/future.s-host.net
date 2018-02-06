<?php error_reporting(E_ALL & ~E_NOTICE); ?>
<li>
	<a href="/category/<?=$category['id']?>">
        <?php if(isset($category['childs'])):?><span class="badge pull-right"><i class="fa fa-plus"></i></span><?php endif;?>
        <?=$category['name']?>
	</a>
	<?php if($category['childs']): ?>
	<ul>
		<?php echo categories_to_string($category['childs']); ?>
	</ul>
	<?php endif; ?>
</li>