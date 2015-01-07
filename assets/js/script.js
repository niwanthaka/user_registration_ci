
$(document).ready(

  function () {
    $( "#datepicker" ).datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true, //this option for allowing user to select from year range
      yearRange: '1950:2015',
      dateFormat: 'yy-mm-dd'
    });
  }

);