jQuery(document).ready(function ($) {
    $("form#real-estate-filter-form").on("submit", function (event) {
        event.preventDefault();

        var formData = $(this).serialize(); 

        $.ajax({
            url: realEstateAjax.ajax_url,
            type: "GET",
            data: formData + "&action=real_estate_filter",
            beforeSend: function () {
                $("#real-estate-results").html("<p>Loading...</p>"); 
            },
            success: function (response) {
                $("#real-estate-results").html(response);
            },
        });
    });

    $(document).on("click", ".pagination a", function (event) {
        event.preventDefault();

        var page = $(this).data("page");
        var formData = $("form#real-estate-filter-form").serialize();

        $.ajax({
            url: realEstateAjax.ajax_url,
            type: "GET",
            data: formData + "&action=real_estate_filter&page=" + page,
            beforeSend: function () {
                $("#real-estate-results").html("<p>Loading...</p>");
            },
            success: function (response) {
                $("#real-estate-results").html(response);
            },
        });
    });
});
