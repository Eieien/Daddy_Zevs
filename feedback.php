<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/constants.css?v=<?php echo time(); ?>" >
    <link rel="stylesheet" href="./styles/header_footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/settings.css?v=<?php echo time(); ?>">
    <title>Feedback</title>
</head>
<body>
    <?php include('./user_nav.php') ?>
    
    <main class="content" style="width: 75vw;">
        <?php include('./setting_nav.php') ?>
        <section id="setting">
            <h1>Feedback</h1>
            <div class="prefact">
                <div class="banner">
                    Your Opinion Matters! Share your thoughts and help us improve
                </div>
                <div class="desc">
                    Sweeten Our Day with Your Feedback! 🍰 We’d love to hear what you think, your thoughts help us bake up the best treats and serve you even better. Share your experience and help us make every bite even better!
                </div>
            </div>
            <form id="feedback">
                <div class="form-grid">
                    <div class="name">
                        <p>
                            Name
                        </p>
                        <input type="text" placeholder="e.g. Jane Doe">
                    </div>
                    <div class="email">
                        <p>
                            Email
                        </p>
                        <input type="email" placeholder="JaneDoe@email.com">
                    </div>
                </div>
                <div class="rating">
                    <div>
                        How Would you rate your Experience?
                    </div>
                    <div>
                        Star

                    </div>
                </div>
                <div class="comment">
                    <textarea placeholder="Comments"></textarea>
                </div>
                <button type="submit" class="submit">Submit</button>
            </form>
        </section>
    </main>
</body>
</html>