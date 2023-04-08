const question = document.querySelector(".question");
const answers = document.querySelector(".answers");


const content = document.querySelector(".content");
const contentFinish = document.querySelector(".finish");


import questions from "./questions.js";

let currentIndex = 0;
let questionsCorrect = 0;


function nextQuestion(e) {
  if (e.target.getAttribute("data-correct") === "true") {
    questionsCorrect++;
  }

  if (currentIndex < questions.length - 1) {
    currentIndex++;
    loadQuestion();
  } else {
    finish();
  }
}

function finish() {
  let form = new FormData();
  form.append('points', questionsCorrect);

  axios({
    method: "post",
    url: "/finish",
    data: form,
    headers: { "Content-Type": "multipart/form-data" },
  }).then(function (response) {
    //handle success
    console.log(response);
  })
  .catch(function (response) {
    //handle error
    console.log(response);
  });


  content.style.display = "none";
  contentFinish.style.display = "flex";
}

function loadQuestion() {

  const item = questions[currentIndex];
  answers.innerHTML = "";
  question.innerHTML = item.question;

  item.answers.forEach((answer) => {
    const div = document.createElement("div");

    div.innerHTML = `
    <button class="answer" data-correct="${answer.correct}">
      ${answer.option}
    </button>
    `;

    answers.appendChild(div);
  });

  document.querySelectorAll(".answer").forEach((item) => {
    item.addEventListener("click", nextQuestion);
  });
}

loadQuestion();