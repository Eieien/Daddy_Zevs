<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Userbase</title>
    <link rel="stylesheet" href="../styles/constants.css?v=<?php echo time(); ?>" >
    <link rel="stylesheet" href="../styles/header_footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../styles/userbase.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php require "admin_header.php"; ?>
    <main class="content" style="width: 75vw;">
        <?php require "admin_nav.php"; ?>

        <section id="user-list">
            <h1>Users</h1>
        </section>

        <form action='../data/admin-data.php' method='post' id="del-user">
            <input type="hidden" name="user-id">
        </form>
    </main>

    <script>
        let user_list = document.getElementById("user-list");

        fetch("../data/json/users-json.php")
            .then(response => response.json())
            .then(users => users.forEach((user) => {
                let userCard = document.createElement('div');
                userCard.className = "user-card";

                if(!user.address) user.address = "No Address";

                userCard.innerHTML =
                `<img src='../images/icons/user.svg'>

                <div id='user-info'>
                    <div id='name-email'>
                        <h2>${user.first_name} ${user.last_name}</h2>
                        <span>${user.email}</span>
                    </div>
                    <p>${user.address}</p>
                </div>

                <div id='remove-button'>
                    <button name="remove-user" onclick='removeUser(${user.customer_id})'>Remove User</button>
                </div>`;

                console.log(user.customer_id);

                user_list.append(userCard);
            }))
            .catch(error => console.error('Error:', error));

            function removeUser(id){
                document.querySelector("input[name='user-id']").value = id;
                document.getElementById("del-user").submit();
            }
    </script>
</body>
</html>