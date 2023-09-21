<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="<?php echo $serverName ?>favicon.ico">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $serverName ?>img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $serverName ?>img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $serverName ?>img/favicon/favicon-16x16.png">
<link rel="mask-icon" href="<?php echo $serverName ?>img/favicon/safari-pinned-tab.svg" color="#5bbad5">

<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
<meta http-equiv = "content-language" content = "es">

<meta name="copyright" content="Eduteka" />
<meta name="keywords" content="educaci&oacute;n, tecnolog&iacute;a, tecnologia, TIC, evento, innovaci&oacute;n, innovacion, educativa, talleres, taller, certificado, conferencia, Eduteka, mi espacio, Web 2.0, proyectos, curriculos, recursos, enlaces, videos, fotografias, educacion, tecnologia, WebQuest, indicador ETM" />
<link rel="canonical" href="https://edtk.co/" />
<meta name="Resource-type" content="Document">
<meta name="Revisit-after" content="1 days">
<meta name="robots" content="all">
<meta name="robots" content="index" />
<meta name="robots" content="follow" />


<!-- Primary Meta Tags -->
<title><?php echo $tituloPagina; ?></title>
<meta name="title" content="<?php echo $tituloPagina; ?>">
<meta name="description" content="<?php echo $descripcionPagina; ?>">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo $urlPagina; ?>">
<meta property="og:title" content="<?php echo $tituloPagina; ?>">
<meta property="og:description" content="<?php echo $descripcionPagina; ?>">
<meta property="og:image" content="<?php echo $imagePagina != "" ? $imagePagina : $imagePaginaDefault; ?>">
<meta property="og:site_name" content="https://edtk.co/">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="<?php echo $urlPagina; ?>">
<meta property="twitter:title" content="<?php echo $tituloPagina; ?>">
<meta property="twitter:description" content="<?php echo $descripcionPagina; ?>">
<meta property="twitter:image" content="<?php echo $imagePagina != "" ? $imagePagina : $imagePaginaDefault; ?>">

<!--   jQuery   -->
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<!-- Font awesome 4 -->
<link rel="stylesheet" href="<?php echo $serverName ?>lib/font-awesome-4/css/font-awesome.css">

<!-- Boostrap 4 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

<!-- aos -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<!-- Estilos General -->
<link rel="stylesheet" href="<?php echo $serverName ?>css/nabar.css">
<link rel="stylesheet" href="<?php echo $serverName ?>css/btn.css">
<link rel="stylesheet" href="<?php echo $serverName ?>css/general.css">

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-5E5GD1TSY3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-5E5GD1TSY3');
</script>
