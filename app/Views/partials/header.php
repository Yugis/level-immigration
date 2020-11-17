<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- STYLES -->
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <?php if (session()->get('isLoggedIn')) : ?>
        <a class="navbar-brand" href="#">Logged in as: <?php echo session()->get('name') ?></a>
    <?php endif; ?>
</nav>

<body>