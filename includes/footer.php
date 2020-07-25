<script>
/*jslint browser:true*/
/*global jQuery, document*/

jQuery(document).ready(function () {
'use strict';
jQuery.datetimepicker.setLocale('fi');
jQuery('#datetimepicker').datetimepicker({
timepicker:false,
format:'d.m.Y',
maxDate:'+1970/01/01'
});
jQuery('#datetimepicker2').datetimepicker({
datepicker:false,
format:'H:i',
maxDate:'+1970/01/01'
});
});
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
event.preventDefault();
$(this).ekkoLightbox();
});
</script>