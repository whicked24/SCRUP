



$('#guardar').click(function() {
  if ($('#formCenso').smkValidate()) {
    // Code here
    $.smkAlert({
      text: 'Validate!',
      type: 'success'
    });
  }
});

