var mealsByCategory = {
    games: ["mmo", "rpg", "mmorpg", "others"],
    music: ["rap", "r&b", "frenchcore", "others"],
    movies: ["actie", "adult", "comedie", "others"]
};

function changecat(value) {
    if (value.length == 0) document.getElementById("sub-cat").innerHTML = "<option></option>";
    else {
        var catOptions = "";
        for (categoryId in mealsByCategory[value]) {
            catOptions += "<option>" + mealsByCategory[value][categoryId] + "</option>";
        }
        document.getElementById("sub-cat").innerHTML = catOptions;
    }
}
