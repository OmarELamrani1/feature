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
    var introductionData = introductionInput.value.trim();
    if (introductionData === "") {
        introductionInput.classList.add("error");
        document.getElementById("introduction-error").textContent = "introduction is required*";
        return;
    } else {
        introductionInput.classList.remove("error");
        document.getElementById("introduction-error").textContent = "";
    }

    var objectiveData = objectiveInput.value.trim();
    if (objectiveData === "") {
        objectiveInput.classList.add("error");
        document.getElementById("objective-error").textContent = "Objective is required*";
        return;
    } else {
        objectiveInput.classList.remove("error");
        document.getElementById("objective-error").textContent = "";
    }

    // // If both inputs are valid, show the next step
    stepper.next();
}

function validateMethodResult() {
    // Validate the method input
    var methodData = methodInput.value.trim();
    if (methodData === "") {
        methodInput.classList.add("error");
        document.getElementById("method-error").textContent = "Method is required*";
        return;
    } else {
        methodInput.classList.remove("error");
        document.getElementById("method-error").textContent = "";
    }

    var resultData = resultInput.value.trim();
    if (resultData === "") {
        resultInput.classList.add("error");
        document.getElementById("result-error").textContent = "Result is required*";
        return;
    } else {
        resultInput.classList.remove("error");
        document.getElementById("result-error").textContent = "";
    }

    // // If both inputs are valid, show the next step
    stepper.next();
}

function validateConclusion() {
    // Validate the conclusion input
    var conclusionData = conclusionInput.value.trim();
    if (conclusionData === "") {
        conclusionInput.classList.add("error");
        document.getElementById("conclusion-error").textContent = "Conclusion is required*";
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

    ClassicEditor
        .create(document.querySelector('#method'), {
            ckfinder: {
                uploadUrl: imageUploadUrl,
            }
        })
        .then(editor => {
            // add an event listener to detect when the instance is ready
            editor.model.document.on('change:data', () => {
                methodInput.value = editor.getData();
            });

            const wordCountMessageMethod = document.querySelector('#wordCountMessageMethod');
            const wordLimit = 300;

            // Add an event listener to detect when the instance is ready
            editor.model.document.on('change:data', () => {
                const content = editor.getData();
                const wordCount = countWords(content);


                if (wordCount > wordLimit) {
                    wordCountMessageMethod.textContent = "You have exceeded the word limit.";
                    const truncatedContent = truncateWords(content, wordLimit);
                    editor.setData(truncatedContent);
                } else {
                    wordCountMessageMethod.textContent = "Words: " + wordCount;
                }
            });
        })
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#objective'), {
            ckfinder: {
                uploadUrl: imageUploadUrl,
            }
        })
        .then(editor => {
            // add an event listener to detect when the instance is ready
            editor.model.document.on('change:data', () => {
                objectiveInput.value = editor.getData();
            });

            const wordCountMessageObjective = document.querySelector('#wordCountMessageObjective');
            const wordLimit = 300;

            // Add an event listener to detect when the instance is ready
            editor.model.document.on('change:data', () => {
                const content = editor.getData();
                const wordCount = countWords(content);


                if (wordCount > wordLimit) {
                    wordCountMessageObjective.textContent = "You have exceeded the word limit.";
                    const truncatedContent = truncateWords(content, wordLimit);
                    editor.setData(truncatedContent);
                } else {
                    wordCountMessageObjective.textContent = "Words: " + wordCount;
                }
            });
        })
        .catch(error => {
            console.error(error);
        });


    ClassicEditor
        .create(document.querySelector('#result'), {
            ckfinder: {
                uploadUrl: imageUploadUrl,
            }
        })
        .then(editor => {
            // add an event listener to detect when the instance is ready
            editor.model.document.on('change:data', () => {
                resultInput.value = editor.getData();
            });

            const wordCountMessageResult = document.querySelector('#wordCountMessageResult');
            const wordLimit = 300;

            // Add an event listener to detect when the instance is ready
            editor.model.document.on('change:data', () => {
                const content = editor.getData();
                const wordCount = countWords(content);


                if (wordCount > wordLimit) {
                    wordCountMessageResult.textContent = "You have exceeded the word limit.";
                    const truncatedContent = truncateWords(content, wordLimit);
                    editor.setData(truncatedContent);
                } else {
                    wordCountMessageResult.textContent = "Words: " + wordCount;
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
                introductionInput.value = editor.getData();
            });

            const wordCountMessageIntroduction = document.querySelector('#wordCountMessageIntroduction');
            const wordLimit = 300;

            // Add an event listener to detect when the instance is ready
            editor.model.document.on('change:data', () => {
                const content = editor.getData();
                const wordCount = countWords(content);


                if (wordCount > wordLimit) {
                    wordCountMessageIntroduction.textContent = "You have exceeded the word limit.";
                    const truncatedContent = truncateWords(content, wordLimit);
                    editor.setData(truncatedContent);
                } else {
                    wordCountMessageIntroduction.textContent = "Words: " + wordCount;
                }
            });

        })
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#conclusion'), {
            ckfinder: {
                uploadUrl: imageUploadUrl,
            }
        })
        .then(editor => {
            // add an event listener to detect when the instance is ready
            editor.model.document.on('change:data', () => {
                conclusionInput.value = editor.getData();
            });

            const wordCountMessageConclusion = document.querySelector('#wordCountMessageConclusion');
            const wordLimit = 300;

            // Add an event listener to detect when the instance is ready
            editor.model.document.on('change:data', () => {
                const content = editor.getData();
                const wordCount = countWords(content);


                if (wordCount > wordLimit) {
                    wordCountMessageConclusion.textContent = "You have exceeded the word limit.";
                    const truncatedContent = truncateWords(content, wordLimit);
                    editor.setData(truncatedContent);
                } else {
                    wordCountMessageConclusion.textContent = "Words: " + wordCount;
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
