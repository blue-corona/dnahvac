<?php
/**
 * The footer template.
 *
 * @package Avada
 * @subpackage Templates
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
						<?php do_action( 'avada_after_main_content' ); ?>

					</div>  <!-- fusion-row -->
				</main>  <!-- #main -->
				<?php do_action( 'avada_after_main_container' ); ?>

				<?php
				/**
				 * Get the correct page ID.
				 */
				$c_page_id = Avada()->fusion_library->get_page_id();
				?>

				<?php
				/**
				 * Only include the footer.
				 */
				?>
				<?php if ( ! is_page_template( 'blank.php' ) ) : ?>

					<?php 
					if ( has_action( 'avada_render_footer' ) ) {
						do_action( 'avada_render_footer' );
					} else {
						Avada()->template->render_footer();
					} 
					?>

					<div class="fusion-sliding-bar-wrapper">
						<?php
						/**
						 * Add sliding bar.
						 */
						if ( Avada()->settings->get( 'slidingbar_widgets' ) ) {
							get_template_part( 'sliding_bar' );
						}
						?>
					</div>

					<?php do_action( 'avada_before_wrapper_container_close' ); ?>
				<?php endif; // End is not blank page check. ?>
			</div> <!-- wrapper -->
		</div> <!-- #boxed-wrapper -->
		<div class="fusion-top-frame"></div>
		<div class="fusion-bottom-frame"></div>
		<div class="fusion-boxed-shadow"></div>
		<a class="fusion-one-page-text-link fusion-page-load-link"></a>

		<div class="avada-footer-scripts">
			<?php wp_footer(); ?>
		</div>

<!-- Modal -->
<div class="modal fade" id="disclaimerModal" tabindex="-1" role="dialog" aria-labelledby="disclaimerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="disclaimerModalLabel">Disclaimer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="bc_color_black">The information on this website is for informational purposes only; it is deemed accurate but not guaranteed. It does not constitute professional advice. All information is subject to change at any time without notice. <a class="bc_color_quaternary bc_text_normal" href="<?php echo get_home_url();?>/contact-us">Contact us</a> for complete details.</p>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<script>
    //gravity forms error handling
jQuery(document).on('gform_post_render', function(event, form_id, current_page){
    // code to trigger on form or form page render
    //Error for form with static labels
    jQuery('.gfield_error > .ginput_container').focusin(function(){
      jQuery(this).parent('li').children('label').show();
      jQuery(this).parent('li').find('.validation_message').hide();
      jQuery(this).parent('li').removeClass('gfield_error');
    });
    console.log('form render');
    toggleFloatLabel('.ginput_container_text');
    toggleFloatLabel('.ginput_container_textarea');
    toggleFloatLabel('.ginput_container_phone');
  //Code for form with floating labels
  jQuery('.ginput_container_text').focusin(function(){
    jQuery(this).parent('li').children('label').addClass('float_label');
  });


  jQuery('.ginput_container_text').focusout(function(){
   toggleFloatLabel(this, 'input');

 });

  jQuery('.ginput_container_textarea').focusin(function(){
    jQuery(this).parent('li').children('label').addClass('float_label');
  });


  jQuery('.ginput_container_textarea').focusout(function(){
   toggleFloatLabel(this, 'textarea');

 });

  jQuery('.ginput_container_phone').focusin(function(){
    jQuery(this).parent('li').children('label').addClass('float_label');
  });


  jQuery('.ginput_container_phone').focusout(function(){
   toggleFloatLabel(this, 'tel');

  });


    //Error handling for form with floating labels
    jQuery('.floating_labels .gfield_error > label').hide();
    jQuery('.floating_labels .gfield_error .validation_message').addClass('validation_message--float');    

  });

function toggleFloatLabel(selector, type){
  var containerClass='.ginput_container_text';

  if(type=='textarea'){
    containerClass='.ginput_container_textarea';
  }
  if(type=='tel'){
    containerClass='.ginput_container_phone';
    type='input';
  }
  
  jQuery(selector).children(type).each(function(){
    if(!jQuery(this).val()) {
      jQuery(this).parent(containerClass).parent('li').find('label').removeClass('float_label');
      console.log(2);
    } else {
      jQuery(this).parent(containerClass).parent('li').find('label').addClass('float_label');
      console.log(3);
    }
  })

}

jQuery( document ).ready(function() {
	jQuery('button.fusion-open-submenu').on('click', function(){
		jQuery(this).toggleClass('open');
	});
});
</script>
</body>
</html>
