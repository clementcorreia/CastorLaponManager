$(document).ready(function() {
    $("#campus").on("change", function() {
        var value = $(this).val();
        var valueCompetence = $("#competence").val();
        var valueSearch = $("#search").val();
        if(valueSearch === null) {
            valueSearch = 0;
        }
        if(valueCompetence === null) {
            valueCompetence = 0;
        }
        document.location.href = Routing.generate('clm_intervenants_search', {'idCampus': value, 'idCompetence': valueCompetence, 'search': valueSearch});
    });
    $("#competence").on("change", function() {
        var value = $(this).val();
        var valueCampus = $("#campus").val();
        var valueSearch = $("#search").val();
        if(valueSearch === null) {
            valueSearch = 0;
        }
        if(valueCampus === null) {
            valueCampus = 0;
        }
        document.location.href = Routing.generate('clm_intervenants_search', {'idCampus': valueCampus, 'idCompetence': value, 'search': valueSearch});
    });
    $("#search").on("keydown", function(event) {
        if(event.which == 13) {
            var value = $(this).val();
            var valueCampus = $("#campus").val();
            if(valueCampus === null) {
                valueCampus = 0;
            }
            var valueCompetence = $("#competence").val();
            if(valueCompetence === null) {
                valueCompetence = 0;
            }
            document.location.href = Routing.generate('clm_intervenants_search', {'idCampus': valueCampus, 'idCompetence': valueCompetence, 'search': value});
        }
    });
});