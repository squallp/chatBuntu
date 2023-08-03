<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="{{ asset('js/app.js') }}" defer></script>

<link rel="preconnect" href="https://www.google.com">
<link rel="preconnect" href="https://www.gstatic.com" crossorigin>
<script async src="https://www.google.com/recaptcha/api.js"></script>
<script>
  // How this code snippet works:
  // This logic overwrites the default behavior of `grecaptcha.ready()` to
  // ensure that it can be safely called at any time. When `grecaptcha.ready()`
  // is called before reCAPTCHA is loaded, the callback function that is passed
  // by `grecaptcha.ready()` is enqueued for execution after reCAPTCHA is
  // loaded.
  if(typeof grecaptcha === 'undefined') {
    grecaptcha = {};
  }
  grecaptcha.ready = function(cb){
    if(typeof grecaptcha === 'undefined') {
      // window.__grecaptcha_cfg is a global variable that stores reCAPTCHA's
      // configuration. By default, any functions listed in its 'fns' property
      // are automatically executed when reCAPTCHA loads.
      const c = '___grecaptcha_cfg';
      window[c] = window[c] || {};
      (window[c]['fns'] = window[c]['fns']||[]).push(cb);
    } else {
      cb();
    }
  }

  // Usage
  grecaptcha.ready(function(){
    grecaptcha.render("container", {
      sitekey: "ABC-123"
    });
  });
</script>
<script>
   function onSubmit(token) {
     document.getElementById("captcha-form").submit();
   }
 </script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
