var DateTimePicker = function() {
    var runDatePicker = function() {
        $('.date-picker').datepicker({
            autoclose: true
        });
    };
    //function to initiate bootstrap-timepicker
    var runTimePicker = function() {
        $('.time-picker').timepicker();
    };
    return {
        init: function() {

            runDatePicker();
            runTimePicker();
        }
    };
}();

var TextEditor = function() {
    //function to initiate ckeditor
    var runCKEditor = function () {
        CKEDITOR.disableAutoInline = true;
        $('textarea.ckeditor').ckeditor();
    };
    return {
        init: function() {

            runCKEditor();
        }
    };
}();

var DatePicker = function() {
    var runDatePicker = function() {
        $('.date-picker').datepicker({
            autoclose: true
        });
    };
    return {
        init: function() {

            runDatePicker();
        }
    };
}();

var TimePicker = function() {
  
    //function to initiate bootstrap-timepicker
    var runTimePicker = function() {
        $('.time-picker').timepicker();
    };
    return {
        init: function() {           
            runTimePicker();
        }
    };
}();


