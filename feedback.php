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
            <form id="feedback" action="./data/user-data.php" method="post">
                <div class="form-grid">
                    <div class="name">
                        <p>Name</p>
                        <input type="text" value="<?php echo $_SESSION["fname"]." ".$_SESSION["lname"]; ?>" disabled>
                    </div>
                    <div class="email">
                        <p>Email</p>
                        <input type="email" value="<?php echo $_SESSION["email"]; ?>" disabled>
                    </div>
                </div>
                <div class="rating">
                    <div>
                        How Would you rate your Experience?
                    </div>
                    <div class="star-container">
                        <svg class="star" data-value="1" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 19.8333L7 23.3333L8.75 16.3333L3.5 10.5L11.0833 9.91667L14 3.5L16.9167 9.91667L24.5 10.5L19.25 16.3333L21 23.3333L14 19.8333Z" stroke="#3464DD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <svg class="star" data-value="2" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 19.8333L7 23.3333L8.75 16.3333L3.5 10.5L11.0833 9.91667L14 3.5L16.9167 9.91667L24.5 10.5L19.25 16.3333L21 23.3333L14 19.8333Z" stroke="#3464DD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <svg class="star" data-value="3" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 19.8333L7 23.3333L8.75 16.3333L3.5 10.5L11.0833 9.91667L14 3.5L16.9167 9.91667L24.5 10.5L19.25 16.3333L21 23.3333L14 19.8333Z" stroke="#3464DD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <svg class="star" data-value="4" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 19.8333L7 23.3333L8.75 16.3333L3.5 10.5L11.0833 9.91667L14 3.5L16.9167 9.91667L24.5 10.5L19.25 16.3333L21 23.3333L14 19.8333Z" stroke="#3464DD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <svg class="star" data-value="5" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 19.8333L7 23.3333L8.75 16.3333L3.5 10.5L11.0833 9.91667L14 3.5L16.9167 9.91667L24.5 10.5L19.25 16.3333L21 23.3333L14 19.8333Z" stroke="#3464DD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <!-- gets rating value -->
                    <input type="hidden" name="rating">
                </div>
                <div class="comment">
                    <textarea placeholder="Comments" name="comment"></textarea>
                </div>
                <button type="submit" class="submit" name="submit-feedback">Submit</button>
            </form>
        </section>
    </main>

    <script>
        const stars = document.querySelectorAll('.star');
        var rating = 0;
        stars.forEach(star => {
            star.addEventListener('mouseover', () => {
                resetStars();
                highlightStars(star.dataset.value);
            });

            star.addEventListener('mouseout', () => {
                resetStars();
                highlightStars(rating);
            });

            star.addEventListener('click', () => {
                rating = star.dataset.value;
                document.querySelector("input[name='rating']").value = rating;
            });
        })

        function highlightStars(count){
            stars.forEach(star => {
                if(star.dataset.value <= count){
                    star.classList.add('hover');
                }
            });
        }

        function resetStars(){
            stars.forEach(star => {
                star.classList.remove('hover');
            });
        }
    </script>
</body>
</html>