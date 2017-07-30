jQuery(document).ready(function () {	
    $mo = jQuery;

    if($mo("input[type=checkbox]").is(':checked')){ 
        $mo('#ov_settings_button').prop( "disabled", false );
    }else{
        $mo('#ov_settings_button').prop( "disabled", true );
    }

    $mo("input[name='check_btn']").click(function(){ 
        $mo("#mo_ln_form").submit();
    });

    //images
    $mo(".form_preview").click(function () {
       window.open($mo(this).data("formlink"), '_blank');
    });

	//FAQ
	$mo(".registration_question").click(function () {
    	$mo(this).next(".mo_registration_help_desc").slideToggle(400);
    });

    $mo(".form_query").click(function(){
        var str = "#form_query_desc_";
        $mo(str.concat($mo(this).data("desc"))).slideToggle(400);
    });

    $mo(".app_enable").click(function () {
        var str = "#";
        $mo(str.concat($mo(this).data("toggle"))).slideToggle(400);
        if($mo("input[type=checkbox]").is(':checked')){
            $mo('#ov_settings_button').prop( "disabled", false );
        }else{
            $mo('#ov_settings_button').prop( "disabled", true );
        }
    });

    $mo(".form_options").click(function(){
        var str="_field";
        var str2 = "form";
        var form_field= $mo(this).data("form");
        var form = form_field.substr(0, form_field.indexOf('_')+1);
        $mo(".".concat(form.concat(str2))).slideUp(400);
        $mo("#".concat(form_field.concat(str))).slideToggle(400);
    });

    $mo("#country_code").empty();
    $mo("#country_code").append($mo("#mo_country_code").val());

    $mo("#mo_country_code").on("click", function() {
        var value = $mo(this).val();
        $mo("#country_code").empty();
        $mo("#country_code").append(value);
    });

    $mo('input[name=mo_customer_validation_ninja_form_enable_type]').change(function(){
        $mo('input[name^="ninja_form"]').each(function() {
            $mo(this).val('');
        });
    });

    $mo('input[name=mo_customer_validation_nja_enable_type]').change(function(){
        $mo('input[name^="ninja_ajax_form"]').each(function() {
            $mo(this).val('');
        });
    });    

    $mo('input[name=mo_customer_validation_gf_contact_type]').change(function(){
        $mo('input[name^="gravity_form"]').each(function() {
            $mo(this).val('');
        });
    });    

	$mo(".mo_registration_help_title").click(function(e){
        e.preventDefault();
    	$mo(this).next('.mo_registration_help_desc').slideToggle(400);
    });

	$mo("#lk_check1").change(function(){
        if($mo("#lk_check2").is(":checked") && $mo("#lk_check1").is(":checked")){
            $mo("#activate_plugin").removeAttr('disabled');
        }
    });

    $mo("#lk_check2").change(function(){
        if($mo("#lk_check2").is(":checked") && $mo("#lk_check1").is(":checked")){
            $mo("#activate_plugin").removeAttr('disabled');
        }
    });

    $mo("#mo_search").on("click", function() {
        var value = $mo(this).val();
        $mo("#mo_forms tr").each(function(index) {
            if (index !== 0) {
                $row = $mo(this);
                var id = $row.find("td:first");
                var input = id.find("strong:first").text();
                if (input.toLowerCase().indexOf(value.toLowerCase()) !== 0) {
                    $row.hide();
                }
                else {
                    $row.show();
                }
            }
        });
    });

});

function extraSettings(host,url){
    document.getElementById('extraSettingsRedirectURL').value = host.concat(url);
    document.getElementById('showExtraSettings').submit();
}

function mo_registration_valid_query(f) {
    !(/^[a-zA-Z?,.\(\)\/@ 0-9]*$mo/).test(f.value) ? f.value = f.value.replace(
            /[^a-zA-Z?,.\(\)\/@ 0-9]/, '') : null;
}