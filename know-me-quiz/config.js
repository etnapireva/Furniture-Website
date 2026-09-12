/* =============================================================================
   HOW WELL DO YOU KNOW ME? — edit this file only
   Limon: change names, questions, choices, correctIndex, and end messages.
   correctIndex is 0-based (0 = first choice, 1 = second, …).
   {her} and {his} are replaced automatically with the names below.
   ============================================================================= */

window.QUIZ_CONFIG = {
  herName: "Limon",
  hisName: "i dashur",

  title: "How well do you know me?",
  intro:
    "Një lojë e vogël, vetëm për ty. Përgjigju me zemër — dhe pa kërkuar ndihmë.",
  startButton: "Fillo kuizin",
  nextHint: "Prek një përgjigje",
  progressLabel: "Pyetja {n} nga {total}",

  questions: [
    {
      q: "Çfarë ngjyre më pëlqen më shumë?",
      choices: ["Rozë e butë", "Blu e errët", "E verdhë", "E zezë"],
      correctIndex: 0,
    },
    {
      q: "Cili është ushqimi im i preferuar?",
      choices: ["Pasta", "Pizza", "Sushi", "Byrek i nxehtë"],
      correctIndex: 1,
    },
    {
      q: "Cilin film e shoh përsëri e përsëri?",
      choices: ["Friends (serial)", "Titanic", "Twilight", "The Notebook"],
      correctIndex: 3,
    },
    {
      q: "Në mëngjes, çfarë pije më parë?",
      choices: ["Kafe", "Çaj", "Kakao", "Vetëm ujë"],
      correctIndex: 0,
    },
    {
      q: "Jam më shumë njeri i mëngjesit apo i natës?",
      choices: [
        "E mëngjesit — zgjohem me buzëqeshje",
        "E natës — bota ime ndizet pas orës 22",
        "Varet nga dita",
        "Gjumi deri në mesditë, pa diskutim",
      ],
      correctIndex: 1,
    },
    {
      q: "Ku do të doja të udhëtonim së bashku, një ditë?",
      choices: ["Paris", "Santorini", "Stamboll", "Romë"],
      correctIndex: 1,
    },
    {
      q: "Cila stinë më bën më të lumtur?",
      choices: ["Pranvera", "Vera", "Vjeshta", "Dimri"],
      correctIndex: 2,
    },
    {
      q: "Si e kaloj më me qejf një mbrëmje të lirë?",
      choices: [
        "Film, batanije dhe qetësi",
        "Dalje e gjatë me miq",
        "Shëtitje deri vonë",
        "Gatim në shtëpi, me muzikë",
      ],
      correctIndex: 0,
    },
  ],

  /* Score bands: low = below midMin, mid = midMin through perfect-1, perfect = all correct */
  midMin: 4,

  ending: {
    low: {
      heading: "Na u desh pak më shumë kohë…",
      body:
        "{his}, disa gjëra të mia i ke ende për t’i zbuluar — dhe kjo është e bukur. Unë, {her}, kam ende surpriza për ty. Provo sërish, ose pyet mua. Me puthje.",
    },
    mid: {
      heading: "Më njeh më mirë nga sa mendon.",
      body:
        "{his}, shumë përgjigje i dhe drejt. Më sheh. Më dëgjon. Për pjesën tjetër — kam kohë t’i tregoj unë, {her}, me zë të ulët.",
    },
    perfect: {
      heading: "Ti më njeh. Tërësisht.",
      body:
        "{his}, çdo përgjigje e saktë. Zemra ime nuk është enigmë për ty. Unë, {her}, jam shumë fatlume që je ti. Të dua.",
    },
  },

  retryButton: "Provo sërish",
  scoreLabel: "{score} nga {total} të sakta",
  footerNote: "Bërë me dashuri, vetëm për ty.",
};
