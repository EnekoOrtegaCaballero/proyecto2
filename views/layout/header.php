<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url?>/assets/css/styles.css" />
    <title>Document</title>
</head>

<body>
    <div id="container">
        <header>
            <div id="logo">
                <img src="<?=base_url?>/assets/img/camiseta.png" alt="Camiseta logo">
                <a href="index.php">
                    Tienda de camisetas
                </a>
            </div>
        </header>

        <nav id="menu">
            <?php $categorias = Utils::showCategorias(); ?>

            <ul>
                <li>
                    <a href="<?=base_url?>">Inicio</a>
                </li>

                <?php while ($cat = $categorias->fetch_object()) : ?>
                <li>
                    <a href="<?=base_url."/index.php?controller=Categoria&action=ver&id=".$cat->id; ?>"><?=$cat->nombre?></a>
                </li>

                <?php endwhile; ?>
            </ul>
        </nav>
