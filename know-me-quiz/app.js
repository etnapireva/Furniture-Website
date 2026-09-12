(function () {
  const cfg = window.QUIZ_CONFIG;
  if (!cfg) {
    document.body.innerHTML = "<p>Mungon config.js</p>";
    return;
  }

  const fill = (text) =>
    String(text)
      .replaceAll("{her}", cfg.herName)
      .replaceAll("{his}", cfg.hisName);

  const els = {
    start: document.getElementById("screen-start"),
    quiz: document.getElementById("screen-quiz"),
    end: document.getElementById("screen-end"),
    kicker: document.getElementById("kicker"),
    title: document.getElementById("title"),
    intro: document.getElementById("intro"),
    btnStart: document.getElementById("btn-start"),
    progress: document.getElementById("progress-text"),
    dots: document.getElementById("dots"),
    question: document.getElementById("question"),
    choices: document.getElementById("choices"),
    endScore: document.getElementById("end-score"),
    endHeading: document.getElementById("end-heading"),
    endBody: document.getElementById("end-body"),
    scoreHearts: document.getElementById("score-hearts"),
    btnRetry: document.getElementById("btn-retry"),
    footer: document.getElementById("footer-note"),
    hearts: document.getElementById("hearts"),
  };

  const questions = cfg.questions || [];
  let index = 0;
  let score = 0;
  let locked = false;

  function show(screen) {
    els.start.classList.toggle("hidden", screen !== "start");
    els.quiz.classList.toggle("hidden", screen !== "quiz");
    els.end.classList.toggle("hidden", screen !== "end");
  }

  function spawnHearts() {
    const glyphs = ["♥", "♡", "✦"];
    for (let i = 0; i < 14; i += 1) {
      const span = document.createElement("span");
      span.textContent = glyphs[i % glyphs.length];
      span.style.left = Math.random() * 100 + "%";
      span.style.animationDuration = 9 + Math.random() * 10 + "s";
      span.style.animationDelay = Math.random() * 8 + "s";
      span.style.fontSize = 10 + Math.random() * 14 + "px";
      els.hearts.appendChild(span);
    }
  }

  function renderDots() {
    els.dots.innerHTML = "";
    questions.forEach((_, i) => {
      const dot = document.createElement("i");
      if (i < index) dot.className = "done";
      else if (i === index) dot.className = "now";
      els.dots.appendChild(dot);
    });
  }

  function renderQuestion() {
    locked = false;
    const item = questions[index];
    els.progress.textContent = fill(cfg.progressLabel)
      .replace("{n}", String(index + 1))
      .replace("{total}", String(questions.length));
    els.question.textContent = item.q;
    renderDots();
    els.choices.innerHTML = "";
    item.choices.forEach((label, i) => {
      const btn = document.createElement("button");
      btn.type = "button";
      btn.className = "choice";
      btn.textContent = label;
      btn.addEventListener("click", () => onPick(i, btn));
      els.choices.appendChild(btn);
    });
  }

  function onPick(choiceIndex, btn) {
    if (locked) return;
    locked = true;
    const item = questions[index];
    const buttons = [...els.choices.querySelectorAll(".choice")];
    buttons.forEach((b) => {
      b.disabled = true;
    });
    const correct = choiceIndex === item.correctIndex;
    if (correct) {
      score += 1;
      btn.classList.add("correct");
    } else {
      btn.classList.add("wrong");
      const right = buttons[item.correctIndex];
      if (right) right.classList.add("correct");
    }
    window.setTimeout(() => {
      index += 1;
      if (index >= questions.length) finish();
      else renderQuestion();
    }, 850);
  }

  function bandFor(s) {
    const total = questions.length;
    if (s >= total) return "perfect";
    if (s >= (cfg.midMin ?? Math.ceil(total / 2))) return "mid";
    return "low";
  }

  function finish() {
    const total = questions.length;
    const band = bandFor(score);
    const msg = cfg.ending[band];
    els.endScore.textContent = fill(cfg.scoreLabel)
      .replace("{score}", String(score))
      .replace("{total}", String(total));
    els.endHeading.textContent = fill(msg.heading);
    els.endBody.textContent = fill(msg.body);
    els.scoreHearts.textContent = "♥".repeat(score) + "♡".repeat(Math.max(0, total - score));
    els.footer.textContent = fill(cfg.footerNote);
    els.btnRetry.textContent = cfg.retryButton;
    show("end");
  }

  function startQuiz() {
    index = 0;
    score = 0;
    show("quiz");
    renderQuestion();
  }

  els.kicker.textContent = "vetëm për ty";
  els.title.textContent = cfg.title;
  els.intro.textContent = fill(cfg.intro);
  els.btnStart.textContent = cfg.startButton;
  els.btnStart.addEventListener("click", startQuiz);
  els.btnRetry.addEventListener("click", startQuiz);

  spawnHearts();
})();
