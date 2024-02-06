<main>
    <form action="./php/actions/select_avaiable_rooms.php" method="POST"  class="form">
        <div>
            <label for="">Start date:</label>
            <input type="date" name="start_date">
        </div>
        <div>
            <label for="">End date:</label>
            <input type="date" name="end_date">
        </div>
        <div>
            <label for="">Number of guests:</label>
            <input type="number" name = "guests">
        </div>
        <input type="submit" name="submit" value="submit">
        
    </form>
</main>