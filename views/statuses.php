<?php include('components/layout-up.php'); ?>

    <h1>Lead Statuses</h1>

    <form method="GET" action="statuses.php">
        <button type="submit" name="date-asc"
            style="margin-bottom: 10px; background-color: #28a745; color: #fff; padding: 10px 20px; border: none; cursor: pointer;"
            >Oldest</button>
    </form>
    <form method="GET" action="statuses.php">
        <button type="submit" name="date-desc"
            style="background-color: #28a745; color: #fff; padding: 10px 20px; border: none; cursor: pointer;"
            >Newest</button>
    </form>
    
    <div>
        <h2>Filter Leads by Date</h1>
        
        <form method="get" action="statuses.php">
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date" required>
            
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" id="end_date" required>
            
            <input type="submit" value="Filter">
        </form>
    </div>
    

    <table>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Status</th>
        </tr>

        <?php
            include('./../statuses.php');
            foreach ($data['data'] as $lead) {
                echo "<tr>";
                echo "<td>" . $lead['id'] . "</td>";
                echo "<td>" . $lead['email'] . "</td>";
                echo "<td>" . $lead['status'] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>

<?php include('components/layout-down.php'); ?>