
$(document).ready(function(){
    $('#province').change(function(){
        var prvId = $('#province').val();
        $.ajax({
            url: 'model/getCitiesName.php',
            method: 'post',
            data: 'prvId=' + prvId
        }).done(function(cities){
            cities = JSON.parse(cities);
            $('#city').empty();
            cities.forEach(function(city){
            $('#city').append(`<option value = ${city.id}>` + city.name + "</option>");
            })
        })
    })
})
    