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
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                deleteModalDiv.removeClass("flex").addClass("hidden");
                $(`#item-${elementId}`).remove();
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            },
        });
    });
});
