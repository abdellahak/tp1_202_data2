import "./bootstrap";
import $ from "jquery";

$(document).ready(function () {
    const deleteModalDiv = $("#deleteModalDiv");
    const deleteConfirm = $("#deleteConfirm");
    const deleteAnnuler = $("#deleteAnnuler");
    let elementId;

    $(".deleteButton").on("click", function (event) {
        elementId = $(this).data("id");
        deleteModalDiv.removeClass("hidden").addClass("flex");
    });

    deleteAnnuler.on("click", function () {
        deleteModalDiv.removeClass("flex").addClass("hidden");
    });

    deleteConfirm.on("click", function (event) {
        event.preventDefault();
        $.ajax({
            url: `${deleteRouteBaseUrl}/${elementId}`,
            type: "DELETE",
            headers: {
                "X-CSRF-TOKEN": $('input[type="hidden"]').val(),
            },
            success: function (response) {
                deleteModalDiv.removeClass("flex").addClass("hidden");
                if (deleteConfirm.data("form") == "show") {
                    window.location.href = deleteRouteBaseUrl;
                } else {
                    $(`#item-${elementId}`).remove();
                    deleteConfirm.closest("tr").remove();
                }
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            },
        });
    });
});
