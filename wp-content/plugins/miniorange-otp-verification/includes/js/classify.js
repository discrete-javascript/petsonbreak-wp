jQuery(document).ready(function () {	
    $mo = jQuery;
    $mo('<input id="phone" placeholder="Phone Number" name="phone" class="text input-textarea half" required="true" type="text">').insertAfter("#email");
    $mo('<input id="option" name="option" value="verify_user_classify" hidden>').insertAfter("#email");
});