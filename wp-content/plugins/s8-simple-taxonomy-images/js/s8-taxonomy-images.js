jQuery(document).ready(function($) {
    var tbframe_interval;
    $("#s8_tax_image").focus(function() {
        tb_show("", "media-upload.php?type=image&amp;TB_iframe=true");
        tbframe_interval = setInterval(function() {$("#TB_iframeContent").contents().find(".savesend .button").val("Use This Image");}, 2000);
        return false;
    });
    window.send_to_editor = function(html) {
        clearInterval(tbframe_interval);
        console.log(html);
        imgurl = $('img',html).attr('src');
        imgclass = $('img',html).attr('class');
        $("#s8_tax_image").val(imgurl);
        $('#s8_tax_image_classes').val(imgclass);
        tb_remove();
    }
});
