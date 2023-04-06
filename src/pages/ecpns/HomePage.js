import React from "react";
import SEO from "../../common/SEO";
import Header from "../../components/ecpns/Header";
import Banner from "../../components/ecpns/Banner";
import Footer from "../../components/ecpns/Footer";
import ExamCategories from "../../components/ecpns/exams/ExamCategories";
import HomeFiveCourses from "../../components/home-five/HomeFiveCourses";
import HomeFiveProgress from "../../components/home-five/HomeFiveProgress";

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

      <HomeFiveProgress />

      <ExamCategories />

      <HomeFiveCourses />

      <Footer />
    </>
  );
}
