jQuery(document).ready(function($) {
    // CREATE
    $("#submitAuthor").click(function(e) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });
        e.preventDefault();

        // Validate the phone number input
        var phoneInput = jQuery("#phone");
        var phoneValue = phoneInput.val();
        var phonePattern = /^(\+)?\d+$/;
        if (!phonePattern.test(phoneValue)) {
            phoneInput.addClass("error");
            phoneInput.after(
                "<span class='error-message'>Please enter a valid phone number</span>"
            );
            return;
        } else {
            phoneInput.removeClass("error");
            jQuery(".error-message").remove();
        }

        var formData = {
            id: jQuery("#last_author_id").val(),
            firstname: jQuery("#firstname").val(),
            lastname: jQuery("#lastname").val(),
            email: jQuery("#email").val(),
            adress: jQuery("#adress").val(),
            // phone: jQuery("#phone").val(),
            phone: phoneValue,
            departement: jQuery("#departement").val(),
            institution: jQuery("#institution").val(),
            city: jQuery("#city").val(),
            state: jQuery("#state").val(),
            country: jQuery("#country").val(),
        };
        var statee = jQuery("#submitAuthor").val();
        var type = "POST";
        var todo_id = jQuery("#todo_id").val();
        var ajaxurl = "todo";
        $.ajax({
            type: type,
            url: "addAuthor",
            data: formData,
            dataType: "json",
            success: function(data) {
                console.log(data.message.id);

                var todo =
                    '<tr id="todo-list' +
                    data.message.id +
                    '"><td>' +
                    data.message.firstname +
                    "</td><td>" +
                    data.message.lastname +
                    "</td><td class='email'>" +
                    data.message.email +
                    "</td><td>" +
                    data.message.adress +
                    "</td><td>" +
                    data.message.phone +
                    "</td><td>" +
                    data.message.departement +
                    "</td><td>" +
                    data.message.institution +
                    "</td><td>" +
                    data.message.city +
                    "</td><td>" +
                    data.message.state +
                    "</td><td>" +
                    data.message.country +
                    "</td><td><button type='button' class='delete-author-btn' data-author-id='" +
                    data.message.id +
                    "'><i class='fa fa-trash'></i></button></td></tr>";
                if (statee == "add") {
                    jQuery("#todo-list").append(todo);
                    // jQuery("#saved-data-table").html(todo);
                } else {
                    jQuery("#todo" + todo_id).replaceWith(todo);
                }

                jQuery("#step2-form").trigger("reset");
                jQuery("#addAuthor").modal("hide");

                // Show the saved data in a table below
                var tableRow =
                    '<tr class="soufiane' + data.message.id + '" id = "todo-list' +
                    data.message.id +
                    '"><td>' +
                    data.message.firstname +
                    "</td><td>" +
                    data.message.lastname +
                    "</td><td class='email'>" +
                    data.message.email +
                    "</td><td>" +
                    data.message.adress +
                    "</td><td>" +
                    data.message.phone +
                    "</td><td>" +
                    data.message.departement +
                    "</td><td>" +
                    data.message.institution +
                    "</td><td>" +
                    data.message.city +
                    "</td><td>" +
                    data.message.state +
                    "</td><td>" +
                    data.message.country +
                    "</td><td><button type='button' class='delete-author-btn' data-author-id='" +
                    data.message.id +
                    "'><i class='fa fa-trash'></i></button></td></tr>";
                jQuery("#saved-data-table").append(tableRow);
            },
            error: function(data) {
                alert("Data Not Saved :(");
            },
        });
    });

    $("#saved-data-table").on("click", ".delete-author-btn", function(e) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });
        e.preventDefault();

        var authorId = $(this).data("author-id");
        console.log(authorId);

        if (authorId === undefined) {
            alert("No Author ID");
            return;
        }

        var deleteUrl = "/deleteAuthor/" + authorId;

        $.ajax({
            url: deleteUrl,
            type: "GET",
            success: function(data) {
                // $("body").on("click", ".delete-author-btn", function() {
                // $(this).parents("tr").remove();
                // });
                $('.soufiane' + authorId).remove();

                console.log("Success" + data);
            },
            error: function(error) {
                console.log("Error" + error);
            },
        });
    });
});

// Delete author with AJAX
// $(".delete-author-btn").click(function () {
//     var authorId = $(this).data("author-id");
//     console.log(authorId);

//     if (!authorId) {
//         alert("Author ID is missing!");
//         return;
//     }

//     var deleteUrl = "deleteAuthor/" + authorId;

//     $.ajax({
//         url: deleteUrl,
//         type: "GET",
//         success: function (data) {
//             console.log(data);
//         },
//         error: function (error) {
//             console.log(error);
//         },
//     });
// });

var keywordList = [];

var addKeywordBtn = document.getElementById("addKeywordBtn");
var keywordListElem = document.getElementById("keywordList");
var form = document.getElementById("my-form");

addKeywordBtn.addEventListener("click", function() {
    var keywordInput = document.getElementById("keywords");
    var keyword = keywordInput.value.trim();

    if (
        keyword !== "" &&
        keywordList.length < 5 &&
        !keywordList.includes(keyword)
    ) {
        keywordList.push(keyword);

        var li = document.createElement("li");
        li.textContent = keyword;
        keywordListElem.appendChild(li);

        keywordInput.value = "";
    }
});

form.addEventListener("submit", function() {
    var keywordsInput = document.getElementById("keywords");
    keywordsInput.value = keywordList.join(",");
});

$(document).ready(function() {
    $("input[type=radio][name=disclosure]").change(function() {
        if (this.value === "provide_disclosure") {
            $("#disclosure_field").show();
        } else {
            $("#disclosure_field").hide();
        }
    });
});