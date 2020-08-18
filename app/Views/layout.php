<?php
// Make sure the Auth helper is available
helper('auth');
?><!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>CI4 Playground</title>
</head>
<body>

<div class="container">
    <h1>CodeIgniter 4 Playground</h1>

	<nav>
		<div><?= anchor('/', 'Home') ?></div>
		<div><?= anchor('home/restricted', 'Restricted') ?></div>
		<div><?= logged_in() ? anchor('logout', 'Log Out') : anchor('login', 'Log In'); ?></div>
	</nav>

    <br>

    <?= $this->renderSection('content') ?>
    <?= $this->renderSection('main') ?>

    <br>
    <hr>

    <div class="footer row">
        <div class="col">
            <p>Page rendered in {elapsed_time} seconds.</p>
        </div>
        <div class="col">
            <p class="text-center">PHP <?= phpversion() ?></p>
        </div>
        <div class="col">
            <p class="text-right">Environment: <?= ENVIRONMENT ?></p>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
