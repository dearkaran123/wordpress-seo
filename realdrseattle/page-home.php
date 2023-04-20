<?php 
/* Template Name: Home */

get_header(); 
$page_id     = get_queried_object_id();
?>

<div class="section-two container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="main-content">
                    <h2><?php echo get_the_title();?></h2>
                    <div class="body-content">
                        <?php echo get_the_content();?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-with-animated-labels">
                    <?php echo do_shortcode('[contact-form-7 id="66" title="Contact form 1"]');?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>	
<script type="text/javascript">
    jQuery(document).ready(function($) { //no conflict
  
  //On input focus move the label
  $("input, textarea").focus(function() { 
        $(this).parent().siblings("label").addClass("move");
  });
  
  //On focusout check if there is a value, else remove the .move class.
  $("input, textarea").focusout(function() { 
    if ($(this).val().length == 0) {
        $(this).parent().siblings("label").removeClass("move");
    }
  });
  
  //If the user clicks on the label itself, activate the corresponding input.
  var labelID; 
  $('label').click(function () {
    labelID = $(this).attr('for');
    $('#' + labelID).trigger('click');
  });
  //In case there is a prefill value
  $("input, textarea").each(function() {
      if ($(this).val().length != 0) { 
          $(this).parent().siblings("label").addClass("move");
      } 
      else {
          $(this).parent().siblings("label").removeClass("move");
      }
  });
  
});

</script>