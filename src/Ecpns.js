import React from "react";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import ScrollToTop from "./components/scrolltotop/ScrollToTop";
import HomePage from "./pages/ecpns/HomePage";
import Error from "./pages/innerpages/Error";

// Import Css Here
import "./assets/scss/style.scss";

export default function Ecpns() {
  return (
    <Router>
      <ScrollToTop>
        <Routes>
          <Route exact path="/" element={<HomePage />} />
          <Route path="*" element={<Error />} />
        </Routes>
      </ScrollToTop>
    </Router>
  );
}
