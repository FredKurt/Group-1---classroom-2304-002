<?php require_once __DIR__ . "/Controller.php"; ?>

<p><b>Create Booking</b></p>

<pre>
    <code>
    //should return 
        Array ( 
            [id] => uniqid
            [name] => x
            [date] => y 
            [time] => z 
            ) 
        
    </code>
</pre>

<form method="POST" action="/app/Controller.php">
    <input type="hidden" name="action" value="create" />
    <input type="hidden" name="type" value="booking" />
    <input type="text" name="name" placeholder="name" />
    <input type="text" name="time" placeholder="time" />
    <input type="text" name="date" placeholder="date" />
    <input type="submit" value="submit" />
</form>
<hr>
<pre>
    <code>
    //should return 
        true
        
    </code>
</pre>
<p><b>Delete Booking</b></p>
<form method="POST" action="/app/Controller.php">
    <input type="hidden" name="action" value="delete" />
    <input type="hidden" name="type" value="booking" />
    <input type="text" name="id" placeholder="id" />
    <input type="submit" value="submit" />

</form>
<hr>
<p>create slot </p>
<pre>
    <code>
    //should return 
        Array ( 
            [id] => uniqid
            [date] => x
            [time] => y 
            ) 
        
    </code>
</pre>

<form method="POST" action="/app/Controller.php">
    <input type="hidden" name="action" value="create" />
    <input type="hidden" name="type" value="slot" />
    <input type="text" name="time" placeholder="time" />
    <input type="text" name="date" placeholder="date" />
    <input type="submit" value="submit" />
</form>

<hr>
<p><b>Get slots</b></p>
<pre>
    <code>
    //should return 
        Array (
            "morning",
            "afternoon",
            "evening"
        )
    </code>
</pre>
<select>
    <?php
    $slots = $controller->Get("slots");
    foreach ($slots as $slot) :
        echo "<option>{$slot["time"]}</option>";
    endforeach;
    ?>
</select>


<hr>
<p><b>Get Bookings</b></p>
<pre>
    <code>
    //should return 
        Array (
        [
            "id" => uniqid(),
            "name" => "user X",
            "date" => "01-06-2023",
            "time" => "morning"
        ],
        [
            "id" => uniqid(),
            "name" => "user Y",
            "date" => "10-06-2023",
            "time" => "evening"
        ]
        )
    </code>
</pre>
<table>
    <tr>
        <th>
            ID
        </th>
        <th>
            Name
        </th>
        <th>
            Date
        </th>

        <th>
            Time
        </th>
    </tr>
    <?php
    $bookings = $controller->Get("bookings");
    foreach ($bookings as $booking) :
        echo <<<EOD
            <tr>
                 <td>{$booking["id"]}</td>
                 <td>{$booking["name"]}</td>
                 <td>{$booking["date"]}</td>
                 <td>{$booking["time"]}</td>
            </tr>
        
        EOD;
    endforeach;
    ?>
</table>