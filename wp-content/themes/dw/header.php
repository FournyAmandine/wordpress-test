<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= wp_title('•', false, 'right') . get_bloginfo('name') ?></title>
</head>
<body>
<header>
    <h1><?= get_bloginfo('name') ?></h1>
    <p><?= get_bloginfo('description') ?></p>
    <nav class="nav">
        <h2 class="sro"><?=__hepl('Navigation principale')?></h2>
        <ul class="nav__container">
            <?php foreach (dw_get_navigation_links('header')as $link): ?>
            <li class="nav__item nav__item--<?= $link->icon; ?>">
                <a href="<?=$link->href;?>" class="nav__link"><?=$link->label;?></a>
            </li>
            <?php endforeach; ?>
        </ul>
        <div class="languages">
            <ul class="languages__container">
                <?php foreach (pll_the_languages(['raw' => true]) as $lang): ?>
                    <li class="languages__item<?= $lang['current_lang'] ? ' languages__item--current' : '' ?>">
                        <a href="<?= $lang['url'] ?>" lang="<?= $lang['locale'] ?>" hreflang="<?= $lang['locale'] ?>"
                           class="languages__link"><?= $lang['name'] ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </nav>
</header>
<main>