
import React from "react";
import { createRoot } from "react-dom/client";
import ArticleSurvey from "../reactComponents/ArticleSurvey.jsx";
const articleSurveyItem = document.getElementById("article-survey");
if (articleSurveyItem) {
  const rootElement = (
    <React.StrictMode>
      <ArticleSurvey />
    </React.StrictMode>
  );

  createRoot(articleSurveyItem).render(rootElement);
}

import ArticleSurveyTwo from "../reactComponents/ArticleSurvey-two.jsx";
const articleSurveyItemTwo = document.getElementById("article-survey-two");

if (articleSurveyItemTwo) {
  const rootElementTwo = (
    <React.StrictMode>
      <ArticleSurveyTwo />
    </React.StrictMode>
  );
  createRoot(articleSurveyItemTwo).render(rootElementTwo);
}
