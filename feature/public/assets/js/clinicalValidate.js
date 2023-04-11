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
    // Validate the Introduction input
    if (clinicalIntroduction.value.trim() === "") {
        clinicalIntroduction.classList.add("error");
        document.getElementById("intro-error").textContent = "Introduction is required*";
        return;
    } else {
        clinicalIntroduction.classList.remove("error");
        document.getElementById("intro-error").textContent = "";
    }

    // Validate the Diagnosis input
    if (clinicalDiagnosis.value.trim() === "") {
        clinicalDiagnosis.classList.add("error");
        document.getElementById("diagnosis-error").textContent = "Diagnosis is required*";
        return;
    } else {
        clinicalDiagnosis.classList.remove("error");
        document.getElementById("diagnosis-error").textContent = "";
    }

    // If both inputs are valid, show the next step
    stepper.next();
}

function validateTreatmentDiscussion() {
    // Validate the Treatment input
    if (clinicalTreatment.value.trim() === "") {
        clinicalTreatment.classList.add("error");
        document.getElementById("treatment-error").textContent = "Treatment is required*";
        return;
    } else {
        clinicalTreatment.classList.remove("error");
        document.getElementById("treatment-error").textContent = "";
    }

    // Validate the Discussion input
    if (clinicalDiscussion.value.trim() === "") {
        clinicalDiscussion.classList.add("error");
        document.getElementById("discussion-error").textContent = "Discussion is required*";
        return;
    } else {
        clinicalDiscussion.classList.remove("error");
        document.getElementById("discussion-error").textContent = "";
    }

    // If both inputs are valid, show the next step
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
