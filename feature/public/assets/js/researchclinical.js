jQuery(document).ready(function ($) {
    // CREATE
    $("#submitAuthor").click(function (e) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });
        e.preventDefault();

        // // Phone validation
        // var phoneRegex = /^[0-9]{10}$/;
        // var phone = jQuery("#phone").val();
        // if (!phoneRegex.test(phone)) {
        //     alert("Please enter a valid phone number.");
        //     return;
        // }

        // Validate the phone number input
        var phoneInput = jQuery("#phone");
        var phoneValue = phoneInput.val();
        var phonePattern = /^\d{10}$/;
        if (!phonePattern.test(phoneValue)) {
            phoneInput.addClass("error");
            phoneInput.after("<span class='error-message'>Please enter a valid phone number (06 ..)</span>");
            return;
        } else {
            phoneInput.removeClass("error");
            jQuery(".error-message").remove();
        }

        var formData = {
            id: jQuery('#last_author_id').val(),
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
            success: function (data) {
                console.log(data);
                var todo =
                    '<tr id="todo-list' +
                    data.id +
                    '"><td>' +
                    data.firstname +
                    "</td><td>" +
                    data.lastname +
                    "</td><td class='email'>" +
                    data.email +
                    "</td><td>" +
                    data.adress +
                    "</td><td>" +
                    data.phone +
                    "</td><td>" +
                    data.departement +
                    "</td><td>" +
                    data.institution +
                    "</td><td>" +
                    data.city +
                    "</td><td>" +
                    data.state +
                    "</td><td>" +
                    data.country +
                    "</td></tr>";
                if (statee == "add") {
                    jQuery("#todo-list").append(todo);
                    // jQuery("#saved-data-table").html(todo);
                } else {
                    jQuery("#todo" + todo_id).replaceWith(todo);
                }

                jQuery("#step2-form").trigger("reset");
                jQuery("#addAuthor").modal("hide");

                // Show the saved data in a table below
                var tableRow = '<tr id="todo-list' + data.id + '">' +
                    '<td class="firstname">' + data.firstname + '</td>' +
                    '<td class="lastname">' + data.lastname + '</td>' +
                    '<td class="email">' + data.email + '</td>' +
                    '<td class="adress">' + data.adress + '</td>' +
                    '<td class="phone">' + data.phone + '</td>' +
                    '<td class="departement">' + data.departement + '</td>' +
                    '<td class="institution">' + data.institution + '</td>' +
                    '<td class="city">' + data.city + '</td>' +
                    '<td class="state">' + data.state + '</td>' +
                    '<td class="country">' + data.country + '</td>' +
                '</tr>';
                jQuery("#saved-data-table").append(tableRow);
            },
            error: function (data) {
                alert("Data Not Saved :(");
            },
        });
    });
});


var keywordList = [];

var addKeywordBtn = document.getElementById("addKeywordBtn");
var keywordListElem = document.getElementById("keywordList");
var form = document.getElementById("my-form");

addKeywordBtn.addEventListener("click", function () {
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

form.addEventListener("submit", function () {
    var keywordsInput = document.getElementById("keywords");
    keywordsInput.value = keywordList.join(",");
});

$(document).ready(function () {
    $("input[type=radio][name=disclosure]").change(function () {
        if (this.value === "provide_disclosure") {
            $("#disclosure_field").show();
        } else {
            $("#disclosure_field").hide();
        }
    });
});
