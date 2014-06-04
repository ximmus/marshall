<div class="my_meta_control">

		<?php $mb->the_field('short'); ?>
		<label>Short Name <i>(optional)</i></label>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	
		<?php $mb->the_field('number'); ?>
		<label>Course Number</label>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	
		<?php $mb->the_field('credits'); ?>
		<label>Course Credits</label>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

		<?php $mb->the_field('prereq'); ?>
		<label>Prerequisites</label>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

		<?php $metabox->the_field('description'); ?>
		<label>Description</label>
		<textarea name="<?php $metabox->the_name(); ?>" rows="3"><?php $metabox->the_value(); ?></textarea>

</div>