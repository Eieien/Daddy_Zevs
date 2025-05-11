<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback List</title>
    <link rel="stylesheet" href="../styles/constants.css?v=<?php echo time(); ?>" >
    <link rel="stylesheet" href="../styles/header_footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../styles/feedback.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include "admin_header.php"; ?>

    <main class="content" style="width: 75vw;">
        <?php include "admin_nav.php"; ?>

        <section>   
            <h1>Feedback</h1>

            <div id="feedback-list"></div>

            <!-- <?php
                for( $i = 0; $i < 5; $i++){
                    echo
                    "<div class='user-card'>
                        <div id='user-info'>
                            <div class='user-flex'>
                                <div id='name-email'>
                                    <img src='../images/icons/user.svg'>
                                    <div class='user-details'>
                                        <h2 class='user-name'>John Doe</h2>
                                        <p class='user-date'>August 25,2025</p>
                                    </div>
                                    <h2 class='email'>Johndoe@gmail.com</h2>
                                </div>
                                <div class='user-rate'>
                                    <span class='number-rate'>4/5</span>
                                    <img src=''>
                                    <img src=''>
                                    <img src=''>
                                    <img src=''>
                                    <img src=''>
                                </div>
                            </div>
                            <p class='user-comments'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit 
                                in voluptate velit esse asdasdasdadwasdwasdwasdwasdwasdwasdwasdwasdwasdwasdwasdwasdwadwcillum dolore eu fugiat nulla pariatur. Excepteur sint oasdadadaAHhaccaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </p>
                        </div>
                    </div>";  
                }     
            ?> -->
        </section>

    </main>

    <script>
        let feedback_list = document.getElementById("feedback-list");
        const options = { // date format options
            month: 'long',
            day: 'numeric',
            year: 'numeric',
            // hour: 'numeric',
            // minute: '2-digit',
            // second: '2-digit',
            hour12: true
        };

        fetch("../data/json/feedback-json.php")
            .then(response => response.json())
            .then(reviews => reviews.forEach((feedback) => {
                let feedbackCard = document.createElement('div');
                feedbackCard.className = "feedback-card";

                const dateStr = feedback.submit_time;
                const dateObj = new Date(dateStr.replace(" ", "T")); // replaces space with 'T' for ISO-compliancy
                const feedbackDate = dateObj.toLocaleString('en-US', options);

                feedbackCard.innerHTML =
                `<div class="user-rating-container">
                    <div class="user-profile">
                        <img src="../images/icons/user.svg">
                        <div>
                            <div class="name-email">
                                <h2>${feedback.first_name} ${feedback.last_name}</h2>   
                                <span>${feedback.email}</span>
                            </div>
                            <p>${feedbackDate}</p>
                        </div>
                    </div>
                    <div class="rating">
                        <h3 class="total-rating">
                            ${feedback.rating}/5
                        </h3>
                        <div class="star-container" id="${feedback.feedback_id}">
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14 19.8333L7 23.3333L8.75 16.3333L3.5 10.5L11.0833 9.91667L14 3.5L16.9167 9.91667L24.5 10.5L19.25 16.3333L21 23.3333L14 19.8333Z" stroke="#3464DD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14 19.8333L7 23.3333L8.75 16.3333L3.5 10.5L11.0833 9.91667L14 3.5L16.9167 9.91667L24.5 10.5L19.25 16.3333L21 23.3333L14 19.8333Z" stroke="#3464DD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14 19.8333L7 23.3333L8.75 16.3333L3.5 10.5L11.0833 9.91667L14 3.5L16.9167 9.91667L24.5 10.5L19.25 16.3333L21 23.3333L14 19.8333Z" stroke="#3464DD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14 19.8333L7 23.3333L8.75 16.3333L3.5 10.5L11.0833 9.91667L14 3.5L16.9167 9.91667L24.5 10.5L19.25 16.3333L21 23.3333L14 19.8333Z" stroke="#3464DD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14 19.8333L7 23.3333L8.75 16.3333L3.5 10.5L11.0833 9.91667L14 3.5L16.9167 9.91667L24.5 10.5L19.25 16.3333L21 23.3333L14 19.8333Z" stroke="#3464DD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="user-comment-container">${feedback.comment}</div>`;

                feedback_list.append(feedbackCard);

                const star = document.getElementById(String(feedback.feedback_id)).querySelectorAll('svg');
                for(let i = 0; i < feedback.rating; i++) star[i].classList.add("star");
            }))
            .catch(error => console.error('Error:', error));
    </script>
</body>
</html>