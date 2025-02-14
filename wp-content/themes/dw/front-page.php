<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= wp_title('•', false, 'right') . get_bloginfo('name') ?></title>
</head>
<body>
    <header>
        <h1><?= get_bloginfo('name') ?></h1>
        <p><?= get_bloginfo('description') ?></p>
    </header>
    <main>
        <aside>
            <h2>Bienvenu sur mon site&nbsp;!</h2>
        </aside>
       <!-- // on ouvre la boucle
        // structure de controle de contenu pour wordpress-->
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

            <div><?= get_the_content(); ?></div>
        <!--on ferme la boucle-->
        <?php endwhile; else: ?>
        <p>La page est vide</p>
        <?php endif; ?>
    </main>
</body>
</html>