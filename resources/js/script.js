$(function () {
   window.$_validate = function $_validate(){
      $('form.validate').each(function() {
         $(this).validate({
            errorElement: 'span',

            errorPlacement: function(error, element) {
               error.addClass("invalid-feedback");
               error.attr('role', 'alert');
               // error.insertAfter($(element).parent('div').find('span').last());

               if (element.attr("type") == "checkbox" || element.attr("type") == "radio") {
                  var parentClasss = $(element).parents('div.form-group');

                  if($(parentClasss).hasClass('row')) {
                     $(parentClasss).find("div[class^='col-md-']").append(error);
                  }else{
                     $(parentClasss).append(error);
                  }
               } else {
                  var parent = $(element).parent();

                  if($(parent).is("[class^='col-md-'], [class^='input-group']")) {
                     $(parent).append(error);

                  }else {
                     error.insertAfter(element);
                  }

               }
            },
            // success: function ( label, element ) {
               // Add the span element, if doesn't exists, and apply the icon classes to it.
               // if (!$( element ).next("span")[0]) {
               //    $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($( element));
               // }
            // },
            highlight: function (element, errorClass, validClass) {
               $(element).parents('form').addClass('submit-disabled');

               if($(element).attr("type") == "radio" || $(element).attr("type") == "checkbox") {
                  $(element).parents('div.form-group').find('input[type=radio],input[type=checkbox]').each(function(){
                     $(this).addClass("is-invalid");
                  });
               } else {
                  $(element).addClass("is-invalid");
               }
            },
            unhighlight: function (element, errorClass, validClass) {
               if($(element).attr("type") == "radio" || $(element).attr("type") == "checkbox") {
                  $(element).parents('div.form-group').find('input[type=radio],input[type=checkbox]').each(function(){
                     $(this).removeClass("is-invalid");
                  });
                  $(element).parents('div.form-group').find('span.error').css('display','none');
               }else{
                  $(element).removeClass("is-invalid");
               }

            },
            rules: {
               pattern: { // <- NAME of every radio in the same group
                  required: true
               }
            },
            ignore: ":hidden",
            submitHandler: function(form) {
               //add disable submit button class
               if($(form).find('button[type="submit"],input[type="submit"]').hasClass('submit-disabled'))
               {
                  return false;
               }else{
                  $(form).find('button[type="submit"],input[type="submit"]').addClass('submit-disabled');
                  form.submit();
               }
            }
         });
      });
   }

   window.$_ajax_post = function $_ajax_post(route, data, container, placement, selector) {
      var dataContent = $('body').find(container);

      $.ajax({
         type: 'post',
         dataType: 'json',
         data: data,
         url: route,
         beforeSend: function() {
            if(selector && placement == 'append') {
               $(selector).nextAll().remove();
            }else {
               dataContent.html('');
            }
            $("#overlay").fadeIn(200);
         },
         success:function(res){
           $("#overlay").fadeOut(200);
            if(res.status == true) {

               if(placement == 'replace') {
                  dataContent.html(res.data);

               } else if(placement == 'append') {
                  dataContent.append(res.data);
               }
            }

         },
         error: function(jqXHR, textStatus, errorThrown) {
            if(jqXHR.status === 419) {
               window.location.href = loginUrl;
            }
         }
      });
   }

   // validate form
   $_validate();

   // validate form on submit click
   $('body').on('click','input[type="submit"], button[type="submit"]', function(e){
      if($(this).closest('form.validate').length){
         $_validate();
      }
   });

   $('#confirm-box').click(function(){
      $('#myModal').modal('show');
      $('#confirmation-message').html($(this).data('msg'));
      $('#redirection-url').val($(this).data('redirect-to'));
      return false;
   });

   $('#redirection-url').click(function() {
      var url = $(this).val();

      if(url) {
         window.location.href = url;
      }
   });

   $(window).keydown(function(event){
      if(event.keyCode == 13) {
      event.preventDefault();
         return false;
      }
   });

});
