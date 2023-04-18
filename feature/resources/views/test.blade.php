i have a input keywords i use javascript to add many keywords so when i want to display data before submitting he don't found the keyword even if i added keyword in input here is my input keywords <div class="form-group">
    <label for="keywords"><strong>Keywords</strong></label>
    <p>- Please provide 1-5 keywords</p>
    <div class="inline-flex mb-3">
        <input type="text" name="keywords"
            class="form-control" id="keywords"
            placeholder="Enter keywords">
        <button id="addKeywordBtn" type="button"
            class="ml-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
    </div>
    <ul id="keywordList"></ul>
</div> and here is my script to add keywords: var keywordList = [];

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
}); and here is my script to show data before submmiting: <script>
    function previewForm() {
        var title = document.getElementById('title').value;
        var topic = document.getElementById('topic_id').value;
        var keywords = document.getElementById('keywords').value;

        if (!title || !topic || !keywords) {
        alert('Please fill in all required fields');
        return;
    }
        var preview = document.getElementById('preview');
        preview.innerHTML = '<tr><td class="border px-6 py-4">' + title + '</td> <td class="border px-6 py-4">' +
            topic + '</td><td class="border px-6 py-4">' + keywords + '</td></tr>';
    }

    var previewButton = document.getElementById('preview-button');
    if (previewButton) {
        previewButton.addEventListener('click', previewForm);
    } else {
        console.log('Button not found');
    }
</script> he don't found keywords what should i do please
