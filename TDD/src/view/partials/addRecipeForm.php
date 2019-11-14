<head>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            let count = 1;
            $("#addIngredientBtn").click(function() {
                $("#ingredient-amount" + count++).parent("div").after(
                    '<div class="ingredient"><input placeholder="Ingredient" id="ingredient-name' +
                    count + '"/><input placeholder="Amount" id="ingredient-amount' + count + '"/> <select><option value="dl">dl</option><option value="kg">kg</option><option value="g">g</option><option value="cl">cl</option><option value="tbsp">tbsp</option><option value="tsp">tsp</option><option value="ml">ml</option><option value="l">l</option><option value="hg">hg</option><option value="pcs">pcs</option></select></div>');
            });
        })
    </script>
</head>
<h2>Add recipe</h2>
<form method="get" class="add-recipe-form">
    <!-- Name, Author, Servings, Tag -->
    <input type="text" name="title" placeholder="Title" />
    <input type="text" name="author" placeholder="Author" />

    <label for="servings">Servings:</label>
    <select id="servings">
        <option value="two">2</option>
        <option value="four">4</option>
        <option value="six">6</option>
        <option value="eight">8</option>
        <option value="ten">10</option>
        <option value="twelve">12</option>
    </select>
    <label for="tag">Tag</label>
    <select id="tag">
        <option value="breakfast">Breakfast</option>
        <option value="lunch">Lunch</option>
        <option value="dinner">Dinner</option>
    </select>
    <br>

    <!-- Add Ingredient -->
    <h3>Ingredients</h3>
    <div class="ingredient">
        <input type="text" id="ingredient-name1" placeholder="Ingredient" />
        <input type="text" id="ingredient-amount1" placeholder="Amount" />
        <select name="measurement" id="measurement">
            <option value="dl">dl</option>
            <option value="kg">kg</option>
            <option value="g">g</option>
            <option value="cl">cl</option>
            <option value="tbsp">tbsp</option>
            <option value="tsp">tsp</option>
            <option value="ml">ml</option>
            <option value="l">l</option>
            <option value="hg">hg</option>
            <option value="pcs">pcs</option>
        </select>
    </div>
    <div class="add-ingredient">
        <button type="button" id="addIngredientBtn" class="btn btn-success">+</button>
    </div>
    <br>
    <!-- Instructions -->
    <h3>Instructions</h3>
    <textarea name="instruction" id="instruction" placeholder="Write instructions, for example: Set the oven to 200 degrees" cols="50" rows="3"></textarea>
    <br>
    <input type="submit" name="submit" value="Add recipe" />
</form>