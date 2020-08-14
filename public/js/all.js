
// $(document).ready(function () {
//   $(function () {
//     const Toast = Swal.mixin({
//       toast: true,
//       position: 'top-end',
//       showConfirmButton: false,
//       timer: 3000
//     });

//     $('.swalDefaultSuccess').click(function () {
//       Toast.fire({
//         icon: 'success',
//         title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       });
//     });
//     $('.swalDefaultInfo').click(function () {
//       Toast.fire({
//         icon: 'info',
//         title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.swalDefaultError').click(function () {
//       Toast.fire({
//         icon: 'error',
//         title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.swalDefaultWarning').click(function () {
//       Toast.fire({
//         icon: 'warning',
//         title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.swalDefaultQuestion').click(function () {
//       Toast.fire({
//         icon: 'question',
//         title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });

//     $('.toastrDefaultSuccess').click(function () {
//       toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
//     });
//     $('.toastrDefaultInfo').click(function () {
//       toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
//     });
//     $('.toastrDefaultError').click(function () {
//       toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
//     });
//     $('.toastrDefaultWarning').click(function () {
//       toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
//     });

//     $('.toastsDefaultDefault').click(function () {
//       $(document).Toasts('create', {
//         title: 'Toast Title',
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultTopLeft').click(function () {
//       $(document).Toasts('create', {
//         title: 'Toast Title',
//         position: 'topLeft',
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultBottomRight').click(function () {
//       $(document).Toasts('create', {
//         title: 'Toast Title',
//         position: 'bottomRight',
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultBottomLeft').click(function () {
//       $(document).Toasts('create', {
//         title: 'Toast Title',
//         position: 'bottomLeft',
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultAutohide').click(function () {
//       $(document).Toasts('create', {
//         title: 'Toast Title',
//         autohide: true,
//         delay: 750,
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultNotFixed').click(function () {
//       $(document).Toasts('create', {
//         title: 'Toast Title',
//         fixed: false,
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultFull').click(function () {
//       $(document).Toasts('create', {
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
//         title: 'Toast Title',
//         subtitle: 'Subtitle',
//         icon: 'fas fa-envelope fa-lg',
//       })
//     });
//     $('.toastsDefaultFullImage').click(function () {
//       $(document).Toasts('create', {
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
//         title: 'Toast Title',
//         subtitle: 'Subtitle',
//         image: '../../dist/img/user3-128x128.jpg',
//         imageAlt: 'User Picture',
//       })
//     });
//     $('.toastsDefaultSuccess').click(function () {
//       $(document).Toasts('create', {
//         class: 'bg-success',
//         title: 'Toast Title',
//         subtitle: 'Subtitle',
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultInfo').click(function () {
//       $(document).Toasts('create', {
//         class: 'bg-info',
//         title: 'Toast Title',
//         subtitle: 'Subtitle',
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultWarning').click(function () {
//       $(document).Toasts('create', {
//         class: 'bg-warning',
//         title: 'Toast Title',
//         subtitle: 'Subtitle',
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultDanger').click(function () {
//       $(document).Toasts('create', {
//         class: 'bg-danger',
//         title: 'Toast Title',
//         subtitle: 'Subtitle',
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultMaroon').click(function () {
//       $(document).Toasts('create', {
//         class: 'bg-maroon',
//         title: 'Toast Title',
//         subtitle: 'Subtitle',
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });




//   });
//   // ==============================
//   function swet(titlet = 'تم', icont = 'success') {
//     $(function () {
//       const Toast = Swal.mixin({
//         toast: true,
//         position: 'top-end',
//         showConfirmButton: false,
//         timer: 3000
//       });
//       Toast.fire({
//         icon: icont,
//         title: titlet
//       });
//     });

//     // ===========================
//     // get classrooms of any level
//     $(document).on('click', '.level', function (e) {
//       e.preventDefault();
//       var route = $(this).attr('data-route');
//       var id = $(this).attr('data-div');
//       // 
//       $.ajax({
//         type: "get",
//         url: route,
//         success: function (data) {
//           // $(this).prepend(data);
//           $('#' + id).html(data);
//           swet('تم بنجاح .', 'success');
//           // $(this).html(data);
//           // $('#body').html(data);
//           // $('#addcsv').attr("style")

//           // console.log(data);
//         },
//         error: function (xhr, status, error) {
//           swet('error', 'info');
//         }
//       })
//     });
//     // update classroom
//     $(document).on('click', '.classrome-edit', function (e) {
//       e.preventDefault();
//       var route = $(this).attr('data-route');

//       // var id= $(this).attr('data-div');
//       // 
//       // console.log(route);
//       $.ajax({
//         type: "get",
//         url: route,
//         dataType: "JSON",
//         success: function (databack) {
//           // $(this).prepend(data);
//           // $('#'+id).html(data);
//           // swet('تم بنجاح .','info');
//           // $(this).html(data);
//           // $('#body').html(data);
//           // $('#addcsv').attr("style")
//           $('#id').val(databack.id);
//           $('#uuid').val(databack.uuid);
//           $('#name').val(databack.name);
//           $('#code').val(databack.code);
//           $('#school_id').val(databack.school_id);
//           $('#level_id').val(databack.level_id);
//           $('#teacher_id').val(databack.teacher_id);



//           // console.log(databack);
//         },
//         error: function (xhr, status, error) {
//           swet('error', 'info');
//         }
//       })
//     });
//     // تعديل اوعرض بيانات المشرف لكل مرحلة
//     $(document).on('click', '.level-supervisor', function (e) {
//       e.preventDefault();
//       var route = $(this).attr('data-route');
//       var model = $('#form-supervisor-body-in-model');
//       // var id= $(this).attr('data-div');
//       // 
//       // console.log(route);
//       $.ajax({
//         type: "get",
//         url: route,
//         success: function (databack) {
//           model.html(databack);
//           //   $('#id').val(databack.id);
//           //   $('#uuid').val(databack.uuid);
//           //   $('#name').val(databack.name);
//           //   $('#code').val(databack.code);
//           //   $('#school_id').val(databack.school_id);
//           //   $('#level_id').val(databack.level_id);
//           //   $('#teacher_id').val(databack.teacher_id);    
//           console.log(databack);
//         },
//         error: function (xhr, status, error) {
//           swet('error', 'info');
//         }
//       });
//     });
//     // get students where class uuid
//     $(document).on('click', '.students-all', function (e) {
//       e.preventDefault();
//       $('#table-students').html('');
//       var route = $(this).attr('data-route');
//       var classname = $(this).attr('class-name');
//       // 
//       $.ajax({
//         type: "get",
//         url: route,
//         // dataType:"JSON",
//         success: function (databack) {
//           // $('#'+id).html(data);
//           $('#table-students').html(databack);

//           $('#table-students').prepend('<h3 class="text-center">' + classname + '</h3>');

//           swet('تم بنجاح .', 'success');
//           // $(this).html(data);
//           // $('#body').html(data);
//           // $('#addcsv').attr("style")

//           // console.log(databack);
//         },
//         error: function (xhr, status, error) {
//           swet(status, 'info')
//         }
//       });
//       $('#TABLE-heid').show();
//     });
//     // ===========================

//     $(document).on('click', '.sahe', function (e) {
//       var id = $(this).parents('tr');

//       swet('حاضر', 'success');
//       $(id).fadeOut().remove(id);
//     });// =========================
//     $(document).on('click', '.nom', function (e) {
//       var id = $(this).parents('tr');
//       swet('غايب', 'warning');
//       $(id).fadeOut().remove(id);
//       $('.child').remove();
//     });
//     // ===========================
//   };
// });
// const emojis = require('emojis-list');
// var emo = require('emojis-list');

// console.log(emojis[0]);
// define(["jquery", "jquery.validate"], function( $ ) {
// 	$("form").validate();
// });