 //send email
 $('#contact').submit(function (event) {
   event.preventDefault();
   var formData = {
     'Nome': $('input[name=name]').val(),
     'Email': $('input[name=email]').val(),
     'Assunto': $('input[name=subject]').val(),
     'Telefone': $('input[name=phone]').val(),
     'Celular': $('input[name=celphone]').val(),
     'Mensagem': $('textarea[name=message]').val(),

   };
   $.ajax({
     url: 'contato.php',
     method: 'POST',
     data: formData,
     dataType: 'json'
   }).done(function (data) {
     if (data === 'sucesso') {
       $('#contact').html('<h3 class="text-center">Obrigador por entrar em contato conosco, retornaremos em breve!</h3>');
     }
   });
 });


 //init ekkoLightbox
 $(document).on('click', '[data-toggle="lightbox"]', function (event) {
   event.preventDefault();
   $(this).ekkoLightbox();
 });

 //for vh/vw polyfill
 if (!Array.prototype.filter) {
   Array.prototype.filter = function (fun /*, thisp*/ ) {
     var len = this.length;
     if (typeof fun != "function")
       throw new TypeError();

     var res = new Array();
     var thisp = arguments[1];
     for (var i = 0; i < len; i++) {
       if (i in this) {
         var val = this[i]; // in case fun mutates this
         if (fun.call(thisp, val, i, this))
           res.push(val);
       }
     }
     return res;
   };
 }

 //smooth scroll
 $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function (event) {
   if (
     location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname
   ) {
     var target = $(this.hash);
     target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

     if (target.length) {
       event.preventDefault();
       $('html, body').animate({
         scrollTop: target.offset().top
       }, 1000, function () {
         var $target = $(target);
         $target.focus();
         if ($target.is(":focus")) {
           return false;
         } else {
           $target.attr('tabindex', '-1');
           $target.focus();
         };
       });
     }
   }
 });

 //mask plugin
 $(document).ready(function () {
   $('#phone').mask('(00) 0000-0000');
   $('#cel').mask('(00) 0 0000-0000');
 });

 //mobile only
 //hide btnmenu on open modal menu
 $('#modalMenu').on('show.bs.modal', function (e) {
   $('#btnMenu').fadeOut();
 });

 //show btnmenu on close modal menu
 $('#modalMenu').on('hide.bs.modal', function (e) {
   $('#btnMenu').fadeIn();
 });
 //close modal menu on click in <a> tag inside this
 $('#modalMenu').on('click', 'a', function (e) {
   $('#modalMenu').modal('hide');
 });