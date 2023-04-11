// Select the elements
const titleInput = document.getElementById("title");
const topicInput = document.getElementById("topic_id");
const keywordInput = document.getElementById("keywords");
const introductionInput = document.getElementById("introduction");
const objectiveInput = document.getElementById("objective");
const methodInput = document.getElementById("method");
const resultInput = document.getElementById("result");
const conclusionInput = document.getElementById("conclusion");
const nextButton1 = document.getElementById("next-button-1");
const nextButton2 = document.getElementById("next-button-2");

function validateTitleTopic() {
    // Validate the title input
    if (titleInput.value.trim() === "") {
        titleInput.classList.add("error");
        document.getElementById("title-error").textContent = "Title is required*";
        return;
    } else {
        titleInput.classList.remove("error");
        document.getElementById("title-error").textContent = "";
    }

    // Validate the topic input
    if (topicInput.value === "choose") {
        topicInput.classList.add("error");
        document.getElementById("topic-error").textContent = "Please select a topic*";
        return;
    } else {
        topicInput.classList.remove("error");
        document.getElementById("topic-error").textContent = "";
    }

    // If both inputs are valid, show the next step
    stepper.next();
}

function validateIntroObject() {
    // Validate the introduction input
    if (introductionInput.value.trim() === "") {
        introductionInput.classList.add("error");
        document.getElementById("introduction-error").textContent = "introduction is required*";
        return;
    } else {
        introductionInput.classList.remove("error");
        document.getElementById("introduction-error").textContent = "";
    }

    // Validate the objective input
    if (objectiveInput.value.trim() === "") {
        objectiveInput.classList.add("error");
        document.getElementById("objective-error").textContent = "Objective is required*";
        return;
    } else {
        objectiveInput.classList.remove("error");
        document.getElementById("objective-error").textContent = "";
    }

    // If both inputs are valid, show the next step
    stepper.next();
}

function validateMethodResult() {
    // Validate the method input
    if (methodInput.value.trim() === "") {
        methodInput.classList.add("error");
        document.getElementById("method-error").textContent = "Method is required*";
        return;
    } else {
        methodInput.classList.remove("error");
        document.getElementById("method-error").textContent = "";
    }

    // Validate the result input
    if (resultInput.value.trim() === "") {
        resultInput.classList.add("error");
        document.getElementById("result-error").textContent = "Result is required*";
        return;
    } else {
        resultInput.classList.remove("error");
        document.getElementById("result-error").textContent = "";
    }

    // If both inputs are valid, show the next step
    stepper.next();
}

function validateConclusion() {
    // Validate the conclusion input
    if (conclusionInput.value.trim() === "") {
        conclusionInput.classList.add("error");
        document.getElementById("conclusion-error").textContent =
            "Conclusion is required*";
        return;
    } else {
        conclusionInput.classList.remove("error");
        document.getElementById("conclusion-error").textContent = "";
    }

    // If both inputs are valid, show the next step
    stepper.next();
}

// Disable the "Next" buttons until both inputs are valid
nextButton1.disabled = true;
nextButton2.disabled = true;

titleInput.addEventListener("input", function () {
    if (titleInput.value.trim() === "") {
        nextButton1.disabled = true;
    } else {
        nextButton1.disabled = false;
    }
});

topicInput.addEventListener("input", function () {
    if (topicInput.value.trim() === "") {
        nextButton1.disabled = true;
    } else {
        nextButton1.disabled = false;
    }
});

keywordInput.addEventListener("input", function () {
    if (keywordInput.value.trim() === "") {
        nextButton2.disabled = true;
    } else {
        nextButton2.disabled = false;
    }
});
