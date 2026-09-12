# How well do you know me?

Kuiz i vogël për çiftin. Nuk prek faqet e Mobileria HSM.

## Si ta hapësh

Nga rrënja e projektit:

```bash
python3 -m http.server 4173 --directory know-me-quiz
```

Pastaj hap [http://localhost:4173](http://localhost:4173) në telefon ose në shfletues.

Ose hap `know-me-quiz/index.html` drejtpërdrejt (fontet ngarkohen nga interneti).

## Si ta ndryshosh

Hap **`config.js`**. Ndrysho emrat, pyetjet, zgjedhjet, `correctIndex` (0 = përgjigja e parë) dhe mesazhet në fund.
