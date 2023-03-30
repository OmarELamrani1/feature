// Get the form type select element
const formTypeSelect = document.getElementById('type');

// Get the form divs title
const researchForm = document.getElementById('researchTitleForm');
const researchForm2 = document.getElementById('researchTitleForm2');
const clinicalForm = document.getElementById('clinicalTitleForm');
const clinicalForm2 = document.getElementById('clinicalTitleForm2');

// Get the form divs input
const researchInput = document.getElementById('research-fields');
// const researchInput2 = document.getElementById('researchTitleForm2');
const clinicalInput = document.getElementById('clinical-fields');
// const clinicalInput2 = document.getElementById('clinicalTitleForm2');

// Function to show the selected form and hide the other one
function showSelectedForm() {
  const selectedForm = formTypeSelect.value;

  if (selectedForm === 'Research Paper') {
    researchForm.style.display = 'block';
    researchForm2.style.display = 'block';
    clinicalForm.style.display = 'none';
    clinicalForm2.style.display = 'none';
    researchInput.style.display = 'block';
    clinicalInput.style.display = 'none';
  }

  else if (selectedForm === 'Clinical Case') {
    researchForm.style.display = 'none';
    researchForm2.style.display = 'none';
    clinicalForm.style.display = 'block';
    clinicalForm2.style.display = 'block';
    researchInput.style.display = 'none';
    clinicalInput.style.display = 'block';
  }

  else {
    researchForm.style.display = 'none';
    researchForm2.style.display = 'none';
    clinicalForm.style.display = 'none';
    clinicalForm2.style.display = 'none';
    researchInput.style.display = 'none';
    clinicalInput.style.display = 'none';
  }
}

// Add event listener to the form type select element
formTypeSelect.addEventListener('change', showSelectedForm);

// $(document).ready(function () {

//     $("#type").change(function () {
//         if ($(this).val() === "Research Paper") {
//             // Hide clinical fields and show research fields
//             $("#clinical-fields").hide();
//             $("#research-fields").show();
//             $("#researchTitleForm").show();
//             $("#clinicalTitleForm").hide();
//         } else if ($(this).val() === "Clinical Case") {
//             // Hide Research fields and show Clinical fields
//             $("#research-fields").hide();
//             $("#clinical-fields").show();
//             $("#researchTitleForm").hide();
//             $("#clinicalTitleForm").show();
//         } else {
//             // il user makhtar walo 7yed kulshi :
//             $("#research-fields").hide();
//             $("#clinical-fields").hide();
//             $("#researchTitleForm").hide();
//             $("#clinicalTitleForm").hide();
//         }
//     });
// });

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
        var formData = {
            firstname: jQuery("#firstname").val(),
            lastname: jQuery("#lastname").val(),
            email: jQuery("#email").val(),
            adress: jQuery("#adress").val(),
            phone: jQuery("#phone").val(),
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
                var tableRow =
                    '<tr id="todo-list' +
                    data.id +
                    '"><td>' +
                    data.firstname +
                    "</td><td>" +
                    data.lastname +
                    "</td><td>" +
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
                $("#saved-data-table").append(tableRow);
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
