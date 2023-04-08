import React from "react";
import SEO from "../../components/ecpns/common/SEO";
import Header from "../../components/ecpns/Header";
import Footer from "../../components/ecpns/Footer";
import Banner from "./home/Banner";
import HowItWorks from "./home/HowItWorks";
import ExamCategories from "./home/exams/ExamCategories";
import ExamLists from "./home/exams/ExamLists";
import CourseLists from "./home/courses/CourseLists";
import Testimonials from "./home/Testimonials";

export default function HomePage() {
  return (
    <>
      <SEO title="YaPresindo" />

      <Header
        styles="header-transparent header-style-2"
        searchDisable
        buttonStyle="bg-color-white"
      />

      <Banner />

      <ExamCategories />

      <ExamLists />

      <CourseLists />

      <Testimonials />

      <HowItWorks />

      <Footer />
    </>
  );
}
