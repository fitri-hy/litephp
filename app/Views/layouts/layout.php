<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
	<meta name="description" content="<?= $description ?>">
    <meta name="keywords" content="<?= $keywords ?>">
    <meta name="author" content="I-As.Dev">
    <meta name="robots" content="index, follow">

	<meta property="og:title" content="<?= $title ?>">
    <meta property="og:description" content="<?= $description ?>">
    <meta property="og:image" content="<?= $basePath ?>/images/og.jpg">
    <meta property="og:url" content="<?= $baseURL ?>">
    <meta property="og:type" content="website">
	
	<link rel="icon" href="<?= $basePath ?>/images/logo.png" type="image/png">
    <link rel="stylesheet" href="<?= $basePath ?>/css/style.css">
	<script src="https://cdn.tailwindcss.com"></script>

</head>
<body>

    <?php include __DIR__ . '/../partials/header.php'; ?>
    <main class="container flex flex-col m-auto pt-16 min-h-[85vh] justify-center items-center">
        <?= $content ?>
    </main>
    <?php include __DIR__ . '/../partials/footer.php'; ?>

    <script src="<?= $basePath ?>/js/app.js" defer></script>
</body>
</html>
