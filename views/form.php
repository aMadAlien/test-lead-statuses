<?php include('components/layout-up.php'); ?>
    <h1>Data Submission Form</h1>
    <form class="form" method="post" action="addlead.php">
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" required><br>

        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" required><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <input type="submit" value="Submit">
    </form>
<?php include('components/layout-down.php'); ?>