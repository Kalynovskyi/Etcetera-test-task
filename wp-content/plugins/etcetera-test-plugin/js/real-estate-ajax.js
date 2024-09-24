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

                $(".pagination a").eq(0).addClass("active");
            },
        });
    });

    $(document).on("click", ".pagination a", function (event) {
        event.preventDefault();

        //Prevent loading the same page
        if ($(this).hasClass('active')) return;

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

                $(".pagination a").eq(page - 1).addClass("active");
            },
        });
    });
});
