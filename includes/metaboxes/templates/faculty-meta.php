<?php global $wpalchemy_media_access; // creates object for media access ?>

<div class="my_meta_control">
 
    <label>Title(s)</label>
	<p>
		<?php $mb->the_field('title'); ?>
		<textarea name="<?php $mb->the_name(); ?>" rows="5"><?php $mb->the_value(); ?></textarea>
		<span>Enter in the faculty member's titles seperated by HTML break tags</span>
	</p>
    
    <p class="small first-child">
    	<label>Last Name</label>
		<?php $mb->the_field('last-name'); ?>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		<span>For sorting purposes. Don't capitalize</span>
	</p>
    
    <div class="clear"></div>

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
    
    <p>
        <label>Courses</label>
    	<?php 
		$mb->the_field('courses');

        $val = html_entity_decode($mb->get_the_value());
		$id = $mb->get_the_name();
        $settings = array(
				'textarea_rows' => 6,
				'quicktags' => array(
                        'buttons' => 'em,strong,link',
                ),
                'quicktags' => true,
                'tinymce' => true
        );
		
        wp_editor($val, $id, $settings);
		?>
    	<span>Enter in a list of the courses and descriptions</span>

    </p>
        
    <p>
        <label>Publications</label>
    	<?php 
		$mb->the_field('publications');

        $val = html_entity_decode($mb->get_the_value());
		$id = $mb->get_the_name();
        $settings = array(
				'textarea_rows' => 6,
				'quicktags' => array(
                        'buttons' => 'em,strong,link',
                ),
                'quicktags' => true,
                'tinymce' => true
        );
		
        wp_editor($val, $id, $settings);
		?>
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
		<?php $mb->the_field('vita'); ?>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		<span>Enter the file name of the resume. Make sure it is formatted lastname_f_resume.pdf</span>
	</p>
    
    <!-- media uploader example, no longer necessary for resumes -->
    <!--<p class="medium">
    	<label>Vita</label>
        <?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
        <?php echo $wpalchemy_media_access->getButton(array('label' => 'Add Resume')); ?>
        <span>Upload the PDF of the resume. Name the file lastname_f_resume.pdf</span>
    </p>-->
    <div class="clear"></div>
    

</div>


