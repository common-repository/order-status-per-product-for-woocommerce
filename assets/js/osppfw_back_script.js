//remove order status
jQuery(document).ready(function(){
    jQuery("body").on('click', '.osppfw_remove_status', function(){
        jQuery(this).parent().parent().remove();
    });
});
