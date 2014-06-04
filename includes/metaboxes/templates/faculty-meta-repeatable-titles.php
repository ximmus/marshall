<?php global $wpalchemy_media_access; // creates object for media access ?>

<div class="my_meta_control">
 
    
    
    <label>Title</label>
	<?php $options = array('length' => 1, 'limit' => 5); // length sets minimum number of title fields and limit sets max?>
	<?php while($mb->have_fields_and_multi('titles', $options)): ?>
   		
		<?php $mb->the_group_open(); ?>
 
		<?php $mb->the_field('title'); ?>
        <p><input class="repeatable" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
            <a href="#" class="dodelete button">Remove Title</a>
        </p>
 
		<?php $mb->the_group_close(); ?>
	<?php endwhile; ?>
	<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-titles button">Add Another Title</a></p>
    
	<p class="small first-child">
    	<label>Box Number</label>
		<?php $mb->the_field('box-number'); ?>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		<span>Enter the Faculty member's box #</span>
	</p>
    
	<p class="small">
    	<label>Email</label>
		<?php $mb->the_field('email'); ?>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		<span>Enter the email address</span>
	</p>
    
	<p class="small">
    	<label>Phone number</label>
		<?php $mb->the_field('phone'); ?>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		<span>Enter the phone number</span>
	</p>
    
	<p class="small">
    	<label>Fax number</label>
		<?php $mb->the_field('fax'); ?>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		<span>Enter the fax number</span>
	</p>
    <div class="clear"></div>
    <label>Courses</label>
	<p>
		<?php $mb->the_field('courses'); ?>
		<textarea name="<?php $mb->the_name(); ?>" rows="5"><?php $mb->the_value(); ?></textarea>
		<span>Enter in a list of the courses and descriptions</span>
	</p>
    
    <label>Publications</label>
	<p>
		<?php $mb->the_field('publications'); ?>
		<textarea name="<?php $mb->the_name(); ?>" rows="5"><?php $mb->the_value(); ?></textarea>
		<span>Enter in a list of the publications</span>
	</p>
     
	<p class="medium first-child">
    	<label>SSRN</label> 
		<?php $mb->the_field('ssrn'); ?>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		<span>Enter the URL of the SSRN page</span>
	</p>
    
    <p class="medium">
    	<label>Vita</label>
        <?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
        <?php echo $wpalchemy_media_access->getButton(array('label' => 'Add Resume')); ?>
        <span>Upload the PDF of the resume. Name the file lastname_f_resume.pdf</span>
    </p>
    <div class="clear"></div>
    

</div>


