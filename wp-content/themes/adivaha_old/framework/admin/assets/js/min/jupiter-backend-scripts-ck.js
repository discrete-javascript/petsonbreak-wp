function mk_composer_toggle(){jQuery(".mk-composer-toggle").each(function(){default_value=jQuery(this).find("input").val(),jQuery(this).addClass("true"==default_value?"on":"off"),jQuery(this).click(function(){jQuery(this).hasClass("on")?(jQuery(this).removeClass("on").addClass("off"),jQuery(this).find("input").val("false")):(jQuery(this).removeClass("off").addClass("on"),jQuery(this).find("input").val("true"))})})}function mk_upload_option(){if("undefined"!=typeof wp.media){var e=!0,a=wp.media.editor.send.attachment;jQuery(".option-upload-button").click(function(t){var r=wp.media.editor.send.attachment,i=jQuery(this),s=i.attr("id").replace("_button","");return e=!0,wp.media.editor.send.attachment=function(t,r){return e?(jQuery("#"+s).val(r.url),void jQuery("#"+s+"-preview img").attr("src",r.url)):a.apply(this,[t,r])},wp.media.editor.open(i),!1}),jQuery(".add_media").on("click",function(){e=!1})}}function mk_shortcode_fonts(){jQuery("#font_family").change(function(){jQuery("#font_family option:selected").each(function(){var e=jQuery(this).attr("data-type");jQuery("#font_type").val(e)})}).change()}function mk_range_input(){jQuery(".mk-range-input").each(function(){var e=jQuery(this).siblings(".range-input-selector"),a=parseFloat(jQuery(this).attr("data-min")),t=parseFloat(jQuery(this).attr("data-max")),r=parseFloat(jQuery(this).attr("data-step")),i=parseFloat(jQuery(this).attr("data-value"));jQuery(this).slider({value:i,min:a,max:t,step:r,slide:function(a,t){e.val(t.value)}})})}function mk_visual_selector(){jQuery(".mk-visual-selector").find("a").each(function(){default_value=jQuery(this).siblings("input").val(),jQuery(this).attr("rel")==default_value&&(jQuery(this).addClass("current"),jQuery(this).append('<div class="selector-tick"></div>')),jQuery(this).click(function(){return jQuery(this).siblings("input").val(jQuery(this).attr("rel")),jQuery(this).parent(".mk-visual-selector").find(".current").removeClass("current"),jQuery(this).parent(".mk-visual-selector").find(".selector-tick").remove(),jQuery(this).addClass("current"),jQuery(this).append('<div class="selector-tick"></div>'),!1})})}function mk_header_selector(){var e=jQuery("#theme_header_style").val(),a=jQuery("#theme_header_align").val(),t=jQuery("#theme_toolbar_toggle").val();"3"==e||"4"==e?jQuery(".header-align-center").hide():jQuery(".header-align-center").show(),"4"==e?jQuery(".mk-header-toolbar-toggle").hide():jQuery(".mk-header-toolbar-toggle").show(),jQuery("#mk-header-switcher").addClass("style-"+e+"-align-"+a+" toolbar-"+t),jQuery(".mk-header-styles-number").find("span").each(function(){var a=jQuery(this);a.attr("rel")==e&&a.addClass("active"),a.on("click",function(){var e=jQuery("#theme_header_style").val(),t=jQuery("#theme_header_align").val(),r=jQuery("#theme_toolbar_toggle").val();a.siblings().removeClass("active").end().addClass("active"),jQuery("#mk-header-switcher").attr("class","").addClass("style-"+a.attr("rel")+"-align-"+t+" toolbar-"+r),jQuery("#theme_header_style").val(a.attr("rel")),"3"==a.attr("rel")||"4"==a.attr("rel")?jQuery(".header-align-center").hide():jQuery(".header-align-center").show(),"4"==a.attr("rel")?jQuery(".mk-header-toolbar-toggle").hide():jQuery(".mk-header-toolbar-toggle").show()})}),jQuery(".mk-header-align").find("span").each(function(){var e=jQuery(this);e.attr("rel")==a&&e.addClass("active"),e.on("click",function(){var a=jQuery("#theme_header_style").val(),t=jQuery("#theme_header_align").val(),r=jQuery("#theme_toolbar_toggle").val();e.siblings().removeClass("active").end().addClass("active"),jQuery("#mk-header-switcher").attr("class","").addClass("style-"+a+"-align-"+e.attr("rel")+" toolbar-"+r),jQuery("#theme_header_align").val(e.attr("rel"))})}),"true"==t?jQuery(".header-toolbar-toggle-button").addClass("enabled"):jQuery(".header-toolbar-toggle-button").removeClass("enabled").addClass("disabled"),jQuery(".header-toolbar-toggle-button").on("click",function(){var e=jQuery(this),a=jQuery("#theme_header_style").val(),t=jQuery("#theme_header_align").val(),r=jQuery("#theme_toolbar_toggle").val();e.removeClass("active").addClass("active"),e.hasClass("enabled")?(e.removeClass("enabled").addClass("disabled"),toggle_value="false",jQuery("#theme_toolbar_toggle").val("false")):(e.removeClass("disabled").addClass("enabled"),toggle_value="true",jQuery("#theme_toolbar_toggle").val("true")),jQuery("#mk-header-switcher").attr("class","").addClass("style-"+a+"-align-"+t+" toolbar-"+toggle_value)})}function icon_filter_name(){jQuery(".page-composer-icon-filter").each(function(){jQuery(this).change(function(){var e=jQuery(this).val(),a=jQuery(this).siblings(".mk-font-icons-wrapper");return e?(jQuery(a).find("span:not(:Contains("+e+"))").parent("a").hide(),jQuery(a).find("span:Contains("+e+")").parent("a").show()):jQuery(a).find("a").show(),!1}).keyup(function(){jQuery(this).change()})})}function mk_color_picker(){jQuery(".color-picker").wpColorPicker()}function show_message(e){1==e&&(jQuery("#mk-success-save").bPopup({zIndex:100,modalColor:"#fff"}),setTimeout(function(){jQuery("#mk-success-save").bPopup().close()},1500)),0==e&&(jQuery("#mk-not-saved").bPopup({zIndex:100,modalColor:"#fff"}),setTimeout(function(){jQuery("#mk-not-saved").bPopup().close()},1500)),2==e&&(jQuery("#mk-already-saved").bPopup({zIndex:100,modalColor:"#fff"}),setTimeout(function(){jQuery("#mk-already-saved").bPopup().close()},1500)),3==e&&(jQuery("#mk-success-reset").bPopup({zIndex:100,modalColor:"#fff"}),setTimeout(function(){location.reload()},2e3)),4==e&&(jQuery("#mk-success-import").bPopup({zIndex:100,modalColor:"#fff"}),setTimeout(function(){location.reload()},2e3)),5==e&&(jQuery("#mk-fail-import").bPopup({zIndex:100,modalColor:"#fff"}),setTimeout(function(){jQuery("#mk-fail-import").bPopup().close()},1500))}function resize_body_section(){body_section_width=jQuery(".mk-general-bg-selector .outer-wrapper").width(),jQuery(".mk-general-bg-selector.boxed_layout .body-section").css("width",body_section_width)}jQuery.expr[":"].Contains=function(e,a,t){return(e.textContent||e.innerText||"").toUpperCase().indexOf(t[3].toUpperCase())>=0},jQuery(document).ready(function(){function e(){var e=jQuery(".superlink-wrap");e.each(function(){var e=jQuery(this).siblings("input:hidden"),a=jQuery(this).siblings("select"),t=e.attr("name"),r=jQuery(this).children();a.change(function(){r.hide(),jQuery("#"+t+"_"+jQuery(this).val()).show(),e.val("")}),r.change(function(){e.val(a.val()+"||"+jQuery(this).val())})})}function a(){slideshow_choices=jQuery("#_flexslider_section_wrapper, #_edge_section_wrapper, #_banner_builder_section_wrapper, #_icarousel_section_wrapper, #_layer_slider_source_wrapper, #_rev_slider_source_wrapper"),slideshow_choices.hide(),source_val=jQuery("#_slideshow_source").val(),"flexslider"==source_val?jQuery("#_flexslider_section_wrapper").show():"revslider"==source_val?jQuery("#_rev_slider_source_wrapper").show():"layerslider"==source_val?jQuery("#_layer_slider_source_wrapper").show():"icarousel"==source_val?jQuery("#_icarousel_section_wrapper").show():"banner_builder"==source_val?jQuery("#_banner_builder_section_wrapper").show():"edge"==source_val&&jQuery("#_edge_section_wrapper").show(),jQuery("#_slideshow_source").change(function(){this_val=jQuery(this).val(),slideshow_choices.slideUp(),"flexslider"==this_val?jQuery("#_flexslider_section_wrapper").slideDown():"revslider"==this_val?jQuery("#_rev_slider_source_wrapper").slideDown():"layerslider"==this_val?jQuery("#_layer_slider_source_wrapper").slideDown():"icarousel"==this_val?jQuery("#_icarousel_section_wrapper").slideDown():"banner_builder"==this_val?jQuery("#_banner_builder_section_wrapper").slideDown():"edge"==this_val&&jQuery("#_edge_section_wrapper").slideDown()})}function t(){var e=jQuery("#edge_video_section, #edge_image_section");e.hide();var a=jQuery("#_edge_type").val();"image"==a?jQuery("#edge_image_section").css("display","table-row-group"):"video"==a&&jQuery("#edge_video_section").css("display","table-row-group"),jQuery("#_edge_type").change(function(){var a=jQuery(this).val();e.slideUp(),"image"==a?jQuery("#edge_image_section").css("display","table-row-group"):"video"==a&&jQuery("#edge_video_section").css("display","table-row-group")})}function r(){post_choices=jQuery("#_mp3_file_wrapper, #_classic_orientation_wrapper, #_audio_iframe_wrapper, #_ogg_file_wrapper, #_single_video_site_wrapper, #_single_video_id_wrapper, #_disable_video_lightbox_wrapper, #_single_audio_author_wrapper"),post_choices.hide(),source_val=jQuery("#_single_post_type").val(),"video"==source_val?jQuery("#_single_video_site_wrapper, #_single_video_id_wrapper, #_disable_video_lightbox_wrapper").show():"audio"==source_val?jQuery("#_mp3_file_wrapper, #_ogg_file_wrapper, #_single_audio_author_wrapper, #_audio_iframe_wrapper").show():"image"==source_val&&jQuery("#_classic_orientation_wrapper").show(),jQuery("#_single_post_type").change(function(){this_val=jQuery(this).val(),post_choices.slideUp(),"video"==this_val?jQuery("#_single_video_site_wrapper, #_single_video_id_wrapper, #_disable_video_lightbox_wrapper").show():"audio"==this_val?jQuery("#_mp3_file_wrapper, #_ogg_file_wrapper, #_single_audio_author_wrapper, #_audio_iframe_wrapper").show():"image"==this_val&&jQuery("#_classic_orientation_wrapper").show()})}function i(){var e=jQuery(".bg-repeat-option, .bg-attachment-option, .bg-position-option");e.each(function(){jQuery(this).find("a").on("click",function(e){e.preventDefault(),jQuery(this).siblings().removeClass("selected").end().addClass("selected")})}),jQuery(".bg-image-preset-thumbs").find("a").on("click",function(e){e.preventDefault(),jQuery(this).parents(".bg-image-preset-thumbs").find("li").removeClass("selected").end().end().parent().addClass("selected")})}function s(){var e=jQuery(".header-section, .page-section, .footer-section, .body-section, .banner-section");e.each(function(){jQuery(this).on("click",function(e){e.preventDefault(),this_panel=jQuery(this),this_panel_rel=jQuery(this).attr("rel"),jQuery("#mk-bg-edit-panel").fadeIn(200),color_id="#"+this_panel_rel+"_color",image_id="#"+this_panel_rel+"_image",size_id="#"+this_panel_rel+"_size",parallax_id="#"+this_panel_rel+"_parallax",position_id="#"+this_panel_rel+"_position",repeat_id="#"+this_panel_rel+"_repeat",attachment_id="#"+this_panel_rel+"_attachment",source_id="#"+this_panel_rel+"_source",color_value=jQuery(color_id).val(),image_value=jQuery(image_id).val(),size_value=jQuery(size_id).val(),parallax_value=jQuery(parallax_id).val(),position_value=jQuery(position_id).val(),repeat_value=jQuery(repeat_id).val(),attachment_value=jQuery(attachment_id).val(),source_value=jQuery(source_id).val(),jQuery("#bg_panel_color").attr("value",color_value),jQuery("#bg_panel_color").siblings(".minicolors-swatch").find("span").css("background-color",color_value),jQuery("#bg_panel_stretch").attr("value",size_value),"true"==size_value?jQuery("#bg_panel_stretch").parent().removeClass("off").addClass("on"):jQuery("#bg_panel_stretch").parent().removeClass("on").addClass("off"),jQuery("#bg_panel_parallax").attr("value",parallax_value),"true"==parallax_value?jQuery("#bg_panel_parallax").parent().removeClass("off").addClass("on"):jQuery("#bg_panel_parallax").parent().removeClass("on").addClass("off"),jQuery('#mk-bg-edit-panel a[rel="'+position_value+'"]').siblings().removeClass("selected").end().addClass("selected"),jQuery('#mk-bg-edit-panel a[rel="'+repeat_value+'"]').siblings().removeClass("selected").end().addClass("selected"),jQuery('#mk-bg-edit-panel a[rel="'+attachment_value+'"]').siblings().removeClass("selected").end().addClass("selected"),"preset"==source_value&&""!=image_value?jQuery('#mk-bg-edit-panel a[rel="'+image_value+'"]').parent("li").siblings().removeClass("selected").end().addClass("selected"):"custom"==source_value&&""!=image_value&&(jQuery("#bg_panel_upload").attr("value",image_value),jQuery(".custom-image-preview-block img").attr("src",jQuery("#bg_panel_upload").val())),jQuery("#mk-bg-edit-panel").attr("rel",jQuery(this).attr("rel")),jQuery("#mk-bg-edit-panel").find(".mk-edit-panel-heading").text(jQuery(this).attr("rel")),jQuery(".bg-background-type-tabs").find('a[rel="'+source_value+'"]').parent().siblings().removeClass("current").end().addClass("current"),jQuery("#mk-bg-edit-panel").find(".bg-background-type-panes").children(".bg-background-type-pane").hide(),"preset"==source_value?jQuery("#mk-bg-edit-panel").find(".bg-background-type-pane.bg-image-preset").show():"no-image"==source_value?jQuery("#mk-bg-edit-panel").find(".bg-background-type-pane.bg-no-image").show():"custom"==source_value&&jQuery("#mk-bg-edit-panel").find(".bg-background-type-pane.bg-edit-panel-upload").show(),jQuery("#mk-bg-edit-panel").find(".bg-background-type-tabs a").on("click",function(e){e.preventDefault(),jQuery("#mk-bg-edit-panel").find(".bg-background-type-panes").children(".bg-background-type-pane").hide(),jQuery(this).parent().siblings().removeClass("current").end().addClass("current"),"preset"==jQuery(this).attr("rel")?jQuery("#mk-bg-edit-panel").find(".bg-background-type-pane.bg-image-preset").show():"no-image"==jQuery(this).attr("rel")?jQuery("#mk-bg-edit-panel").find(".bg-background-type-pane.bg-no-image").show():"custom"==jQuery(this).attr("rel")&&jQuery("#mk-bg-edit-panel").find(".bg-background-type-pane.bg-edit-panel-upload").show()})})})}function o(){jQuery("#mk_apply_bg_selector").on("click",function(e){e.preventDefault(),panel=jQuery("#mk-bg-edit-panel"),panel_source=panel.attr("rel"),section_preview_class="."+panel_source+"-section",color=panel.find("#bg_panel_color").val(),bg_size=panel.find("#bg_panel_stretch").val(),bg_parallax=panel.find("#bg_panel_parallax").val(),position=jQuery(".bg-position-option").find(".selected").attr("rel"),repeat=jQuery(".bg-repeat-option").find(".selected").attr("rel"),attachment=jQuery(".bg-attachment-option").find(".selected").attr("rel"),image_source=jQuery(".bg-background-type-tabs").find(".current").children("a").attr("rel"),"preset"==image_source?image=jQuery(".bg-image-preset-thumbs").find(".selected").children("a").attr("rel"):"custom"==image_source?image=jQuery("#bg_panel_upload").val():"no-image"==image_source&&(image=""),color_id="#"+panel_source+"_color",image_id="#"+panel_source+"_image",size_id="#"+panel_source+"_size",parallax_id="#"+panel_source+"_parallax",position_id="#"+panel_source+"_position",repeat_id="#"+panel_source+"_repeat",attachment_id="#"+panel_source+"_attachment",source_id="#"+panel_source+"_source",jQuery(color_id).attr("value",color),jQuery(image_id).attr("value",image),jQuery(size_id).attr("value",bg_size),jQuery(parallax_id).attr("value",bg_parallax),jQuery(position_id).attr("value",position),jQuery(repeat_id).attr("value",repeat),jQuery(attachment_id).attr("value",attachment),jQuery(source_id).attr("value",image_source),""!=image&&jQuery(section_preview_class).find(".mk-bg-preview-layer").css({"background-image":"url("+image+")"}),"no-image"==image_source&&jQuery(section_preview_class).find(".mk-bg-preview-layer").css({"background-image":"none"}),jQuery(section_preview_class).find(".mk-bg-preview-layer").css({"background-color":color,"background-position":position,"background-repeat":repeat,"background-attachment":attachment}),panel.fadeOut(200),panel.find("#bg_panel_color").val(""),jQuery(".bg-position-option").find(".selected").removeClass("selected"),jQuery(".bg-repeat-option").find(".selected").removeClass("selected"),jQuery(".bg-attachment-option").find(".selected").removeClass("selected"),jQuery("#bg_panel_upload").val(""),jQuery(".bg-image-preset-thumbs").find(".selected").removeClass("selected"),jQuery(".custom-image-preview-block img").attr("src","")})}function l(){jQuery(".page-section, .body-section, .header-section, .footer-section, .banner-section").each(function(){this_panel=jQuery(this),this_panel_rel=this_panel.attr("rel"),color_id="#"+this_panel_rel+"_color",image_id="#"+this_panel_rel+"_image",position_id="#"+this_panel_rel+"_position",repeat_id="#"+this_panel_rel+"_repeat",attachment_id="#"+this_panel_rel+"_attachment",color=jQuery(color_id).val(),image=jQuery(image_id).val(),position=jQuery(position_id).val(),repeat=jQuery(repeat_id).val(),attachment=jQuery(attachment_id).val(),""!=image&&jQuery(this_panel).find(".mk-bg-preview-layer").css({"background-image":"url("+image+")"}),jQuery(this_panel).find(".mk-bg-preview-layer").css({"background-color":color,"background-position":position,"background-repeat":repeat,"background-attachment":attachment})})}function n(){jQuery(".mk-specific-bg-selector").each(function(){var e="#"+jQuery(this).attr("id");background_source_type=jQuery(e).find(".specific-image-source").val(),jQuery(e).find(".bg-background-type-tabs li a").each(function(){jQuery(this).attr("rel")==background_source_type&&jQuery(this).parent().addClass("current")}),"preset"==background_source_type?jQuery(e).find(".bg-background-type-pane.specific-image-preset").show():"no-image"==background_source_type?jQuery(e).find(".bg-background-type-pane.specific-no-image").show():"custom"==background_source_type&&jQuery(e).find(".bg-background-type-pane.specific-edit-panel-upload").show(),jQuery(e).find(".bg-background-type-tabs li a").on("click",function(a){a.preventDefault(),jQuery(e).find(".specific-image-source").val(jQuery(this).attr("rel")),jQuery(e).find(".bg-background-type-panes").children(".bg-background-type-pane").hide(),jQuery(this).parent().siblings().removeClass("current").end().addClass("current"),"preset"==jQuery(this).attr("rel")?jQuery(e).find(".bg-background-type-pane.specific-image-preset").show():"no-image"==jQuery(this).attr("rel")?jQuery(e).find(".bg-background-type-pane.specific-no-image").show():"custom"==jQuery(this).attr("rel")&&jQuery(e).find(".bg-background-type-pane.specific-edit-panel-upload").show()}),jQuery(e).find(".mk-specific-edit-option-repeat").each(function(){saved_value=jQuery(this).find("input").val(),jQuery(this).find('a[rel="'+saved_value+'"]').siblings().removeClass("selected").end().addClass("selected"),repeat_saved_value=jQuery(this).find("input").val(),jQuery(this).find("a").click(function(){this_rel=jQuery(this).attr("rel"),jQuery(this).siblings("input").val(this_rel)})}),jQuery(e).find(".mk-specific-edit-option-attachment").each(function(){saved_value=jQuery(this).find("input").val(),jQuery(this).find('a[rel="'+saved_value+'"]').siblings().removeClass("selected").end().addClass("selected"),attachment_saved_value=jQuery(this).find("input").val(),jQuery(this).find("a").click(function(){this_rel=jQuery(this).attr("rel"),jQuery(this).siblings("input").val(this_rel)})}),jQuery(e).find(".mk-specific-edit-option-position").each(function(){saved_value=jQuery(this).find("input").val(),jQuery(this).find('a[rel="'+saved_value+'"]').siblings().removeClass("selected").end().addClass("selected"),jQuery(this).find("a").click(function(){this_rel=jQuery(this).attr("rel"),jQuery(this).siblings("input").val(this_rel)})}),jQuery(e).find(".mk-specific-edit-option-position").each(function(){saved_value=jQuery(this).find("input").val(),jQuery(this).find('a[rel="'+saved_value+'"]').siblings().removeClass("selected").end().addClass("selected"),jQuery(this).find("a").click(function(){this_rel=jQuery(this).attr("rel"),jQuery(this).siblings("input").val(this_rel)})}),jQuery(e).find(".specific-image-preset").each(function(){saved_value=jQuery(this).find("input").val(),jQuery(this).find('a[rel="'+saved_value+'"]').parent().siblings().removeClass("selected").end().addClass("selected"),jQuery(this).find("a").click(function(){this_rel=jQuery(this).attr("rel"),jQuery(this).parents(".specific-image-preset").find("input").val(this_rel)})})})}mk_upload_option(),mk_composer_toggle(),mk_color_picker(),mk_header_selector(),jQuery(".social_icon_select_sites").live("change",function(){var e=jQuery(this).closest("p").siblings(".social_icon_wrap");e.children("p").hide(),jQuery("option:selected",this).each(function(){e.find(".social_icon_"+this.value).show()})}),jQuery(".social_icon_custom_count").live("change",function(){var e=jQuery(this).closest("p").siblings(".social_custom_icon_wrap");e.children("div").hide();for(var a=jQuery(this).val(),t=1;a>=t;t++)e.find(".social_icon_custom_"+t).show()}),jQuery(".mk-toggle-button").each(function(){default_value=jQuery(this).find("input").val(),jQuery(this).addClass("true"==default_value?"on":"off"),jQuery(this).click(function(){jQuery(this).hasClass("on")?(jQuery(this).removeClass("on").addClass("off"),jQuery(this).find("input").val("false")):(jQuery(this).removeClass("off").addClass("on"),jQuery(this).find("input").val("true"))})}),mk_range_input(),jQuery(".mk-chosen").chosen(),jQuery(".mk-chosen-no-search").chosen({disable_search:!0}),jQuery("#special_fonts_list_1").change(function(){jQuery("#special_fonts_list_1 option:selected").each(function(){var e=jQuery(this).attr("data-type");jQuery("#special_fonts_type_1").val(e)})}).change(),jQuery("#special_fonts_list_2").change(function(){jQuery("#special_fonts_list_2 option:selected").each(function(){var e=jQuery(this).attr("data-type");jQuery("#special_fonts_type_2").val(e)})}).change(),jQuery("#add_sidebar_item").click(function(e){e.preventDefault();var a=jQuery(this).parents(".custom-sidebar-wrapper").siblings("#selected-sidebar").find(".default-sidebar-item").clone(!0),t=jQuery(this).siblings("#add_sidebar").val();""!=t&&(jQuery("#sidebars").val(jQuery("#sidebars").val()?jQuery("#sidebars").val()+","+jQuery("#add_sidebar").val():jQuery("#add_sidebar").val()),a.removeClass("default-sidebar-item").addClass("sidebar-item"),a.find(".sidebar-item-value").attr("value",t),a.find(".slider-item-text").html(t),jQuery("#selected-sidebar").append(a),jQuery(".sidebar-item").fadeIn(300),jQuery("#add_sidebar").val(""))}),jQuery(".sidebar-item").css("display","block"),jQuery(".delete-sidebar").click(function(e){e.preventDefault(),jQuery(this).parent("#sidebar-item").slideUp(300,function(){jQuery(this).remove(),jQuery("#sidebars").val(""),jQuery(".sidebar-item-value").each(function(){jQuery("#sidebars").val(jQuery("#sidebars").val()?jQuery("#sidebars").val()+","+jQuery(this).val():jQuery(this).val())})})}),jQuery("#add_tab_item").click(function(e){e.preventDefault();var a=jQuery("#mk-current-tabs").find(".default-tab-item").clone(!0),t=jQuery("#add_tab").val(),r=jQuery("#homepage_tabbed_box_pages_input").attr("data-title"),i=jQuery("#homepage_tabbed_box_pages_input").val();""!=t&&(jQuery("#homepage_tabs").val(jQuery("#homepage_tabs").val()?jQuery("#homepage_tabs").val()+","+jQuery("#add_tab").val():jQuery("#add_tab").val()),jQuery("#homepage_tabs_page_id").val(jQuery("#homepage_tabs_page_id").val()?jQuery("#homepage_tabs_page_id").val()+","+jQuery("#homepage_tabbed_box_pages_input").val():jQuery("#homepage_tabbed_box_pages_input").val()),jQuery("#homepage_tabs_page_title").val(jQuery("#homepage_tabs_page_title").val()?jQuery("#homepage_tabs_page_title").val()+","+jQuery("#homepage_tabbed_box_pages").find(".selected_item").text():jQuery("#homepage_tabbed_box_pages").find(".selected_item").text()),a.removeClass("default-tab-item").addClass("mk-tabbed-item"),a.find(".mk-tab-item-value").attr("value",t),a.find(".mk-tab-item-page-id").attr("value",i),a.find(".mk-tab-item-page-title").attr("value",r),a.find(".tab-title-text").html(t),a.find(".tab-content-pane").html(r),jQuery("#mk-current-tabs").append(a),jQuery(".mk-tabbed-item").fadeIn(300),jQuery("#add_tab").val(""))}),jQuery(".mk-tabbed-item").css("display","block"),jQuery(".delete-tab-item").click(function(e){e.preventDefault(),jQuery(this).parent(".mk-tabbed-item").slideUp(300,function(){jQuery(this).remove(),jQuery("#homepage_tabs").val(""),jQuery("#homepage_tabs_page_id").val(""),jQuery("#homepage_tabs_page_title").val(""),jQuery(".mk-tab-item-value").each(function(){jQuery("#homepage_tabs").val(jQuery("#homepage_tabs").val()?jQuery("#homepage_tabs").val()+","+jQuery(this).val():jQuery(this).val())}),jQuery(".mk-tab-item-page-id").each(function(){jQuery("#homepage_tabs_page_id").val(jQuery("#homepage_tabs_page_id").val()?jQuery("#homepage_tabs_page_id").val()+","+jQuery(this).val():jQuery(this).val())}),jQuery(".mk-tab-item-page-title").each(function(){jQuery("#homepage_tabs_page_title").val(jQuery("#homepage_tabs_page_title").val()?jQuery("#homepage_tabs_page_title").val()+","+jQuery(this).val():jQuery(this).val())})})}),jQuery("#add_header_social_item").click(function(e){e.preventDefault();var a=jQuery("#mk-current-social").find(".default-social-item").clone(!0),t=jQuery("#header_social_url").val(),r=jQuery("#header_social_sites_select").val();""!==t&&(jQuery("#header_social_networks_site").val(jQuery("#header_social_networks_site").val()?jQuery("#header_social_networks_site").val()+","+jQuery("#header_social_sites_select").val():jQuery("#header_social_sites_select").val()),jQuery("#header_social_networks_url").val(jQuery("#header_social_networks_url").val()?jQuery("#header_social_networks_url").val()+","+jQuery("#header_social_url").val():jQuery("#header_social_url").val()),a.removeClass("default-social-item").addClass("mk-social-item"),a.find(".mk-social-item-site").attr("value",r),a.find(".mk-social-item-url").attr("value",t),a.find(".social-item-url").html(t),a.find(".social-item-icon").html('<i class="twc-theme-icon-simple-'+r+'"></i>'),jQuery("#mk-current-social").append(a),jQuery(".mk-social-item").fadeIn(300),jQuery("#header_social_url").val(""))}),jQuery(".mk-social-item").css("display","block"),jQuery(".delete-social-item").click(function(e){e.preventDefault(),jQuery(this).parent(".mk-social-item").slideUp(200,function(){jQuery(this).remove(),jQuery("#header_social_networks_url").val(""),jQuery("#header_social_networks_site").val(""),jQuery(".mk-social-item-site").each(function(){jQuery("#header_social_networks_site").val(jQuery("#header_social_networks_site").val()?jQuery("#header_social_networks_site").val()+","+jQuery(this).val():jQuery(this).val())}),jQuery(".mk-social-item-url").each(function(){jQuery("#header_social_networks_url").val(jQuery("#header_social_networks_url").val()?jQuery("#header_social_networks_url").val()+","+jQuery(this).val():jQuery(this).val())})})}),e(),mk_visual_selector(),jQuery(".mk-fancy-selectbox").each(function(){var e=jQuery(this),a=jQuery(".mk-selector-heading",this),t=jQuery(".mk-selector-heading",this).outerWidth(),r=jQuery(".mk-select-options",this),i=r.find(".selected").text(),s=r.find(".selected").attr("data-color");r.css("width",t),e.hasClass("color-based")?""!=i?(a.find(".selected_item").text(i),a.find(".selected_color").css("background",s)):a.find(".selected_item").text("Select Color ..."):a.find(".selected_item").text(""!=i?i:"Select Option ..."),r.addClass("hidden"),a.click(function(){r.hasClass("hidden")?(e.addClass("selectbox-focused"),r.show().removeClass("hidden").addClass("visible")):(r.hide().removeClass("visible").addClass("hidden"),e.removeClass("selectbox-focused"))}),e.bind("clickoutside",function(a){r.hide(),r.removeClass("visible").addClass("hidden"),e.removeClass("selectbox-focused")}),select_options_height=r.outerHeight(),select_options_height>300&&r.css({height:"300px",overflow:"scroll","overflow-x":"hidden"}),r.find(".mk-select-option").on("click",function(e){e.stopPropagation(),$select_option=jQuery(this),$select_option.siblings().removeClass("selected"),$select_option.addClass("selected"),$select_option.siblings("input").attr("value",$select_option.attr("value")),selected_item=$select_option.text(),$select_option.parent(".mk-select-options").siblings(".mk-selector-heading").find(".selected_item").text(selected_item),$select_option.parent(".mk-select-options").hide().removeClass("visible").addClass("hidden"),$select_option.parents(".mk-fancy-selectbox").removeClass("selectbox-focused"),$select_option.parents(".mk-fancy-selectbox").hasClass("color-based")&&a.find(".selected_color").css("background",$select_option.attr("data-color")),"homepage_tabbed_box_pages"==r.parent().attr("id")&&$select_option.siblings("input").attr("data-title",$select_option.text())})}),jQuery(".masterkey-options-page, .mk-main-pane, .mk-options-container").tabs(),jQuery(".masterkey-options-page, .mk-main-pane, .mk-options-container, .mk-sub-pane").removeClass("ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs ui-widget ui-widget-content ui-corner-all"),jQuery(".mk-main-navigator, .mk-sub-navigator").removeClass("ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all"),jQuery(".mk-main-navigator li, .mk-sub-navigator li").removeClass("ui-state-default ui-corner-top ui-corner-bottom"),a(),t(),r(),mk_background_orientation=jQuery("#background_selector_orientation").val(),"full_width_layout"==mk_background_orientation?jQuery("#boxed_layout_shadow_size_wrapper, #boxed_layout_shadow_intensity_wrapper").hide():jQuery("#boxed_layout_shadow_size_wrapper, #boxed_layout_shadow_intensity_wrapper").show(),jQuery(".mk-general-bg-selector").addClass(jQuery("#background_selector_orientation").val()),jQuery(".background_selector_orientation a, #background_selector_orientation_container a").click(function(){"full_width_layout"==jQuery(this).attr("rel")?(jQuery(".mk-general-bg-selector").removeClass("boxed_layout").addClass("full_width_layout"),jQuery("#boxed_layout_shadow_size_wrapper, #boxed_layout_shadow_intensity_wrapper").hide()):(jQuery(".mk-general-bg-selector").removeClass("full_width_layout").addClass("boxed_layout"),body_section_width=jQuery(".mk-general-bg-selector .outer-wrapper").width(),jQuery(".mk-general-bg-selector.boxed_layout .body-section").css("width",body_section_width),jQuery("#boxed_layout_shadow_size_wrapper, #boxed_layout_shadow_intensity_wrapper").show())}),i(),s(),jQuery("#mk_cancel_bg_selector, .mk-bg-edit-panel-heading-cancel").on("click",function(e){e.preventDefault(),jQuery("#mk-bg-edit-panel").fadeOut(200)}),jQuery(document).keyup(function(e){27==e.keyCode&&jQuery("#mk_cancel_bg_selector, .mk-bg-edit-panel-heading-cancel").click()}),jQuery(document).keyup(function(e){13==e.keyCode&&jQuery("#mk_apply_bg_selector").click()}),o(),l(),n()}),jQuery(document).ready(function(){jQuery(".masterkey-options-page form").each(function(){var e=jQuery(this);jQuery("button",e).bind("click keypress",function(){e.data("callerid",this.id)})}),jQuery("form#masterkey_settings").submit(function(){function e(){var e=jQuery("#masterkey_settings input, #masterkey_settings select, #masterkey_settings textarea[name!=theme_export_options]").serialize();return e}var a=jQuery(this).data("callerid");jQuery(":hidden").change(e),jQuery("select").change(e);var t=e();return jQuery("#mk-saving-settings").bPopup({zIndex:100,modalColor:"#fff"}),data=t+"&button_clicked="+a,jQuery.post(ajaxurl,data,function(e){jQuery("#mk-saving-settings").bPopup().close(),show_message(e)}),!1}),jQuery("#mk_reset_confirm").click(function(){return jQuery("#mk-are-u-sure").bPopup({zIndex:100,modalColor:"#fff"}),!1}),jQuery("#mk_reset_cancel").click(function(){return jQuery("#mk-are-u-sure").bPopup().close(),!1}),jQuery("#mk_reset_ok").click(function(){return jQuery("#mk-are-u-sure").bPopup().close(),jQuery("#reset_theme_options").trigger("click"),!1}),jQuery("#masterkey_settings input").keypress(function(e){13==e.which&&e.preventDefault()})});var timer;resize_body_section(),jQuery(window).resize(function(){clearTimeout(timer),setTimeout(resize_body_section,100)}),function(e){e.fn.bPopup=function(a,t){function r(){e.isFunction(n.onOpen)&&n.onOpen.call(u),_=(c.data("bPopup")||0)+1,p="__bPopup"+_,h="auto"!==n.position[1],m="auto"!==n.position[0],g="fixed"===n.positionStyle,j=o(u,n.amsl),Q=h?n.position[1]:j[1],f=m?n.position[0]:j[0],y=l(),n.modal&&e('<div class="bModal '+p+'"></div>').css({"background-color":n.modalColor,height:"100%",left:0,opacity:0,position:"fixed",top:0,width:"100%","z-index":n.zIndex+_}).each(function(){n.appending&&e(this).appendTo(n.appendTo)}).animate({opacity:n.opacity},n.fadeSpeed),u.data("bPopup",n).data("id",p).css({left:!n.follow[0]&&m||g?f:d.scrollLeft()+f,position:n.positionStyle||"absolute",top:!n.follow[1]&&h||g?Q:d.scrollTop()+Q,"z-index":n.zIndex+_+1}).each(function(){if(n.appending&&e(this).appendTo(n.appendTo),null!=n.loadUrl)switch(n.contentContainer=e(n.contentContainer||u),n.content){case"iframe":e('<iframe scrolling="no" frameborder="0"></iframe>').attr("src",n.loadUrl).appendTo(n.contentContainer);
break;default:n.contentContainer.load(n.loadUrl)}}).fadeIn(n.fadeSpeed,function(){e.isFunction(t)&&t.call(u),s()})}function i(){return n.modal&&e(".bModal."+u.data("id")).fadeOut(n.fadeSpeed,function(){e(this).remove()}),u.stop().fadeOut(n.fadeSpeed,function(){null!=n.loadUrl&&n.contentContainer.empty()}),c.data("bPopup",0<c.data("bPopup")-1?c.data("bPopup")-1:null),n.scrollBar||e("html").css("overflow","auto"),e("."+n.closeClass).die("click."+p),e(".bModal."+p).die("click"),d.unbind("keydown."+p),c.unbind("."+p),u.data("bPopup",null),e.isFunction(n.onClose)&&setTimeout(function(){n.onClose.call(u)},n.fadeSpeed),!1}function s(){c.data("bPopup",_),e("."+n.closeClass).live("click."+p,i),n.modalClose&&e(".bModal."+p).live("click",i).css("cursor","pointer"),(n.follow[0]||n.follow[1])&&c.bind("scroll."+p,function(){y&&u.stop().animate({left:n.follow[0]&&!g?d.scrollLeft()+f:f,top:n.follow[1]&&!g?d.scrollTop()+Q:Q},n.followSpeed)}).bind("resize."+p,function(){(y=l())&&(j=o(u,n.amsl),n.follow[0]&&(f=m?f:j[0]),n.follow[1]&&(Q=h?Q:j[1]),u.stop().each(function(){g?e(this).css({left:f,top:Q},n.followSpeed):e(this).animate({left:m?f:f+d.scrollLeft(),top:h?Q:Q+d.scrollTop()},n.followSpeed)}))}),n.escClose&&d.bind("keydown."+p,function(e){27==e.which&&i()})}function o(e,a){var t=(c.width()-e.outerWidth(!0))/2,r=(c.height()-e.outerHeight(!0))/2-a;return[t,20>r?20:r]}function l(){return c.height()>u.outerHeight(!0)+20&&c.width()>u.outerWidth(!0)+20}e.isFunction(a)&&(t=a,a=null);var n=e.extend({},e.fn.bPopup.defaults,a);n.scrollBar||e("html").css("overflow","hidden");var u=this,d=e(document),c=e(window),_,p,y,h,m,g,j,Q,f;return this.close=function(){n=u.data("bPopup"),i()},this.each(function(){u.data("bPopup")||r()})},e.fn.bPopup.defaults={amsl:50,appending:!0,appendTo:"body",closeClass:"bClose",content:"ajax",contentContainer:null,escClose:!0,fadeSpeed:250,follow:[!0,!0],followSpeed:500,loadUrl:null,modal:!0,modalClose:!0,modalColor:"#000",onClose:null,onOpen:null,opacity:.7,position:["auto","auto"],positionStyle:"absolute",scrollBar:!0,zIndex:9997}}(jQuery),function(e,a,t){function r(r,i){function s(a){e(o).each(function(){var t=e(this);this===a.target||t.has(a.target).length||t.triggerHandler(i,[a.target])})}i=i||r+t;var o=e(),l=r+"."+i+"-special-event";e.event.special[i]={setup:function(){o=o.add(this),1===o.length&&e(a).bind(l,s)},teardown:function(){o=o.not(this),0===o.length&&e(a).unbind(l)},add:function(e){var a=e.handler;e.handler=function(e,t){e.target=t,a.apply(this,arguments)}}}}e.map("click dblclick mousemove mousedown mouseup mouseover mouseout change select submit keydown keypress keyup".split(" "),function(e){r(e)}),r("focusin","focus"+t),r("focusout","blur"+t),e.addOutsideEvent=r}(jQuery,document,"outside");