<h4>Curriculum Description</h4>
<?php $mb->the_field('description'); ?>
  <textarea name="<?php $metabox->the_name(); ?>" rows="3" cols="50"><?php $metabox->the_value(); ?></textarea>

<h4>Core Courses</h4>

<?php while($mb->have_fields_and_multi('core_courses')): ?>
    <?php $mb->the_group_open(); ?>

    	<?php $mb->the_field('course'); ?>
      <label>Course Name</label>
      <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

      <?php $mb->the_field('highlight'); ?>
      <input type="checkbox" name="<?php $mb->the_name(); ?>" value="highlight"<?php $mb->the_checkbox_state('highlight'); ?>/>
      highlight
      <br/>
      
 			<a href="#" class="dodelete button">Remove</a>

    <?php $mb->the_group_close(); ?>
    <?php endwhile; ?>
 
<p><a href="#" class="docopy-core_courses button">Add Course</a></p>

<h4>Elective Courses</h4>

<?php while($mb->have_fields_and_multi('elective_courses')): ?>
    <?php $mb->the_group_open(); ?>

    	<?php $mb->the_field('course'); ?>
      <label>Course Name</label>
      <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

      <?php $mb->the_field('highlight'); ?>
      <input type="checkbox" name="<?php $mb->the_name(); ?>" value="highlight"<?php $mb->the_checkbox_state('highlight'); ?>/>
      highlight
      <br/>
 
 			<a href="#" class="dodelete button">Remove</a>

    <?php $mb->the_group_close(); ?>
    <?php endwhile; ?>
 
<p><a href="#" class="docopy-elective_courses button">Add Course</a></p>

<h4>Cross-Cutting Courses</h4>

<?php while($mb->have_fields_and_multi('cross_courses')): ?>
    <?php $mb->the_group_open(); ?>

    	<?php $mb->the_field('course'); ?>
      <label>Course Name</label>
      <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

      <?php $mb->the_field('highlight'); ?>
      <input type="checkbox" name="<?php $mb->the_name(); ?>" value="highlight"<?php $mb->the_checkbox_state('highlight'); ?>/>
      highlight
      <br/>
 
 			<a href="#" class="dodelete button">Remove</a>

    <?php $mb->the_group_close(); ?>
    <?php endwhile; ?>
 
<p><a href="#" class="docopy-cross_courses button">Add Course</a></p>

<h4>Skills Courses</h4>

<?php while($mb->have_fields_and_multi('skills_courses')): ?>
    <?php $mb->the_group_open(); ?>

    	<?php $mb->the_field('course'); ?>
      <label>Course Name</label>
      <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

      <?php $mb->the_field('highlight'); ?>
      <input type="checkbox" name="<?php $mb->the_name(); ?>" value="highlight"<?php $mb->the_checkbox_state('highlight'); ?>/>
      highlight
      <br/>
 
 			<a href="#" class="dodelete button">Remove</a>

    <?php $mb->the_group_close(); ?>
    <?php endwhile; ?>
 
<p><a href="#" class="docopy-skills_courses button">Add Course</a></p>

<script type="text/javascript">
//<![CDATA[

	jQuery(function($)
	{
		$('#wpa_loop-core_courses, #wpa_loop-elective_courses, #wpa_loop-cross_courses, #wpa_loop-skills_courses').sortable();
	});

//]]
</script>