// $(function() {
//     $('#introduction').summernote(),
//         $('#objective').summernote(),
//         $('#method').summernote(),
//         $('#result').summernote(),
//         $('#conclusion').summernote(),
//         $('#diagnosis').summernote(),
//         $('#treatment').summernote(),
//         $('#discussion').summernote()
// });

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

        // Validate the email input
        var emailInput = jQuery("#email");
        var emailValue = emailInput.val();
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(emailValue)) {
            emailInput.addClass("error");
            emailInput.after(
                "<span class='error-message'>Please enter a valid email address</span>"
            );
            return;
        } else {
            emailInput.removeClass("error");
            jQuery(".error-message").remove();
        }

        var formData = {
            id: jQuery("#last_author_id").val(),
            firstname: jQuery("#firstname").val(),
            lastname: jQuery("#lastname").val(),
            email: jQuery("#email").val(),
            adress: jQuery("#adress").val(),
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
                } else {
                    jQuery("#todo" + todo_id).replaceWith(todo);
                }

                jQuery("#firstname").val("");
                jQuery("#lastname").val(""),
                    jQuery("#email").val(""),
                    jQuery("#adress").val(""),
                    jQuery("#phone").val(""),
                    jQuery("#departement").val(""),
                    jQuery("#institution").val(""),
                    jQuery("#city").val(""),
                    jQuery("#state").val(""),
                    jQuery("#country").val(""),

                    $("#closeModal").trigger("click");

                // Show the saved data in a table below
                var tableRow =
                    '<tr class="dataIdAuthor' +
                    data.message.id +
                    '" id = "todo-list' +
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
                $(".dataIdAuthor" + authorId).remove();
                console.log("Success" + data);
            },
            error: function(error) {
                console.log("Error" + error);
            },
        });
    });



    const searchButton = document.querySelector('#search-button');
    searchButton.addEventListener('click', () => {

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });

        const lastNameInput = document.querySelector('#last-name');
        const authorsTableContainer = document.querySelector('#authors-table-container');
        const authorsTable = document.querySelector('#authors-table tbody');
        const noAuthorsMessage = document.querySelector('#no-authors-message');

        const lastname = lastNameInput.value.trim();

        const searchUrl = searchButton.dataset.searchUrl;

        jQuery("#last-name").val("");

        fetch(`${searchUrl}?lastname=${lastname}`)
            .then(response => response.json())
            .then(data => {
                authorsTable.innerHTML = '';

                if (data.authors.length === 0) {
                    noAuthorsMessage.style.display = 'block';
                    authorsTableContainer.style.display = 'none';
                } else {
                    noAuthorsMessage.style.display = 'none';
                    authorsTableContainer.style.display = 'block';

                    data.authors.forEach(author => {
                        if (author.id && author.firstname && author.lastname && author.email &&
                            author.adress && author.phone && author.departement && author
                            .institution && author.city && author.state && author.country) {
                            const tr = document.createElement('tr');
                            tr.innerHTML = `
                                    <td>${author.firstname}</td>
                                    <td>${author.lastname}</td>
                                    <td>${author.email}</td>
                                    <td>${author.adress}</td>
                                    <td>${author.phone}</td>
                                    <td>${author.departement}</td>
                                    <td>${author.institution}</td>
                                    <td>${author.city}</td>
                                    <td>${author.state}</td>
                                    <td>${author.country}</td>
                                    <td style="color:transparent;">${author.id}</td>
                                    <td>
                                        <button type="button" data-author-id="${author.id}" class="add-author-button">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </td>`;
                            authorsTable.appendChild(tr);
                        }
                    });

                    const authorsChoose = document.querySelector('#saved-data-table tbody');
                    const addAuthorButtons = document.querySelectorAll('.add-author-button');
                    addAuthorButtons.forEach(addAuthorButton => {
                        addAuthorButton.addEventListener('click', () => {
                            const authorId = addAuthorButton.dataset.authorId;
                            const authorIdInput = document.querySelector('#author-id');
                            authorIdInput.value = authorId;
                            const authorData = addAuthorButton.closest('tr')
                                .querySelectorAll('td');

                            const tr = document.createElement('tr');
                            tr.classList.add('dataIdAuthor' + authorData[10].textContent);

                            tr.innerHTML = `
                                    <td>${authorData[0].textContent}</td>
                                    <td>${authorData[1].textContent}</td>
                                    <td>${authorData[2].textContent}</td>
                                    <td>${authorData[3].textContent}</td>
                                    <td>${authorData[4].textContent}</td>
                                    <td>${authorData[5].textContent}</td>
                                    <td>${authorData[6].textContent}</td>
                                    <td>${authorData[7].textContent}</td>
                                    <td>${authorData[8].textContent}</td>
                                    <td>${authorData[9].textContent}</td>
                                    <td>
                                        <button type='button' class='delete-author-btn' data-author-id='` + authorData[10].textContent + `'>
                                            <i class='fa fa-trash'></i>
                                        </button>
                                    </td>`;
                            authorsChoose.appendChild(tr);
                        });
                    });
                }
            })
            .catch(error => {
                console.error('An error occurred while searching for authors:', error);
            });
    });
});


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

var previewButton = document.getElementById('preview-button');
if (previewButton) {
    previewButton.addEventListener('click', function() {
        var title = document.getElementById('title').value;

        var authors = [];
        var authorsChoose = document.querySelector('#saved-data-table tbody');
        var authorNames = '';

        // Loop through the <tr> elements in the authorsChoose table body
        for (var i = 0; i < authorsChoose.children.length; i++) {
            var tr = authorsChoose.children[i];

            // Extract the first and last name from the <td> elements in the <tr>
            var firstName = tr.children[0].textContent.trim();
            var lastName = tr.children[1].textContent.trim();

            // Concatenate the first and last name with a space in between
            authorNames += firstName + ' ' + lastName;

            // Add a comma separator between author names, except for the last one
            if (i < authorsChoose.children.length - 1) {
                authorNames += ' - ';
            }
        }
        var topic = document.getElementById('topic_id').value;
        var topicName = document.getElementById('topic_id').options[document.getElementById('topic_id').selectedIndex].text;
        var liElems = keywordListElem.getElementsByTagName("li");
        var keywords = "";

        for (var i = 0; i < liElems.length; i++) {
            keywords += liElems[i].textContent;
            if (i < liElems.length - 1) {
                keywords += ",";
            }
        }

        var type = document.getElementById('type').value;
        // var introduction = ClassicEditor.instances.introduction.getData();
        var objective = '';
        var method = '';
        var result = '';
        var conclusion = '';
        var diagnosis = '';
        var treatment = '';
        var discussion = '';
        disclosure = document.getElementById('disclosure').value;

        if (type === 'Research Paper') {
            var preview = document.getElementById('preview');
            preview.innerHTML = '<tr><td class="border px-6 py-4">' + title + '</td> <td class="border px-6 py-4">' + authorNames + '</td> <td class="border px-6 py-4">' + topicName + '</td><td class="border px-6 py-4">' + keywords + '</td></tr>';

            ClassicEditor
            .create(document.querySelector('#introduction'))
            .then(function (introductionEditor) {
                ClassicEditor
                    .create(document.querySelector('#objective'))
                    .then(function (objectiveEditor) {
                        ClassicEditor
                            .create(document.querySelector('#method'))
                            .then(function (methodEditor) {
                                ClassicEditor
                                    .create(document.querySelector('#result'))
                                    .then(function (resultEditor) {
                                        ClassicEditor
                                            .create(document.querySelector('#conclusion'))
                                            .then(function (conclusionEditor) {
                                                // Editors are ready, you can now access their data
                                                var introduction = introductionEditor.getData();
                                                var objective = objectiveEditor.getData();
                                                var method = methodEditor.getData();
                                                var result = resultEditor.getData();
                                                var conclusion = conclusionEditor.getData();
                                                var preview1 = document.getElementById('preview1');
                                                preview1.innerHTML = '<tr><td class="border px-6 py-4">' + introduction + '</td> <td class="border px-6 py-4">' + objective + '</td></tr>';
                                                var preview2 = document.getElementById('preview2');
                                                preview2.innerHTML = '<tr><td class="border px-6 py-4">' + method + '</td> <td class="border px-6 py-4">' + result + '</td></tr>';
                                                var preview3 = document.getElementById('preview3');
                                                preview3.innerHTML = '<tr><td class="border px-6 py-4">' + conclusion + '</td> <td class="border px-6 py-4">' + disclosure + '</td></tr>';
                                            })
                                            .catch(function (error) {
                                                console.error(error);
                                            });
                                    })
                                    .catch(function (error) {
                                        console.error(error);
                                    });
                            })
                            .catch(function (error) {
                                console.error(error);
                            });
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
            .catch(function (error) {
                console.error(error);
            });



        } else if (type === 'Clinical Case') {
            var previewClinicalCase = document.getElementById('previewClinicalCase');
            previewClinicalCase.innerHTML = '<tr><td class="border px-6 py-4">' + title + '</td> <td class="border px-6 py-4">' + authorNames + '</td> <td class="border px-6 py-4">' + topicName + '</td><td class="border px-6 py-4">' + keywords + '</td></tr>';

            ClassicEditor
            .create(document.querySelector('#introduction'))
            .then(function(introductionEditor) {
                ClassicEditor
                    .create(document.querySelector('#diagnosis'))
                    .then(function(diagnosisEditor) {
                        ClassicEditor
                            .create(document.querySelector('#treatment'))
                            .then(function(treatmentEditor) {
                                ClassicEditor
                                    .create(document.querySelector('#discussion'))
                                    .then(function(discussionEditor) {
                                        // Editors are ready, you can now access their data
                                        var introduction = introductionEditor.getData();
                                        var diagnosis = diagnosisEditor.getData();
                                        var treatment = treatmentEditor.getData();
                                        var discussion = discussionEditor.getData();
                                        var previewClinicalCase1 = document.getElementById('previewClinicalCase1');
                                        previewClinicalCase1.innerHTML = '<tr><td class="border px-6 py-4">' + introduction + '</td> <td class="border px-6 py-4">' + diagnosis + '</td></tr>';

                                        var previewClinicalCase2 = document.getElementById('previewClinicalCase2');
                                        previewClinicalCase2.innerHTML = '<tr> <td class="border px-6 py-4">' + treatment + '</td> <td class="border px-6 py-4">' + discussion + '</td> <td class="border px-6 py-4">' + disclosure + '</td></tr>';
                                    })
                                    .catch(function(error) {
                                        console.error(error);
                                    });
                            })
                            .catch(function(error) {
                                console.error(error);
                            });
                    })
                    .catch(function(error) {
                        console.error(error);
                    });
            })
            .catch(function(error) {
                console.error(error);
            });

        }

    });
} else {
    console.log('Button not found');
}

$(document).ready(function() {
    $("input[type=radio][name=disclosure]").change(function() {
        if (this.value === "provide_disclosure") {
            $("#disclosure_field").show();
        } else {
            $("#disclosure_field").hide();
        }
    });
});
