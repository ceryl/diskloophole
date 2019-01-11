$(document).ready(function () {
    $('#search').on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $('#myTable tr').filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    $('#category').on("change", function () {
        var d = document.getElementById('category').value;
        $('#myTable tr').filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(d) > -1)
        });
    });

    $('#sub-category').on("change", function () {
        var d = document.getElementById('category').value;
        $('#myTable tr').filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(d) > -1)
        });
    });
});