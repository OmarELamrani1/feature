// Select the elements
const clinicalTitle = document.getElementById("title");
const clinicalTopic = document.getElementById("topic_id");
const clinicalKeywords = document.getElementById("keywords");
const clinicalIntroduction = document.getElementById("introduction");
const clinicalDiagnosis = document.getElementById("diagnosis");
const clinicalTreatment = document.getElementById("treatment");
const clinicalDiscussion = document.getElementById("discussion");
const clinicNext1 = document.getElementById("clinicalNext1");
const clinicNext2 = document.getElementById("clinicalNext2");

// Function to validate the title and topic inputs
function validateTitleTopic() {
    // Validate the title input
    if (clinicalTitle.value.trim() === "") {
        clinicalTitle.classList.add("error");
        document.getElementById("title-error").textContent = "Title is required*";
        return;
    } else {
        clinicalTitle.classList.remove("error");
        document.getElementById("title-error").textContent = "";
    }

    // Validate the topic input
    if (clinicalTopic.value === "choose") {
        clinicalTopic.classList.add("error");
        document.getElementById("topic-error").textContent = "Please select a topic*";
        return;
    } else {
        clinicalTopic.classList.remove("error");
        document.getElementById("topic-error").textContent = "";
    }

    // If both inputs are valid, show the next step
    stepper.next();
}


function validateIntroDiagnosis() {
    var introductionData = clinicalIntroduction.value.trim();
    if (introductionData === "") {
        clinicalIntroduction.classList.add("error");
        document.getElementById("intro-error").textContent = "Clinical History & Presentation is required*";
        return;
    } else {
        clinicalIntroduction.classList.remove("error");
        document.getElementById("intro-error").textContent = "";
    }

    var objectiveData = clinicalDiagnosis.value.trim();
    if (objectiveData === "") {
        clinicalDiagnosis.classList.add("error");
        document.getElementById("diagnosis-error").textContent = "Physical Examination & Diagnostic Workup is required*";
        return;
    } else {
        clinicalDiagnosis.classList.remove("error");
        document.getElementById("diagnosis-error").textContent = "";
    }

    // // If both inputs are valid, show the next step
    stepper.next();
}

function validateTreatmentDiscussion() {
    var treatmentData = clinicalTreatment.value.trim();
    if (treatmentData === "") {
        clinicalTreatment.classList.add("error");
        document.getElementById("treatment-error").textContent = "Treatment is required*";
        return;
    } else {
        clinicalTreatment.classList.remove("error");
        document.getElementById("treatment-error").textContent = "";
    }

    var discussionData = clinicalDiscussion.value.trim();
    if (discussionData === "") {
        clinicalDiscussion.classList.add("error");
        document.getElementById("discussion-error").textContent = "Discussion is required*";
        return;
    } else {
        clinicalDiscussion.classList.remove("error");
        document.getElementById("discussion-error").textContent = "";
    }

    // // If both inputs are valid, show the next step
    stepper.next();
}

// Disable the "Next" buttons until both inputs are valid
clinicNext1.disabled = true;
clinicNext2.disabled = true;

clinicalTitle.addEventListener("input", function() {
    if (clinicalTitle.value.trim() === "") {
        clinicNext1.disabled = true;
    } else {
        clinicNext1.disabled = false;
    }
});

clinicalTopic.addEventListener("input", function() {
    if (clinicalTopic.value.trim() === "") {
        clinicNext1.disabled = true;
    } else {
        clinicNext1.disabled = false;
    }
});

clinicalKeywords.addEventListener("input", function() {
    if (clinicalKeywords.value.trim() === "") {
        clinicNext2.disabled = true;
    } else {
        clinicNext2.disabled = false;
    }
});

ClassicEditor
    .create(document.querySelector('#discussion'), {
        ckfinder: {
            uploadUrl: imageUploadUrl,
        }
    })
    .then(editor => {
        // add an event listener to detect when the instance is ready
        editor.model.document.on('change:data', () => {
            clinicalDiscussion.value = editor.getData();
        });

        const wordCountMessageDiscussion = document.querySelector('#wordCountMessageDiscussion');
        const wordLimit = 300;

        // Add an event listener to detect when the instance is ready
        editor.model.document.on('change:data', () => {
            const content = editor.getData();
            const wordCount = countWords(content);


            if (wordCount > wordLimit) {
                wordCountMessageDiscussion.textContent = "You have exceeded the word limit.";
                const truncatedContent = truncateWords(content, wordLimit);
                editor.setData(truncatedContent);
            } else {
                wordCountMessageDiscussion.textContent = "Words: " + wordCount;
            }
        });
    })
    .catch(error => {
        console.error(error);
    });


ClassicEditor
    .create(document.querySelector('#diagnosis'), {
        ckfinder: {
            uploadUrl: imageUploadUrl,
        }
    })
    .then(editor => {
        // add an event listener to detect when the instance is ready
        editor.model.document.on('change:data', () => {
            clinicalDiagnosis.value = editor.getData();
        });

        const wordCountMessageDiagnosis = document.querySelector('#wordCountMessageDiagnosis');
        const wordLimit = 300;

        // Add an event listener to detect when the instance is ready
        editor.model.document.on('change:data', () => {
            const content = editor.getData();
            const wordCount = countWords(content);


            if (wordCount > wordLimit) {
                wordCountMessageDiagnosis.textContent = "You have exceeded the word limit.";
                const truncatedContent = truncateWords(content, wordLimit);
                editor.setData(truncatedContent);
            } else {
                wordCountMessageDiagnosis.textContent = "Words: " + wordCount;
            }
        });
    })
    .catch(error => {
        console.error(error);
    });


ClassicEditor
    .create(document.querySelector('#introduction'), {
        ckfinder: {
            uploadUrl: imageUploadUrl,
        }
    })
    .then(editor => {

        // add an event listener to detect when the instance is ready
        editor.model.document.on('change:data', () => {
            clinicalIntroduction.value = editor.getData();
        });

        const wordCountMessage = document.querySelector('#wordCountMessage');
        const wordLimit = 300;

        // Add an event listener to detect when the instance is ready
        editor.model.document.on('change:data', () => {
            const content = editor.getData();
            const wordCount = countWords(content);


            if (wordCount > wordLimit) {
                wordCountMessage.textContent = "You have exceeded the word limit.";
                const truncatedContent = truncateWords(content, wordLimit);
                editor.setData(truncatedContent);
            } else {
                wordCountMessage.textContent = "Words: " + wordCount;
            }
        });
    })
    .catch(error => {
        console.error(error);
    });

ClassicEditor
    .create(document.querySelector('#treatment'), {
        ckfinder: {
            uploadUrl: imageUploadUrl,
        }
    })
    .then(editor => {
        // add an event listener to detect when the instance is ready
        editor.model.document.on('change:data', () => {
            clinicalTreatment.value = editor.getData();
        });

        const wordCountMessageTreatment = document.querySelector('#wordCountMessageTreatment');
        const wordLimit = 300;

        // Add an event listener to detect when the instance is ready
        editor.model.document.on('change:data', () => {
            const content = editor.getData();
            const wordCount = countWords(content);


            if (wordCount > wordLimit) {
                wordCountMessageTreatment.textContent = "You have exceeded the word limit.";
                const truncatedContent = truncateWords(content, wordLimit);
                editor.setData(truncatedContent);
            } else {
                wordCountMessageTreatment.textContent = "Words: " + wordCount;
            }
        });
    })
    .catch(error => {
        console.error(error);
    });

    function countWords(content) {
        const text = content.replace(/<[^>]+>/g, '').trim();
        const words = text.split(/\s+/);
        const filteredWords = words.filter(word => word !== '');
        return filteredWords.length;
    }

    function truncateWords(content, limit) {
        const words = content.split(/\s+/);
        const truncatedWords = words.slice(0, limit);
        return truncatedWords.join(' ');
    }
