<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
        

  <title>OAPI restaurant</title>
 
  <!-- Favicons -->
  <link href="assets/img/Le dromadaire.jpg" rel="icon">
  <link href="assets/img/Le dromadaire.jpg" rel="apple-touch-icon">

 
    </head>
    <body >
   
 @inertia

    </body>
</html>
