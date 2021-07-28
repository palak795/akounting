(function(window, undefined) {
  'use strict';

  /*
  NOTE:
  ------
  PLACE HERE YOUR OWN JAVASCRIPT CODE IF NEEDED
  WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR JAVASCRIPT CODE PLEASE CONSIDER WRITING YOUR SCRIPT HERE.  */

})(window);
$("body").on("click", 'a.delete', function () {
  var from = $(this).parent('form');
  var form_id = $(this).data("form_id");
  swal({
    title: 'Are you sure?',
    text: 'You won\'t be able to revert this!',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!',
    closeOnConfirm: true,
    closeOnCancel: true
  }).then(function (isConfirm) {
    if (isConfirm.value) {
      $('#' + form_id).submit();
    }
  }).catch(swal.noop)
});

$("body").on("click", 'a.restore', function () {
  var from = $(this).parent('form');
  var form_id = $(this).data("form_id");
  swal({
    title: 'Are you sure?',
    text: 'You won\'t be able to revert this!',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, restore it!',
    closeOnConfirm: true,
    closeOnCancel: true
  }).then(function (isConfirm) {
    if (isConfirm.value) {
      $('#' + form_id).submit();
    }
  }).catch(swal.noop)
});
$('#deleteTrigger').on('click', function () {
  swal({
    title: 'Are you sure?',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!',
    closeOnConfirm: true,
    closeOnCancel: true
  }).then(function (isConfirm) {
    if (isConfirm.value) {
      $('#delete_all').submit();
    }
  }).catch(swal.noop)
});

$('.checkboxes').click(function () {
  $('input:checkbox').prop('checked', this.checked);
});
$(document).on('click', '.page-link', function () {

  $('.checkboxes').removeAttr('checked');
});

$('#restoreTrigger').on('click', function () {
  swal({
    title: 'Are you sure?',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, restore it!',
    closeOnConfirm: true,
    closeOnCancel: true
  }).then(function (isConfirm) {
    if (isConfirm.value) {
      $('#restore_all').submit();
    }
  }).catch(swal.noop)
});