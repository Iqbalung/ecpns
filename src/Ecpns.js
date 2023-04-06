import React from "react";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import ScrollToTop from "./components/scrolltotop/ScrollToTop";
import HomePage from "./pages/ecpns/HomePage";
import PracticeExams from "./pages/ecpns/PracticeExams";
import Error from "./pages/innerpages/Error";

// Import Css Here
import "./assets/scss/style.scss";

export default function Ecpns() {
  return (
    <Router>
      <ScrollToTop>
        <Routes>
          <Route exact path="/" element={<HomePage />} />
          <Route
            exact
            path={`${process.env.PUBLIC_URL + "/practice-exams"}`}
            element={<PracticeExams />}
          />
          <Route
            exact
            path={`${process.env.PUBLIC_URL + "/LMS/all-categories"}`}
            element={<h1>Hello World!</h1>}
          />
          <Route path="*" element={<Error />} />
        </Routes>
      </ScrollToTop>
    </Router>
  );
}
